<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyApp')</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; }
        .wrap { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .card { background: #fff; width: 100%; max-width: 400px; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,.08); }
        h2 { margin-top: 0; text-align: center; }
        label { display: block; margin: 14px 0 6px; font-size: 14px; }
        input[type=text], input[type=email], input[type=password] { width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; }
        button { width: 100%; margin-top: 20px; padding: 11px; background: #2563eb; color: #fff; border: 0; border-radius: 6px; font-size: 15px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
        .link { text-align: center; margin-top: 16px; font-size: 14px; }
        .link a { color: #2563eb; text-decoration: none; }
        .remember { display: flex; align-items: center; gap: 6px; margin-top: 12px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            @yield('content')
        </div>
    </div>
</body>
</html>