<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Login</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row"  style="min-height:1000px;">
            <div class="col-md-2 nav-menu pr-0 pl-0" >
                <ul>
                    <li class="mt-3"><a class="text-light" href="">Admin</a></li>
                    <li class="mt-5"><a class="text-light" href="">List admin</a></li>
                    <li class="mt-3"><a class="text-light" href="">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>