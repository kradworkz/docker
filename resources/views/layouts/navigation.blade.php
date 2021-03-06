<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="/home"  class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @if(Auth::user()->type == "Administrator")
                <li>
                    <a href="/researchers" class="waves-effect">
                    <i class='bx bxs-user-rectangle' ></i>
                        <span key="t-chat">Researchers</span>
                    </a>
                </li>
                <li>
                    <a href="/staffs" class="waves-effect">
                    <i class='bx bx-user-circle'></i>
                        <span key="t-chat">Staffs</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Apps</li>
                <li>
                    <a class="waves-effect">
                    <i class='bx bxs-school'></i>
                        <span key="t-chat">Oraganizations</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/institutions" key="t-login">Institutions</a></li>
                        <li><a href="/agencies" key="t-login-2">Agencies/Funders</a></li>
                        <li><a href="/consortiums" key="t-register">Consortiums</a></li>
                    </ul>
                </li>
             
                <li>
                    <a href="/dropdowns" class="waves-effect">
                    <i class='bx bx-list-ul'></i>
                        <span key="t-chat">Dropdowns</span>
                    </a>
                </li>
                @elseif(Auth::user()->type == "Consortium")
                <li>
                    <a href="/staffs" class="waves-effect">
                    <i class='bx bx-user-circle'></i>
                        <span key="t-chat">Staffs</span>
                    </a>
                </li>
                @elseif(Auth::user()->type == "Researcher" || Auth::user()->type == "Secretariat")
                <li>
                    <a href="/researches" class="waves-effect">
                    <i class='bx bxs-book'></i>
                        <span key="t-chat">Researches</span>
                    </a>
                </li>
                <li>
                    <a href="/research/add" class="waves-effect">
                    <i class='bx bx-book-add' ></i>
                        <span key="t-chat">Add Research</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>