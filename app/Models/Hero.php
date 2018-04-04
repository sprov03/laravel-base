<?php

namespace Models;

use App\BaseModel;

/**
 * Class Hero
 *
 * Database Fields
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * Relationships
 *
 * Other Properties
 * @property array $baseTemplate
 *
 * @package Models
 */
class Hero extends BaseModel
{
    protected $table = 'heroes';
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

    public function ifOutDated ($updated_at)
    {
        $updated_at = ($updated_at) ? $updated_at : '-1 year';
        $carbon = new \Carbon\Carbon($this->updated_at);
        return $carbon->greaterThan(new \Carbon\Carbon($updated_at));
    }
}
