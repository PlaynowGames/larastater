@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('blog::blog.Blog')}}</h3>
      <div class="box-tools">
        <a href="{{ url('/blog/create') }}" class="btn btn-success btn-sm" title="Add New Blog"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($blog))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/blog?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/blog?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>
              <th> {{ trans('blog.nome') }}
              <div class="btn-group pull-right">
                <a href="{{url('/blog?order_by=nome&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/blog?order_by=nome&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('blog.data') }}
              <div class="btn-group pull-right">
                <a href="{{url('/blog?order_by=data&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/blog?order_by=data&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('blog::blog.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($blog as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'nome') class="active" @endif>{{ $item->nome }}</td><td @if($order_by == 'data') class="active" @endif>{{ $item->data }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/blog/edit/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('blog::blog.View')}} Blog"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('blog::blog.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/blog/' . $item->id . '/edit') }}" title="Edit Blog"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('blog::blog.Edit')}}</a></li>
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/blog', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Blog" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('blog::blog.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('blog::blog.Delete')}} Blog"></span> {{trans('blog::blog.Delete')}}</a>
                      </li>
                    </ul>
                  </div>

                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    @else
      <div class="box-body">
        <div class="callout bg-gray">
          <h4>{{trans('blog::blog.Empty')}}</h4>
          <p>{{trans('blog::blog.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $blog->render() !!}
    </div>
  </div>
</section>
@endsection
