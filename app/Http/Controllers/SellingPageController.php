<?php

namespace App\Http\Controllers;

use Models\SellingPage;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SellingPageController extends Controller
{
    /**
     * Get all SellingPages
     *
     * GET /selling_pages
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return SellingPage::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single SellingPage
     *
     * GET /selling_pages/{selling_page_id}
     *
     * @param $selling_page_id
     *
     * @return SellingPage
     */
    public function show($selling_page_id)
    {
        return SellingPage::findOrFail($selling_page_id);
    }

    /**
     * Create Single SellingPage
     *
     * POST /selling_pages
     *
     * @param Request $request
     *
     * @return SellingPage
     */
    public function store(Request $request)
    {
        $this->validate($request, SellingPage::rules());

        return SellingPage::create($request->all());
    }

    /**
     * Update Site SellingPage
     *
     * PUT /selling_pages/{selling_page_id}
     *
     * @param $selling_page_id SellingPage id
     * @param Request $request
     *
     * @return SellingPage
     */
    public function update($selling_page_id, Request $request)
    {
        $this->validate($request, SellingPage::rules());

        $selling_page = SellingPage::findOrFail($selling_page_id);
        $selling_page->update($request->all());

        return $selling_page;
    }

    /**
     * Destroy SellingPage
     *
     * DELETE /selling_pages/{selling_page_id}
     *
     * @param $selling_page_id
     *
     * @return SellingPage
     */
    public function destroy($selling_page_id)
    {
        $selling_page = SellingPage::findOrFail($selling_page_id);
        $selling_page->delete();

        return $selling_page;
    }
}
