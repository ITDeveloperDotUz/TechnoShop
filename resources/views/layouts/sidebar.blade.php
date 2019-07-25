@section('sidebar')
    <?php
    $uri = Route::current()->getName();
    $sidebar = true;
    ?>
    <nav id="sidebar" class="bg-dark active">
        <div class="sidebar-content">
            <div class="sidebar-header">
                <h3><a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }} - Credit Store
                    </a></h3>
                <strong>TS</strong>
            </div>
            <ul class="list-unstyled components">
                <li class="{{ $uri == 'clients.index' ? 'active' : '' }}">
                    <a href="#ClientsSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <strong class="sidebar-full"> Мижозлар </strong>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="ClientsSubmenu">
                        <li>
                            <a href="{{ route('clients.create') }}"><i class="fa fa-plus"></i> Янги мижоз</a>
                            <a href="{{ route('clients.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $uri == 'categories.index' ? 'active' : '' }}">
                    <a href="#CategoriesSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                        <strong class="sidebar-full"> Булимлар </strong>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="CategoriesSubmenu">
                        <li>
                            <a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> Янги Булим</a>
                            <a href="{{ route('categories.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $uri == 'products.index' ? 'active' : '' }}">
                    <a href="#productsSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-box"></i>
                        <strong class="sidebar-full"> Махсулотлар </strong>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="productsSubmenu">
                        <li>
                            <a href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Янги Махсулот</a>
                            <a href="{{ route('products.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $uri == 'product_incomes.index' ? 'active' : '' }}">
                    <a href="#prodInSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-edit"></i>
                        <strong class="sidebar-full"> Киримлар </strong>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="prodInSubmenu">
                        <li>
                            <a href="{{ route('product_incomes.create') }}"><i class="fa fa-plus"></i> Янги Кирим</a>
                            <a href="{{ route('product_incomes.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $uri == 'orders.index' ? 'active' : '' }}">
                    <a href="#ordersSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                        <strong class="sidebar-full"> Буюртмалар </strong>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="ordersSubmenu">
                        <li>
                            <a href="{{ route('orders.create') }}"><i class="fa fa-plus"></i> Янги Буюртма</a>
                            <a href="{{ route('orders.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $uri == 'payments.index' ? 'active' : '' }}">
                    <a href="#paymentsSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-money-check"></i>
                        <strong class="sidebar-full"> Туловлар </strong>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="paymentsSubmenu">
                        <li>
                            <a href="{{ route('payments.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                        </li>
                        <li>
                            <a href="{{ url('/payments/get/daily') }}"><i class="fa fa-bars"></i> Бугнги туловлар</a>
                        </li>
                        <li>
                            <a href="{{ url('/payments/get/expired') }}"><i class="fa fa-bars"></i> Туланмаган</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
@endsection