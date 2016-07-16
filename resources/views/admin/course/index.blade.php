@extends('admin.index')

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
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin.course.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> {{ trans('course.new_course') }} </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('course.course_table') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            @include('layouts.partials.error')
                            @include('layouts.partials.success')

                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th> {{ trans('course.id') }} </th>
                                            <th> {{ trans('course.course_name') }} </th>
                                            <th> {{ trans('course.description') }} </th>
                                            <th> {{ trans('course.created_at') }} </th>
                                            <th> {{ trans('course.updated_at') }}</th>
                                            <th> {{ trans('course.view_details') }} </th>
                                            <th> {{ trans('course.edit') }} </th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td><input type="checkbox" name="checkbox[]" value="{{$course->id}}"></td>
                                                <td>{{ $course->id }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->description }}</td>
                                                <td>{{ $course->created_at }}</td>
                                                <td>{{ $course->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.course.show', $course->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.course.destroy', $course->id]]) !!}
                                                        {!! Form::submit(trans('course.delete'), ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure delete?')"]) !!}
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
                <div class="col-lg-4">
                </div>
            </div>
        </section>
    </div>
@stop

