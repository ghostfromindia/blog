<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Searchable;
use App\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Authors extends Authenticatable
{
    use HasFactory;
    use Searchable;
    use ValidationTrait { ValidationTrait::validate as private parent_validate;}

    protected $table = 'authors';

    public function __construct() {

        parent::__construct();
        $this->__validationConstruct();
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id','title','slug','tagline','description','instagram_link','x_link','banner_image_id','featured_image_id','category_id'
    ];

    protected function setRules()
    {
        $this->val_rules = array(
            'title' => 'required|max:250',
        );
    }



    public function banner_image()
    {
        return $this->belongsTo('App\Models\Files', 'banner_image_id', 'id');
    }

    public function featured_image()
    {
        return $this->belongsTo('App\Models\Files', 'featured_image_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

}
