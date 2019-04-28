
@if(count($childTasks)>0)
<h4 class="text-center">Child tasks</h4>
    <table class="table table-sm table-hover  col-sm-12">
        <thead class="bg-info text-light">
            <th>Child Task</th>
            <th>DeadLine</th>
            <th>Status</th>
        </thead>
        @foreach($childTasks as $childTask)
            <tr class="table-info">
                <td>{!! link_to_route('show.childtask',$childTask->content,[$childTask->id],['class'=>'text-dark']) !!}</td>
                <td>{{$childTask->deadline}}</td>
                <td>{{$childTask->status}}</td>
            </tr>
        @endforeach
    </table>
@endif