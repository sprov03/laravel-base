<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Models\Todos\Todo;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TodoController extends Controller
{
    /**
     * Get Todo Index Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function indexPage()
    {
        $state = json_encode([
            'todos' => Todo::paginate(50)
        ]);

        return View::make('models.todos.index', compact('state'));
    }

    /**
     * Get Todo Create Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $state = json_encode([
            'todo' => Todo::baseTemplate()
        ]);

        return View::make('models.todos.create', compact('state'));
    }

    /**
     * Get Todo Edit Page
     *
     * @param $todo_id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($todo_id)
    {
        $state = json_encode([
            'todo' => Todo::findOrFail($todo_id)
        ]);

        return View::make('models.todos.edit', compact('state'));
    }

    /**
     * Get all Todos
     *
     * GET /todos
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return Todo::paginate($request->input('page_size', 50));
    }

    /**
     * Get Single [[model_name_studly_case_singular]]
     *
     * GET /todos/{Todo_id}
     *
     * @param $todo_id
     *
     * @return Todo
     */
    public function show($todo_id)
    {
        return Todo::findOrFail($todo_id);
    }

    /**
     * Create Single [[model_name_studly_case_singular]]
     *
     * POST /todos
     *
     * @param Request $request
     *
     * @return Todo
     */
    public function store(Request $request)
    {
        $this->validate($request, Todo::rules());
        $user = User::first();

        return $user->todos()->create($request->all());
    }

    /**
     * Update Site [[model_name_studly_case_singular]]
     *
     * PUT /todos/{Todo_id}
     *
     * @param $todo_id Todo id
     * @param Request $request
     *
     * @return Todo
     */
    public function update($todo_id, Request $request)
    {
        $this->validate($request, Todo::rules());

        $Todo = Todo::findOrFail($todo_id);

        if ($Todo->ifOutDated($request->input('updated_at'))) {
            return response($Todo, 423);
        }

        $Todo->update($request->all());

        return $Todo;
    }

    /**
     * Destroy Todo
     *
     * DELETE /todos/{Todo_id}
     *
     * @param $todo_id
     *
     * @return Todo
     * @throws \Exception
     */
    public function destroy($todo_id)
    {
        $Todo = Todo::findOrFail($todo_id);
        $Todo->delete();

        return $Todo;
    }
}
