<?php

namespace App\Modules\Financas\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Financas\Financa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;

class FinancasController extends Controller
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

        $financas = Financa::orderBy($order_by, $order_direct)->paginate(15);
        return view('financas::index')
                ->with('financas',  $financas)
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
        return view('financas::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nome' => 'required', 'data' => 'required', 'valor' => 'required', ]);

        Financa::create($request->all());

        Session::flash('flash_message', 'Financa added!');

        return redirect('financas');
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
        $financa = Financa::findOrFail($id);
        return view('financas::show')->with('financa',$financa);
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
        $financa = Financa::findOrFail($id);
        return view('financas::edit')->with('financa',$financa);;
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
        $this->validate($request, ['nome' => 'required', 'data' => 'required', 'valor' => 'required', ]);

        $financa = Financa::findOrFail($id);
        $financa->update($request->all());

        Session::flash('flash_message', 'Financa updated!');

        return redirect('financas');
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
        Financa::destroy($id);

        Session::flash('flash_message', 'Financa deleted!');

        return redirect('financas');
    }
}
