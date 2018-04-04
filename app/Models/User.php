<?php

namespace Models;

use General\Site;
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
 * @property Site[]|\Illuminate\Database\Eloquent\Collection $sites
 *
 * Other Properties
 * @property array $baseTemplate
 *
 * @package Models
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

    /**
     * Relationship to the Site Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Site
     */
    public function sites()
    {
        return $this->hasMany(Site::class, 'user_id', 'id');
    }
}