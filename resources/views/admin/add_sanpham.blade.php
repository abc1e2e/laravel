

<!doctype html>
<html>
    <head>
        <title>Đăng kí</title>
        <link rel="stylesheet" href="{{('asset/css/1.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
        <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <style>
        html, body {margin: 0; height: 100%; overflow: auto;}
        nav{
        border:solid 1px;
    }
            /* * {
    margin: 0;
    padding: 0;
    border: none;
    font-family: 'Open Sans', sans-serif;
}

body {
    overflow: hidden;
    background-color: #ededed;
}

.to {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    grid-template-rows: minmax(100px, auto);
}

.form {
    border: 1px solid #80808000;
    grid-column: 6/9;
    grid-row: 3;
    height: 470px;
    width: 292px;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    border-radius: 15px;
    box-shadow: 0px 0px 14px 0px grey;
    background-color: white;
}

h2 {
    margin-top: 50px;
    margin-bottom: 30px;
}

i.fab.fa-app-store-ios {
    display: block;
    margin-bottom: 50px;
    font-size: 28px;
}

label {
    margin-left: -126px;
    display: block;
    font-weight: lighter;
}

input {
    display: block;
    border-bottom: 2px solid #00BCD4;
    margin-top: 6px;
    margin-bottom: 10px;
    outline-style: none;
}

input[type="text"] {
    padding: 5px;
    width: 70%;
}

input#submit {
    padding: 7px;
    width: 50%;
    border-radius: 10px;
    border: none;
    position: absolute;
    bottom: 10px;
    cursor: pointer;
    background: linear-gradient(to right, #fc00ff, #00dbde);
}

input#submit:hover {
    background: linear-gradient(to right, #fc466b, #3f5efb);
} */
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
                        <ul class="nav nav-second-level">
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
    </div>
        <div class="col-md-10">
        <div id="wrapper">
            <!-- Navigation -->
         
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid" style="margin-left: 50px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thêm mới sản phẩm
                                <small></small>
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-7" style="padding-bottom:120px">
                             <form action="{{route('add-sanpham')}}" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control" name="name" value="{{ old('name') }}" required/>
                                </div>
                                <div>
                                    <div> Noi Dung</div>
                                    <textarea  style="width: 100%;"  class ="content" cols = "column" rows = "row" name = "noidung" id = "noidung" require>{{old('content')}} </textarea> 
                                
                                    {{-- <input type="text" name="content" required value="{{old('hoten')}}"> --}}
                                </div>
                           
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input class="form-control" name="giatien" value="{{ old('giatien')}}" required/>
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input class="form-control" name="soluong" value="{{ old('soluong')}}" required/>
                                </div>
                               
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control-file border" name="image" value="{{ old('image')}}" required>
                                </div>
                                @if(count($errors)>0)
                                <div class="form-group " style="color: red">
                                    @foreach($errors->all() as $err)
                                    {{$err}}</br>   
                                    @endforeach
                                </div>
                                @endif
                                <button type="submit" class="btn btn-success">Thêm</button>
                            <form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
    
            </div>
         </div>
        </div>
        @if(session('alert'))
        <script>
            alert("{{session('alert')}}");
        </script>
        @endif
    </body>

</html>