<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin-dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="/admin-dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item">
        <a href="#" class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-pen"></i>
            <span>Cadastros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin-dashboard/products">Produtos</a>
                <a class="collapse-item" href="/admin-dashboard/categories">Categorias</a>
                <a class="collapse-item" href="/admin-dashboard/users">Usuários</a>
                <a class="collapse-item" href="/admin-dashboard/roles">Tipos de usuários</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>