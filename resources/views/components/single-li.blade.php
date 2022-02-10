<li class="nav-item">
    <a href="{{ $route }}" class="nav-link {{ $activeClass }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            {{ $title }}
            {{ $slot }}
        </p>
    </a>
</li>
