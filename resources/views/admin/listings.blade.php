<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title>PANAGEA - Admin dashboard</title>
	
  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('admin-style/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Main styles -->
  <link href="{{ asset('admin-style/css/admin.css') }}" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="{{ asset('admin-style/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="{{ asset('admin-style/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="{{ asset('admin-style/css/custom.css') }}" rel="stylesheet">
	
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  @extends('layout.admin.nav')
  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Listings</li>
      </ol>
      <div class="box_general">
        <div class="header_box">
          <h2 class="d-inline-block">Listings</h2>
          <div class="filter">
            <select name="orderby" class="selectbox">git
              <option value="Any time">Any time</option>
              <option value="Latest">Latest</option>
              <option value="Oldest">Oldest</option>
            </select>
          </div>
        </div>
        <div class="list_general">
          <ul>
            @foreach ($rooms as $room)
              <li>
                <figure><img src="{{ asset("img/".$room["image"]) }}" alt=""></figure>
                <small></small>
                <h4>{{ $room["package_name"] }}</h4>
                <p>{{ $room["description"] }}</p>
                <p><a href="{{ url("admin/listing/{$room['id']}") }}" class="btn_1 gray"><i class="fa fa-fw fa-eye"></i> View item</a></p>
                <ul class="buttons">
                  {{-- <li><a href="#0" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li> --}}
                </ul>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <!-- /box_general-->

      <nav aria-label="...">
        <ul class="pagination pagination-sm add_bottom_30">
          @if ($currentPage - 1 <= 0)
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
          @else
            <li class="page-item">
              <a class="page-link" href="{{route('admin.listings', ['page' => $currentPage - 1])}}" tabindex="-1">
                Previous
              </a>
            </li>
          @endif
          @for ($i = 1; $i <= $totalPage; $i++)
            @if ($i == $currentPage)
              <li class="page-item active">
                <a class="page-link" href="{{route('admin.listings', ['page' => $i])}}">{{$i}}</a>
              </li>
            @else
              <li class="page-item">
                <a class="page-link" href="{{route('admin.listings', ['page' => $i])}}">{{$i}}</a>
              </li>
            @endif
          @endfor
          @if ($currentPage == $totalPage)
            <li class="page-item disabled">
              <a class="page-link" href="#">Next</a>
            </li>
          @else
            <li class="page-item">
              <a class="page-link" href="{{route('admin.listings', ['page' => $i + 1])}}">Next</a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /pagination-->
    </div>
	  <!-- /container-fluid-->
  </div>
  <!-- /container-wrapper-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright © PANAGEA 2018</small>
      </div>
    </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  @extends('layout.admin.logout')

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin-style/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin-style/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('admin-style/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('admin-style/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('admin-style/vendor/jquery.selectbox-0.2.js') }}"></script>
	<script src="{{ asset('admin-style/vendor/retina-replace.min.js') }}"></script>
	<script src="{{ asset('admin-style/vendor/jquery.magnific-popup.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin-style/js/admin.js') }}"></script>
	
</body>
</html>
