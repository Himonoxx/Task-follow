 <div class="row">
    @if(count($user->tasks)>0)
        <table class="table thead-dark table-info table-hover">
            <thead>
                <tr>
                    <th>Parent Task</th>
                    <th>deadline</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show',$task->content,['id'=>$task->id],['class'=>'text-dark']) !!}</td>
                    <td>{{ $task->deadline }}</td>
                    <td>{{ $task->status }}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    @else
    <h4 class="text-center">Nothing Tasks</h4>
    
    
    {{-- $tasks->render('pagination::bootstrap-4') --}}
    @endif