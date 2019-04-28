
    @if(count($users)>0)
        <table class="table thead-dark">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Tasks Count</th>
                    <th>progress</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{!! link_to_route('users.show',$user->name,['id'=>$user->id]) !!}</td>
                    <td>{{ $user->tasks()->count() }}Tasks</td>
                    @if($user->tasks()->count()==0 || $user->tasks()->where('status','完了')->count()==0  )
                        <td><div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0">0%</div></td>
                    @else
                        <td><div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="{{ ($user->tasks()->where('status','完了')->count())/($user->tasks()->count()) }}" aria-valuemin="0" aria-valuemax="100" style={{ "width:" . ($user->tasks()->where('status','完了')->count())/($user->tasks()->count())*100 . "%" }}>{{ ($user->tasks()->where('status','完了')->count())/($user->tasks()->count())*100 . "%"}}</div></td>
                    @endif
                    
                </tr>
                @endforeach
            </tbody>
            
        </table>
    @else
        <div class="card card-title text-center col-sm-12">
            <h2>--Nothing Users--</h2>
        </div>
    @endif
    {{ $users->render('pagination::bootstrap-4') }}