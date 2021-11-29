<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
<!-- logout buibui -->
 <link href="https://fonts.googleapis.com/css?family=Dosis:700" rel="stylesheet">
  
<style>
  
.underlined-a {
  text-decoration: none;
  color: aqua;
  padding-bottom: 0.15em;
  box-sizing: border-box;
  box-shadow: inset 0 -0.2em 0 aqua;
  transition: 0.2s;
  &:hover {
    color: #222;
    box-shadow: inset 0 -2em 0 aqua;
    transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
  }
}

.brk-btn {
  margin-left:70px;
  position: relative;
  background: none;
  color: aqua;
  text-transform: uppercase;
  text-decoration: none;
  border: 0.2em solid aqua;
  padding: 0.3em 1em;
  &::before {
    content: "";
    display: block;
    position: absolute;
    width: 10%;
    background: #222;
    height: 0.3em;
    right: 20%;
    top: -0.21em;
    transform: skewX(-45deg);
    -webkit-transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
    transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
  }
  &::after {
    content: "";
    display: block;
    position: absolute;
    width: 10%;
    background: #222;
    height: 0.3em;
    left: 20%;
    bottom: -0.25em;
    transform: skewX(45deg);
    -webkit-transition: all 0.45 cubic-bezier(0.86, 0, 0.07, 1);
    transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
  }
  &:hover {
    &::before {
      right: 80%;
    }
    &::after {
      left: 80%;
    }
  }
}
</style>
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('partials.header')
  <!-- /.navbar -->

  @include('partials.sidebar')

   @yield('content')
  <!-- Main Footer -->
  @include('partials.footer')
</div>

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>


<!-- ChartJS -->
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

  <!-- /.content-wrapper -->

</body>
@yield('js'))
</html>
