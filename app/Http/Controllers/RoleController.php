<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Role;
use App\Permission;
use App\PermissionRole;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
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

        $roles = Role::orderBy($order_by, $order_direct)->paginate(15);
        return view('roles.index')
                    ->with('roles',  $roles)
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

        $permissions = Permission::all();
        return view('roles.create')
                ->with('permissions',$permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'display_name' => 'required', 'description' => 'required', ]);

        $id = Role::create($request->all())->id;

        foreach ($request->input('permissions') as $key => $value) {
            DB::table('permission_role')->insertGetId(
                ['permission_id' => $value, 'role_id' => $id]
            );
        }

        Session::flash('flash_message', 'Role added!');

        return redirect('roles');
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
        $role = Role::findOrFail($id);
        return view('roles.show')->with('role',$role);
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
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('roles.edit')
        ->with('permissions',$permissions)
        ->with('roles',$roles);
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

        $role = Role::findOrFail($id);
        $role->update($request->all());
        PermissionRole::where('role_id', '=', $id)->delete();



        if(count($request->input('permissions')) > 0){
            foreach ($request->input('permissions') as $key => $value) {
                DB::table('permission_role')->insertGetId(
                    ['permission_id' => $value, 'role_id' => $id]
                );
            }
        }

        Session::flash('flash_message', 'Role updated!');

        return redirect('roles');
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
        Role::whereId($id)->delete();

        Session::flash('flash_message', 'Role deleted!');

        return redirect('roles');
    }
}
