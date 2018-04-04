<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Models\General\Form;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FormController extends Controller
{
    /**
     * Get Form Index Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function indexPage()
    {
        $state = json_encode([
            'forms' => Form::paginate(50)
        ]);

        return View::make('models.forms.index', compact('state'));
    }

    /**
     * Get Form Create Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $state = json_encode([
            'form' => Form::baseTemplate()
        ]);

        return View::make('models.forms.create', compact('state'));
    }

    /**
     * Get Form Edit Page
     *
     * @param $form_id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($form_id)
    {
        $state = json_encode([
            'form' => Form::findOrFail($form_id)
        ]);

        return View::make('models.forms.edit', compact('state'));
    }

    /**
     * Get all Forms
     *
     * GET /forms
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return Form::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single [[model_name_studly_case_singular]]
     *
     * GET /forms/{Form_id}
     *
     * @param $form_id
     *
     * @return Form
     */
    public function show($form_id)
    {
        return Form::findOrFail($form_id);
    }

    /**
     * Create Single [[model_name_studly_case_singular]]
     *
     * POST /forms
     *
     * @param Request $request
     *
     * @return Form
     */
    public function store(Request $request)
    {
        $this->validate($request, Form::rules());

        return Form::create($request->all());
    }

    /**
     * Update Site [[model_name_studly_case_singular]]
     *
     * PUT /forms/{Form_id}
     *
     * @param $form_id Form id
     * @param Request $request
     *
     * @return Form
     */
    public function update($form_id, Request $request)
    {
        $this->validate($request, Form::rules());

        $Form = Form::findOrFail($form_id);
        $Form->update($request->all());

        return $Form;
    }

    /**
     * Destroy Form
     *
     * DELETE /forms/{Form_id}
     *
     * @param $form_id
     *
     * @return Form
     */
    public function destroy($form_id)
    {
        $Form = Form::findOrFail($form_id);
        $Form->delete();

        return $Form;
    }
}
