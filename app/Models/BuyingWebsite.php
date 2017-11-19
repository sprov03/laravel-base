<?php

namespace Models;

use App\BaseModel;

/**
 * Class BuyingWebsite
 *
 * Database Fields
 * @property integer $id
 *
 * Relationships
 *
 * Other Properties
 *
 * @package Models
 */
class BuyingWebsite extends BaseModel
{

    protected $table = 'buying_websites';
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
        ];
    }
}
