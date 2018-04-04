<?php

namespace Models\Todos;

use App\User;
use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Todo
 *
 * Database Fields
 *
 * @property integer $id
 * @property string $label
 * @property string $notes
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
 * @property bool $is_done
*
 * @package Models\Todos
 */
class Todo extends BaseModel
{
    use SoftDeletes;

    protected $table = 'todos';

    protected $casts = [
        'is_done' => 'bool'
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
            'is_done' => 'bool',
            'notes' => 'required',
            'label' => 'required|max:255',
//            'required' => 'required'
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

    public function ifOutDated ($updated_at)
    {
        $updated_at = ($updated_at) ? $updated_at : '-1 year';
        $carbon = new \Carbon\Carbon($this->updated_at);
        return $carbon->greaterThan(new \Carbon\Carbon($updated_at));
    }
}