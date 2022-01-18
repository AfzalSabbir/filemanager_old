    @php($setting = session()->get('site_setting'))
    <!-- BEGIN BASE JS -->
    {{-- <script src="{{ asset('js/app_pre.js') }}"></script> --}}
    <script src="{{ asset('js/app.js?v=') }}"></script> <!-- END THEME JS -->
    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS --> --}}
    <!-- BEGIN PLUGINS JS -->
    <script src="{{ asset('vendor/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset('vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/flatpickr/flatpickr.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/lazyload/lazyload.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script> <!-- END PLUGINS JS --> --}}
    <script src="{{ asset('vendor/moment/min/moment.min.js') }}"></script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="{{ asset('javascript/theme.min.js') }}"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->

    <script src="/vendor/jstree/jstree.min.js"></script>

    {{-- <script src="{{ asset('javascript/pages/dashboard-demo.js') }}"></script> --}} <!-- END PAGE LEVEL JS -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170191538-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-170191538-1');
    </script>

    <script>
      lazyload();

      // Change title with online users
      //document.title = `(${_.trim(online_users_count.innerText)}) ${document.title}`;

      // Footer Visitors Container
      //footer_visitors_container.innerHTML = visitors_container.innerHTML;

      // Logout
      function logout(){
        document.getElementById('admin-logout').submit();
      }
    </script>
    <script>
      window.addEventListener("hashchange", function () {
        window.scrollTo(window.scrollX, window.scrollY - 64);
      });
    </script>
    {{-- <script>
      $('.dropdown-menu.dropdown-menu-rich').on('click', function(event){
        var events = $._data(document, 'events') || {};
        events = events.click || [];
        for(var i = 0; i < events.length; i++) {
          if(events[i].selector) {

            if($(event.target).is(events[i].selector)) {
              events[i].handler.call(event.target, event);
            }

            $(event.target).parents(events[i].selector).each(function(){
              events[i].handler.call(this, event);
            });
          }
        }
        event.stopPropagation();
      });
    </script> --}}
    <script>
      $(document).ready(function() {
        /*$('#toggle_option').click(function(event){
          $("#toggle_options").slideToggle('fast');
        });
        $('#more_search_option').click(function(event){
          $('#toggle_option').click();
        });*/
        $('.menu_show').fadeIn();
        $('.read_all').click(function(event){
          $(this).hide();
          $('#read_all').show();
          event.preventDefault()
        });
      });
      //console.log('%cDon\'t listen to anyone.\nThis place is only for developers.\nYour account might get hacked! ', 'font-weight: bold; color: red; font-size: 50px;');
    </script>
