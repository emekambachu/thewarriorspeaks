<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/logo.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('/dashboard/assets/css/bootstrap.min.css') }}"
          id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/dashboard/assets/css/app.min.css') }}"
          id="app-style" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div id="app" class="container">

        <admin-login></admin-login>

    </div>
</div>
<!-- end account-pages -->

<!-- JAVASCRIPT -->
<script src="{{ asset('/dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('/dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/dashboard/assets/libs/node-waves/waves.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('/dashboard/assets/js/app.js') }}"></script>
</body>

</html>
