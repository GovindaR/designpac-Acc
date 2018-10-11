<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 10px">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href=""><i class="fa fa-bars"></i>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">

            <li>
                <a href="{!! url()->current() !!}">
                    <i class="fa fa-refresh"></i> Refresh
                </a>
            </li>

            <li>
                <a href="{{url('logout')}}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
            {{--<li>--}}
            {{--<a class="right-sidebar-toggle">--}}
            {{--<i class="fa fa-tasks"></i>--}}
            {{--</a>--}}
            {{--</li>--}}

        </ul>

    </nav>
</div>