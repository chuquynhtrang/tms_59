@extends('admin.index')

@section('title')
    {{ trans('trainee.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('trainee.trainee') }} <small>&raquo; {{ trans('trainee.listing') }} </small></h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin.trainee.create') }}" class="btn btn-success"> {{ trans('trainee.new_trainee') }} </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('trainee.trainee_table') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @include('layouts.partials.success')
                            @include('layouts.partials.error')
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th> {{ trans('trainee.id') }} </th>
                                            <th> {{ trans('trainee.trainee_name') }} </th>
                                            <th> {{ trans('trainee.trainee_email') }} </th>
                                            <th> {{ trans('trainee.trainee_information') }} </th>
                                            <th> {{ trans('trainee.trainee_create') }} </th>
                                            <th> {{ trans('trainee.trainee_edit') }} </th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><input type="checkbox" name="checkbox[]" value=" {{$user->id}} "></td>
                                                <td> {{ $user->id }} </td>
                                                <td> {{ $user->name }} </td>
                                                <td> {{ $user->email }} </td>
                                                <td class="limit"> {{ $user->information }} </td>
                                                <td> {{ $user->updated_at }} </td>
                                                <td>
                                                    <a href="{{ route('admin.trainee.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.trainee.destroy', $user->id]]) !!}
                                                        {!! Form::submit(trans('trainee.trainee_delete'), ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure delete?')"]) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
