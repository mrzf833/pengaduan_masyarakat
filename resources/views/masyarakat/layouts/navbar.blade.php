<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
    <div class="d-inline-block ml-3">
        <a class="navbar-brand" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" height="39" viewBox="0 0 72 49">
            <g id="Group_1" data-name="Group 1" transform="translate(-143)">
                <text id="PE" transform="translate(143 41)" fill="#606060" font-size="32" font-family="SegoeUI, Segoe UI"><tspan x="0" y="0">PE</tspan></text>
                <text id="mas" transform="translate(177 23)" fill="#606060" font-size="21" font-family="SegoeUI, Segoe UI"><tspan x="0" y="0">mas</tspan></text>
            </g>
            </svg>
        </a>
    </div>
    <div class="clearfix d-inline-block mr-3">
        <ul class="navbar-nav flex-row">
            <li class="nav-item {{ request()->routeIs('masyarakat.home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('masyarakat.home') }}">Home</a>
            <hr>
            </li>
            <li class="nav-item ml-2 {{ request()->routeIs('masyarakat.pengaduan.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('masyarakat.pengaduan.index') }}">Aduan</a>
            <hr>
            </li>
            <li class="nav-item ml-2 {{ request()->routeIs('masyarakat.profile.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('masyarakat.profile.index') }}">Profile</a>
            <hr>
            </li>
        </ul>
    </div>
</nav>