<?php

namespace App\Http\Controllers;

use Models\BuyingWebsite;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BuyingWebsiteController extends Controller
{
    /**
     * Get all BuyingWebsites
     *
     * GET /buying_websites
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return BuyingWebsite::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single BuyingWebsite
     *
     * GET /buying_websites/{buying_website_id}
     *
     * @param $buying_website_id
     *
     * @return BuyingWebsite
     */
    public function show($buying_website_id)
    {
        return BuyingWebsite::findOrFail($buying_website_id);
    }

    /**
     * Create Single BuyingWebsite
     *
     * POST /buying_websites
     *
     * @param Request $request
     *
     * @return BuyingWebsite
     */
    public function store(Request $request)
    {
        $this->validate($request, BuyingWebsite::rules());

        return BuyingWebsite::create($request->all());
    }

    /**
     * Update Site BuyingWebsite
     *
     * PUT /buying_websites/{buying_website_id}
     *
     * @param $buying_website_id BuyingWebsite id
     * @param Request $request
     *
     * @return BuyingWebsite
     */
    public function update($buying_website_id, Request $request)
    {
        $this->validate($request, BuyingWebsite::rules());

        $buying_website = BuyingWebsite::findOrFail($buying_website_id);
        $buying_website->update($request->all());

        return $buying_website;
    }

    /**
     * Destroy BuyingWebsite
     *
     * DELETE /buying_websites/{buying_website_id}
     *
     * @param $buying_website_id
     *
     * @return BuyingWebsite
     */
    public function destroy($buying_website_id)
    {
        $buying_website = BuyingWebsite::findOrFail($buying_website_id);
        $buying_website->delete();

        return $buying_website;
    }
}
