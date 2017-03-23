@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('financas::financas.Financas')}}</h3>
      <div class="box-tools">
        <a href="{{ url('/financas/create') }}" class="btn btn-success btn-sm" title="Add New Financa"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($financas))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/financas?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/financas?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>
              <th> {{ trans('financas.nome') }}
              <div class="btn-group pull-right">
                <a href="{{url('/financas?order_by=nome&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/financas?order_by=nome&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('financas.data') }}
              <div class="btn-group pull-right">
                <a href="{{url('/financas?order_by=data&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/financas?order_by=data&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('financas.valor') }}
              <div class="btn-group pull-right">
                <a href="{{url('/financas?order_by=valor&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/financas?order_by=valor&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('financas::financas.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($financas as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'nome') class="active" @endif>{{ $item->nome }}</td><td @if($order_by == 'data') class="active" @endif>{{ $item->data }}</td><td @if($order_by == 'valor') class="active" @endif>{{ $item->valor }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/financas/edit/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('financas::financas.View')}} Financa"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('financas::financas.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/financas/' . $item->id . '/edit') }}" title="Edit Financa"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('financas::financas.Edit')}}</a></li>
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/financas', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Financa" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('financas::financas.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('financas::financas.Delete')}} Financa"></span> {{trans('financas::financas.Delete')}}</a>
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
          <h4>{{trans('financas::financas.Empty')}}</h4>
          <p>{{trans('financas::financas.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $financas->render() !!}
    </div>
  </div>
</section>
@endsection
