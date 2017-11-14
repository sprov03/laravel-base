<?php

namespace App\Http\Controllers;

use Models\BuyingPage;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BuyingPageController extends Controller
{
    /**
     * Get all BuyingPages
     *
     * GET /buying_pages
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return BuyingPage::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single BuyingPage
     *
     * GET /buying_pages/{buying_page_id}
     *
     * @param $buying_page_id
     *
     * @return BuyingPage
     */
    public function show($buying_page_id)
    {
        return BuyingPage::findOrFail($buying_page_id);
    }

    /**
     * Create Single BuyingPage
     *
     * POST /buying_pages
     *
     * @param Request $request
     *
     * @return BuyingPage
     */
    public function store(Request $request)
    {
        $this->validate($request, BuyingPage::rules());

        return BuyingPage::create($request->all());
    }

    /**
     * Update Site BuyingPage
     *
     * PUT /buying_pages/{buying_page_id}
     *
     * @param $buying_page_id BuyingPage id
     * @param Request $request
     *
     * @return BuyingPage
     */
    public function update($buying_page_id, Request $request)
    {
        $this->validate($request, BuyingPage::rules());

        $buying_page = BuyingPage::findOrFail($buying_page_id);
        $buying_page->update($request->all());

        return $buying_page;
    }

    /**
     * Destroy BuyingPage
     *
     * DELETE /buying_pages/{buying_page_id}
     *
     * @param $buying_page_id
     *
     * @return BuyingPage
     */
    public function destroy($buying_page_id)
    {
        $buying_page = BuyingPage::findOrFail($buying_page_id);
        $buying_page->delete();

        return $buying_page;
    }
}
