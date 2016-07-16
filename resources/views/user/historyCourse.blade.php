@extends('index')

@section('title')
    {{ trans('user.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> {{ trans('user.profile') }} </h3>
                        </div>
                        <div class="panel-body">

                            @include('layouts.partials.error')
                            @include('layouts.partials.success')

                            <div class="dataTable-wrapper">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <td>{!! Html::image($user->avatar(), null, ['class' => 'img-responsive img']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.name') }}</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.email') }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.information') }}</td>
                                        <td>{{ $user->information }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.role') }}</td>
                                        <td>
                                            @if ($user->isAdmin())
                                                {{ trans('user.admin') }}
                                            @else
                                                {{ trans('user.user') }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                {!! Form::open(['method' => 'GET', 'route' => ['user.edit', $user->id]]) !!}
                                {!! Form::submit(trans('user.edit_profile'), ['class' => 'btn btn-success btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel-heading">
                    <h3> {{ trans('user.title') }} <small>&raquo; {{ trans('user.manager_history') }} </small></h3>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-filter-course" data-target="{{ config('user.status.start') }}">Start</button>
                                    <button type="button" class="btn btn-warning btn-filter-course" data-target="{{ config('user.status.working') }}">Working</button>
                                    <button type="button" class="btn btn-danger btn-filter-course" data-target="{{ config('user.status.finish') }}">Finish</button>
                                    <button type="button" class="btn btn-default btn-filter-course" data-target="{{ trans('user.all') }}">Todos</button>
                                </div>
                            </div>

                            <div class="table-container">
                                <table class="table table-filter course-status">
                                    <thead>
                                    <th> {{ trans('course.course_name') }} </th>
                                    <th> {{ trans('course.description') }} </th>
                                    <th> {{ trans('course.started_date') }} </th>
                                    <th> {{ trans('course.ended_date') }} </th>
                                    <th> {{ trans('course.status') }} </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->userCourses as $userCourse)
                                        <tr data-status="{{ $userCourse->status }}">
                                            <td>{{ $userCourse->course->name }}</td>
                                            <td>{{ $userCourse->course->description }}</td>
                                            <td>{{ $userCourse->started_date }}</td>
                                            <td>{{ $userCourse->ended_date }}</td>
                                            <td>@if ($userCourse->status == config('user.status.start'))
                                                    <button type="button" class="btn btn-success btn-filter" data-target="{{ trans('course.start') }}"> {{ trans('course.start') }} </button>
                                                @elseif ($userCourse->status == config('user.status.working'))
                                                    <button type="button" class="btn btn-warning btn-filter" data-target="{{ trans('course.working') }}"> {{ trans('course.working') }} </button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-filter" data-target="{{ trans('course.finish') }}"> {{ trans('course.finish') }} </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-filter-subject" data-target="{{ config('user.status.start') }}">Start</button>
                                    <button type="button" class="btn btn-warning btn-filter-subject" data-target="{{ ('user.status.working') }}">Working</button>
                                    <button type="button" class="btn btn-danger btn-filter-subject" data-target="{{ config('user.status.finish') }}">Finish</button>
                                    <button type="button" class="btn btn-default btn-filter-subject" data-target="{{ trans('user.all') }}">Todos</button>
                                </div>
                            </div>

                            <div class="table-container">
                                <table class="table table-filter subject-status">
                                    <thead>
                                        <th> {{ trans('subject.subject_name') }} </th>
                                        <th> {{ trans('subject.description') }} </th>
                                        <th> {{ trans('subject.started_date') }} </th>
                                        <th> {{ trans('subject.ended_date') }} </th>
                                        <th> {{ trans('subject.status') }} </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->userSubjects as $userSubject)
                                        <tr data-status="{{ $userSubject->status }}">
                                            <td>{{ $userSubject->subject->name }}</td>
                                            <td>{{ $userSubject->subject->description }}</td>
                                            <td>{{ $userSubject->started_date }}</td>
                                            <td>{{ $userSubject->ended_date }}</td>
                                            <td>@if ($userSubject->status == config('user.status.start'))
                                                    <button type="button" class="btn btn-success btn-filter" data-target="{{ trans('subject.start') }}"> {{ trans('subject.start') }} </button>
                                                @elseif ($userSubject->status == config('user.status.working'))
                                                    <button type="button" class="btn btn-warning btn-filter" data-target="{{ trans('subject.working') }}"> {{ trans('subject.working') }} </button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-filter" data-target="{{ trans('subject.finish') }}"> {{ trans('subject.finish') }} </button>
                                                @endif
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


