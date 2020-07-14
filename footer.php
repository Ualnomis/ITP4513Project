     <!-- footer -->
     <footer class="footer">
       <div class="container-fluid">
         <ul class="nav">
           <li class="nav-item">
             <a href="javascript:void(0)" class="nav-link">
               Lau Man Chun
             </a>
           </li>
           <li class="nav-item">
             <a href="javascript:void(0)" class="nav-link">
               Leung Tsz Ho
             </a>
           </li>
         </ul>
         <div class="copyright">
           ©
           <script>
             document.write(new Date().getFullYear())
           </script> made with by
           <a>Lau Man Chun Leung Tsz Ho</a>
         </div>
       </div>
     </footer>
     </div>
     </div>
     <div class="fixed-plugin">
       <div class="dropdown show-dropdown">
         <a href="#" data-toggle="dropdown">
           <i class="fa fa-cog fa-2x"> </i>
         </a>
         <ul class="dropdown-menu">
           <li class="header-title"> Sidebar Background</li>
           <li class="adjustments-line">
             <a href="javascript:void(0)" class="switch-trigger background-color">
               <div class="badge-colors text-center">
                 <span class="badge filter badge-primary active" data-color="primary"></span>
                 <span class="badge filter badge-info" data-color="blue"></span>
                 <span class="badge filter badge-success" data-color="green"></span>
               </div>
               <div class="clearfix"></div>
             </a>
           </li>
           <li class="adjustments-line text-center color-change">
             <span class="color-label">LIGHT MODE</span>
             <span class="badge light-badge mr-2"></span>
             <span class="badge dark-badge ml-2"></span>
             <span class="color-label">DARK MODE</span>
           </li>

         </ul>
       </div>
     </div>


     <!--   Core JS Files   -->
     <script src="./assets/js/core/jquery.min.js"></script>
     <script src="./assets/js/core/popper.min.js"></script>
     <script src="./assets/js/core/bootstrap.min.js"></script>
     <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
     <!-- Chart JS -->
     <script src="./assets/js/plugins/chartjs.min.js"></script>
     <!--  Notifications Plugin    -->
     <script src="./assets/js/plugins/bootstrap-notify.js"></script>
     <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
     <script src="./assets/js/black-dashboard.min.js?v=1.0.0"></script>
     <script>
       $(document).ready(function() {
         $().ready(function() {
           $sidebar = $('.sidebar');
           $navbar = $('.navbar');
           $main_panel = $('.main-panel');

           $full_page = $('.full-page');

           $sidebar_responsive = $('body > .navbar-collapse');
           sidebar_mini_active = true;
           white_color = false;

           window_width = $(window).width();

           fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



           $('.fixed-plugin a').click(function(event) {
             if ($(this).hasClass('switch-trigger')) {
               if (event.stopPropagation) {
                 event.stopPropagation();
               } else if (window.event) {
                 window.event.cancelBubble = true;
               }
             }
           });

           $('.fixed-plugin .background-color span').click(function() {
             $(this).siblings().removeClass('active');
             $(this).addClass('active');

             var new_color = $(this).data('color');

             if ($sidebar.length != 0) {
               $sidebar.attr('data', new_color);
             }

             if ($main_panel.length != 0) {
               $main_panel.attr('data', new_color);
             }

             if ($full_page.length != 0) {
               $full_page.attr('filter-color', new_color);
             }

             if ($sidebar_responsive.length != 0) {
               $sidebar_responsive.attr('data', new_color);
             }
           });

           $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
             var $btn = $(this);

             if (sidebar_mini_active == true) {
               $('body').removeClass('sidebar-mini');
               sidebar_mini_active = false;
               blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
             } else {
               $('body').addClass('sidebar-mini');
               sidebar_mini_active = true;
               blackDashboard.showSidebarMessage('Sidebar mini activated...');
             }

             // we simulate the window Resize so the charts will get updated in realtime.
             var simulateWindowResize = setInterval(function() {
               window.dispatchEvent(new Event('resize'));
             }, 180);

             // we stop the simulation of Window Resize after the animations are completed
             setTimeout(function() {
               clearInterval(simulateWindowResize);
             }, 1000);
           });

           $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
             var $btn = $(this);

             if (white_color == true) {

               $('body').addClass('change-background');
               setTimeout(function() {
                 $('body').removeClass('change-background');
                 $('body').removeClass('white-content');
               }, 900);
               white_color = false;
             } else {

               $('body').addClass('change-background');
               setTimeout(function() {
                 $('body').removeClass('change-background');
                 $('body').addClass('white-content');
               }, 900);

               white_color = true;
             }


           });

           $('.light-badge').click(function() {
             $('body').addClass('white-content');
           });

           $('.dark-badge').click(function() {
             $('body').removeClass('white-content');
           });
         });
       });
     </script>
     <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
     <script>
       window.TrackJS &&
         TrackJS.install({
           token: "ee6fab19c5a04ac1a32a645abde4613a",
           application: "black-dashboard-free"
         });
     </script>


     <!-- order price calculate script -->
     <script>
       $(document).ready(function() {
         $.ajaxSetup({
           cache: false
         });
         load_consignmentstore_shop();
         load_consignmentstore_product();
         // everything here will be executed once index.html has finished loading, so at the start when the user is yet to do anything.
         $("#shopidSelector").load(load_consignmentstore_shop());
         $("#shopidSelector").change(load_consignmentstore_shop()); //this translates to: "when the element with id='select1' changes its value execute load_new_content() function"
         $("#cidSelector").change(load_consignmentstore_shop());
       });

       function load_consignmentstore_shop() {
         var selected_option_value = $("#shopidSelector option:selected").val(); //get the value of the current selected option.

         $.post("includes/searchstore.inc.php", {
             option_value: selected_option_value
           },
           function(data) { //this will be executed once the `script_that_receives_value.php` ends its execution, `data` contains everything said script echoed.
             $("#cidSelector").html(data);
             load_consignmentstore_product();
             // alert(data); //just to see what it returns
           }
         );
       }

       function load_consignmentstore_product() {
         var selected_option_value = $("#cidSelector option:selected").val(); //get the value of the current selected option.

         $.post("includes/loadProduct.inc.php", {
             option_value: selected_option_value
           },
           function(data) { //this will be executed once the `script_that_receives_value.php` ends its execution, `data` contains everything said script echoed.
             $("#tbodyProduct").html(data);
             // alert(data); //just to see what it returns
           }
         );
       }
     </script>

     <script>
       function calculateAmount(val, price, id) {
         var divobj = document.getElementById(id);
         var originValue = parseFloat(divobj.value);

         var tot_price = val * price;
         /*display the result*/

         if (originValue >= tot_price) {
           calculateTotal((originValue - tot_price), 1);
         } else {
           calculateTotal((tot_price - originValue), 0);
         }
         divobj.value = tot_price;
       }

       function calculateTotal(price, change) {
         var divobj = document.getElementById('totalPrice');
         /*display the result*/
         if (change == 0) {
           totalprice = parseFloat(divobj.value) + price;
           divobj.value = totalprice;
         } else {
           totalprice = parseFloat(divobj.value) - price;
           divobj.value = totalprice;
         }
       }
     </script>
     </body>

     </html>