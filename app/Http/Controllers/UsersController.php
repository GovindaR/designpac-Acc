<?php

namespace App\Http\Controllers;

use App\Log;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class UsersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.view-user', compact('users'));
    }

    /***/

    public function create()
    {
        $data = array(
            'availRoles' => Role::select('id', 'name')->orderBy('name')->lists('name', 'id'),
        );
        return view('users.create-user', $data);

    }

    public function store(Requests\UserRequest $request)
    {

        $user = User::create($request->all());
        $user->password = bcrypt($request->get('password'));
        $user->save();

        //$user->createLog();
        // get roles
        $roles = is_array($request->get('roles')) ? $request->get('roles') : [];

        // asign roles
        $user->roles()->sync($roles);
        return redirect(route('users.index'))->with('message', 'User Created Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $user = User::with('roles')->findOrFail($id);
       // dd($user);
        $data = array(
            'user' => $user,
            "id" => $user->id,
            "name" => $user->name,
            "last_name" => $user->last_name,
            "availRoles" => Role::select('id', 'name')->orderBy('name')->lists('name', 'id'),
            "assignedRoles" => (count($user->roles) > 0) ? $user->roles->lists('id') : 0
        );
        if (is_object($data['availRoles'])) $data['availRoles'] = $data['availRoles']->all();
        if (is_object($data['assignedRoles'])) $data['assignedRoles'] = $data['assignedRoles']->all();
//        dd($data);
        return view('users.edit-user', $data);
    }
    /***/

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param UserRequest $request
     * @return Response
     */
    public function update($id, Requests\UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
//        $user->password = bcrypt($request->get('password'));
//        $user->save();

        //$user->updateLog();

        // find user
        $user = User::with('roles')->findOrFail($id);
        // get roles
        $roles = is_array($request->get('roles')) ? $request->get('roles') : [];
        // asign roles
        $user->roles()->sync($roles);

        return redirect(route('users.index'))->with('message', 'User Updated Successfully !');

    }

    public function destroy($id, Request $request)
    {
        //Check whether deleting oneself
        if ($id == \Auth::id()) {
            return redirect()->back()->withErrors('You cannot delete yourself.');
        }

        $user = User::findOrFail($id);
        if ($user->delete()):
            $roles = is_array($request->get('roles')) ? $request->get('roles') : [];
            $user->roles()->sync($roles);
            //$user->deleteLog();
        endif;

        return redirect(route('users.index'))->with('message', 'User Deleted Successfully !');
    }
}
