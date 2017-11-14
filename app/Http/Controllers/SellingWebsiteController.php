<?php

namespace App\Http\Controllers;

use Models\SellingWebsite;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SellingWebsiteController extends Controller
{
    /**
     * Get all SellingWebsites
     *
     * GET /selling_websites
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return SellingWebsite::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single SellingWebsite
     *
     * GET /selling_websites/{selling_website_id}
     *
     * @param $selling_website_id
     *
     * @return SellingWebsite
     */
    public function show($selling_website_id)
    {
        return SellingWebsite::findOrFail($selling_website_id);
    }

    /**
     * Create Single SellingWebsite
     *
     * POST /selling_websites
     *
     * @param Request $request
     *
     * @return SellingWebsite
     */
    public function store(Request $request)
    {
        $this->validate($request, SellingWebsite::rules());

        return SellingWebsite::create($request->all());
    }

    /**
     * Update Site SellingWebsite
     *
     * PUT /selling_websites/{selling_website_id}
     *
     * @param $selling_website_id SellingWebsite id
     * @param Request $request
     *
     * @return SellingWebsite
     */
    public function update($selling_website_id, Request $request)
    {
        $this->validate($request, SellingWebsite::rules());

        $selling_website = SellingWebsite::findOrFail($selling_website_id);
        $selling_website->update($request->all());

        return $selling_website;
    }

    /**
     * Destroy SellingWebsite
     *
     * DELETE /selling_websites/{selling_website_id}
     *
     * @param $selling_website_id
     *
     * @return SellingWebsite
     */
    public function destroy($selling_website_id)
    {
        $selling_website = SellingWebsite::findOrFail($selling_website_id);
        $selling_website->delete();

        return $selling_website;
    }
}
