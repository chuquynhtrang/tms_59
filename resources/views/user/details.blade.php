@extends('index')

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('user.title') }} <small>&raquo; {{ trans('user.detail') }}</small></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> {{ trans('user.user_details') }} </h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <tr>
                                        <td>{!! Html::image($user->avatar(), null, ['class' => 'img-responsive img']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.name') }}:</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.email') }}:</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.information') }}:</td>
                                        <td>{{ $user->information }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.role') }}:</td>
                                        <td>
                                            @if ($user->isAdmin())
                                                {{ trans('user.admin') }}
                                            @else
                                                {{ trans('user.user') }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
