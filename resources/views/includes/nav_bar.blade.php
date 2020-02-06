<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="#" class="navbar-brand">Amir Rudin</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="{{ url('/') }}" class="nav-item nav-link active">List Link</a>
            <a href="{{ route('createlink') }}" class="nav-item nav-link">Create Link</a>
        </div>
        <!--
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link">Login</a>
        </div>
    -->
    </div>
</nav>