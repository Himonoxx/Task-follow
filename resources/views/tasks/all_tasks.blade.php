    <div class="row">
        <div class="card card-title text-light bg-info text-center col-sm-12">
            <h1>All Tasks</h1>
        </div>
        <div class="col-sm-12">
        @if(count($tasks)>0)
            <table class="table thead-dark">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Add / Release</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show',$task->content,['id'=>$task->id]) !!}</td>
                        <td>{{ $task->deadline }}</td>
                        <td>{{ $task->status }}</td>
                            @if($task->user_id==null)
                                <td></td>
                                <td>
                                {!! Form::model($task, ['route' => ['added.tasks', $task->id], 'method' => 'post']) !!}
                                {!! Form::submit('Add', ['class' => 'btn btn-sm btn-success']) !!}
                                {!! Form::close() !!}
                            @else
                                <td class="text-danger">Occupied</td>
                                    <td>
                                    @if($task->user_id == Auth::user()->id)
                                        {!! Form::model($task,['route'=>['un_added.tasks',$task->id],'method'=>'post']) !!}
                                        {!! Form::submit('Release', ['class' => 'btn btn-sm btn-light']) !!}
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        @else
            <div class="card card-title text-center col-sm-12">
                <h2>--Nothing Tasks--</h2>
            </div>
            
        {{ $tasks->render('pagination::bootstrap-4') }}
        @endif
        </div>
    </div>