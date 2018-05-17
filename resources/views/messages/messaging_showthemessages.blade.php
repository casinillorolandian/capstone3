@extends('messages.messaginglayout')
@extends('layouts.app')

@section('main_content')

<div class="container-fluid jumbotron ">
	@if (Auth::user()->role != 'admin')
	    <a href='{{url("messages/$all_messages->id/delete")}}' class="btn btn-info btn-md" role="button">Delete</a>
	@else
		<a href='{{url("messages/$all_messages->id/spam")}}' class="btn btn-danger btn-md" role="button">Spam</a>
	@endif

	<br><br>
  <div class="media">
    <div class="media-left">
      <img src="/{{ $all_messages->user->image }}" style="width:45px; height:45px; border-radius: 50%;" class="media-object">
    </div>
    <div class="media-body">
      <h4 class="media-heading">{{ $all_messages->user->name }} <small><i>Message Sent on {{ $all_messages-> created_at }}</i></small></h4>
      <br>
      <h3>Title: <bold>{{ $all_messages-> title }}</bold> </h3>
      <h4>About: <i> {{ $all_messages->messageabout }} </i> </h4>
      
      <p><?php echo $all_messages->actualmessage; ?></p>

    @if($all_messages->firstimage != '0' || $all_messages->secondimage != '0' || $all_messages->thirdimage != '0')
      	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 400px; height: 400px;">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner" style="width: 400px; height: 400px;">
		  	@if($all_messages->firstimage != '0' )
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="/{{ $all_messages->firstimage }}" alt="First slide">
		    </div>
		    @elseif($all_messages->firstimage == '0' and $all_messages->secondimage != '0')
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="/{{ $all_messages->thirdimage }}" alt="First slide">
		    </div>
		    @else
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="/{{ $all_messages->secondimage }}" alt="First slide">
		    </div>
		    @endif
		    @if($all_messages->secondimage != '0' )
		    <div class="carousel-item">
		      <img class="d-block w-100" src="/{{ $all_messages->secondimage }}" alt="Second slide">
		    </div>
		    @endif
		    @if( $all_messages->thirdimage != '0')
		    <div class="carousel-item">
		      <img class="d-block w-100" src="/{{ $all_messages->thirdimage }}" alt="Third slide">
		    </div>
		    @endif
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span style="background-color: #B0B0B0;" class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span style="background-color: #B0B0B0;" class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	@endif

      		



      <br>
      <h4> Replies </h4>
      <hr>

	@foreach($all_messages->replies as $reply)
      

      <!-- Nested media object -->
      <?php if ( $reply->user_id != '4' ) {?>
      	<!-- Left-aligned -->
      	<br>
		<div class="media">
		  <div class="media-left">
		    <img src="/{{ $reply->user->image }}" style="width:45px; height:45px; border-radius: 50%;" class="media-object">
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading">{{ $reply->user->name }} <small><i>Message Sent on {{ $reply-> created_at }}</i></small></h4>
		    <p style="text-align:justify; text-justify:initial;"><?php echo $reply->replymessage ?></p>
		  </div>
		</div>
		<br>
		<hr>

	  <?php } else {?>  
		<!-- Right-aligned -->
		<br>
		<div class="media ">
		  <div class="media-body ">
		    <h4 class="media-heading" style="text-align: right;"><small><i>Message Sent on {{ $reply-> created_at }}</i></small> {{ $reply->user->name }}</h4>
		    <p style="text-align:justify; text-justify:initial;"> <?php echo $reply->replymessage ?> </p>
		  </div>
		  <div class="media-right">
		    <img src="/{{ $reply->user->image }}" style="width:45px; height:45px; border-radius: 50%;" class="media-object">
		  </div>
		</div>
		<br>
		<hr>
	  <?php } ?>  

	@endforeach
      
      
    </div>
  </div>
</div>



            <div class="container">
			    <div class="row justify-content-center">
			        <div class="col-md-12">
			            <div class="card">
			                <div class="card-header">{{ __('Write a reply:') }}</div>

			                <div class="card-body">

			                    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
			                        <link rel="stylesheet" type="text/css" id="u0" href="http://cdn.tinymce.com/4/skins/lightgray/skin.min.css">
			                        <script type="text/javascript">
			                    tinymce.init({
			                      selector : "textarea",
			                      plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
			                      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			                    });
			                    </script>




			                    <form action = "" method="POST">
									{{ csrf_field() }}
									
									<div class="form-group row">

			                            <div class="col-md-12">

			                            	<textarea id="replymessage" type="text" class="form-control{{ $errors->has('replymessage') ? ' is-invalid' : '' }}" name="replymessage" value="{{ old('replymessage') }}"></textarea>
			                                

			                                @if ($errors->has('replymessage'))
			                                    <span class="invalid-feedback">
			                                        <strong>{{ $errors->first('replymessage') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                    	</div><br>




									<button type="submit" class="btn-primary btn-lg" style="float: right;"> SUBMIT </button>
								</form>




								


			                </div>
			            </div>
			        </div>
			    </div>
			</div>



@endsection