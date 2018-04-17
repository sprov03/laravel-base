<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Models\Users\Cows\Cow;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CowController extends Controller
{
    /**
     * Get all Cows
     *
     * GET /cows
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return View::make('models.cows.index', ['cows' => Cow::all()]);
    }

    /**
     * Get Cow Create Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('models.cows.create');
    }

    /**
     * Get Cow Edit Page
     *
     * @param $cow_id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($cow_id)
    {
        return View::make('models.cows.edit', ['cow' => Cow::findOrFail($cow_id)]);
    }

    /**
     * Create Single [[model_name_studly_case_singular]]
     *
     * POST /cows
     *
     * @param Request $request
     *
     * @return Cow
     */
    public function store(Request $request)
    {
        $this->validate($request, Cow::rules());
        $cow = Cow::create($request->all());

        return View::make('models.cows.edit', ['cow' => $cow]);
    }

    /**
     * Update Site [[model_name_studly_case_singular]]
     *
     * PUT /cows/{Cow_id}/update
     *
     * @param $cow_id Cow id
     * @param Request $request
     *
     * @return Cow
     */
    public function update($cow_id, Request $request)
    {
        $this->validate($request, Cow::rules());

        $cow = Cow::findOrFail($cow_id);
        $cow->update($request->all());

        return View::make('models.cows.edit', ['cow' => $cow]);
    }


    /**
     * Delete Cow
     * Not best practice but simple delete with link instead of a form
     *
     * Get /cows/{Cow_id}/delete
     *
     * @param $cow_id
     *
     * @return View
     */
    public function destroy($cow_id)
    {
        $Cow = Cow::findOrFail($cow_id);
        $Cow->delete();

        return View::make('models.cows.index', ['cows' => Cow::all()]);
    }
}
