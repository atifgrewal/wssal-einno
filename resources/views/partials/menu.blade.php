<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full zhd-menu-logo h4" href="#">
        <img src="{{asset('images/logo_wssal.png')}}" alt="image">

        </a>
    </div>

    <ul class="c-sidebar-nav zhd-hover">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon"> -->
                                <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon"> -->
                                <i class="fas fa-circle c-sidebar-nav-icon" ></i>


                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-user c-sidebar-nav-icon"> -->
                                <i class="fas fa-circle c-sidebar-nav-icon" ></i>


                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('product_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/product-categories*") ? "c-show" : "" }} {{ request()->is("admin/sub-cats*") ? "c-show" : "" }} {{ request()->is("admin/product-tags*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/units*") ? "c-show" : "" }} {{ request()->is("admin/variations*") ? "c-show" : "" }} {{ request()->is("admin/attributes*") ? "c-show" : "" }} {{ request()->is("admin/attributedetails*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.productManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-folder c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.productCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sub_cat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sub-cats.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sub-cats") || request()->is("admin/sub-cats/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-cogs c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.subCat.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-folder c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.productTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('unit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.units.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/units") || request()->is("admin/units/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-chess-bishop c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.unit.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('variation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.variations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/variations") || request()->is("admin/variations/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-bullseye c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.variation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('attribute_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.attributes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/attributes") || request()->is("admin/attributes/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-at c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.attribute.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('attributedetail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.attributedetails.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/attributedetails") || request()->is("admin/attributedetails/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fab fa-amilia c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.attributedetail.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        
{{-- pos order --}}

@can('pos_order_access')
<li class="c-sidebar-nav-dropdown {{ request()->is("admin/product-categories*") ? "c-show" : "" }} {{ request()->is("admin/sub-cats*") ? "c-show" : "" }} {{ request()->is("admin/product-tags*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/units*") ? "c-show" : "" }} {{ request()->is("admin/variations*") ? "c-show" : "" }} {{ request()->is("admin/attributes*") ? "c-show" : "" }} {{ request()->is("admin/attributedetails*") ? "c-show" : "" }}">
    <a class="c-sidebar-nav-dropdown-toggle" href="#">
        <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

        </i>
        {{ trans('cruds.Pos Order.title') }}
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        @can('order_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.product-categorie.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "c-active" : "" }}">
                    <!-- <i class="fa-fw fas fa-folder c-sidebar-nav-icon"> -->

                    </i>
                    {{ trans('cruds.productCategory.title') }}
                </a>
            </li>
        @endcan


    </ul>
</li>
@endcan

{{-- end --}}


        @can('content_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/content-categories*") ? "c-show" : "" }} {{ request()->is("admin/content-tags*") ? "c-show" : "" }} {{ request()->is("admin/content-pages*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">  

                    </i>
                    {{ trans('cruds.contentManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('content_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-folder c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.contentCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-tags c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.contentTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                                <!-- <i class="fa-fw fas fa-file c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                                </i>
                                {{ trans('cruds.contentPage.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('order_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-first-order c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.posorder.title') }}
                </a>
            </li>
        @endcan

   {{-- ahsan --}}
   @can('content_management_access')
   <li class="c-sidebar-nav-dropdown {{ request()->is("admin/content-categories*") ? "c-show" : "" }} {{ request()->is("admin/content-tags*") ? "c-show" : "" }} {{ request()->is("admin/content-pages*") ? "c-show" : "" }}">
       <a class="c-sidebar-nav-dropdown-toggle" href="#">
           <i class="fa-fw fas fa-book c-sidebar-nav-icon">

           </i>
           {{ trans('cruds.orderManagement.title') }}
       </a>
       <ul class="c-sidebar-nav-dropdown-items">
           
           @can('content_category_access')
               <li class="c-sidebar-nav-item">
                   <a href="{{ route("admin.order_cancel") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "c-active" : "" }}">
                       <!-- <i class="fa-fw fas fa-folder c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                       </i>
                       {{ trans('cruds.orderCategory.title') }}
                   </a>
               </li>
           @endcan
           @can('content_tag_access')
               <li class="c-sidebar-nav-item">
                   <a href="{{ route("admin.order_pending") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "c-active" : "" }}">
                       <!-- <i class="fa-fw fas fa-tags c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                       </i>
                       {{ trans('cruds.orderTag.title') }}
                   </a>
               </li>
           @endcan
           @can('content_page_access')
               <li class="c-sidebar-nav-item">
                   <a href="{{ route("admin.order_confirmed") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                       <!-- <i class="fa-fw fas fa-file c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                       </i>
                       {{ trans('cruds.orderPage.title') }}
                   </a>
               </li>
           @endcan

           @can('content_page_access')
               <li class="c-sidebar-nav-item">
                   <a href="{{ route("admin.order_in_process") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                       <!-- <i class="fa-fw fas fa-file c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                       </i>
                       {{ trans('cruds.orderInProcess.title') }}
                   </a>
               </li>
           @endcan

           @can('content_page_access')
               <li class="c-sidebar-nav-item">
                   <a href="{{ route("admin.order_ready_delivery") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                       <!-- <i class="fa-fw fas fa-file c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                       </i>
                       {{ trans('cruds.orderReadydelivery.title') }}
                   </a>
               </li>
           @endcan

           @can('content_page_access')
           <li class="c-sidebar-nav-item">
               <a href="{{ route("admin.order_item_way") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                   <!-- <i class="fa-fw fas fa-file c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                   </i>
                   {{ trans('cruds.orderItemOnWay.title') }}
               </a>
           </li>
           @endcan

           @can('content_page_access')
           <li class="c-sidebar-nav-item">
               <a href="{{ route("admin.order_delivered") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                   <!-- <i class="fa-fw fas fa-file c-sidebar-nav-icon"> -->  <i class="fas fa-circle c-sidebar-nav-icon" ></i>

                   </i>
                   {{ trans('cruds.orderDelivered.title') }}
               </a>
           </li>
           @endcan
       </ul>
   </li>
@endcan
   {{-- ahsan --}}



        @can('vendor_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.vendors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vendors") || request()->is("admin/vendors/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.vendor.title') }}
                </a>
            </li>
        @endcan
        @can('driver_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.drivers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/drivers") || request()->is("admin/drivers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-dochub c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.driver.title') }}
                </a>
            </li>
        @endcan







      
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>
