<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar-bg sidebar-menu position-fixed">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>

        @switch(Auth::user()->role_id)
            @case(1)
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i>
                            <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-list-task"></i>
                            <span class="ms-1 d-none d-sm-inline">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.roles') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-list-task"></i>
                            <span class="ms-1 d-none d-sm-inline">Roles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-list-task"></i>
                            <span class="ms-1 d-none d-sm-inline">Categories</span>
                        </a>
                    </li>
                </ul>
            @break

            @case(2)
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i>
                            <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.publicity.officer.pending.exporters') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i>
                            <span class="ms-1 d-none d-sm-inline">Pending exporters</span>
                        </a>
                    </li>
                </ul>
            @break

            @default
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i>
                            <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="annex1.html" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-ui-checks-grid"></i>
                            <span class="ms-1 d-none d-sm-inline">Annexure 1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="annex2.html" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-ui-checks-grid"></i>
                            <span class="ms-1 d-none d-sm-inline">Annexure 2</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-app"></i>
                            <span class="ms-1 d-none d-sm-inline">Application</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-app-indicator"></i>
                            <span class="ms-1 d-none d-sm-inline">Application Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-list-task"></i>
                            <span class="ms-1 d-none d-sm-inline">Application List</span>
                        </a>
                    </li>
                </ul>
        @endswitch


        <hr />
        <div class="dropdown p-4 fixed-bottom">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                    class="rounded-circle" />
                <span class="d-none d-sm-inline mx-1">Coder</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                {{-- <li>
                    <a class="dropdown-item" href="#">New project...</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Profile</a>
                </li> --}}
                {{-- <li>
                    <hr class="dropdown-divider" />
                </li> --}}
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Sign
                        out</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
