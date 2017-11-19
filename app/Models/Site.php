<?php

namespace Models;

use App\BaseModel;

/**
 * Class Site
 *
 * Database Fields
 * @property integer $id
 * @property integer $user_id
 * @property integer $website_id
 * @property string $website_type
 *
 * Relationships
 * @property User $user
 * @property WebsiteInterface $website
 *
 * Other Properties
 *
 * @package Models
 */
class Site extends BaseModel
{

    protected $table = 'sites';
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
            'website_id' => 'required|integer',
            'website_type' => 'required|max:50',
        ];
    }

    /**
     * Relationship to a Website item
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo|WebsiteInterface
     */
    public function website()
    {
        return $this->morphTo();
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