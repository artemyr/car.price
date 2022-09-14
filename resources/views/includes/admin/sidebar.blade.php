<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">ADMIN</li>
        <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Категории
                    <span class="badge badge-info right">?</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Посты
                    <span class="badge badge-info right">{{ isset($posts) ? $posts->total() : '?' }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.city.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Города
                    <span class="badge badge-info right">?</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
