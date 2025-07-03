<div class="modal-menu" id="modal-menu">
    <a href="#!" class="modal-overlay"></a>
    <a href="#" class="close-button">
        <span class="close-icon">×</span>
    </a>
    <nav class="navigation">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>
            @if (Auth::check() && Auth::user()->role_id == 2)
            <li class="nav-item">
                <a href="{{ route('admin.register.owner') }}" class="nav-link">Registration</a>
            </li>
            @elseif (Auth::check() && Auth::user()->role_id == 3)
            <li class="nav-item">
                <a href="{{ route('owner.mypage') }}" class="nav-link">Shops</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('owner.shops.create') }}" class="nav-link">Create</a>
            </li>
            @endif
            @if (Auth::check())
            <li class="nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button class="nav-link logout-button">Logout</button>
                </form>
            </li>
            <li class="nav-item">
                <a href="{{ route('mypage') }}" class="nav-link">Mypage</a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Registration</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            @endif
        </ul>
    </nav>
</div>