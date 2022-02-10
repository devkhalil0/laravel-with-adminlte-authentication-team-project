<li class="mt-1 nav-item {{ $dropdownActive }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
        {{ $title }}
        <i class="fas fa-angle-left right"></i>
        <span class="badge badge-info right">{{ $dropdownAmount }}</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
