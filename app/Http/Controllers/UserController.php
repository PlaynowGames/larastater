<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Role;
use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
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

        $users = User::orderBy($order_by, $order_direct)->paginate(15);
        return view('user.index')
                    ->with('users',  $users)
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
        return view('user.create')->with('roles',  $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);
        if($request->password){
            $request->merge(['password' => bcrypt($request->password)]);
        }

        User::create($request->all());

        Session::flash('flash_message', 'User added!');

        return redirect('users');
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
        $roles = Role::pluck('display_name','id');
        return view('user.show')->with('roles',$roles);
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
        $users = User::findOrFail($id);
        $roles = Role::pluck('display_name','id');

        $rol_user = DB::table('role_user')->where('user_id', '=', $id)->get();

        return view('user.edit')
            ->with('rol_user',$rol_user[0])
            ->with('roles',$roles)
            ->with('users',$users);
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
        $this->validate($request, ['name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
        if (empty($request->get('password'))) {
            $data = $request->except('password');
        } else {
            $data = $request->all();
        }

        DB::table('role_user')->where('user_id', '=', $id)->delete();
        DB::table('role_user')->insertGetId(
            ['user_id' => $id, 'role_id' => $request->get('role')]
        );
        $user = User::findOrFail($id);
        $user->update($data);

        Session::flash('flash_message', 'User updated!');

        return redirect('users');
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
        User::whereId($id)->delete();

        Session::flash('flash_message', 'User deleted!');

        return redirect('users');
    }
}
