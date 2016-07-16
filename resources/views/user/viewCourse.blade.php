@extends('index')

@section('title')
    {{ trans('course.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('course.courses') }} <small>&raquo; {{ trans('course.listing') }} </small></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('course.courses') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <th> {{ trans('course.name') }} </th>
                                        <th> {{ trans('course.status') }} </th>
                                        <th> {{ trans('course.instructions') }} </th>
                                        <th> {{ trans('course.members') }} </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->courses as $course)
                                            <tr>
                                                <td>{{ $course->name }}</td>
                                                <td>
                                                    @if ($course->pivot->status == config('user.status.start'))
                                                        <button type="button" class="btn btn-success"> {{ trans('course.start') }} </button>
                                                    @elseif ($course->pivot->status == config('user.status.finish'))
                                                        <button type="button" class="btn btn-danger"> {{ trans('course.finish') }} </button>
                                                    @else
                                                        <button type="button" class="btn btn-warning"> {{ trans('course.working') }} </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('course.instructions', [$id, $course->id]) }}" class="btn btn-primary btn-md"><i class="fa fa-newspaper-o"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('course.members', $course->id) }}" class="btn btn-primary btn-md"><i class="fa fa-users"></i></a>
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
