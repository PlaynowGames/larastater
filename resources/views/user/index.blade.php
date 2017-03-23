@extends('layouts.app')

@section('content')

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{trans('users.Roles')}}</h3>
      <div class="box-tools">
        <a href="{{ url('/users/create') }}" class="btn btn-success btn-sm" title="Add New Usuário"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
      </div>
    </div>

    @if(count($users))
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
              <th style="min-width: 120px;">
                #
                <div class="btn-group pull-right">
                  <a href="{{url('/users?order_by=id&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                  <a href="{{url('/users?order_by=id&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='id' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
                </div>
              </th>
              <th> {{ trans('users.name') }}
              <div class="btn-group pull-right">
                <a href="{{url('/users?order_by=nome&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/users?order_by=nome&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='nome' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
          </th><th> {{ trans('users.Display Name') }}
              <div class="btn-group pull-right">
                <a href="{{url('/users?order_by=data&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/users?order_by=data&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='data' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
          </th><th> {{ trans('users.Description') }}
              <div class="btn-group pull-right">
                <a href="{{url('/users?order_by=valor&order_direct=desc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='desc') disabled @endif"><i class="fa fa-caret-up"></i></a>
                <a href="{{url('/users?order_by=valor&order_direct=asc')}}" class="btn btn-default btn-xs @if($order_by=='valor' and $order_direct=='asc') disabled @endif"><i class="fa fa-caret-down"></i></a>
              </div>
            </th>
              <th class="text-right" style="min-width: 150px;">{{trans('users.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

        @foreach($users as $item)
            <tr>
                <td @if($order_by == 'id') class="active" @endif>{{ $item->id }}</td>
                <td @if($order_by == 'name') class="active" @endif>{{ $item->name }}</td>
                <td @if($order_by == 'display_name') class="active" @endif>{{ $item->display_name }}</td>
                <td @if($order_by == 'description') class="active" @endif>{{ $item->description }}</td>
                <td class="text-right">
                  <div class="btn-group">
                    <a href="{{ url('/users/show/' . $item->id) }}" class="btn btn-default btn-sm" title="{{trans('users.View')}} Roles"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{trans('users.View')}}</a>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('/users/edit/' . $item->id . '') }}" title="Edit User"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{trans('users.Edit')}}</a></li>
                      <li>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/users/delete', $item->id],
                            'style' => 'display:none'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Usuários" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                            ));!!}
                        {!! Form::close() !!}
                        <a href="#" onclick="if(confirm('{{trans('users.Confirm delete?')}}')) $(this).parent().find('form').submit(); else return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="{{trans('users.Delete')}} Usuários"></span> {{trans('users.Delete')}}</a>
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
          <h4>{{trans('users.Empty')}}</h4>
          <p>{{trans('users.This section is empty')}}</p>
        </div>
      </div>
    @endif
    <div class="box-footer clearfix">
      {!! $users->render() !!}
    </div>
  </div>
</section>
@endsection
