<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Permission;
use App\PermissionRole;
use App\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($order_by='id', $order_direct='asc')
    {
        $order_by         = Input::get('order_by')
                          ? Input::get('order_by')
                          : $order_by;

        $order_direct     = Input::get('order_direct')
                          ? Input::get('order_direct')
                          : $order_direct;



        $permissions = Permission::orderBy("permissions.".$order_by, $order_direct)
        ->paginate(15);
        return view('Permissions.index')
                    ->with('permissions',  $permissions)
                    ->with('order_by',      $order_by)
                    ->with('order_direct',  $order_direct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('permissions.create')
                ->with('roles',  $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['role' => 'required', 'name' => 'required', 'display_name' => 'required', 'description' => 'required', ]);

        Permission::create($request->all());


        Session::flash('flash_message', 'Permission added!');

        return redirect('permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.show')->with('permission',$permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {


        //$selectedRole = PermissionRole::findOrFail($id);
        //$permissions = Permission::findOrFail($id);
        //$roles = Role::pluck('display_name','id');
        return view('permissions.edit')
                    ->with('permissions',$permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required', 'display_name' => 'required', 'description' => 'required', ]);

        $permissions = Permission::findOrFail($id);
        $permissions->update($request->all());

        Session::flash('flash_message', 'Permission updated!');

        return redirect('permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Permission::whereId($id)->delete();

        Session::flash('flash_message', 'Permission deleted!');

        return redirect('permissions');
    }
}
