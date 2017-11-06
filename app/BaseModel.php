<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;

/**
 * Class BaseModel
 *
 * @mixin Model
 * @mixin \Eloquent
 *
 * @method static $this findOrFail($id)
 *
 * Auto Complete Helpers Gen from Template
 * @method bool|null forceDelete()
 * @method static bool|null restore()
 * @method static Builder|$this type($type)
 * @method static Builder|$this whereCreatedAt($value)
 * @method static Builder|$this whereDeletedAt($value)
 * @method static Builder|$this whereFeatureId($value)
 * @method static Builder|$this whereId($value)
 * @method static Builder|$this whereType($value)
 * @method static Builder|$this whereUpdatedAt($value)
 * @method static Builder|$this onlyTrashed()
 * @method static Builder|$this withTrashed()
 * @method static Builder|$this withoutTrashed()
 * @method static Builder|$this search(Request $request, array $columns)
 *
 * @package App
 */
class BaseModel extends Model
{
    public function scopeSearch(EloquentBuilder $query, Request $request, $columns)
    {
        if ($request->has('search')) {
            if ($request->has('column')) {
                $query->where($request->input('column'), 'LIKE', "%{$request->input('search')}%");
            } else {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', "%{$request->input('search')}%");
                }
            }
        }

        return $query->orderBy($request->input('order_by', 'id'), $request->input('sort_order', 'ASC'));
    }
}
