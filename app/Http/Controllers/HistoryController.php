<?php

namespace App\Http\Controllers;

use Models\History;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class HistoryController extends Controller
{
    /**
     * Get all Histories
     *
     * GET /histories
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return History::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single History
     *
     * GET /histories/{history_id}
     *
     * @param $history_id
     *
     * @return History
     */
    public function show($history_id)
    {
        return History::findOrFail($history_id);
    }

    /**
     * Create Single History
     *
     * POST /histories
     *
     * @param Request $request
     *
     * @return History
     */
    public function store(Request $request)
    {
        $this->validate($request, History::rules());

        return History::create($request->all());
    }

    /**
     * Update Site History
     *
     * PUT /histories/{history_id}
     *
     * @param $history_id History id
     * @param Request $request
     *
     * @return History
     */
    public function update($history_id, Request $request)
    {
        $this->validate($request, History::rules());

        $history = History::findOrFail($history_id);
        $history->update($request->all());

        return $history;
    }

    /**
     * Destroy History
     *
     * DELETE /histories/{history_id}
     *
     * @param $history_id
     *
     * @return History
     */
    public function destroy($history_id)
    {
        $history = History::findOrFail($history_id);
        $history->delete();

        return $history;
    }
}
