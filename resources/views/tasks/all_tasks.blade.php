<div class="row">
  <ul class="msr_bread06 col-sm-12">
    <li>
      Home   
    </li>
  </ul>
</div>    
    <div class="row">
        <div class="card card-title text-light bg-info text-center col-sm-12">
            <h1>All Tasks</h1>
        </div>
        <div class="col-sm-12">
        @if(count($tasks)>0)
            <table class="table table-responsive-sm table-hover">
                <thead>
                    <tr class="table-active text-light">
                        <th>Task</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Add / Release</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr class="table-info">
                        <td><strong>{!! link_to_route('tasks.show',$task->content,['id'=>$task->id],['class'=>'text-dark']) !!}</strong></td>
                        <td><strong>{{ $task->deadline }}</strong></td>
                        <td><strong>{{ $task->status }}</strong></td>
                            @if($task->user_id==null)
                                <td></td>
                                <td><strong>
                                {!! Form::model($task, ['route' => ['added.tasks', $task->id], 'method' => 'post']) !!}
                                {!! Form::submit('Add', ['class' => 'btn btn-sm btn-info mx-auto btn-block']) !!}
                                {!! Form::close() !!}</strong>
                            @else
                                <td class="text-danger"><strong>Occupied</strong></td>
                                    <td>
                                    @if($task->user_id == Auth::user()->id)
                                        {!! Form::model($task,['route'=>['un_added.tasks',$task->id],'method'=>'post']) !!}
                                        {!! Form::submit('Release', ['class' => 'btn btn-sm btn-light mx-auto btn-block']) !!}
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