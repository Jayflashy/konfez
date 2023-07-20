<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staff;
use App\Models\Role;
use App\Models\User;
use Hash;
use Session;

class StaffController extends Controller
{
    //
    public function index()
    {
        $staffs = Staff::all();
        return view('back.staff.index', compact('staffs'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('back.staff.create', compact('roles'));
    }

    public function store(Request $request)
    {   
        if(User::where('email', $request->email)->first() == null){
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->phone = $request->mobile;
            $user->user_role = "staff";
            $user->password = Hash::make($request->password);
            if($user->save()){
                $staff = new Staff;
                $staff->user_id = $user->id;
                $staff->role_id = $request->role_id;
                if($staff->save()){
                    return redirect()->route('staffs.index')->withSuccess(__('Staff has been inserted successfully'));
                }
            }
        }

        return back()->withError( __('Email already used'));

    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        $roles = Role::all();
        return view('back.staff.edit', compact('staff', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $user = $staff->user;
        $user->name = $request->name;
        // $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->mobile;
        if(strlen($request->password) > 0){
            $user->password = Hash::make($request->password);
        }
        if($user->save()){
            $staff->role_id = $request->role_id;
            if($staff->save()){
                return redirect()->route('staffs.index')->withSuccess(__('Staff has been updated successfully'));
            }
        }

        
        return back()->withError(__('Something went wrong'));
                
    }

    public function destroy($id)
    {
        $user = User::find(Staff::findOrFail($id)->user->id);
        $user->user_role = "user";
        $user->save();
        if(Staff::destroy($id)){
            return redirect()->route('staffs')->withSuccess( __('Staff has been deleted successfully'));
        }

        return back()->withError(__('Something went wrong'));
    }
}
