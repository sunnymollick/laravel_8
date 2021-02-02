<!DOCTYPE html>
<html lang="en" dir="ltr">
  @include('admin.includes.head')


  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

              <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        @include('admin.includes.sidebar')



      <div class="page-wrapper">
                  <!-- Header -->
        @include('admin.includes.nav')


        <div class="content-wrapper">
          <div class="content">
              @yield('content')

            </div>
        </div>

        @include('admin.includes.footer')

      </div>
    </div>


    @include('admin.includes.scripts')
    @yield('scripts')




  </body>
</html>
