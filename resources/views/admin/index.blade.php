<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../public/admin/Frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../public/admin/Frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../public/admin/Frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../public/admin/Frontend/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-light navbar-light">
                    <a href="{{ route('adminPage') }}" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"></i>ChocoWorld</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"><a>{{ Session::get('Name') }}</a></h6>  <!-- chỗ này lấy thông tin từ table customer -->
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">

                        <a href="product" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Products</a>
                        <a href=""class="nav-item nav-link"><i class="fa fa-th me-2"></i>Orders</a>
                        <a href="{{ route('customer') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Customers</a>

                    </div>
                </nav>
            </div>
        <!-- Sidebar End -->



        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Session::get('Name') }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('logOut') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products Table</h4>
                        <a type="submit" href="{{ url('admin/add')}}" class="btn btn-default add-to-cart"></i>Add product</a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> name </th>
                                    <th> Email </th>
                                    <th> Role </th>
                                    <th> Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->productId}}</td>
                                        <td>{{$product->productName}}</td>
                                        <td>{{$product->productPrice}}</td>
                                        <td><img src="{{$product->productImg}}" alt="" style="border-radius: 10%" width="100px" height="100px"  ></td> 
                                        <td>
                                            <a href="{{url('admin/edit/'.$product->productId)}}" title="Edit this product"><i class="fa-solid fa-pen-to-square"></i>Edit</a> &nbsp;
                                            <a href="{{url('admin/delete/'.$product->productId)}}" title="Delete this product"><i class="fa-solid fa-trash-can"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                                
                        </table>
                    </div>
                </div>


  
            

            <!-- Footer Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-light rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                            </div>
                            <div class="col-12 col-sm-6 text-center text-sm-end">
                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            </br>
                                Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Footer End -->

        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/admin/Frontend/lib/chart/chart.min.js"></script>
    <script src="../../public/admin/Frontend/lib/easing/easing.min.js"></script>
    <script src="../../public/admin/Frontend/lib/waypoints/waypoints.min.js"></script>
    <script src="../../public/admin/Frontend/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../public/admin/Frontend/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../public/admin/Frontend/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../public/admin/Frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../public/admin/Frontend/js/main.js"></script>
</body>

</html>