<!-- SIDEBAR -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ Storage::url('public/users/').Auth::user()->photo }}"
                        alt="Your Photo" class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a>
                        <span>
                            {{ Auth::user()->name }}
                            {{-- Muhammad Fikri Adi --}}
                            <span class="user-level">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li
                    class="nav-item {{ $sidebar == 'dashboard' ? 'active' : '' }}">
                    <a href="/dashboard">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Users</h4>
                </li>

                <li
                    class="nav-item {{ $sidebar == 'users' ? 'active' : '' }}">
                    <a href="/users">
                        <i class="fas fa-users"></i>
                        <p>Data Users</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Blog</h4>
                </li>

                <li
                    class="nav-item {{ $sidebar == 'blog' ? 'active' : '' }}">
                    <a href="/blog">
                        <i class="fas fa-folder-open"></i>
                        <p>Data Blog</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>