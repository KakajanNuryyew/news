<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()
            ->orderBy('id', 'desc')
            ->paginate(4);
        return view('pages.admin.users.index', compact ('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
        ]);   

        $user->assignRole($request->role);

        return back()->with('success', 'Üstünlikli ýatda saklanyldy!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = $user->getRoleNames();
        return view('pages.admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->syncRoles([]);
        $user->syncPermissions([]);

        $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'role' => 'required',
        ]);

        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->assignRole($request->role);

        $user->save();

        return back()->with('success', 'Üstünlikli ýatda saklanyldy!'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->syncRoles([]);
        $user->syncPermissions([]);

        $user->delete();

        return back()->with('success', 'Maglumat üstünlikli pozuldy!');

    }

    function getByPage(Request $request)
    {
        if($request->ajax())
        {
            $users = User::query()
                ->orderBy('id', 'desc')
                ->paginate(4);

            return view('includes.admin.user-items', compact('users'))->render();
        }
    }
}
