<?php

namespace App\Http\Controllers;

use Models\Form;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FormController extends Controller
{
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
     * Get Single Form
     *
     * GET /forms/{form_id}
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
     * Create Single Form
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
     * Update Site Form
     *
     * PUT /forms/{form_id}
     *
     * @param $form_id Form id
     * @param Request $request
     *
     * @return Form
     */
    public function update($form_id, Request $request)
    {
        $this->validate($request, Form::rules());

        $form = Form::findOrFail($form_id);
        $form->update($request->all());

        return $form;
    }

    /**
     * Destroy Form
     *
     * DELETE /forms/{form_id}
     *
     * @param $form_id
     *
     * @return Form
     */
    public function destroy($form_id)
    {
        $form = Form::findOrFail($form_id);
        $form->delete();

        return $form;
    }
}
