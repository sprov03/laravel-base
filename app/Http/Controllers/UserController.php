<?php

namespace App\Http\Controllers;

use Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    /**
     * Get all Users
     *
     * GET /users
     *
     * @param Request $request
     *
     * @return LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $columns = [];

        return User::search($request, $columns)
            ->paginate($request->input('page_size', 50));
    }

    /**
     * Get Single User
     *
     * GET /users/{user_id}
     *
     * @param $user_id
     *
     * @return User
     */
    public function show($user_id)
    {
        return User::findOrFail($user_id);
    }

    /**
     * Create Single User
     *
     * POST /users
     *
     * @param Request $request
     *
     * @return User
     */
    public function store(Request $request)
    {
        $this->validate($request, User::rules());

        return User::create($request->all());
    }

    /**
     * Update Site User
     *
     * PUT /users/{user_id}
     *
     * @param $user_id User id
     * @param Request $request
     *
     * @return User
     */
    public function update($user_id, Request $request)
    {
        $this->validate($request, User::rules());

        $user = User::findOrFail($user_id);
        $user->update($request->all());

        return $user;
    }

    /**
     * Destroy User
     *
     * DELETE /users/{user_id}
     *
     * @param $user_id
     *
     * @return User
     */
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        return $user;
    }
}
