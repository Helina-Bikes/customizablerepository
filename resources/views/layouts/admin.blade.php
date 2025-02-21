<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content ="{{csrf_token()}}">
    <title>@yield('title')</title>
    <!-- AdminLTE CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
   
</head>
<body class="sb-nav-fixed">
    @include('layouts.partials.navbar')

    <div id="layoutSidenav">

         <div id="layoutSidenav_nav">
         @include('layouts.partials.sidebar')
        </div>
        <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                    <div class="container-fluid px-4">
                    </div>
                </main>
           @include('layouts.partials.footer')
            </div>        


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
  
</body>
</html>
