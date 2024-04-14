<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item pt-2">
                <a href="{{ route('admin.main.index') }}" class="nav-link">
                    <i class="nav-icon  fa fa-house-chimney"></i>
                    <p>Главная</p>
                </a>
            </li>
            <li class="nav-item pt-2">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Пользователи</p>
                </a>
            </li>
            <li class="nav-item pt-2">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-list"></i>
                    <p>Категории</p>
                </a>
            </li>
            <li class="nav-item pt-2">
                <a href="{{ route('admin.tag.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-tag"></i>
                    <p>Тэги</p>
                </a>
            </li>
          
            <li class="nav-item pt-2">
                <a href="{{ route('admin.post.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-paste"></i>
                    <p>Посты</p>
                </a>
            </li>
          
        </ul>
    </div>
</aside>