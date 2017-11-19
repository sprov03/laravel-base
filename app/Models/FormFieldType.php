<?php

namespace Models;

use App\BaseModel;

/**
 * Class FormFieldType
 *
 * Database Fields
 * @property string $name
 *
 * Relationships
 * @property FormField[]|\Illuminate\Database\Eloquent\Collection $formFields
 *
 * Other Properties
 *
 * @package Models
 */
class FormFieldType extends BaseModel
{

    protected $table = 'form_field_types';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'name';
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
        ];
    }

    /**
     * Relationship to the FormField Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|FormField
     */
    public function formFields()
    {
        return $this->hasMany(FormField::class, 'form_field_type', 'name');
    }
}