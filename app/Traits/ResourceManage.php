<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

trait ResourceManage{

    protected $model;
    protected $view;
    protected $name;
    protected $route;

    public function home(): View{
        $collection = $this->model;
        if (Schema::hasColumn($this->model->getTable(), 'parent_id')) {
            $collection = $collection->with('childs')->whereNull('parent_id');
        }
        $collection = $collection->paginate(30);
        return view($this->view.'.home', ["name" => $this->name,"collection" => $collection]);
    }

    public function create(): View{
        return view($this->view.'.form', ["name" => $this->name]);
    }

    public function createChild($id): View{
        $parent = $this->model->findOrFail(decrypt($id));
        return view($this->view.'.form', ["name" => $this->name,'parent' => $parent]);
    }

    public function edit($id): View{
        $obj = $this->model::find(decrypt($id));
        !$obj && abort(404);
        return view($this->view.'.form', ["name" => $this->name, 'obj'=> $obj]);
    }

    public function save(Request $request){
        $this->model->validate($request->all());
        $this->model->fill($request->all());
        $this->model->save();
        return redirect(route($this->route.'edit',['id'=>encrypt($this->model->id)]));
    }

    public function update(Request $request){
        $model = $this->model->find(decrypt($request->id));
        $model->validate($request->all(), decrypt($request->id));
        $model->fill($request->all());
        $model->save();
        return redirect(route($this->route.'edit',['id'=>encrypt($model->id)]));
    }

    public function select2search(Request $request, $columns =['title','slug']): JsonResponse{
        $results = $this->model::search($request->keyword, $columns)->select('id','title','slug')->get();
        $results = $results->map(function ($item) {
            return [
                'id' => $item['id'],
                'text' => $item['title'],
            ];
        });

        return response()->json(['results'=> $results]);
    }

    public function generateSlug(Request $request){
        $slug = $this->textToSlug($request->slug);
        // checking the database
        $in_db = $this->model::where('slug', $slug)->first();
        if($in_db){
            if($request->id && $request->id == $in_db->id){
                return Response::json(['slug'=> $slug]);
            }else{
                $request->merge(['slug' => $this->textToSlug($slug.'-'.date('his'))]);
                return $this->generateSlug($request);
            }
        }else{
            return Response::json(['slug'=> $slug]);
        }
    }

    public function textToSlug($text): string
    {
        // Replace non letter or digits by a hyphen
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // Transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim trailing hyphens
        $text = trim($text, '-');
        // Convert to lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

}
