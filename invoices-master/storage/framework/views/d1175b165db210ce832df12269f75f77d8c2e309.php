<?php  if(session()->has('pending_nda')) {

?>
<div class="nda_notice"
     style="position:fixed; z-index:100000000000000000; width:100%; background:red; padding:10px;  bottom:0; text-align:center; color:#fff;">
    We have issued an updated version of our NDA. Please <a style="color:#999;" href="<?php echo e(route('signature.sign_nda')); ?>">click
        here</a> to view and sign the updated NDA ( <?php echo e(7-session('days_remaining')); ?> days remaining )
</div>
<?php ;}?>
<header class="m-grid__item    m-header " data-minimize-offset="200" data-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
            <!-- BEGIN: Brand -->
            <div class="m-stack__item m-brand  m-brand--skin-light ">
                <div class="m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="/" class="m-brand__logo-wrapper">
                            <img alt="" src="/images/logo.png" width="150"/>
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">

                        <!-- BEGIN: Left Aside Minimize Toggle -->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
                            <span></span>
                        </a>
                        <!-- END -->

                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                           class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->


                        <!-- BEGIN: Responsive Header Menu Toggler -->
                        <a id="m_aside_header_menu_mobile_toggle" style="display:none !important;" href="javascript:;"
                           class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->


                        <!-- BEGIN: Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                           class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>
                        <!-- BEGIN: Topbar Toggler -->
                    </div>
                </div>
            </div>
            <!-- END: Brand -->
            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                <!-- BEGIN: Horizontal Menu -->
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light "
                        id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>

                <div id="m_header_menu"
                     class="hide m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"
                            data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true"><a href="#"
                                                                                                          class="m-menu__link m-menu__toggle"><i
                                        class="m-menu__link-icon flaticon-add"></i><span class="m-menu__link-text">Actions</span><i
                                        class="m-menu__hor-arrow la la-angle-down"></i><i
                                        class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span
                                        class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true"><a
                                                href="?page=header/actions&demo=default" class="m-menu__link "><i
                                                    class="m-menu__link-icon flaticon-file"></i><span
                                                    class="m-menu__link-text">Create New Post</span></a></li>
                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                href="?page=header/actions&demo=default" class="m-menu__link "><i
                                                    class="m-menu__link-icon flaticon-diagram"></i><span
                                                    class="m-menu__link-title">  <span
                                                        class="m-menu__link-wrap">      <span class="m-menu__link-text">Generate Reports</span>      <span
                                                            class="m-menu__link-badge"><span
                                                                class="m-badge m-badge--success">2</span></span>  </span></span></a>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" data-menu-submenu-toggle="hover"
                                        data-redirect="true" aria-haspopup="true"><a href="#"
                                                                                     class="m-menu__link m-menu__toggle"><i
                                                    class="m-menu__link-icon flaticon-business"></i><span
                                                    class="m-menu__link-text">Manage Orders</span><i
                                                    class="m-menu__hor-arrow la la-angle-right"></i><i
                                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow "></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Latest Orders</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Pending Orders</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Processed Orders</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Delivery Reports</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Payments</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Customers</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" data-menu-submenu-toggle="hover"
                                        data-redirect="true" aria-haspopup="true"><a href="#"
                                                                                     class="m-menu__link m-menu__toggle"><i
                                                    class="m-menu__link-icon flaticon-chat-1"></i><span
                                                    class="m-menu__link-text">Customer Feedbacks</span><i
                                                    class="m-menu__hor-arrow la la-angle-right"></i><i
                                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow "></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Customer Feedbacks</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Supplier Feedbacks</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Reviewed Feedbacks</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Resolved Feedbacks</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Feedback Reports</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                href="?page=header/actions&demo=default" class="m-menu__link "><i
                                                    class="m-menu__link-icon flaticon-users"></i><span
                                                    class="m-menu__link-text">Register Member</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"
                            data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true"><a href="#"
                                                                                                          class="m-menu__link m-menu__toggle"><i
                                        class="m-menu__link-icon flaticon-line-graph"></i><span
                                        class="m-menu__link-text">Reports</span><i
                                        class="m-menu__hor-arrow la la-angle-down"></i><i
                                        class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left"
                                 style="width:1000px"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <div class="m-menu__subnav">
                                    <ul class="m-menu__content">
                                        <li class="m-menu__item"><h3 class="m-menu__heading m-menu__toggle"><span
                                                        class="m-menu__link-text">Finance Reports</span><i
                                                        class="m-menu__ver-arrow la la-angle-right"></i></h3>
                                            <ul class="m-menu__inner">
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-map"></i><span
                                                                class="m-menu__link-text">Annual Reports</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-user"></i><span
                                                                class="m-menu__link-text">HR Reports</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-clipboard"></i><span
                                                                class="m-menu__link-text">IPO Reports</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-graphic-1"></i><span
                                                                class="m-menu__link-text">Finance Margins</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-graphic-2"></i><span
                                                                class="m-menu__link-text">Revenue Reports</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="m-menu__item"><h3 class="m-menu__heading m-menu__toggle"><span
                                                        class="m-menu__link-text">Project Reports</span><i
                                                        class="m-menu__ver-arrow la la-angle-right"></i></h3>
                                            <ul class="m-menu__inner">
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                                class="m-menu__link-text">Coca Cola CRM</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                                class="m-menu__link-text">Delta Airlines Booking Site</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                                class="m-menu__link-text">Malibu Accounting</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                                class="m-menu__link-text">Vineseed Website Rewamp</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                                class="m-menu__link-text">Zircon Mobile App</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                                class="m-menu__link-text">Mercury CMS</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="m-menu__item"><h3 class="m-menu__heading m-menu__toggle"><span
                                                        class="m-menu__link-text">HR Reports</span><i
                                                        class="m-menu__ver-arrow la la-angle-right"></i></h3>
                                            <ul class="m-menu__inner">
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                                class="m-menu__link-text">Staff Directory</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                                class="m-menu__link-text">Client Directory</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                                class="m-menu__link-text">Salary Reports</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                                class="m-menu__link-text">Staff Payslips</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                                class="m-menu__link-text">Corporate Expenses</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                                                class="m-menu__link-text">Project Expenses</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="m-menu__item"><h3 class="m-menu__heading m-menu__toggle"><span
                                                        class="m-menu__link-text">Reporting Apps</span><i
                                                        class="m-menu__ver-arrow la la-angle-right"></i></h3>
                                            <ul class="m-menu__inner">
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Report Adjusments</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Sources & Mediums</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Reporting Settings</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Conversions</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Report Flows</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><span class="m-menu__link-text">Audit & Logs</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"
                            data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true"><a href="#"
                                                                                                          class="m-menu__link m-menu__toggle"><i
                                        class="m-menu__link-icon flaticon-paper-plane"></i><span
                                        class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span
                                                class="m-menu__link-text">Apps</span>      <span
                                                class="m-menu__link-badge"><span
                                                    class="m-badge m-badge--brand m-badge--wide">new</span></span>  </span></span><i
                                        class="m-menu__hor-arrow la la-angle-down"></i><i
                                        class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span
                                        class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                href="?page=header/actions&demo=default" class="m-menu__link "><i
                                                    class="m-menu__link-icon flaticon-business"></i><span
                                                    class="m-menu__link-text">eCommerce</span></a></li>
                                    <li class="m-menu__item  m-menu__item--submenu" data-menu-submenu-toggle="hover"
                                        data-redirect="true" aria-haspopup="true"><a
                                                href="?page=crud/datatable_v1&demo=default"
                                                class="m-menu__link m-menu__toggle"><i
                                                    class="m-menu__link-icon flaticon-computer"></i><span
                                                    class="m-menu__link-text">Audience</span><i
                                                    class="m-menu__hor-arrow la la-angle-right"></i><i
                                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow "></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-users"></i><span
                                                                class="m-menu__link-text">Active Users</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-interface-1"></i><span
                                                                class="m-menu__link-text">User Explorer</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-lifebuoy"></i><span
                                                                class="m-menu__link-text">Users Flows</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-graphic-1"></i><span
                                                                class="m-menu__link-text">Market Segments</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-graphic"></i><span
                                                                class="m-menu__link-text">User Reports</span></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                href="?page=header/actions&demo=default" class="m-menu__link "><i
                                                    class="m-menu__link-icon flaticon-map"></i><span
                                                    class="m-menu__link-text">Marketing</span></a></li>
                                    <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                href="?page=header/actions&demo=default" class="m-menu__link "><i
                                                    class="m-menu__link-icon flaticon-graphic-2"></i><span
                                                    class="m-menu__link-title">  <span
                                                        class="m-menu__link-wrap">      <span class="m-menu__link-text">Campaigns</span>      <span
                                                            class="m-menu__link-badge"><span
                                                                class="m-badge m-badge--success">3</span></span>  </span></span></a>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" data-menu-submenu-toggle="hover"
                                        data-redirect="true" aria-haspopup="true"><a href="#"
                                                                                     class="m-menu__link m-menu__toggle"><i
                                                    class="m-menu__link-icon flaticon-infinity"></i><span
                                                    class="m-menu__link-text">Cloud Manager</span><i
                                                    class="m-menu__hor-arrow la la-angle-right"></i><i
                                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                            <span class="m-menu__arrow "></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-add"></i><span
                                                                class="m-menu__link-title">  <span
                                                                    class="m-menu__link-wrap">      <span
                                                                        class="m-menu__link-text">File Upload</span>      <span
                                                                        class="m-menu__link-badge"><span
                                                                            class="m-badge m-badge--danger">3</span></span>  </span></span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-signs-1"></i><span
                                                                class="m-menu__link-text">File Attributes</span></a>
                                                </li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-folder"></i><span
                                                                class="m-menu__link-text">Folders</span></a></li>
                                                <li class="m-menu__item " data-redirect="true" aria-haspopup="true"><a
                                                            href="?page=header/actions&demo=default"
                                                            class="m-menu__link "><i
                                                                class="m-menu__link-icon flaticon-cogwheel-2"></i><span
                                                                class="m-menu__link-text">System Settings</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- END: Horizontal Menu -->                                <!-- BEGIN: Topbar -->
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">


                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                            <li class="hide
	m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light"
                                data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch"
                                data-search-type="dropdown">

                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon"><i class="flaticon-search-1"></i></span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner ">
                                        <div class="m-dropdown__header">
                                            <form class="m-list-search__form">
                                                <div class="m-list-search__form-wrapper">
						<span class="m-list-search__form-input-wrapper">
							<input id="m_quicksearch_input" autocomplete="off" type="text" name="q"
                                   class="m-list-search__form-input" value="" placeholder="Search...">
						</span>
                                                    <span class="m-list-search__form-icon-close"
                                                          id="m_quicksearch_close">
							<i class="la la-remove"></i>
						</span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true"
                                                 data-max-height="300" data-mobile-max-height="200">
                                                <div class="m-dropdown__content">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                             <li class="hide m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"
                                data-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                    <span class="m-nav__link-icon"><i class="flaticon-share"></i></span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center"
                                             style=" background-size: cover;">
                                            <span class="m-dropdown__header-title">Quick Actions</span>
                                            <span class="m-dropdown__header-subtitle">Shortcuts</span>
                                        </div>
                                        <div class="m-dropdown__body m-dropdown__body--paddingless">
                                            <div class="m-dropdown__content">
                                                <div class="m-scrollable" data-scrollable="false" data-max-height="380"
                                                     data-mobile-max-height="200">
                                                    <div class="m-nav-grid m-nav-grid--skin-light">
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-file"></i>
                                                                <span class="m-nav-grid__text">Generate Report</span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-time"></i>
                                                                <span class="m-nav-grid__text">Add New Event</span>
                                                            </a>
                                                        </div>
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                <span class="m-nav-grid__text">Create New Task</span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                <span class="m-nav-grid__text">Completed Tasks</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li id="m_quick_sidebar_toggle" class="hide m-nav__item">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon"><i class="flaticon-grid-menu"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Topbar -->            </div>
        </div>
    </div>

</header>
