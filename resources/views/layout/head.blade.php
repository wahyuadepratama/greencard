<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
       <title> @yield('title')</title>
       <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <!-- Bootstap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <!-- Optional CSS -->
       <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
       <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

     @yield('content-layout')


     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <!-- Optional JavaScript -->
     <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
     <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" charset="utf-8"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" charset="utf-8"></script>
     <!-- Latest compiled and minified CSS -->
     <!-- <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.3/dist/bootstrap-table.min.css"> -->

     <!-- Latest compiled and minified JavaScript -->
     <!-- <script src="https://unpkg.com/bootstrap-table@1.15.3/dist/bootstrap-table.min.js"></script> -->
     <!-- Latest compiled and minified Locales -->
     <!-- <script src="https://unpkg.com/bootstrap-table@1.15.3/dist/locale/bootstrap-table-zh-CN.min.js"></script> -->

     <script>
       $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
       });
     </script>

     <script>
       // if ($(window).width() < 768) {
       //    document.getElementById("greencard-mobileview").style.display="block"
       //     document.getElementById("greencard-webview").style.display="none"
       // }else{
       //   document.getElementById("greencard-webview").style.display="block"
       //   document.getElementById("greencard-mobileview").style.display="none"
       // }
       //var tab = document.getElementById("open-status").style.display = "block";


        function openCity(evt, tabName) {
          var i, tabcontent, tablinks,tabid;

            if ($(window).width() < 991) {
                tabid = document.getElementById("greencard-mobileview");
                tabid.display = "block";
                document.getElementById("greencard-webview").display="none";
                tabcontent = tabid.getElementsByClassName("tabcontent-mobile");

            }else{
               tabid = document.getElementById("greencard-webview");
               tabid.display = "block";
               document.getElementById("greencard-mobileview").display="none";
               tabcontent = tabid.getElementsByClassName("tabcontent");

            }
            for (i = 0; i < tabcontent.length; i++) {
               console.log(tabcontent[i].id);
               tabcontent[i].style.display = "none";
            }
            var header = document.getElementById("tabs-history");
            var child = header.getElementsByClassName("nav-item")
            var tablinks = header.getElementsByClassName("nav-link");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            var id= document.getElementById(tabName).id;
            console.log("SKRG INI "+id);
            document.getElementById(tabName).style.display = "block !important";
            evt.currentTarget.className += " active";
            //document.getElementById(tabName).style.display = "block";
            if (tabName == "open-status") {
               tabcontent[0].style.display = "block";
              tabcontent[1].style.display  = "none";
            }
            else{
               tabcontent[1].style.display= "block";
                tabcontent[0].style.display = "none";
            }
            //console.log(id);

        }


    </script>

    <script type="text/javascript">
    $('.datepicker').datepicker({
        startDate: '-3d'
    });
     </script>
     <script>
         $('#datepicker').datepicker({
             uiLibrary: 'bootstrap4'
         });



     </script>

     <script type="text/javascript">
     $(document).ready(function() {

       // inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
       $('.table-responsive-stack').find("th").each(function (i) {

          $('.table-responsive-stack td:nth-child(' + (i) + ')').css({ 'font-weight': 'bold'});;
          $('.table-responsive-stack-thead').hide();
       });

      $( '.table-responsive-stack' ).each(function() {
      var thCount = $(this).find("th").length;
       var rowGrow = 100 / thCount + '%';
       //console.log(rowGrow);
       $(this).find("th, td").css('flex-basis', rowGrow);
      });

      function flexTable(){
       if ($(window).width() < 768) {
            $(".greencard-mobileview").show();
           $(".table-responsive-stack").each(function (i) {
              $(this).find(".table-responsive-stack-thead").show();
              $(this).find('thead').hide();
           });

           // window is less than 768px
           } else {

           $(".table-responsive-stack").each(function (i) {
              $(this).find(".table-responsive-stack-thead").hide();
              $(this).find('thead').hide();
           });
             }
          // flextable
        }

          flexTable();

          window.onresize = function(event) {
            flexTable();
          };
          // document ready
          });
          $(document).ready(function() {
              $('#open-table-data').DataTable();
          } );
          $(document).ready(function() {
              $('#close-table-data').DataTable();
          } );


     </script>
    @yield('js-chart')
   </body>
</html>
