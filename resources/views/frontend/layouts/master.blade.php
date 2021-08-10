<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('frontend.layouts.head')
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="{{asset('frontend/assets/images/preloader.png')}}" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">
	
<!-- Header -->
@include('frontend.layouts.header')
<!--/ End Header -->
<!--====== App Content ======-->
  <div class="app-content">


@yield('content')

<!-- Start Footer Area -->
@include('frontend.layouts.footer')
<!-- /End Footer Area -->
@include('frontend.layouts.modal')
	
@include('frontend.layouts.script')
</body>
</html>