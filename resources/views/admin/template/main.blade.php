<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default') | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/plugins/table/ui/trumbowyg.table.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="/admin">Blog</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <a href="/admin/users/{{ Auth::user()->id }}/profile">
          <img class="img-responsive img-rounded" src="/storage/avatars/{{ Auth::user()->avatar }}"
            alt="User picture">
          </a>
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong>{{ Auth::user()->name }}</strong>
          </span>
          <span class="user-role">{{ Auth::user()->type }}</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-dropdown active">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Articulos</span>
              <span class="badge badge-pill badge-warning">{{ $articles->count() }}</span>
            </a>
            <div class="sidebar-submenu" style="display:block;">
              <ul>
                <li>
                  <a href="{{ route('articles.index') }}">Listar articulos</a>
                </li>
                <li>
                  <a href="{{ route('articles.create') }}">Crear articulo</a>
                </li>
              </ul>
            </div>
          </li>

          @if(Auth::user()->admin())
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Usuarios</span>
              <span class="badge badge-pill badge-danger">{{ $users->count() }}</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="{{ route('users.index') }}">Listar usuarios</a>
                </li>
                <li>
                  <a href="{{ route('users.create') }}">Crear usuario</a> 
                </li>
              </ul>
            </div>
          </li>
          @endif

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>Categorias</span>
              <span class="badge badge-pill badge-success">{{ $categories->count() }}</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="{{ route('categories.index') }}">Listar categorias</a>
                </li>
                <li>
                  <a href="{{ route('categories.create') }}">Crear categoria</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Tags</span>
              <span class="badge badge-pill badge-info">{{ $tags->count() }}</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="{{ route('tags.index') }}">Listar tags</a>
                </li>
                <li>
                  <a href="{{ route('tags.create') }}">Crear tag</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Imagenes</span>
              <span class="badge badge-pill badge-secondary">{{ $images->count() }}</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="{{ route('admin.images.index') }}">Listar Imagenes</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Examples</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="{{ route('admin.auth.logout') }}">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  
  <main class="page-content">
    <div class="container-fluid">
    <section class="container">
    <div class="mb-3">
        @include('admin.template.layouts.nav')
    </div>
        @include('flash::message')
        @include('admin.template.layouts.errors')
        @yield('content') 
    </section>
    </div>
  </main>
  <!-- page-content" -->
</div>
    
<!-- Añadir los scripts a nuestra plantilla recordar que primero debe ir el archivo jquery y despues el de bootstrap para que funcione -->
    <script src="{{ asset('plugins/jquery/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/plugins/table/trumbowyg.table.min.js') }}"></script>
    <script>
        jQuery(function ($) {

        $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
        $(this)
        .parent()
        .hasClass("active")
        ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .parent()
        .removeClass("active");
        } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
        $(this)
        .parent()
        .addClass("active");
        }
        });

        $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
        });
        });
    </script>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
    @yield('js')
</body>
</html>