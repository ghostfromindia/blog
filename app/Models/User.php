<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Searchable;
use App\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use Searchable;
    use ValidationTrait { ValidationTrait::validate as private parent_validate;}

    protected $table = 'users';

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
        'name',
        'email',
        'type',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function setRules()
    {
        $this->val_rules = array(
            'name' => 'required|max:250',
            'email' => 'required|max:250|unique:users,email,ignoreId,id',
        );
    }


    protected function setAttributes() {
        $this->val_attributes = array(
        );
    }

    public function validate($data = null, $ignoreId = 'NULL') {
        if( isset($this->val_rules['email']) )
        {
            $this->val_rules['email'] = str_replace('ignoreId', $ignoreId, $this->val_rules['email']);
        }
        return $this->parent_validate($data);
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
