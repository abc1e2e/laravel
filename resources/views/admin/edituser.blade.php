<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>
    a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
.form-control{
    width: 100%;
}

</style>
</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
       {{-- //  @include('navadmin') --}}

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" >
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form  enctype="multipart/form-data" action="{{route('update-user',$customer ?? ''->id)}}" method="POST">
                                
                     
                     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                     @if(count($errors)>0)
                         <div class="alert alert-danger">
                             @foreach($errors->all() as $err)
                             {{$err}}
                             @endforeach
                         </div>
                     @endif
                     @if(Session::has('edit'))
                     <div class="alert alert-danger">
                         {{ Session::get('edit') }}
                     </div>
                      @endif
                         @if(Session::has('phone'))
                        <div class="alert alert-danger">
                            {{ Session::get('phone') }}
                        </div>
                        @endif
                            <div class="form-group">
                                <label>Hoten</label>
                                <input  type="text" class="form-control" name="hoten"  placeholder="Nhap ho ten" required value="{{$customer->hoten}}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhap Email" required value="{{$customer->email}}"/>
                            </div>
                            <div class="form-group">
                                <label>SDT</label>
                                <input type="text" class="form-control" name="sdt" placeholder="Nhap SDT" required value="{{$customer->sdt}}"/>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea  class ="content"   name = "content" id = "content" required   style="width: 100%;"> {{$customer->content}}</textarea>
                            </div>
                            <div class="form-group" style="padding-left: 200px;"> 
                        <img src="{{URL::to('/')}}/asset/images/{{$customer->image}}" style="width: 150px;height: 150px">
                            </div>
                            <div class="form-group" >
                                
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Please Enter hinh anh" required value="{{$customer->image}}" />
                            </div>
                            <div >
                            <button type="submit" class="btn btn-primary" style="height: 52px;
                            width: 100px;">User Edit</button>
                        <a href="{{route('list-user')}}">ComeBack</a>
                            </div>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
</body>
</html>