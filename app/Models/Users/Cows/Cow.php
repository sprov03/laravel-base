<?php

namespace Models\Users\Cows;

use App\User;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cow
 *
 * Database Fields
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $user_id
 *
 * Relationships
 * @property User $user
 *
 * Other Properties
 * @property array $baseTemplate
 *
 * @package Models\Users\Cows
 */
class Cow extends Model
{
    use SoftDeletes;

    protected $table = 'cows';

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