<?php

namespace Models;

use App\BaseModel;

/**
 * Class FormField
 *
 * Database Fields
 * @property integer $id
 * @property integer $form_id
 * @property string $form_field_type
 *
 * Relationships
 * @property FormFieldType $formFieldType
 * @property Form $form
 *
 * Other Properties
 *
 * @package Models
 */
class FormField extends BaseModel
{
    protected $table = 'form_fields';
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
            'form_id' => 'required|integer',
            'form_field_type' => 'required|max:255',
        ];
    }

    /**
     * Relationship to the Form Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Form
     */
    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id', 'id');
    }

    /**
     * Relationship to the FormFieldType Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|FormFieldType
     */
    public function formFieldType()
    {
        return $this->belongsTo(FormFieldType::class, 'form_field_type', 'name');
    }
}