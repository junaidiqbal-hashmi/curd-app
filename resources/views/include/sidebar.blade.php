<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a>
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Core</div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link" href="{{url('dashboard')}}">
                    <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                    Dashboard
                </a>
                <!-- Sidenav Heading (Custom)-->
                <div class="sidenav-menu-heading">Manage</div>
                <!-- Sidenav Accordion (Utilities)-->
                 <!-- Sidenav Accordion (Utilities)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseEntrypoint" aria-expanded="false" aria-controls="collapseUtilities">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Entry Points
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEntrypoint" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="{{route('entrypoints.index')}}">List</a>
                        <a class="nav-link" href="{{route('entrypoints.create')}}">Add Entry Points</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Notifications
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUtilities" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="{{route('news.index')}}">List</a>
                        <a class="nav-link" href="{{route('news.create')}}">Add Notifications</a>
                    </nav>
                </div>
                <!-- Sidenav Accordion (Utilities)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseUtilities">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Users
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUser" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="{{route('user.index')}}">List</a>
                        <a class="nav-link" href="{{route('user.create')}}">Add User</a>
                    </nav>
                </div>
                <!-- Sidenav Accordion (Utilities)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOperator" aria-expanded="false" aria-controls="collapseUtilities">
                    <div class="nav-link-icon"><i data-feather="tool"></i></div>
                    Tours Operator
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseOperator" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="{{route('operators.list')}}">List</a>
                        <a class="nav-link" href="{{route('operators.create')}}">Add Operator</a>
                    </nav>
                </div>
                <!-- Sidenav Heading (Custom)-->

                <div class="sidenav-menu-heading">Reports</div>
                <!-- Sidenav Accordion (Utilities)-->
                <a class="nav-link" href="{{route('tour.index')}}">
                    <div class="nav-link-icon"><i data-feather="book"></i></div>
                    Tours
                </a>
                <a class="nav-link" href="{{route('tours.tourist')}}">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Tourists
                </a>
                <a class="nav-link" href="{{route('vehicals.list')}}">
                    <div class="nav-link-icon"><i data-feather="truck"></i></div>
                    Vehicles
                </a>
                
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{auth()->user()->name}}</div>
            </div>
        </div>
    </nav>
</div>