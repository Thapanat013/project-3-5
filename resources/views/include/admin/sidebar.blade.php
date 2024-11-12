<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
        <div class="sidebar-brand-icon">

        </div>
        <div class="sidebar-brand-text mx-3">ร้านกุ้งเผาเตาปูน</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.product.index') }}">
            <i class="fa fa-bars"></i>
            <span>รายการสินค้า</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.category.index') }}">
            <i class="fa fa-table"></i>
            <span>ประเภทสินค้า</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.order.index') }}">
            <i class="fa fa-sort"></i>
            <span>
                คำสั่งซื้อ
            </span>
        </a>
    </li>
    <!-- Divider -->


    <!-- Logout -->
    <li class="nav-item">

    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa fa-sign-out-alt"></i> ออกจากระบบ</button>
            </form>
    </li>

</ul>
<!-- End of Sidebar -->
<style>
  
</style>
