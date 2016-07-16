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
                                <h3>{{ $subject->name }}
                                    @foreach ($userSubject as $us)
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
                                        @foreach ($userSubject as $us)
                                            <li><strong> {{ trans('subject.started_date') }} </strong>: {{ $us->started_date }}</li>
                                            <li><strong> {{ trans('subject.ended_date') }} </strong>: {{ $us->ended_date }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <hr>

                                <div class="instructions">
                                    <h4><strong> {{ trans('course.instructions') }} </strong></h4>
                                    {{ $subject->description }}
                                </div>

                                <hr>

                                <div class="list-subject">
                                    <h4><strong>Subject in Course</strong></h4>
                                    <button type="button" class="btn btn-warning btn-sm my-btn"> {{ trans('task.working') }} </button>
                                    <ul class="list-group">
                                        @foreach ($subject->tasks as $task)
                                            @if ($task->userTask->status == config('user.status.working'))
                                                <li class="list-group-item">
                                                    <a href="{{ route('subject.instructions', [$id, $course->id, $subject->id]) }}"><i class="fa fa-file-text"></i> {{ $task->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="list-subject">
                                    <button type="button" class="btn btn-success btn-sm my-btn"> {{ trans('task.start') }} </button>
                                    <ul class="list-group">
                                        @foreach ($subject->tasks as $task)
                                            @if ($task->userTask->status == config('user.status.start'))
                                                <li class="list-group-item">
                                                    <a href="{{ route('subject.instructions', [$id, $course->id, $subject->id]) }}"><i class="fa fa-file-text"></i> {{ $task->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="list-subject">
                                    <button type="button" class="btn btn-danger btn-sm my-btn"> {{ trans('task.finish') }} </button>
                                    <ul class="list-group">
                                        @foreach ($subject->tasks as $task)
                                            @if ($task->userTask->status == config('user.status.finish'))
                                                <li class="list-group-item">
                                                    <a href="#myModal" class="viewTask" data-toggle="modal" data-target="#viewTaskModal" data-name="{{$task->name}}" data-description="{{$task->description}}"><i class="fa fa-file-text"></i> {{ $task->name }}</a>
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

    <div class="modal fade" id="viewTaskModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="taskname"></h4>
                </div>
                <div class="modal-body">
                    <strong> {{ trans('task.description') }} </strong>
                    <p id="description"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
