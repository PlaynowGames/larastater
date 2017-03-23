<?php

namespace App\Modules\Lancamentos\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Lancamentos\Lancamento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;

class LancamentosController extends Controller
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

        $lancamentos = Lancamento::orderBy($order_by, $order_direct)->paginate(15);
        return view('lancamentos::index')
                ->with('lancamentos',  $lancamentos)
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
        return view('lancamentos::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nome' => 'required', 'data' => 'required', 'valor' => 'required', ]);

        Lancamento::create($request->all());

        Session::flash('flash_message', 'Lancamento added!');

        return redirect('lancamentos');
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
        $lancamento = Lancamento::findOrFail($id);
        return view('lancamentos::show')->with('lancamento',$lancamento);
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
        $lancamento = Lancamento::findOrFail($id);
        return view('lancamentos::edit')->with('lancamento',$lancamento);;
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

        $lancamento = Lancamento::findOrFail($id);
        $lancamento->update($request->all());

        Session::flash('flash_message', 'Lancamento updated!');

        return redirect('lancamentos');
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
        Lancamento::destroy($id);

        Session::flash('flash_message', 'Lancamento deleted!');

        return redirect('lancamentos');
    }
}
