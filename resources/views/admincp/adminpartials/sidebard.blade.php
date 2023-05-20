
<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                    <span>
                        <button type="button"
                                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Menu</li>

                    <li class="mm-active">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-plugin"></i>Các ứng dụng
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="../../admin/user" class="{{(request()->segment(2)=='user')? 'mm-active':''}}">
                                    <i class="metismenu-icon"></i>Người dùng
                                </a>
                            </li>
                            <li>
                                <a href="../../admin/order" class="{{(request()->segment(2)=='order')? 'mm-active':''}}">
                                    <i class="metismenu-icon"></i>Đơn hàng
                                </a>
                            </li>
                            <li>
                                <a href="../../admin/product" class="{{(request()->segment(2)=='product')? 'mm-active':''}}">
                                    <i class="metismenu-icon"></i>Sản phẩm
                                </a>
                            </li>
                            <li>
                                <a href="../../admin/category" class="{{(request()->segment(2)=='category')? 'mm-active':''}}">
                                    <i class="metismenu-icon"></i>Loại
                                </a>
                            </li>
                            <li>
                                <a href="../../admin/dashboard" class="{{(request()->segment(2)=='dashboard')? 'mm-active':''}}">
                                    <i class="metismenu-icon"></i>Thống kê
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
