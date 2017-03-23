@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('lancamentos::lancamentos.Lancamentos')}}</h3>
      <div class="box-tools">
        <a href="{{ url('/lancamentos/create') }}" class="btn btn-success btn-sm" title="Add New Lancamento"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($lancamentos))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/lancamentos?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/lancamentos?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>
              <th> {{ trans('lancamentos.nome') }}
              <div class="btn-group pull-right">
                <a href="{{url('/lancamentos?order_by=nome&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/lancamentos?order_by=nome&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('lancamentos.data') }}
              <div class="btn-group pull-right">
                <a href="{{url('/lancamentos?order_by=data&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/lancamentos?order_by=data&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('lancamentos.valor') }}
              <div class="btn-group pull-right">
                <a href="{{url('/lancamentos?order_by=valor&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/lancamentos?order_by=valor&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('lancamentos::lancamentos.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($lancamentos as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'nome') class="active" @endif>{{ $item->nome }}</td><td @if($order_by == 'data') class="active" @endif>{{ $item->data }}</td><td @if($order_by == 'valor') class="active" @endif>{{ $item->valor }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/lancamentos/show/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('lancamentos::lancamentos.View')}} Lancamento"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('lancamentos::lancamentos.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/lancamentos/edit/' . $item->id . '') }}" title="Edit Lancamento"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('lancamentos::lancamentos.Edit')}}</a></li>
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/lancamentos/delete', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Lancamento" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('lancamentos::lancamentos.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('lancamentos::lancamentos.Delete')}} Lancamento"></span> {{trans('lancamentos::lancamentos.Delete')}}</a>
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
          <h4>{{trans('lancamentos::lancamentos.Empty')}}</h4>
          <p>{{trans('lancamentos::lancamentos.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $lancamentos->render() !!}
    </div>
  </div>
</section>
@endsection
