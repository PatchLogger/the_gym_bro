<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>THE GYM BRO | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/tgb-mini.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.slider');
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.nav')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
                
              </div>
              @endif
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">User List</h4>
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>E-mail</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>User_Type</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                          @foreach($data as $data)
                            <tr>
                              <td>{{$data->name}}</td>
                              <td>{{$data->email}}</td>
                              <td>{{$data->phone}}</td>
                              <td>{{$data->address}}</td>
                               
                                <?php
                                if($data->usertype==1 && $data->id != Auth::user()->id)
                                {
                                  echo '<td>Admin</td>
                                  <td><a onclick="return confirm(\'are you sure you want to remove admin rights?\')" href="'.url("remove_admin",$data->id).'"><button class="btn btn-sm btn-danger" type="button" >Remove Admin</button></a></td>';
                                }
                                else
                                {
                                  echo'<td>User</td>';
                                  if($data->id == Auth::user()->id){
                                    echo '<td>
                                    Unavailable action for this user.</td>';
                                  }
                                  else{
                                    echo '<td><a onclick="return confirm(\'are you sure you want to ban this user?\')" href="'.url("ban_user",$data->id).'" ><button type="button" class="btn btn-sm btn-danger">Ban user</button></a><br><br><a onclick="return confirm(\'are you sure you want to promote this user to admin?\')" href="'.url("make_admin",$data->id).'" ><button type="button" class="btn btn-sm btn-success">Make Admin</button></a></td>';

                                  }
                                }
                                ?>
                              
                             
                            </tr>
                            @endforeach 
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
        </div>
        <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>