@extends('index')

@section('title')
    {{ trans('subject.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('user.listing') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <th> {{ trans('user.id') }} </th>
                                        <th> {{ trans('user.name') }} </th>
                                        <th> {{ trans('user.view_details') }} </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->users as $user)
                                            @if ($user->role != config('user.role.admin'))
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
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
