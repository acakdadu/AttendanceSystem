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

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-file-medical-alt"></i>
        </div>
        <div class="sidebar-brand-text ml-2">nCOV-19 CHECK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard/employees') }}">
          <i class="fas fa-users fa-table"></i>
          <span>Data Employees</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Configuration
      </div>


      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-cog"></i>
          <span>Application Setting</span></a>
      </li>


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <li class="align-middle py-4">
              <img src="{{ asset('assets/images/withposco.gif')}}" alt="With Posco Icon" width="120">
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{ asset('assets/images/presdir.png') }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">

            <!-- Filter by Date -->
            <div class="col-md-12 mb-2">
              <div class="card shadow">
                <div class="card-header py-3" > <!-- style="background-color: #ffeaa7" -->
                  <h6 class="m-0 font-weight-bold text-dark" id="filterSet" style="cursor: pointer;">Filter by Date <span class="font-weight-normal"><!-- (14-04-2020 ~ 18-04-2020) --></span> <i class="fas fa-chevron-circle-down"></i></h6>
                </div>
                <div class="card-body" style="display: none" id="filterForm">

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Company</label>
                        <select class="custom-select" disabled>
                          <option value="ict">PT POSCO ICT-INDONESIA</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Department will be updated after selected.</small>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <label for="exampleInputPassword1">Department:</label>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck2" disabled>
                          <label class="custom-control-label" for="customCheck2">Central Maintenance</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1" disabled>
                          <label class="custom-control-label" for="customCheck1">Facility Control</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck3" checked onclick="return false;"/>
                          <label class="custom-control-label" for="customCheck3">IT</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <label for="exampleInputPassword1">Team:</label>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input teamChecks" id="checkInfra" checkeda>
                          <label class="custom-control-label" for="checkInfra" checked>Infra</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input teamChecks" id="checkMes" checkeda>
                          <label class="custom-control-label" for="checkMes" checked>MES</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input teamChecks" id="checkPC" checkeda>
                          <label class="custom-control-label" for="checkPC" checked>PC</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-row">
                        <div class="col">
                          <label for="inputEmail4">Start Date</label>
                          <input type="date" class="form-control rangeDate" id="startDate">
                        </div>
                        <div class="col">
                          <label for="inputEmail4">End Date</label>
                          <input type="date" class="form-control rangeDate" id="endDate">
                        </div>
                      </div>

                      <div class="form-group mt-2">
                        <label for="exampleInputPassword1">Filter Days Type:</label>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                          <label class="custom-control-label" for="customSwitch1">Including Weekends</label>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-success disabled" disabled id="applyFilter" style="cursor: no-drop">Apply</button>

                  </div>

                </div>
              </div>
<!--
              <div class="alert alert-secondary mt-3" role="alert">
                <h4 class="alert-heading">Sorry, Nothing Data!</h4>
                <p>Please check at your filter date, maybe have a small wrong.</p>
                <hr>
                <p class="mb-0">Any question about this : devs@poscoictindonesia.co.id</p>
              </div> -->
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Healthly Employees (Today)</div> <!-- style="/* color: #b0b0b0 !important */" -->
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $healthyemp_good }} of {{count($totalemp)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-heart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sick Employees (Today)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $healthyemp_sick }} of {{count($totalemp)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clinic-medical fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2"> <!--  style="/* border-color: #b0b0b0 !important */" -->
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Leave Home (Today)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">12 of 424</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-car-side fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Employees</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($totalemp)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-md-12 mb-4">
              <div class="card shadow">
                <div class="card-body overflow-auto" id="loadPage">
                  <h5 class="text-center mb-2 text-dark"><i class="fas fa-list-alt"></i> Health condition and Visit place of Employees and Families</h5>

                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">68%</div>
                  </div>
                  <code class="text-right m-0 mt-1 mb-3 text-muted d-block">On Progress ..</code>
                  <table class="table table-bordered table-sm text-dark" id="table">
{{-- <table class="table2excel" data-tableName="Test Table 1"> --}}
                    <thead>
                      <tr style="background: #E5F8FF">
                        <th scope="col" class="text-center align-middle" rowspan="2" width="25%">Team</th>
                        <th scope="col" class="text-center align-middle" rowspan="2">Submit</th>
                        <th scope="col" class="text-center align-middle" rowspan="2">No Employees</th>
                        <th scope="col" class="text-center align-middle" rowspan="2">No. Family</th>
                        <th scope="col" class="text-center align-middle" colspan="3">Health (KP)</th>
                        <th scope="col" class="text-center align-middle" rowspan="2">Visit to other city</th>
                        <th scope="col" class="text-center align-middle" colspan="3">Health (Familty)</th>
                        <th scope="col" class="text-center align-middle" rowspan="2">Visit to other city</th>
                      </tr>
                      <tr style="background: #CCF2FF">
                        <th scope="col" class="text-center align-middle">Fever</th>
                        <th scope="col" class="text-center align-middle">Cough</th>
                        <th scope="col" class="text-center align-middle">Flu</th>
                        <th scope="col" class="text-center align-middle">Fever</th>
                        <th scope="col" class="text-center align-middle">Cough</th>
                        <th scope="col" class="text-center align-middle">Flu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#" class="text-dark detail" page="infra">INFRA</a></th>
                        <td class="text-center align-middle" style="font-size: 12px;"><i class="far fa-circle"></i></td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#" class="text-dark detail" page="pc">PC</a></th>
                        <td class="text-center align-middle" style="font-size: 12px;"><i class="far fa-circle"></i></td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#" class="text-dark detail" page="mes">MES</a></th>
                        <td class="text-center align-middle" style="font-size: 12px;"><i class="far fa-circle"></i></td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="font-italic text-info">*Last updated: 23:50 17/04/2020</p>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="#"id="tombol" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export to Excel</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-lg-12 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="progress" style="height: 1px;">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress mt-2" style="height: 20px;">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">27%</div>
                  </div>
                  <code class="text-muted m-0 mt-2">Data Submitted Progress</code>
                </div>
              </div>
            </div> -->

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Last Activity</h6>
                </div>
                <div class="card-body">
                  <ul class="m-0">

                    <li class="text-sm">Rudi Hikmatullah <span class="text-info">updated health for today</span> [2020-04-10 17:04:36]</li>
                    <li class="text-sm">Budiman Ananda <span class="text-info">updated health for today</span> [2020-04-10 17:04:36]</li>
                    <li class="text-sm">Median Setya Pra <span class="text-info">updated health for today</span> [2020-04-10 17:04:36]</li>
                    <li class="text-sm">Tedi Bramantyo <span class="text-danger">Request rest for sick for today</span> [2020-04-10 17:04:36]</li>
                    <li class="text-sm">Gawang Prabowo <span class="text-info">updated health for today</span> [2020-04-10 17:04:36]</li>
                    <li class="text-sm">Putri Angsa Mas <span class="text-info">updated health for today</span> [2020-04-10 17:04:36]</li>
                    <li class="text-sm">Nadya Putri Synhitia <span class="text-info">updated health for today</span> [2020-04-10 17:04:36]</li>
                  </ul>

                </div>
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">What is a coronavirus?</h6>
                </div>
                <div class="card-body">
                  <p>Coronaviruses are a large family of viruses that are known to cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS) and Severe Acute Respiratory Syndrome (SARS)</p>
                  <a target="_blank" rel="nofollow" href="https://who.sprinklr.com/">More information in Globally &rarr;</a>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Created by <a href="http://poscoictindonesia.co.id/" target="_blank" class="text-muted text-decoration-none">POSCO ICT-INDONESIA</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="signout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('dist/jquery.min.js') }}"></script>
  <script src="{{ asset('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('dist/jquery.table2excel.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sb2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sb2/js/sb-admin-2.min.js') }}"></script>


  <script>
    // Icon toggle filter
    $('#filterSet').click(function(e){
      $('#filterForm').slideToggle();
      $("i", this).toggleClass("fa-chevron-circle-up fa-chevron-circle-down");
    });
    // Validate filter for apply
    $('.teamChecks').click(function(){
      if ($('.teamChecks').is(":checked") && $('#startDate').val() != '' && $('#endDate').val() != '') {
        $('#applyFilter').removeAttr('disabled').removeClass('disabled').css('cursor', 'pointer');
      } else {
        $('#applyFilter').attr('disabled','disabled').addClass('disabled').css('cursor','no-drop');
      }
    });
    $('.rangeDate').change(function(){
      if ($('#startDate').val() != '' && $('#endDate').val() != '' && $('.teamChecks').is(":checked")) {
        $('#applyFilter').removeAttr('disabled').removeClass('disabled').css('cursor', 'pointer');
      } else {
        $('#applyFilter').attr('disabled','disabled').addClass('disabled').css('cursor','no-drop');
      }
    });

    // $.get("{{ url('dashboard/healthempdetail/pc') }}", function(html_string){
    //     $('#loadPage').html(html_string);
    // },'html');

    // Detail of teams at tables
    $('.detail').click(function(e){
      e.preventDefault();
      $('#loadPage').text('Memuat ...');
      $.get("{{ url('dashboard/healthempdetail/') }}/" + $(this).attr('page') , function(html_string){
         $('#loadPage').html(html_string);
      },'html');
    });

    $('#tombol').click(function() {
       $('#table').table2excel({
        name: "Master Employee Health Result",
        filename: "MASTER Employee Health Result " + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true

       });
    });


  </script>
</body>
</html>
