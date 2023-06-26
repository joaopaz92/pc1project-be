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
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list me-2"></i>Categories</a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{route('category-create')}}" class="dropdown-item">Add new category</a>
                <a href="{{route('categories-index')}}" class="dropdown-item">List of all categories</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-registered me-2"></i>Trademarks</a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{route('trademark-create')}}" class="dropdown-item">Add new trademark</a>
                <a href="{{route('trademarks-index')}}" class="dropdown-item">List of all trademark</a>
            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-bookmark me-2"></i>Models</a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{route('trademarkmodel-create')}}" class="dropdown-item">Add new model</a>
                <a href="{{route('trademarkmodels-index')}}" class="dropdown-item">List of all models</a>
            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Products</a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{route('product-create')}}" class="dropdown-item">Add new product</a>
                <a href="{{route('products-index')}}" class="dropdown-item">List of all products</a>
            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-id-badge me-2"></i>Class Sign-Ups</a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{route('lessons-index')}}" class="dropdown-item">List of all signups</a>
            </div>
        </div>

      <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a> -->
    </div>
</nav>
