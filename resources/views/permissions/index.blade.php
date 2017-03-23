@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('Permissions.Permissions')}}</h3>
      <div class="box-tools">
        <a href="{{ url('/permissions/create') }}" class="btn btn-success btn-sm" title="Add New Permissions"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($permissions))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/permissions?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/permissions?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>

              <th> {{ trans('permissions.name') }}
              <div class="btn-group pull-right">
                <a href="{{url('/permissions?order_by=nome&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/permissions?order_by=nome&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
          </th><th> {{ trans('permissions.Display Name') }}
              <div class="btn-group pull-right">
                <a href="{{url('/permissions?order_by=data&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/permissions?order_by=data&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
          </th><th> {{ trans('permissions.Description') }}
              <div class="btn-group pull-right">
                <a href="{{url('/permissions?order_by=valor&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/permissions?order_by=valor&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('permissions.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($permissions as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'name') class="active" @endif>{{ $item->name }}</td>
                <td @if($order_by == 'display_name') class="active" @endif>{{ $item->display_name }}</td>
                <td @if($order_by == 'description') class="active" @endif>{{ $item->description }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/permissions/show/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('permissions.View')}} Permission"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('permissions.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/permissions/edit/' . $item->id . '') }}" title="Edit Permissions"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('permissions.Edit')}}</a></li>
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/permissions/delete', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Lancamento" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('permissions.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('permissions.Delete')}} Permission"></span> {{trans('permissions.Delete')}}</a>
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
          <h4>{{trans('permissions.Empty')}}</h4>
          <p>{{trans('permissions.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $permissions->render() !!}
    </div>
  </div>
</section>
@endsection
