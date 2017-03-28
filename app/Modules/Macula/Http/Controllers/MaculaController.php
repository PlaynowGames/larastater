<?php

namespace App\Modules\Macula\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Entrust;
use Redirect;
use App\Modules\Macula\Macula;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;

class MaculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($order_by='id', $order_direct='asc')
    {

            if (!Entrust::can('access-macula')) {
                return view('accessdenied');
            }


        $order_by         = Input::get('order_by')
                          ? Input::get('order_by')
                          : $order_by;

        $order_direct     = Input::get('order_direct')
                          ? Input::get('order_direct')
                          : $order_direct;

        $macula = Macula::orderBy($order_by, $order_direct)->paginate(15);
        return view('macula::index')
                ->with('macula',  $macula)
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
        if (!Entrust::can('create-macula')) {
            return view('accessdenied');
        }
        return view('macula::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nome' => 'required', 'data' => 'required', ]);

        Macula::create($request->all());

        Session::flash('flash_message', 'Macula added!');

        return redirect('macula');
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
        if (!Entrust::can('show-macula')) {
            return view('accessdenied');
        }
        $macula = Macula::findOrFail($id);
        return view('macula::show')->with('macula',$macula);
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
        if (!Entrust::can('edit-macula')) {
            return view('accessdenied');
        }
        $macula = Macula::findOrFail($id);
        return view('macula::edit')->with('macula',$macula);;
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
        $this->validate($request, ['nome' => 'required', 'data' => 'required', ]);

        $macula = Macula::findOrFail($id);
        $macula->update($request->all());

        Session::flash('flash_message', 'Macula updated!');

        return redirect('macula');
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
        Macula::destroy($id);

        Session::flash('flash_message', 'Macula deleted!');

        return redirect('macula');
    }
}
