@extends('admin.index')

@section('title')
    {{ trans('subject.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('subject.subjects') }} <small>&raquo; {{ trans('subject.listing') }} </small></h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin.subject.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> {{ trans('subject.new_subject') }} </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('subject.subject_table') }}
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
                                            <th> {{ trans('subject.id') }} </th>
                                            <th> {{ trans('subject.subject_name') }} </th>
                                            <th> {{ trans('subject.description') }} </th>
                                            <th> {{ trans('subject.created_at') }} </th>
                                            <th> {{ trans('subject.updated_at') }} </th>
                                            <th> {{ trans('subject.view_details') }} </th>
                                            <th> {{ trans('subject.view_tasks') }} </th>
                                            <th> {{ trans('subject.edit') }} </th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td><input type="checkbox" name="checkbox[]" value="{{$subject->id}}"></td>
                                                <td>{{ $subject->id }}</td>
                                                <td>{{ $subject->name }}</td>
                                                <td>{{ $subject->description }}</td>
                                                <td>{{ $subject->created_at }}</td>
                                                <td>{{ $subject->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.subject.show', $subject->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                                                </td>
                                                 <td>
                                                    <a href="{{ route('admin.subject.{id}.tasks.index', $subject->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.subject.edit', $subject->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.subject.destroy', $subject->id]]) !!}
                                                        {!! Form::submit(trans('subject.delete'), ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure delete?')"]) !!}
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
            </div>
        </section>
    </div>
@stop
