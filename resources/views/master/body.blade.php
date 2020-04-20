<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AppName - Dashboard</title>


  <link rel="icon" type="image/png" href="http://poscoictindonesia.co.id/img/icons/favicon.ico">

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sb2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="{{ asset('sb2/css/sb-admin-2.css') }}" rel="stylesheet">

</head>


        <!-- Begin Page Content -->
        <div class="container-fluid">

@yield('content')




 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('sb2/vendor/jquery/jquery.min.js') }}"></script>
 {{-- <script src="{{ asset('dist/jquery.min.js') }}"></script> --}}
 <script src="{{ asset('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <script src="{{ asset('dist/jquery.table2excel.js')}}"></script>
  <script>
var nowDate		= new Date();
var nowDay		= ((nowDate.getDate().toString().length) == 1) ? '0'+(nowDate.getDate()) : (nowDate.getDate());
var nowMonth	= ((nowDate.getMonth().toString().length) == 1) ? '0'+(nowDate.getMonth()+1) : (nowDate.getMonth()+1);
var nowYear		= nowDate.getFullYear();
var formatDate	= nowDay + "." + nowMonth + "." + nowYear;
var name = $('#namecok').text()



$(document).ready(function() {
	$('#Day').val(nowDay);
	$('#Month').val(nowMonth);
	$('#Year').val(nowYear);
	$('#Date').val(formatDate);
});

$('#tombol').click(function() {
       $('#table').table2excel({
        name: "Data ",
        filename: "Data " + formatDate+"-"+name+ ".xls",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true

       });
    });


  </script>
</body>
</html>
