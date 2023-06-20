<!DOCTYPE html>
<html>
<head>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

  <!-- Include SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

  <style>
 <style>
 <style>
    body {
        background: url('{{ asset('storage/images/1.jpg') }}') no-repeat;
        background-size: cover;
    }
</style>

  </style>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Visitors</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        @auth
        <li class="nav-item"><a href="/visitor">Add Visitors</a></li>
        @can('admin')
        <li class="nav-item"><a href="/admin">Admin Dashboard</a></li>
        @endcan
        <li class="nav-item"><a href="#">Welcome {{ auth()->user()->name }}</a></li>
        <li class="nav-item">
          <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn btn-link">Log Out</button>
          </form>
        </li>
      </ul>
      @else
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      @endauth
    </div>
  </nav>

  @yield('content')

  <!-- Include SweetAlert JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

  <!-- Include Bootstrap JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Add the following script -->
  @include('sweetalert::alert')
</body>
</html>
