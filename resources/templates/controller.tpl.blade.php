
namespace {{$controller->appNamespace}}\Http\Controllers;

use Illuminate\Http\Request;

use {{$controller->appNamespace}}\{{$model->className}};

class {{$model->className}}Controller extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('{{$controller->path}}.index', []);
    }

    public function create(Request $request)
    {
        return view('{{$controller->path}}.add', [
            []
        ]);
    }

    public function edit(Request $request, $id)
    {
        ${{snake_case($model->className)}} = {{$model->className}}::findOrFail($id);

	    return view('{{$controller->path}}.add', [
            'model' => ${{snake_case($model->className)}}
        ]);
	}

    public function show(Request $request, $id)
    {
        ${{snake_case($model->className)}} = {{$model->className}}::findOrFail($id);

	    return view('{{$controller->path}}.show', [
            'model' => ${{snake_case($model->className)}}
        ]);
	}

    public function grid(Request $request)
    {
        return {{$model->className}}::search($request)->paginate($request->input('page_size', 50));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, {{$model->className}}::rules());

        ${{snake_case($model->className)}} = {{$model->className}}::findOrFail($id);
        ${{snake_case($model->className)}}->update($request->all());

        return ${{snake_case($model->className)}};
    }

    public function store(Request $request)
    {
        $this->validate($request, {{$model->className}}::rules());

        return {{$model->className}}::create($request->all());
    }

    public function destroy($id)
    {
        ${{snake_case($model->className)}} = {{$model->className}}::findOrFail($id);
        ${{snake_case($model->className)}}->delete();

        return ${{snake_case($model->className)}};
	}
}