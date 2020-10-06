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


<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>
    .dataTables_wrapper{
        width: 100%;
    }
   nav{
    border: solid 1px;
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
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0 ; display: block;">
        <div class="navbar-header">
        <a class="navbar-brand" href="{{route('show-user')}}">ADMIN</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
      
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
                   
                        <!-- /input-group -->
                       
                        <li>
                            <h2><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></h2>
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
                        <h2><i class="fa fa-users fa-fw"></i> KhachHang<span class="fa arrow"></span></h2>
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
                        <h2><i class="fa fa-cube fa-fw"></i> Quản Lí Sản Phẩm<span class="fa arrow"></span></a></h2>
                        <ul class="nav nav-second-level" style="display: block">
                            <li>
                                -----------<a href="{{route('list-sanpham')}}">Danh Sách Sản Phẩm</a>
                            </li>
                            <li>
                                -----------<a href="{{route('add-sanpham')}}">Thêm Sản Phẩm</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <h2><i class="fas fa-shopping-cart"></i>Quản lí đơn hàng<span class="fa arrow"></span></a></h2>
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
                        </li>
                    </li>
                </ul>
            </div>
        </div>       
        <!-- /.navbar-top-links -->
    
        <!-- Navigation -->
       
       
     

    </nav>


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