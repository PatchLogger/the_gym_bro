<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
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
                    <section>
                        <div class="container h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-xl-9">
                                    <h1 class="text-white mb-4" style="font-size: 50px;">Update Product</h1>
                                    <div class="card" style="border-radius: 15px;">
                                        <div class="card-body">
                                            <form action="{{url('/update_product',$product->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-3 ps-5">

                                                        <h6 class="mb-0">Product Title</h6>

                                                    </div>
                                                    <div class="col-md-9 pe-5">

                                                        <input placeholder="Insert Porduct Name" type="text" style="border-radius: 0.5rem;" name="title" class=" text-white bg-dark form-control form-control-lg" required="" value="{{$product->title}}" />

                                                    </div>
                                                </div>

                                                <div class="row align-items-center py-3">
                                                    <div class="col-md-3 ps-5">

                                                        <h6 class="mb-0">Product Discription</h6>

                                                    </div>
                                                    <div class="col-md-9 pe-5">

                                                        <textarea class="form-control text-white bg-dark" name="discription" style="border-radius: 0.5rem;" rows="3" placeholder="Insert product Information" required="">{{$product->discription}}</textarea>

                                                    </div>
                                                </div>
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-3 ps-5">

                                                        <h6 class="mb-0">Catagory</h6>

                                                    </div>
                                                    <div class="col-md-9 pe-5">
                                                        <select class=" bg-dark text-white" style="border-radius: 0.5rem;" name="catagory" required="">
                                                            <option value="Adjustable_Dumbbells" {{ $product->catagory === 'Adjustable_Dumbbells' ? ' selected' : '' }}>Adjustable Dumbbells</option>
                                                            <option value="Treadmills" {{ $product->catagory === 'Treadmills' ? ' selected' : '' }}>Treadmills</option>
                                                            <option value="Home_Gyms" {{ $product->catagory === 'Home_Gyms' ? ' selected' : '' }}>Home Gyms</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-3 ps-5">

                                                        <h6 class="mb-0">Price</h6>

                                                    </div>
                                                    <div class="col-md-4 pe-5">

                                                        <input type="number" placeholder="Insert Price" name="price" style="border-radius: 0.5rem;" type="number" min="0" name="price" class=" text-white bg-dark form-control form-control-lg" required="" value="{{$product->price}}" />

                                                    </div>
                                                </div>
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-3 ps-5">

                                                        <h6 class="mb-0">Discount Price</h6>

                                                    </div>
                                                    <div class="col-md-4 pe-5">

                                                        <input placeholder="Insert Discount Amount" type="number" name="d_price" type="number" min="0" style="border-radius: 0.5rem;" name="price" class=" text-white bg-dark form-control form-control-lg" value="{{$product->discount_price}}" />

                                                    </div>
                                                </div>
                                                <div class="row align-items-center pt-4 pb-3">
                                                    <div class="col-md-3 ps-5">

                                                        <h6 class="mb-0">Quantity</h6>

                                                    </div>
                                                    <div class="col-md-4 pe-5">

                                                        <input type="number" placeholder="Insert Porduct Quantity" min="0" style="border-radius: 0.5rem;" name="quantity" class=" text-white bg-dark form-control form-control-lg" required="" value="{{$product->quantity}}" />

                                                    </div>
                                                </div>
                                                <div class="row align-items-center py-3">
                                                    <div class="col-md-3 ps-5">

                                                        <h6 class="mb-0">Product Image</h6>

                                                    </div>
                                                    <div class="col-md-9 pe-5">

                                                        <img class=" img-lg" src="products/{{$product->image}}"><br>
                                                        <input name="image" type="file"/>

                                                    </div>
                                                </div><br>
                                                <center>
                                                    <button type="submit" class="btn btn-success  btn-lg">Update Product</button>
                                                </center>
                                            </form>
                                            <center>OR<br>

                                                <a href="{{url('/remove_product',$product->id)}}"><button type="submit" class="btn btn-danger btn-lg">Remove Product</button></a>
                                            </center>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
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