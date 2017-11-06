<?php

namespace Models;

use App\BaseModel;

/**
 * Class User
 *
 * Database Fields
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * Relationships
 *
 * Other Properties
 *
 * @package Models
 */
class User extends BaseModel
{
    // use CascadeSoftDeletes;
    // use JsonableRelationships;

    protected $table = 'users';
    protected $with = [];
    protected $touches = [];
    protected $appends = [];
    protected $cascadeDeletes = [];
    protected $jsonableRelationships = [];
    protected $searchable = [];
    protected $casts = [
    ];

    public function getFillable()
    {
        return array_keys(self::rules());
    }

    /**
    * Returns Dynamic Model Rules If necessary
    *
    * @return array
    */
    public static function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ];
    }
}
