<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Ilmiah-IN</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->getName() == 'dashboard'? 'active': '' }}" href="{{ url('/dashboard') }}">
                    <i class="fas fa-window-maximize"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->getName() == 'makalah'? 'active': '' }}" href="{{ url('/makalah') }}">
                    <i class="fas fa-window-maximize"></i><span>Project</span>
                </a>
            </li>
        </ul><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
    </div>
</nav>
