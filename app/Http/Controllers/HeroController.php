<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class HeroController extends Controller
{
    /**
     * Get Hero Index Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function indexPage()
    {
        $state = json_encode([
            'heroes' => Hero::paginate(50)
        ]);

        return View::make('models.heroes.index', compact('state'));
    }

    /**
     * Get Hero Create Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $state = json_encode([
            'hero' => Hero::baseTemplate()
        ]);

        return View::make('models.heroes.create', compact('state'));
    }

    /**
     * Get Hero Edit Page
     *
     * @param $hero_id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($hero_id)
    {
        $state = json_encode([
            'hero' => Hero::findOrFail($hero_id)
        ]);

        return View::make('models.heroes.edit', compact('state'));
    }

    /**
     * Get all Heroes
     *
     * GET /heroes
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return Hero::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single [[model_name_studly_case_singular]]
     *
     * GET /heroes/{Hero_id}
     *
     * @param $hero_id
     *
     * @return Hero
     */
    public function show($hero_id)
    {
        return Hero::findOrFail($hero_id);
    }

    /**
     * Create Single [[model_name_studly_case_singular]]
     *
     * POST /heroes
     *
     * @param Request $request
     *
     * @return Hero
     */
    public function store(Request $request)
    {
        $this->validate($request, Hero::rules());

        return Hero::create($request->all());
    }

    /**
     * Update Site [[model_name_studly_case_singular]]
     *
     * PUT /heroes/{Hero_id}
     *
     * @param $hero_id Hero id
     * @param Request $request
     *
     * @return Hero
     */
    public function update($hero_id, Request $request)
    {
        $this->validate($request, Hero::rules());

        $Hero = Hero::findOrFail($hero_id);

        if ($Hero->ifOutDated($request->input('updated_at'))) {
            return response($Hero, 423);
        }

        $Hero->update($request->all());

        return $Hero;
    }

    /**
     * Destroy Hero
     *
     * DELETE /heroes/{Hero_id}
     *
     * @param $hero_id
     *
     * @return Hero
     */
    public function destroy($hero_id)
    {
        $Hero = Hero::findOrFail($hero_id);
        $Hero->delete();

        return $Hero;
    }
}
