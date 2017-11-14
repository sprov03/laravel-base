<?php

namespace App\Http\Controllers;

use Models\FormFieldType;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FormFieldTypeController extends Controller
{
    /**
     * Get all FormFieldTypes
     *
     * GET /form_field_types
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return FormFieldType::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single FormFieldType
     *
     * GET /form_field_types/{form_field_type_id}
     *
     * @param $form_field_type_id
     *
     * @return FormFieldType
     */
    public function show($form_field_type_id)
    {
        return FormFieldType::findOrFail($form_field_type_id);
    }

    /**
     * Create Single FormFieldType
     *
     * POST /form_field_types
     *
     * @param Request $request
     *
     * @return FormFieldType
     */
    public function store(Request $request)
    {
        $this->validate($request, FormFieldType::rules());

        return FormFieldType::create($request->all());
    }

    /**
     * Update Site FormFieldType
     *
     * PUT /form_field_types/{form_field_type_id}
     *
     * @param $form_field_type_id FormFieldType id
     * @param Request $request
     *
     * @return FormFieldType
     */
    public function update($form_field_type_id, Request $request)
    {
        $this->validate($request, FormFieldType::rules());

        $form_field_type = FormFieldType::findOrFail($form_field_type_id);
        $form_field_type->update($request->all());

        return $form_field_type;
    }

    /**
     * Destroy FormFieldType
     *
     * DELETE /form_field_types/{form_field_type_id}
     *
     * @param $form_field_type_id
     *
     * @return FormFieldType
     */
    public function destroy($form_field_type_id)
    {
        $form_field_type = FormFieldType::findOrFail($form_field_type_id);
        $form_field_type->delete();

        return $form_field_type;
    }
}
