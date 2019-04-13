<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/">TaskFollow</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item">{!! link_to_route('signup.get','Signup',[],['class'=>'nav-link']) !!}</li>
                <li class="nav-item"><a href="#" class="nav-link">Login</a></li>
                <li class="nav-item dropdown" type="button" data-toggle="dropdown" aria-haspop="true" aria-expanded="false">Users</li>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>{!! link_to_route('tasks.create','Add Task',[],['class'=>'dropdown-item']) !!}</li>
                        <li><a class="dropdown-item" href="#">logout</a></li>
                        
                    </div>
            </ul>
        </div>
    </nav>
</header>