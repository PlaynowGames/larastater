@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('macula::macula.Macula')}}</h3>

      <div class="box-tools">
        <a href="{{ url('/macula/create') }}" class="btn btn-success btn-sm" title="Add New Macula"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($macula))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/macula?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/macula?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>
              <th> {{ trans('macula.nome') }}
              <div class="btn-group pull-right">
                <a href="{{url('/macula?order_by=nome&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/macula?order_by=nome&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th><th> {{ trans('macula.data') }}
              <div class="btn-group pull-right">
                <a href="{{url('/macula?order_by=data&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/macula?order_by=data&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('macula::macula.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($macula as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'nome') class="active" @endif>{{ $item->nome }}</td><td @if($order_by == 'data') class="active" @endif>{{ $item->data }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/macula/show/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('macula::macula.View')}} Macula"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('macula::macula.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/macula/edit/' . $item->id . '') }}" title="Edit Macula"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('macula::macula.Edit')}}</a></li>
                      @permission('access-macula')
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/macula/delete', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Macula" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('macula::macula.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('macula::macula.Delete')}} Macula"></span> {{trans('macula::macula.Delete')}}</a>
                      </li>
                      @endpermission
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
          <h4>{{trans('macula::macula.Empty')}}</h4>
          <p>{{trans('macula::macula.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $macula->render() !!}
    </div>
  </div>
</section>
@endsection
