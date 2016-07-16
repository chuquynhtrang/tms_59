<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ trans('task.task_table') }}
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">

            @include('layouts.partials.error')
            @include('layouts.partials.success')

            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover table-list-search" id="dataTables">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
                            <th> {{ trans('task.name') }}</th>
                            <th> {{ trans('task.description') }}</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                 <td><input type="checkbox" name="checkbox[]" value="{{$task->id}}"></td>
                                <td>{{ $task->name }}</td>
                                <td class="limit">{{ $task->description }}</td>
                                <td>
                                    {!! Form::open(['method' => 'GET', 'route'=> ['admin.subject.{id}.tasks.edit', $id, $task->id]]) !!}
                                        {!! Form::submit(trans('task.edit'), ['class' => 'btn btn-primary btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.subject.{id}.tasks.destroy', $id, $task->id]]) !!}
                                        {!! Form::submit(trans('task.delete'), ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure delete?')"]) !!}
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
