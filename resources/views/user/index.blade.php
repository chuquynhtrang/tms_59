@extends('index')

@section('title')
    {{ trans('user.user_manager') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('user.title') }} <small>&raquo; {{ trans('user.name') }}</small></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> {{ trans('user.list') }} </h3>
                        </div>
                        <div class="panel-body">

                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('user.user_name') }}</th>
                                        <th>{{ trans('user.role') }}</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @if ($user->isAdmin())
                                                    {{ trans('user.admin') }}
                                                @else
                                                    {{ trans('user.user') }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{!! route('user.show', [$user->id]) !!}">
                                                    {{ trans('user.view_details') }} </a>
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
