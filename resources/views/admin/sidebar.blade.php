<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{request()->routeIs('admin.posts.index') ? 'active' : ''}}">
                    <a href="{{route('posts.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Postlar</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('admin.products.index') ? 'active' : ''}} ">
                    <a href="{{route('products.index')}}">
                        <i class="fas fa-pen-square"></i>
                        <p>Maxsulotlar</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>


