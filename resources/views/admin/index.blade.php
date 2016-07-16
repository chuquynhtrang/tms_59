@extends('layouts.app')

@section('navbar')
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Managements
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('admin.course.index') }}"> {{ trans('course.title') }} </a></li>
            <li><a href="{{ route('admin.subject.index') }}"> {{ trans('subject.title') }} </a></li>
            <li><a href="{{ route('admin.trainee.index') }}"> {{ trans('trainee.title') }} </a></li>
        </ul>
    </li>
    <li> {{ Html::linkRoute('user.index', trans('user.title')) }} </li>
    <li> {{ Html::linkRoute('report', trans('user.report'), [ Auth::user()->id]) }} </li>
@stop
