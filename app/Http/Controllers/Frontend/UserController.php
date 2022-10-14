<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the Users.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $users = User::paginate(25);

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $roles = Role::all();

        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param UserStoreRequest $request
     * @return RedirectResponse
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->attach($data['roles']);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified User.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user): View|Factory|Application
    {
        $orders = $user->orders;

        return view('admin.users.show', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user): View|Factory|Application
    {
        $roles = Role::all();

        return view('admin.users.edit', [
            'user'  => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified User in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $input = $request->validated();

        $user->fill($input)->save();
        $user->roles()->sync($input['roles']);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        if (auth()->user()->id === $user->id || $user->id === 1) {
            return redirect()->route('admin.users.index')->with('error', 'Відмовлено у доступі');
        }

        if (auth()->user()->id === $user->id) {
            return redirect()->route('admin.users.index')->with('error', 'Вы не можете видалити самі себе.');
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
