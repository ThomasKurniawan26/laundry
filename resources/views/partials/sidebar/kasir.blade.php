             <li class="nav-item {{ request()->path() == '/member/data_member' ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/member/data_member')}}">
                   <i class="nav-icon fas fa-tasks"></i>
                    <span>Data-Member</span></a>
            </li>
              <li class="nav-item {{ request()->path() == 'transaksi' ? 'active' : '' }}">
                <a class="nav-link" href="{{url('/transaksi/data_transaksi')}}">
                   <i class="nav-icon fas fa-tasks"></i>
                    <span>Transaksi</span></a>
            </li>