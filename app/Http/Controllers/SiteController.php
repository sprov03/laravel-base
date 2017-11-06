<?php

namespace App\Http\Controllers;

use Models\Site;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SiteController extends Controller
{
    /**
     * Get all Sites
     *
     * GET /sites
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return Site::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single Site
     *
     * GET /sites/{site_id}
     *
     * @param $site_id
     *
     * @return Site
     */
    public function show($site_id)
    {
        return Site::findOrFail($site_id);
    }

    /**
     * Create Single Site
     *
     * POST /sites
     *
     * @param Request $request
     *
     * @return Site
     */
    public function store(Request $request)
    {
        $this->validate($request, Site::rules());

        return Site::create($request->all());
    }

    /**
     * Update Site Site
     *
     * PUT /sites/{site_id}
     *
     * @param $site_id Site id
     * @param Request $request
     *
     * @return Site
     */
    public function update($site_id, Request $request)
    {
        $this->validate($request, Site::rules());

        $site = Site::findOrFail($site_id);
        $site->update($request->all());

        return $site;
    }

    /**
     * Destroy Site
     *
     * DELETE /sites/{site_id}
     *
     * @param $site_id
     *
     * @return Site
     */
    public function destroy($site_id)
    {
        $site = Site::findOrFail($site_id);
        $site->delete();

        return $site;
    }
}
