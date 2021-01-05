<?php 
$currentControllerName = Request::segment(1);
$currentFullRouteName = Route::getFacadeRoot()->current()->uri();
?>

<div class="sidebar" data-color="orange">
    
    
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            CT

        </a>
        <a href="" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ ($currentControllerName == 'dashboard') ? 'active' : '' }}">
                <a href="{{URL::to('/dashboard')}}">
                    <i class="now-ui-icons design_app"></i>
                    <p>@lang('eng.DASHBOARD')</p>
                </a>
            </li>
            <li class="{{ ($currentControllerName == 'userGroup') ? 'active' : '' }} ">
                <a href="{{URL::to('/userGroup')}}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <p>@lang('eng.USER_GROUP')</p>
                </a>
            </li>
            <li class="{{ ($currentControllerName == 'users') ? 'active' : '' }} ">
                <a href="{{URL::to('/users')}}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>@lang('eng.USERS')</p>
                </a>
            </li>
            <li class="{{ ($currentControllerName == 'academic') ? 'active' : '' }} ">
                <a href="{{URL::to('/academic')}}">
                    <i class="fas fa-book-reader"></i>
                    <p>@lang('eng.SET_ACADEMIC_BACKGROUND')</p>
                </a>
            </li>
            <li class=" {{ ($currentControllerName == 'categories') ? 'active' : '' }}">
                <a href="{{URL::to('/categories')}}">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    <p>@lang('eng.CATEGORIES')</p>
                </a>
            </li>
            <li class=" {{ ($currentControllerName == 'products') ? 'active' : '' }}">
                <a href="{{URL::to('/products')}}">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    <p>@lang('eng.PRODUCTS')</p>
                </a>
            </li>
            <li class="{{ ($currentControllerName == 'usertoproducts') ? 'active' : '' }} ">
                <a href="{{URL::to('/usertoproducts')}}">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <p>@lang('eng.USER_TO_PRODUCT')</p>
                </a>
            </li>
            <li class="{{ ($currentControllerName == 'productreport') ? 'active' : '' }} ">
                <a href="{{URL::to('/productreport')}}">
                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                    <p>@lang('eng.PRODUCT_REPORT')</p>
                </a>
            </li>
        </ul>
    </div>
</div>
