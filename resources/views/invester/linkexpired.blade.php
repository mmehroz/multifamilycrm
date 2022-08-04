<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="CRM" />
    <meta name="viewport" content="CRM"/>
    <meta name="keywords" content="Multi Family CRM"/>
    <meta name="description"content="Multi Family CRM"/>
    <meta name="robots" content="noindex,nofollow" />
    <title>Multi Family CRM</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('public/assets/images/favicon.png') !!}"/>
    <link href="{!! asset('public/assets/libs/flot/css/float-chart.css') !!}" rel="stylesheet" />
    <link href="{!! asset('public/assets/dist/css/style.min.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="{!! asset('public/assets/libs/jquery/dist/jquery.min.js') !!}"></script>

    <style>
        .text-center {
        text-align: center!important;
        position: absolute;
        top: 30%;
        left: 40%;
        }
    </style>

  </head>
    <body>
        <div class ="page-wrapper align-middle">
            @if(session('message'))
                <div>
                    <p class="alert alert-success" >{{session('message')}}</p>
                </div>
            @endif
            <div class="image-box text-center">
                <img src="{!! asset('public/assets/images/expired.jpg') !!}" alt="user"/>
            </div>
        </div>
    </body>
   <footer>
    <p>copyright © <?php echo(date('Y'));?> All Rights Reserved</p>
    <script src="{!! asset('public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') !!}"></script>
    <script src="{!! asset('public/assets/extra-libs/sparkline/sparkline.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/waves.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/sidebarmenu.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/custom.min.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/excanvas.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.pie.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.time.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.stack.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot/jquery.flot.crosshair.js') !!}"></script>
    <script src="{!! asset('public/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') !!}"></script>
    <script src="{!! asset('public/assets/dist/js/pages/chart/chart-page-init.js') !!}"></script> 
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
   </footer> 
</html>
<!-- footer end -->
<script>
$(document).ready(function() {
  var table = $('#crm').DataTable( {
      rowReorder: {
          selector: 'td:nth-child(2)'
      },
      responsive: true
  });
});
</script>