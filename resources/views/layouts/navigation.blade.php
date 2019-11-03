<header>
    <nav class="navbar navbar-light navbar-expand-md">
        <a class="navbar-brand text-primary" href="/">SO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(request()->is('about'))active @endif">
                    <a class="nav-link" href="{{ route('about.index') }}">About @if(request()->is('about'))<span class="sr-only">(current)</span>@endif</a>
                </li>
                <li class="nav-item @if(request()->is('projects'))active @endif">
                    <a class="nav-link" href="{{ route('projects.index') }}">Projects @if(request()->is('projects'))<span class="sr-only">(current)</span>@endif</a>
                </li>
                <li class="nav-item @if(request()->is('articles'))active @endif">
                    <a class="nav-link" href="{{ route('articles.index') }}">Articles @if(request()->is('articles'))<span class="sr-only">(current)</span>@endif</a>
                </li>
                <li class="nav-item @if(request()->is('contact'))active @endif">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contact @if(request()->is('contact'))<span class="sr-only">(current)</span>@endif</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{ route('articles.index') }}">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>