<nav class="navbar-sidebar">
    <ul class="list-unstyled navbar__list">
        <li class="{{ Request::is('admin') ? 'active' : '' }}">
            <a href="/admin">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        <li class="{{ Request::is('admin/product*') ? 'active' : '' }}">
            <a href="/admin/product">
                <i class="fa fa-cube" aria-hidden="true"></i>
                Produk
            </a>
        </li>
        <li class="{{ Request::is('admin/category') ? 'active' : '' }}">
            <a href="/admin/category">
                <i class="fa fa-tags" aria-hidden="true"></i>
                Kategori
            </a>
        </li>
    </ul>
</nav>
