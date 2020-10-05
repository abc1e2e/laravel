<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>
    .dataTables_wrapper{
        width: 100%;
    }
</style>
</head>
<body>
   
    <div id="wrapper">
        <div class="pull-right auto-width-right" style="text-align: right; margin-right: 200px;">
            <ul class="top-details menu-beta l-inline">
            @if(Auth::check())
               
                <h3>Chào bạn :{{Auth::user()->name}}</h3></li>
               <a href="{{route('log-out')}}">Đăng xuất</a></li>
        
            @endif

            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"> 
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0 ; display: block;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="{{route('show-user')}}">ADMIN</a>
        </div>
        <!-- /.navbar-header -->

        
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                {{-- @if(Auth::user()->position == 1) --}}
                <ul class="nav" id="side-menu" style="
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    display: grid;
                  ">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form" style="width:10%;">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                       
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    -----------<a href="{{route('list-user')}}">Thong Tin User</a>
                                </li>
                                {{-- <li>
                                    <a href="{{route('listcustomer')}}">List Customer</a>
                                </li> --}}
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> KhachHang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    -----------<a href="{{route('list-kh')}}">Thong Tin KhachHang Dat Hang</a>
                                </li>
                                {{-- <li>
                                    <a href="{{route('listcustomer')}}">List Customer</a>
                                </li> --}}
                            </ul>
                            <!-- /.nav-second-level -->
                     </li>
                        <li>
                        <a href=""><i class="fa fa-cube fa-fw"></i> Quản Lí Sản Phẩm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                -----------<a href="{{route('list-sanpham')}}">Danh Sách Sản Phẩm</a>
                            </li>
                            <li>
                                -----------<a href="{{route('add-sanpham')}}">Thêm Sản Phẩm</a>
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-shopping-cart"></i>Quản lí đơn hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    -----------<a href="{{route('list-order')}}">Danh sách đơn hàng</a>
                                </li>
                                {{-- <li>
                                    <a href="{{route('orderwait')}}">Đơn hàng đang giao</a>
                                </li>
                                 <li>
                                    <a href="{{route('orderfinish')}}">Đơn hàng đã hoàn thành</a>
                                </li> --}}
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
        </div>       
        <!-- /.navbar-top-links -->
    
        <!-- Navigation -->
       
       
     

    </nav>
    </div>
       <div class="col-md-10">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <h1 class="page-header" >Khach Hang
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Hoten</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Note</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                             <?php foreach ($kh ?? '' as $key): ?>
                            <tr class="odd gradeX" align="center">
                                <td>{{$key->name}}</td>
                                <td>{{$key->email}}</td>
                                <td>{{$key->address}}</td>
                                <td>{{$key->phone}}</td>
                                <td>{{$key->note}}</td>
                                {{-- <td>
                                <img src="asset/images/{{$key->image}}" style="width: 150px;height: 150px">
                                </td> --}}
                               {{-- <td><a href='updateUser/{{ $key->id }}'>Update</a>  --}}
                                {{-- <td><a href="{{route('update-user',$key->id)}}"><i class="fa fa-edit">Edit</a>||
                               <a href="{{route('delete-user',$key->id)}}" onclick="return confirm('Are you sure?')" id="delete"><i class="fa fa-trash">Delete</a></td>  --}}
                            </tr>
                             <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
       </div>
    </div>
    <!-- DataTables CSS -->


    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

 <script>
       $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
 </script>

</body>
</html>