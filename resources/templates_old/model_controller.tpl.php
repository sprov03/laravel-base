[[open_php_tag]]

namespace App\Http\Controllers;

use [[namespace]]\[[model]];
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class [[model]]Controller extends Controller
{
    /**
     * Get all [[model_name_studly_case_plural]]
     *
     * GET /[[model_name_snake_case_plural]]
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return [[model]]::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single [[model_name_studly_case_singular]]
     *
     * GET /[[model_name_snake_case_plural]]/{[[model_name_snake_case_singular]]_id}
     *
     * @param $[[model_name_snake_case_singular]]_id
     *
     * @return [[model]]
     */
    public function show($[[model_name_snake_case_singular]]_id)
    {
        return [[model]]::findOrFail($[[model_name_snake_case_singular]]_id);
    }

    /**
     * Create Single [[model_name_studly_case_singular]]
     *
     * POST /[[model_name_snake_case_plural]]
     *
     * @param Request $request
     *
     * @return [[model]]
     */
    public function store(Request $request)
    {
        $this->validate($request, [[model]]::rules());

        return [[model]]::create($request->all());
    }

    /**
     * Update Site [[model_name_studly_case_singular]]
     *
     * PUT /[[model_name_snake_case_plural]]/{[[model_name_snake_case_singular]]_id}
     *
     * @param $[[model_name_snake_case_singular]]_id [[model]] id
     * @param Request $request
     *
     * @return [[model]]
     */
    public function update($[[model_name_snake_case_singular]]_id, Request $request)
    {
        $this->validate($request, [[model]]::rules());

        $[[model_name_snake_case_singular]] = [[model]]::findOrFail($[[model_name_snake_case_singular]]_id);
        $[[model_name_snake_case_singular]]->update($request->all());

        return $[[model_name_snake_case_singular]];
    }

    /**
     * Destroy [[model_name_studly_case_singular]]
     *
     * DELETE /[[model_name_snake_case_plural]]/{[[model_name_snake_case_singular]]_id}
     *
     * @param $[[model_name_snake_case_singular]]_id
     *
     * @return [[model]]
     */
    public function destroy($[[model_name_snake_case_singular]]_id)
    {
        $[[model_name_snake_case_singular]] = [[model]]::findOrFail($[[model_name_snake_case_singular]]_id);
        $[[model_name_snake_case_singular]]->delete();

        return $[[model_name_snake_case_singular]];
    }
}
