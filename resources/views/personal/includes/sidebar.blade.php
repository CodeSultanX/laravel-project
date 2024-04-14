<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item pt-2">
                <a href="{{ route('personal.main.index') }}" class="nav-link">
                    <i class="nav-icon  fa fa-house-chimney"></i>
                    <p>Главная</p>
                </a>
            </li>
            <li class="nav-item pt-2">
                <a href="{{ route('personal.like.index') }}" class="nav-link">
                    <i class="nav-icon fa-regular fa-heart"></i>
                    <p>Понравшиеся посты</p>
                </a>
            </li>
            <li class="nav-item pt-2">
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    <i class="nav-icon fa-regular fa-comments"></i>
                    <p>Комментарий</p>
                </a>
            </li>
          
          
        </ul>
    </div>
</aside>