<?php

namespace App\Modules\Relatorios\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Relatorios\Relatorio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;

class RelatoriosController extends Controller
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

        $relatorios = Relatorio::orderBy($order_by, $order_direct)->paginate(15);
        return view('relatorios::index')
                ->with('relatorios',  $relatorios)
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
        return view('relatorios::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nome' => 'required', 'valor' => 'required', ]);

        Relatorio::create($request->all());

        Session::flash('flash_message', 'Relatorio added!');

        return redirect('relatorios');
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
        $relatorio = Relatorio::findOrFail($id);
        return view('relatorios::show')->with('relatorio',$relatorio);
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
        $relatorio = Relatorio::findOrFail($id);
        return view('relatorios::edit')->with('relatorio',$relatorio);;
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
        $this->validate($request, ['nome' => 'required', 'valor' => 'required', ]);

        $relatorio = Relatorio::findOrFail($id);
        $relatorio->update($request->all());

        Session::flash('flash_message', 'Relatorio updated!');

        return redirect('relatorios');
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
        Relatorio::destroy($id);

        Session::flash('flash_message', 'Relatorio deleted!');

        return redirect('relatorios');
    }
}
