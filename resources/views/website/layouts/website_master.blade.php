<!DOCTYPE html>
<html lang="en">

@include('website.includes.head')

<body>

  <!-- ======= Header ======= -->
  @include('website.includes.header')
  <!-- End Header -->

  <!-- ======= Slider Section ======= -->

  <!-- End Slider -->

  <main id="main">
      @yield('content')

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
   @include('website.includes.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    @include('website.includes.scripts')

</body>

</html>
