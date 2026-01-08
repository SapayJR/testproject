<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Mini CRM</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/stisla@2.3.0/assets/css/components.css">
</head>
<body>
<div id="app">
    <div class="main-wrapper">
        <nav class="navbar navbar-expand-lg main-navbar bg-primary">
            <ul class="navbar-nav mr-auto"><li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li></ul>
            <form method="POST" action="{{ route('logout') }}"> @csrf
                <button class="btn btn-danger btn-sm">Выйти</button>
            </form>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand"><a href="/">Mini CRM</a></div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Меню</li>
                    <li><a class="nav-link" href="{{ route('leads.index') }}"><i class="fas fa-columns"></i> <span>Лиды</span></a></li>
                </ul>
            </aside>
        </div>
        <div class="main-content">
            <section class="section">
                <div class="section-header"><h1>@yield('title')</h1></div>
                <div class="section-body">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
</div>
<!-- JS Scripts -->
<script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
<script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/stisla.js') }}"></script>
</body>
</html>
