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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    html, body {margin: 0; height: 100%; overflow: auto;}
</style>
</head>
<body>
    
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">GioiThieu</a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Contacts</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <div class="beta-comp">
					<div class="cart">
							{{-- <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body"> --}}
                <div class="btn-group" style="width: 200px;" >
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                    {{-- <div class="beta-dropdown cart-body"> --}}
                  </button>
                  <div class="dropdown-menu" >
                  	@if(Session::has('cart'))
							@foreach($product_cart ?? '' as $product)
							
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="asset/images/{{$product['item']['image']}}" alt="" width="50px" height="50px"></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']->name}}</span>
											<span class="cart-item-amount">{{$product['qty']}} * <span>@if($product['price'] == $product['item']->giatien){{number_format($product['item']->giatien)}} @else  {{$product['price']}}@endif</span></span>
										</div>
									</div>
								</div>
							@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đồng</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dat-hang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>

							@endif
							</div>
                  </div>
                </div>
						
							{{-- </div> --}}
                </div> <!-- .cart -->
            </div>
          </form>
        </div>
      </nav>

 <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 500px; 
    margin: auto;">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="asset/images/1.jpg" style="width:150px;height:150px;" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="asset/images/2.jpg" style="width:150px;height:150px;" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="asset/images/3.jpg" style="width:150px;height:150px;" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
       <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        

                        <div class="row">
                        @foreach($sanpham as $new)
                           
                            <div class="col-sm-3">
                                <div class="single-item">
                    
                                    <div class="single-item-header">
                                        <img src="asset/images/{{$new->image}}" alt="" height="250px" width="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">  <a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>               {{$new->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px">
                                      
                                            <span class="flash-sale">{{number_format($new->giatien)}} đồng</span>
                                    
                                          
                                            {{-- <span class="flash-sale">{{number_format(($new->unit_price)-(($new->unit_price)*($new->percent))/100)}}đồng</span> --}}
                                        
                                        </p>
                                      
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                       
                          
                            
                    </div> <!-- .beta-products-list --> 
                
                </div>
            </div> <!-- end section with sidebar and main content -->
         

        </div> <!-- .main-content -->
        </div>

</div>  

<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
		
	})
	</script>
	<script type="text/javascript">
		function addSoluong(qty,id)
		{
			console.log('soluong'+qty);
			console.log('id'+id);
			$.get(
			'{{asset('dathang/capnhatso')}}',{qty:qty,id},
			function()
			{
				location.reload();
			}
			);
			
			
		}			
	</script>   
</body>
</html>