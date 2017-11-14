<?php

namespace App\Http\Controllers;

use Models\FormSite;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FormSiteController extends Controller
{
    /**
     * Get all FormSites
     *
     * GET /form_sites
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return FormSite::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single FormSite
     *
     * GET /form_sites/{form_site_id}
     *
     * @param $form_site_id
     *
     * @return FormSite
     */
    public function show($form_site_id)
    {
        return FormSite::findOrFail($form_site_id);
    }

    /**
     * Create Single FormSite
     *
     * POST /form_sites
     *
     * @param Request $request
     *
     * @return FormSite
     */
    public function store(Request $request)
    {
        $this->validate($request, FormSite::rules());

        return FormSite::create($request->all());
    }

    /**
     * Update Site FormSite
     *
     * PUT /form_sites/{form_site_id}
     *
     * @param $form_site_id FormSite id
     * @param Request $request
     *
     * @return FormSite
     */
    public function update($form_site_id, Request $request)
    {
        $this->validate($request, FormSite::rules());

        $form_site = FormSite::findOrFail($form_site_id);
        $form_site->update($request->all());

        return $form_site;
    }

    /**
     * Destroy FormSite
     *
     * DELETE /form_sites/{form_site_id}
     *
     * @param $form_site_id
     *
     * @return FormSite
     */
    public function destroy($form_site_id)
    {
        $form_site = FormSite::findOrFail($form_site_id);
        $form_site->delete();

        return $form_site;
    }
}
