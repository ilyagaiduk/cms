<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('getDashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">MP3api Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open active">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Настройка
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('configDomain')}}" class="nav-link @if(url()->current() == route('configDomain')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Домены</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configResults')}}" class="nav-link @if(url()->current() == route('configResults')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Настройка выдачи</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configCdn')}}" class="nav-link @if(url()->current() == route('configCdn')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CDN настройки</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configHeaders')}}" class="nav-link @if(url()->current() == route('configHeaders')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Заголовки</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configSystem')}}" class="nav-link @if(url()->current() == route('configSystem')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Системные настройки</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open active">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            SEO
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('configMainPage')}}" class="nav-link @if(url()->current() == route('configMainPage')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Главная страница</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configAuthorPage')}}" class="nav-link @if(url()->current() == route('configAuthorPage')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Страница автора</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configSearchPage')}}" class="nav-link @if(url()->current() == route('configSearchPage')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Страница поиска</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configNewSearchPage')}}" class="nav-link @if(url()->current() == route('configNewSearchPage')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Страница нового поиска</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('configSeoTrackPage')}}" class="nav-link @if(url()->current() == route('configSeoTrackPage')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Страница трека</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open active">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Справочники
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('getConfigPrefixSearch') }}" class="nav-link @if(url()->current() == route('getConfigPrefixSearch')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Префиксы поиска</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getConfigPrefixTrack') }}" class="nav-link @if(url()->current() == route('getConfigPrefixTrack')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Префиксы трека</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getConfigPostfix') }}" class="nav-link @if(url()->current() == route('getConfigPostfix')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Постфиксы</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getConfigSeparator') }}" class="nav-link @if(url()->current() == route('getConfigSeparator')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Разделители</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getConfigHRelated') }}" class="nav-link @if(url()->current() == route('getConfigHRelated')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Заголовки похожих</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getConfigHTrack') }}" class="nav-link @if(url()->current() == route('getConfigHTrack')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Заголовки трека</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getConfigHSearch') }}" class="nav-link @if(url()->current() == route('getConfigHSearch')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Заголовки поиска</p>
                            </a>
                        </li>
                    </ul>
                </li>


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

