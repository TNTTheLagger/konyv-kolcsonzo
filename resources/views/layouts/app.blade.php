<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    @yield('content')
</div>
</body>
</html>
