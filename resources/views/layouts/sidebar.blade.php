<nav class="navbar bg-secondary navbar-dark">
    <a href="index.html" class="navbar-brand mx-4 mb-3">
        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>PC1st - BE </h3>
    </a>
    <div class="d-flex align-items-center ms-4 mb-4">
        <div class="ms-3">
            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
            <span>Admin</span>
        </div>
    </div>
    
    <div class="navbar-nav w-100">
        <a href="/dashboard" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Dashboard</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Categories</a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{route('category-create')}}" class="dropdown-item">Add new category</a>
                <a href="{{route('categories-index')}}" class="dropdown-item">List of all categories</a>
            </div>
        </div>
<!--         <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Products</a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="/product_type_ops" class="dropdown-item">Product Type</a>
                <a href="/product_ops" class="dropdown-item">Product</a>
            </div>
        </div> -->
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="button.html" class="dropdown-item">Buttons</a>
                <a href="typography.html" class="dropdown-item">Typography</a>
                <a href="element.html" class="dropdown-item">Other Elements</a>
            </div>
        </div>

        <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
    </div>
</nav>