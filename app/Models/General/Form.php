<?php

namespace Models\General;

use App\User;
use App\BaseModel;

/**
 * Class Form
 *
 * Database Fields
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 *
 * Relationships
 * @property User $user
 *
 * Other Properties
 * @property array $baseTemplate
 *
 * @package General
 */
class Form extends BaseModel
{
    protected $table = 'forms';
    public $timestamps = false;

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
            'user_id' => 'required|integer',
        ];
    }

    /**
     * Relationship to the User Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}