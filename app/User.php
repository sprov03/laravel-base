<?php

namespace App;

use Models\Users\Cows\Cow;
use Models\Todos\Todo;
use Models\General\Form;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

/**
 * @property integer $id
 * @property Collection|Form[] $forms
 * @property Collection|Todo[] $todos
 */
class User extends Authenticatable
{
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationship to the Form Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Form
     */
    public function forms()
    {
        return $this->hasMany(Form::class, 'user_id', 'id');
    }

    /**
     * Relationship to the Todo Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Todo
     */
    public function todos()
    {
        return $this->hasMany(Todo::class, 'user_id', 'id');
    }

    /**
     * Relationship to the Cow Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Cow
     */
    public function cows()
    {
        return $this->hasMany(Cow::class, 'user_id', 'id');
    }
}