<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, {{ $user->username }}!</h2>
    <p>Role: {{ $user->role }}</p>
    <a href="{{ url('/logout') }}">Logout</a>
</body>
</html>
