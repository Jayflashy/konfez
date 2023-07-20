<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;
use Session;
class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('back.staff.roles.index', compact('roles'));
    }
    public function create()
    {
        return view('back.staff.roles.create');
    }

    public function store(Request $request)
    {
        if($request->has('permissions')){
            $role = new Role;
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();

            return redirect()->route('roles.index')->withSuccess(__('Role has been inserted successfully'));
        }
        
        return back()->withError(__('Something went wrong'));

    }

    public function edit(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        return view('back.staff.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        if($request->has('permissions')){
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();


            $request->session()->flash('success', __('Role has been updated successfully'));
            return redirect()->route('roles.index');
        }
        
        $request->session()->flash('error', __('Something went wrong'));
        return back();
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        Role::destroy($id);

        Session::flash('success', __('Role has been deleted successfully'));
        return redirect()->route('roles.index');
    }
}
