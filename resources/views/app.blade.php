<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyApp')</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; color: #111827; }
        nav { background: #1f2937; padding: 0 24px; display: flex; align-items: center; justify-content: space-between; height: 56px; }
        nav .left a { color: #d1d5db; text-decoration: none; margin-right: 20px; font-size: 15px; }
        nav .left a:hover, nav .left a.active { color: #fff; }
        nav .brand { color: #fff; font-weight: bold; margin-right: 30px; }
        nav .right { color: #d1d5db; font-size: 14px; display: flex; align-items: center; gap: 12px; }
        nav .right button { background: #dc2626; color: #fff; border: 0; padding: 7px 14px; border-radius: 6px; cursor: pointer; }
        .container { max-width: 900px; margin: 30px auto; padding: 0 16px; }
        .box { background: #fff; padding: 24px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,.06); }
        h2 { margin-top: 0; }
        .stats { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 20px; }
        .stat { flex: 1; min-width: 180px; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,.06); }
        .stat .num { font-size: 32px; font-weight: bold; }
        .btn { display: inline-block; background: #2563eb; color: #fff; padding: 9px 16px; border-radius: 6px; text-decoration: none; border: 0; cursor: pointer; font-size: 14px; }
        .btn:hover { background: #1d4ed8; }
        .btn-green { background: #16a34a; } .btn-green:hover { background: #15803d; }
        .btn-red { background: #dc2626; } .btn-red:hover { background: #b91c1c; }
        .btn-gray { background: #6b7280; } .btn-gray:hover { background: #4b5563; }
        .btn-sm { padding: 5px 10px; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid #e5e7eb; font-size: 14px; vertical-align: top; }
        th { background: #f9fafb; }
        .badge { padding: 3px 9px; border-radius: 20px; font-size: 12px; }
        .badge.pending { background: #fef3c7; color: #92400e; }
        .badge.completed { background: #d1fae5; color: #065f46; }
        .actions { display: flex; gap: 6px; flex-wrap: wrap; }
        .actions form { margin: 0; }
        label { display: block; margin: 14px 0 6px; font-size: 14px; }
        input[type=text], input[type=date], textarea, select { width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; font-family: inherit; }
        .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
        .alert { background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 6px; margin-bottom: 16px; }
        .top { display: flex; justify-content: space-between; align-items: center; }
        .empty { text-align: center; color: #6b7280; padding: 30px 0; }
        .pagination { display: flex; gap: 6px; list-style: none; padding: 0; margin: 20px 0 0; flex-wrap: wrap; }
        .page-link { display: block; padding: 6px 12px; border: 1px solid #d1d5db; border-radius: 6px; color: #2563eb; text-decoration: none; font-size: 14px; background: #fff; }
        .page-item.active .page-link { background: #2563eb; color: #fff; border-color: #2563eb; }
        .page-item.disabled .page-link { color: #9ca3af; }
        .filters { display: flex; gap: 10px; margin-top: 14px; flex-wrap: wrap; }
        .filters input[type=text] { flex: 2; min-width: 180px; }
        .filters select { flex: 1; min-width: 140px; }
    </style>
</head>
<body>
    <nav>
        <div class="left">
            <span class="brand">MyApp</span>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('tasks.index') }}" class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}">Tasks</a>
        </div>
        <div class="right">
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>