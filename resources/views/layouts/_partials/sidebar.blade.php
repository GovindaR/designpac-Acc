<?php $url = explode("/", Request::url()); ?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" src="/assets/front/images/icon-user.png"
                                 width="50%"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">{{@Auth::user()->name}}</strong>
                             </span> <span class="text-muted text-xs block"> {!! @Auth::user()->roles()->first()->name !!}
                                    <b
                                            class="caret"></b></span></span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{url('logout')}}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="/assets/front/images/icon-user.png" alt="" width="100%">
                </div>
            </li>

            <li class="{{((@$url[3] == 'dashboard')||(@$url[3] == '')) ? 'active' : ''}}">
                <a title="Dashboard" href="{{url('')}}"><i class="fa fa-th-large"></i> <span
                            class="nav-label">Dashboard</span></a>
            </li>



            @if(Auth::user()->hasRole('administrator'))
                <li class="{{(@$url[3] == 'users') ? 'active' : ''}}">
                    <a title="Users" href="{{url('users')}}"><i class="fa fa-users"></i> <span
                                class="nav-label">Users</span></a>
                </li>
            @endif
            @if(Auth::user()->hasRole('administrator'))
                <li class="{{(@$url[4] == 'clients') ? 'active' : ''}}">
                    <a title="Clients" href="{{url('clients')}}"><i class="fa fa-user-plus"></i> <span
                                class="nav-label">Clients</span></a>
                </li>
            @endif
            @if(Auth::user()->hasRole('administrator'))
                <li class="{{(@$url[4] == 'tasks') ? 'active' : ''}}">
                    <a title="Users" href="{{url('tasks')}}"><i class="fa fa-pencil"></i> <span
                                class="nav-label">Tasks</span></a>
                </li>
            @endif

            <li class="">
                <a title="Logout" href="{{url('logout')}}"><i class="fa fa-sign-out"></i> <span
                            class="nav-label">Logout</span></a>
            </li>
        </ul>
    </div>
</nav>
