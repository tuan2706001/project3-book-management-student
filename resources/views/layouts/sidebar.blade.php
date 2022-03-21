<div class="sidebar" data-background-color="brown" data-active-color="danger">
<div class="sidebar-wrapper">
    <div class="user">
        <div class="info">
            <div class="photo">
                <img src="{{ asset ('assets') }}/img/Tún.png" />
            </div>

            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <span>
                    {{Session::get('stu_name')}}
                    <b class="caret"></b>
                </span>
            </a>
            <div class="clearfix"></div>

            <div class="collapse" id="collapseExample">
                <ul class="nav">
                    <li>
                        <a href="{{ route ('profile.index')}}">
                            <span class="sidebar-mini"></span>
                            <span class="sidebar-normal"><i class="fas fa-user-circle"></i>Xem thông tin cá nhân</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="nav">
        <li>
            <a href="{{route ('logout')}}">
                <i class="fas fa-sign-out-alt"></i>
                <p>Đăng xuất</p>
            </a>
        </li>
    </ul>
</div>
</div>