<?php

namespace App\Modules\Blog\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Entrust;
use Redirect;
use App\Modules\Blog\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($order_by='id', $order_direct='asc')
    {

        if (!Entrust::can('access-blog')) {
            return view('accessdenied');
        }

        $order_by         = Input::get('order_by')
                          ? Input::get('order_by')
                          : $order_by;

        $order_direct     = Input::get('order_direct')
                          ? Input::get('order_direct')
                          : $order_direct;

        $blog = Blog::orderBy($order_by, $order_direct)->paginate(15);
        return view('blog::index')
                ->with('blog',  $blog)
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
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nome' => 'required', 'data' => 'required', ]);

        Blog::create($request->all());

        Session::flash('flash_message', 'Blog added!');

        return redirect('blog');
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
        $blog = Blog::findOrFail($id);
        return view('blog::show')->with('blog',$blog);
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
        $blog = Blog::findOrFail($id);
        return view('blog::edit')->with('blog',$blog);;
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

        $blog = Blog::findOrFail($id);
        $blog->update($request->all());

        Session::flash('flash_message', 'Blog updated!');

        return redirect('blog');
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
        Blog::destroy($id);

        Session::flash('flash_message', 'Blog deleted!');

        return redirect('blog');
    }
}
