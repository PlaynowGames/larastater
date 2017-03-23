@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('relatorios::relatorios.Relatorios')}}</h3>
      <div class="box-tools">
        <a href="{{ url('/relatorios/create') }}" class="btn btn-success btn-sm" title="Add New Relatorio"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($relatorios))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/relatorios?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/relatorios?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>
              <th> {{ trans('relatorios.nome') }}
              <div class="btn-group pull-right">
                <a href="{{url('/relatorios?order_by=nome&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/relatorios?order_by=nome&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('relatorios.valor') }}
              <div class="btn-group pull-right">
                <a href="{{url('/relatorios?order_by=valor&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/relatorios?order_by=valor&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('relatorios::relatorios.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($relatorios as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'nome') class="active" @endif>{{ $item->nome }}</td><td @if($order_by == 'valor') class="active" @endif>{{ $item->valor }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/relatorios/show/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('relatorios::relatorios.View')}} Relatorio"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('relatorios::relatorios.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/relatorios/edit/' . $item->id . '') }}" title="Edit Relatorio"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('relatorios::relatorios.Edit')}}</a></li>
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/relatorios/delete', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Relatorio" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('relatorios::relatorios.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('relatorios::relatorios.Delete')}} Relatorio"></span> {{trans('relatorios::relatorios.Delete')}}</a>
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
          <h4>{{trans('relatorios::relatorios.Empty')}}</h4>
          <p>{{trans('relatorios::relatorios.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $relatorios->render() !!}
    </div>
  </div>
</section>
@endsection
