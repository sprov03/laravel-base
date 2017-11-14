<?php

namespace App\Http\Controllers;

use Models\FormField;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FormFieldController extends Controller
{
    /**
     * Get all FormFields
     *
     * GET /form_fields
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return FormField::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single FormField
     *
     * GET /form_fields/{form_field_id}
     *
     * @param $form_field_id
     *
     * @return FormField
     */
    public function show($form_field_id)
    {
        return FormField::findOrFail($form_field_id);
    }

    /**
     * Create Single FormField
     *
     * POST /form_fields
     *
     * @param Request $request
     *
     * @return FormField
     */
    public function store(Request $request)
    {
        $this->validate($request, FormField::rules());

        return FormField::create($request->all());
    }

    /**
     * Update Site FormField
     *
     * PUT /form_fields/{form_field_id}
     *
     * @param $form_field_id FormField id
     * @param Request $request
     *
     * @return FormField
     */
    public function update($form_field_id, Request $request)
    {
        $this->validate($request, FormField::rules());

        $form_field = FormField::findOrFail($form_field_id);
        $form_field->update($request->all());

        return $form_field;
    }

    /**
     * Destroy FormField
     *
     * DELETE /form_fields/{form_field_id}
     *
     * @param $form_field_id
     *
     * @return FormField
     */
    public function destroy($form_field_id)
    {
        $form_field = FormField::findOrFail($form_field_id);
        $form_field->delete();

        return $form_field;
    }
}
