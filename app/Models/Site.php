<?php

namespace Models;

use App\BaseModel;

/**
 * Class Site
 *
 * Database Fields
 * @property integer $id
 * @property string $domain
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * Relationships
 * @property User $user
 *
 * Other Properties
 *
 * @package Models
 */
class Site extends BaseModel
{
    // use CascadeSoftDeletes;
    // use JsonableRelationships;

    protected $table = 'sites';
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
            'domain' => 'required|max:255',
            'user_id' => 'required|integer',
        ];
    }

    /**
     * Relationship to the `users` table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}