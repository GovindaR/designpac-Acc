<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.view-role', compact("roles"));
    }
    /***/

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create-role');
    }
    /***/

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return Response
     */
    public function store(Requests\RoleRequest $request)
    {

        if (!$request->has('name')) {
            return redirect()->back()->withInput()->withErrors('dfsd');
        }

        $role = new Role;
        $role->name = $request->get('name');
        $role->slug = $request->get('slug');
        $role->description = $request->get('description');
        $role->save();

        $role->createLog();
        return redirect(route('roles.index'))->with('message', 'Role Created Successfully !');

    }
    /***/


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //find permissions that has this role_id($id)
//            $role = Role::with(array('permissions'=>function($query){
//                                                        $query->select('id');
//                                                    }))->findOrFail($id);
        $role = Role::find($id);
        $data = array(
            "id" => $role->id,
            "name" => $role->name,
            "slug" => $role->slug,
            "description" => $role->description,
        );

        return view('roles.edit-role', $data);
    }
    /***/

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param RoleRequest $request
     * @return Response
     */
    public function update($id, Requests\RoleRequest $request)
    {

        $role = Role::findOrFail($id);

        if ($role->update($request->all())):

            $role->updateLog();
            return redirect(route('roles.index'))->with('message', 'Role Updated Successfully !');


        endif;

        return redirect()->back()->withInput();
    }
    /***/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        $role = Role::findOrFail($id);

        $role->delete();
        $role->deleteLog();

        return redirect(route('roles.index'))->with('message', 'Role Deleted Successfully !');
    }
    /***/
}
