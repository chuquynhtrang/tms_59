@extends('admin.index')

@section('title')
    {{ trans('subject.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('course.title') }} <small>&raquo; {{ trans('course.view_subjects') }} </small></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('subject.listing') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="list-group">
                                @foreach ($course->subjects as $subject)
                                    <li class="list-group-item">{{ $subject->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel panel-default">
                            {{ trans('subject.listing')}}
                        </div>

                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop


