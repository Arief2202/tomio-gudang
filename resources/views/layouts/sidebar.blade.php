<div class="sidebar {{Auth::user()->openSideBar == '0' ? 'close' : ''}}">
    <div class="openclose-button">
        <i class='bx bx-chevron-right toggle'></i>
    </div>

    <ul class="nav-links"> 
        
        {{-- ============== TOP SIDE BAR ============= --}}     
        <li>
        <div class="profile-details">
            <div class="profile-content">
                <img class="fotoProfil" alt="Foto Profil">
            </div>
            <div class="name-job">
            <div class="profile_name h-50">{{ Auth::user()->name }}</div>
            <div class="job">
                {{Auth::user()->role == 0 ? 'Superadmin' : ''}}
                {{Auth::user()->role == 1 ? 'Admin' : ''}}
                {{Auth::user()->role == 2 ? 'Admin Gudang' : ''}}
                {{Auth::user()->role != 0 && Auth::user()->role != 1 && Auth::user()->role != 2 ? 'Employee' : ''}}
            </div>
            </div>
        </div>        
        </li>

        {{-- ============== MID (KOMPONEN) SIDE BAR ============= --}} 

        
        {{-- ============== Contoh Dropdown ============= --}} 

        
        {{-- <li>
            <div class="iocn-link">
                <a href="/route">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Title</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name">Title</a></li>
                <li><a href="/route">Sub Title 1</a></li>
                <li><a href="/route2">Sub Title 2</a></li>
            </ul>
        </li> --}}

        {{-- ============== Contoh Standart ============= --}} 

        
        {{-- 
            <li class="{{Request::segment(1) == 'route'? 'active' : ''}}">
                <a href="/route">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Page Name</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/route">Page Name</a></li>
                </ul>
            </li> 
        --}}

        
        {{-- ============== Contoh Dengan Role ============= --}} 
        
        {{-- 
        @if(Auth::user()->role == 1)
            <li class="{{Request::segment(1) == 'route'? 'active' : ''}}">
                <a href="/route">
                    <i class='bx bx-chart icon'></i>
                    <span class="link_name">Title</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/route">Title</a></li>
                </ul>
            </li>
        @endif 
        --}}

        @if(Auth::user()->role == 0)
        <li class="{{Request::segment(1) == 'permintaan'? 'active' : ''}} mt-2">
            <a href="/permintaan">
                <i class='bx bx-chart icon'></i>
                <span class="link_name">Permintaan Barang</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/permintaan">Permintaan Barang</a></li>
            </ul>
        </li>
        @endif
        @if(Auth::user()->role == 0)
        <li class="{{Request::segment(1) == 'stock'? 'active' : ''}}">
            <div class="iocn-link">
                <a href="/stock">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Stock Gudang</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name">Stock Gudang</a></li>
                <li><a href="/stock">Stock</a></li>
                <li><a href="/stock/income">Income</a></li>
                <li><a href="/stock/outcome">Outcome</a></li>
            </ul>
        </li>
        @endif
        @if(Auth::user()->role == 0)
        <li class="{{Request::segment(1) == 'gudang'? 'active' : ''}}">
            <div class="iocn-link">
                <a href="/gudang/item">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Item Gudang</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name">Item Gudang</a></li>
                <li><a href="/gudang/item">Item</a></li>
                <li><a href="/gudang/jenis">Jenis</a></li>
                <li><a href="/gudang/merk">Merk</a></li>
            </ul>
        </li>
        @endif


        {{-- ============== LOGOUT DAN BOTTOM SIDE BAR ================ --}}
        <li>
            <div class="sidebar-footer">
                <span class='bx bx-moon moon'></span>
                <span class="link_name">Dark mode</span>
                <ul class="sub-menu blank">
                    <li><a class="link_name">Dark Mode</a></li>
                </ul>
                <div class="toggle-switch" id="darklightButton">
                    <span class="switch"></span>
                </div>
            </div>        
        </li>
        
        <li>        
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="logout-footer">
                    <i class='bx bx-log-out icon'></i>
                    <span class="link_name">Logout</span>
                    <ul class="sub-menu logout-button">Logout</ul>
                </a>
            </form>   
        </li>

        

        {{-- ============== END LOGOUT DAN BOTTOM SIDE BAR ============== --}}
    </ul>
</div>