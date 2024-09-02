<?php

namespace App\Models;

use App\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use ValidationTrait;

    use ValidationTrait {
        ValidationTrait::validate as private parent_validate;
    }

    public function __construct() {

        parent::__construct();
        $this->__validationConstruct();
    }

    protected $fillable = array('slug', 'title', 'short_description', 'description','banner_image_id', 'status');

    protected $dates = ['created_at','updated_at'];

    protected function setRules()
    {
        $this->val_rules = array(
            'title' => 'required|max:250',
            'slug' => 'required|max:250|unique:products,slug,ignoreId,id,deleted_at,NULL',
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
        return $this->hasMany('App\Models\Product', 'parent_id', 'id');
    }

}
