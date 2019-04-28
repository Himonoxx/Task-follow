<div class="row">
    <div class="card card-title text-light bg-dark text-center col-sm-12">
        <h1>My Task</h1>
    </div>
    <div class="row">
        @if(count($user->tasks())>0)
            <table class="table thead-dark">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Add</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show',$task->content,['id'=>$task->id]) !!}</td>
                        <td>{{ $task->deadline}}</td>
                        <td>{{ $task->status}}</td>
                        <td><a href="#"><i class="fas fa-plus-square"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        @else
            <div class="card card-title text-center col-sm-12">
                <h2>--Nothing Tasks--</h2>
            </div>
        @endif
        {{ $tasks->render('pagination::bootstrap-4') }}