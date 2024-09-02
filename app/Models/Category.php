<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Category extends Model
{
    use HasFactory;
    use Searchable;
    use ValidationTrait { ValidationTrait::validate as private parent_validate;}

    public function __construct() {

        parent::__construct();
        $this->__validationConstruct();
    }

    protected $fillable = array('parent_id','slug', 'title', 'short_description', 'description','image_id','banner_image_id', 'status', 'is_featured','priority');

    protected $dates = ['created_at','updated_at'];

    protected function setRules()
    {
        $this->val_rules = array(
            'category_id' => 'integer',
            'title' => 'required|max:250',
            'slug' => 'required|max:250|unique:categories,slug,ignoreId,id',
            'short_description' => 'required',
            'description' => 'required',
        );
    }

    protected function setAttributes() {
        $this->val_attributes = array(
        );
    }

    public function validate($data = null, $ignoreId = 'NULL') {
        if( isset($this->val_rules['slug']) )
        {
            $this->val_rules['slug'] = str_replace('ignoreId', $ignoreId, $this->val_rules['slug']);
        }
        return $this->parent_validate($data);
    }

    public function banner_image()
    {
        return $this->belongsTo('App\Models\Files', 'banner_image_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function blogs()
    {
        return $this->hasMany('App\Models\Blogs', 'category_id', 'id');
    }


    public function author()
    {
        return $this->hasOne(Authors::class, 'category_id');
    }

}
