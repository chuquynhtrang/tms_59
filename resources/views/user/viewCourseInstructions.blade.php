@extends('index')

@section('title')
    {{ trans('course.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>{{ $course->name }} 
                                    @foreach ($userCourse as $us)
                                       @if ($us->status == config('user.status.start'))
                                            <button type="button" class="btn btn-success"> {{ trans('course.start') }} </button>
                                        @elseif ($us->status == config('user.status.finish'))
                                            <button type="button" class="btn btn-danger"> {{ trans('course.finish') }} </button>
                                        @else
                                            <button type="button" class="btn btn-warning"> {{ trans('course.working') }} </button>
                                        @endif
                                    @endforeach
                                </h3>
                            </div>

                            <div class="panel-body">
                                <div class="basic-info">
                                    <h4><strong> {{ trans('course.info') }} </strong></h4>
                                    <ul>
                                        @foreach ($userCourse as $us)
                                            <li><strong> {{ trans('course.started_date') }} </strong>: {{ $us->started_date }}</li>
                                            <li><strong> {{ trans('course.ended_date') }} </strong>: {{ $us->ended_date }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <hr>

                                <div class="instructions">
                                    <h4><strong> {{ trans('course.instructions') }} </strong></h4>
                                    {{ $course->description }}
                                </div>

                                <hr>

                                <div class="list-subject">
                                    <h4><strong> {{ trans('course.subjects_of_course') }} </strong></h4>
                                    <button type="button" class="btn btn-warning btn-sm my-btn"> {{ trans('subject.working') }} </button>

                                    <ul class="list-group">
                                        @foreach ($course->subjects as $subject)
                                            @if ($subject->userSubject->status == config('user.status.working'))
                                                <li class="list-group-item">
                                                    <a href="{{ route('subject.instructions', [$id, $course->id, $subject->id]) }}"><i class="fa fa-book"></i> {{ $subject->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="list-subject">
                                    <button type="button" class="btn btn-success btn-sm my-btn"> {{ trans('subject.start') }} </button>
                                    <ul class="list-group">
                                        @foreach ($course->subjects as $subject)
                                            @if ($subject->userSubject->status == config('user.status.start'))
                                                <li class="list-group-item">
                                                    <a href="{{ route('subject.instructions', [$id, $course->id, $subject->id]) }}"><i class="fa fa-book"></i> {{ $subject->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="list-subject">
                                    <button type="button" class="btn btn-danger btn-sm my-btn"> {{ trans('subject.finish') }} </button>
                                    <ul class="list-group">
                                        @foreach ($course->subjects as $subject)
                                            @if ($subject->userSubject->status == config('user.status.finish'))
                                                <li class="list-group-item">
                                                    <a href="{{ route('subject.instructions', [$id, $course->id, $subject->id]) }}"><i class="fa fa-book"></i> {{ $subject->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
