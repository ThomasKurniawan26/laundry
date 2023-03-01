<li class="nav-item {{ request()->path() == 'outlet' ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/outlet/data_outlet')}}">
                   <i class="nav-icon fas fa-tasks"></i>
                    <span>Outlet</span></a>
            </li>
             <li class="nav-item {{ request()->path() == 'user' ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/user/data_user')}}">
                   <i class="nav-icon fas fa-tasks"></i>
                    <span>Data-User</span></a>
            </li>
             <li class="nav-item {{ request()->path() == '/member/data_member' ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/member/data_member')}}">
                   <i class="nav-icon fas fa-tasks"></i>
                    <span>Data-Member</span></a>
            </li>
             <li class="nav-item {{ request()->path() == 'pemesanan' ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/paket/paket_laundry')}}">
                   <i class="nav-icon fas fa-tasks"></i>
                    <span>Pemesanan</span></a>
            </li>
              <li class="nav-item {{ request()->path() == 'transaksi' ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/transaksi/data_transaksi')}}">
                   <i class="nav-icon fas fa-tasks"></i>
                    <span>Transaksi</span></a>
            </li>
            