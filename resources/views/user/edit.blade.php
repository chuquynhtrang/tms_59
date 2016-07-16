@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3> {{ trans('user.profile') }} <small>&raquo; {{ trans('user.edit_profile') }}</small></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('user.title_edit') }} </h3>
                </div>
                <div class="panel-body">

                    @include('layouts.partials.error')
                    @include('layouts.partials.success')

                    {!! Form::model($user, ['method' => 'PUT', 'route' => ['user.update', $user['id']], 'class' => 'form-horizontal', 'files' => true]) !!}

                        {!! Form::label('avatar', trans('user.avatar'), ['class' => 'control-label']) !!}
                        {!! Form::image($user->avatar(), null, ['class'=> 'img-responsive img']) !!}
                        {!! Form::file('avatar', ['class' => 'avatar']) !!}

                        {!! Form::label('name', trans('user.name'), ['class' => 'control-label']) !!}
                        {!! Form::text('name', $user['name'], ['class' => 'form-control', 'autofocus']) !!}

                        {!! Form::label('information', trans('user.information'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('information', $user['information'], ['class' => 'form-control', 'rows' => '3']) !!}

                        <div class="block"></div>

                        {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('user.save_changes'), ['type' => 'submit', 'class' => 'btn btn-primary btn-md']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
