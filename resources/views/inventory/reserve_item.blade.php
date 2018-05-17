@extends('inventory.itemlayout')
@extends('layouts.app') 

@section('item_content')

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">	
<style>

.gi-2x{font-size: 2em;}
.gi-3x{font-size: 3em;}
.gi-4x{font-size: 4em;}
.gi-5x{font-size: 5em;}

.modal-lg {
    max-width: 80% !important;
}

</style>
</head>
<body>

    <div class="">

      <div class="row">

        
        <!-- /.col-lg-3 -->

        <div class="col-lg-12" style="position:relative; top: -60px;">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="{{ asset('img/fall.jpeg') }}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('img/winter.jpg') }}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('img/spring.jpg') }}" alt="Third slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('img/summer.jpeg') }}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-lg-10 offset-md-1">

          <div class="row">
          	@foreach($all_items as $item)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a data-toggle="modal" data-target="#myModal{{$item->id}}"><img style="height: 350px;" class="card-img-top" src="{{ $item-> itemimage1 }}" alt=""></a>
                <div class="card-body" style="height: 60px;"> 
                  <h4 class="card-title">
                    <a href="#">{{ $item-> itemname }}</a>
                  </h4>
                </div>
                <div class="card-footer">
                  <small class="text-muted"><?php echo $item->category; ?></small>
                </div>
              @if (Auth::user()->role == NULL)
	            @elseif (Auth::user()->role == 'admin')
                @if ($item-> itemlevel == '0')
	                <h3> Reserved by: {{ $nameofuser }}</h3>
  	              <a href='{{url("catalogue/$item->id/solditem")}}' class="btn btn-success btn-md" role="button">Sold</a>
                  <a href='{{url("catalogue/$item->id/unreserve")}}' class="btn btn-info btn-md" role="button">Unreserve</a>
                @else
                  <h3> Sold to: {{ $nameofuser }}</h3>
                @endif
  	          @endif
              </div>
            </div>


             <!-- Modal -->
  			<div class="modal fade container-fluid" id="myModal{{$item->id}}" role="dialog">
			    <div class="modal-dialog modal-lg">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			        @if (Auth::user()->role == NULL)
			        @elseif (Auth::user()->role == 'user')
			        <a href='{{url("messages/reserve/$item->id/")}}' class="btn btn-info btn-md" role="button">Reserve</a>
			        @else
			        <a href='{{url("catalogue/update/$item->id/")}}' class="btn btn-info btn-md" role="button">Update</a>
            		@endif
			          
			        </div>
			        <div class="modal-body row">
			        	<div class="col-lg-4 ">
			        		<img style="height: 350px;" src="{{ $item-> itemimage1 }}" alt="">

			        		@if($item-> itemimage2 != '0')
			        		<br>
			        		<img style="height: 350px;" src="{{ $item-> itemimage2 }}" alt="">
			        		@endif

			        		@if($item-> itemimage3 != '0')
			        		<br>
			        		<img style="height: 350px;" src="{{ $item-> itemimage3 }}" alt="">
			        		@endif
			        	</div>
			        	<div class="col-lg-7 offset-lg-1">
			        		<h1>{{ $item->itemname }}</h1>
			        		<hr>
			        		<h3>{{ $item->category }}</h3>
			        		<hr>
			        		<h4>{{ $item->itemname }}</h4>
			        		<hr>
			        		<?php echo $item->itemdescription; ?>
			        		<hr>
			        		@if($item-> discount != '0')
			        		<br>
			        		<h4 style="text-align: right;"> DISCOUNT: {{ $item->discount }}%</h4>
			        		@endif
			        	</div>
			        </div>
			        
			      </div>
			      
			    </div>
			</div>



            @endforeach


          </div>
          <!-- /.row -->
          <center>{{$all_items->links()}}</center>
        </div>
        <!-- /.col-lg-9 -->
        	
      </div>
    </div>



</body>
@endsection






