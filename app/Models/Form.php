<?php

namespace Models;

use App\BaseModel;

/**
 * Class Form
 *
 * Database Fields
 * @property integer $id
 * @property integer $user_id
 *
 * Relationships
 * @property FormField[]|\Illuminate\Database\Eloquent\Collection $formFields
 * @property User $user
 *
 * Other Properties
 *
 * @package Models
 */
class Form extends BaseModel
{

    protected $table = 'forms';
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

    /**
     * Relationship to the FormField Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|FormField
     */
    public function formFields()
    {
        return $this->hasMany(FormField::class, 'form_id', 'id');
    }
}