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
<div class="wrapper" id="app">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href class>
        <img src="/image/logo/paris_logo.jpg" class="logi-admin" />
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex info">
          <div class="info">
            <a href="#" class="d-block">Name</a>
          </div>
        </div>
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users blue"></i>
                <p>
                  Quản trị viên
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview tree-left">
                <li class="nav-item">
                  <a class="nav-link">
                    <i class="fas fa-list-alt nav-icon yellow"></i>
                    <p>Danh sách quản lí</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book blue"></i>
                <p>
                  Tour Du Lịch
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview tree-left">
                <li class="nav-item">
                  <a  class="nav-link">
                    <i class="fas fa-map-marker nav-icon red"></i>
                    <p>Địa điểm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link">
                    <i class="fas fa-list nav-icon purple"></i>
                    <p>Tour</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link">
                    <i class="fas fa-shopping-cart nav-icon orange"></i>
                    <p>Phiếu đặt</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0 text-dark">
                <i>Travel</i>
              </h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                @yield('content')
                </div>
          </div>
        </div>
      </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <footer class="main-footer">
      <div class="float-right d-none d-sm-inline">Anything you want</div>
      <strong>Nguyễn Minh Hiếu</strong> All rights reserved.
    </footer>
  </div>
</body>
</html>