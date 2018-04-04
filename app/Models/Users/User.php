<?php

namespace Users;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 *
 * Database Fields
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $deleted_at
 *
 * Relationships
 *
 * Other Properties
 * @property array $baseTemplate
 *
 * @package Users
 */
class User extends BaseModel
{
    use SoftDeletes;

    protected $table = 'users';
    public $timestamps = false;

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
            'remember_token' => 'required|max:100',
        ];
    }
}
