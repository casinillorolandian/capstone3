@extends('messages.messaginglayout')
@extends('layouts.app')

@section('main_content')


<h3> List of Messages</h3>

@if(!empty(Session::get('deleted')))

            <div class="alert alert-info">
                <strong>Info! </strong> {{ session('deleted') }}
            </div> 
            
@endif

<table class="table table-hover table-dark table-sm ">
  <thead>

    <tr>
      
      <th style="width: 25%" scope="col">Name</th>
      <th style="width: 45%" scope="col">Title</th>
      <th style="width: 15%" scope="col">About</th>
      <th style="width: 15%" scope="col">Date</th>
    </tr>
  </thead>

    @foreach($all_messages as $message)
        <?php if ((Auth::user()->id == $message->user_id) || (Auth::user()->id == $message->sendto_id)) {?>
        
        <tbody>

          @if($message->seen == '0' and  (Auth::user()->role == 'admin') and $message->spam == '0')
            <tr>
              <td><a href='{{url("messages/$message->id")}}' style="font-weight: bolder; color: #C0C0C0;">{{ $message->user->name }}</a></td>
              <td><a href='{{url("messages/$message->id")}}' style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis; font-weight: bolder; color: #C0C0C0;"> {{ $message-> title }} 

                @if($message->firstimage != '0' || $message->secondimage != '0' || $message->thirdimage != '0')

                <i class="fa fa-file-image-o"></i>

                @endif

              </a></td>
              <td><a href='{{url("messages/$message->id")}}' style="font-weight: bolder; color: #C0C0C0;">{{ $message->messageabout }}</a></td>
              <td scope="row"><a href='{{url("messages/$message->id")}}' style="font-weight: bolder; color: #C0C0C0;">{{ $message-> created_at }} </a></td>
            </tr>
          @elseif($message->replies()->first() && $message->replies()->first()->seen == 1 and  (Auth::user()->role == 'user'))
            <tr>
              <td><a href='{{url("messages/$message->id")}}' style="font-weight: bolder; color: #C0C0C0;">{{ $message->user->name }}</a></td>
              <td><a href='{{url("messages/$message->id")}}' style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis; font-weight: bolder; color: #C0C0C0;"> {{ $message-> title }} 

                @if($message->firstimage != '0' || $message->secondimage != '0' || $message->thirdimage != '0')

                <i class="fa fa-file-image-o"></i>

                @endif

              </a></td>
              <td><a href='{{url("messages/$message->id")}}' style="font-weight: bolder; color: #C0C0C0;">{{ $message->messageabout }}</a></td>
              <td scope="row"><a href='{{url("messages/$message->id")}}' style="font-weight: bolder; color: #C0C0C0;">{{ $message-> created_at }} </a></td>
            </tr>
          @elseif(Auth::user()->role == 'admin' and $message->spam == '0')
            <tr>
              <td><a href='{{url("messages/$message->id")}}' style="color: #E8E8E8;">{{ $message->user->name }}</a></td>
              <td><a href='{{url("messages/$message->id")}}' style="color: #E8E8E8;white-space: nowrap; overflow: hidden; text-overflow:ellipsis;"> {{ $message-> title }} 

                @if($message->firstimage != '0' || $message->secondimage != '0' || $message->thirdimage != '0')

                <i class="fa fa-file-image-o"></i>

                @endif

              </a></td>
              <td><a href='{{url("messages/$message->id")}}' style="color: #E8E8E8;">{{ $message->messageabout }}</a></td>
              <td scope="row"><a href='{{url("messages/$message->id")}}' style="color: #E8E8E8;"><i class="fa fa-eye"></i>{{ $message-> created_at }} </a></td>
            </tr>
          @elseif(Auth::user()->role == 'user')
            <tr>
              <td><a href='{{url("messages/$message->id")}}' style="color: #E8E8E8;">{{ $message->user->name }}</a></td>
              <td><a href='{{url("messages/$message->id")}}' style="color: #E8E8E8; white-space: nowrap; overflow: hidden; text-overflow:ellipsis;"> {{ $message-> title }} 

                @if($message->firstimage != '0' || $message->secondimage != '0' || $message->thirdimage != '0')

                <i class="fa fa-file-image-o"></i>

                @endif

              </a></td>
              <td><a href='{{url("messages/$message->id")}}' style="color: #E8E8E8;">{{ $message->messageabout }}</a></td>
              <td scope="row"><a href='{{url("messages/$message->id")}}' style="color: #E8E8E8;"><i class="fa fa-eye"></i>{{ $message-> created_at }} </a></td>
            </tr>
          @endif

        </tbody>

        <?php } ?>
    @endforeach
</table>

<!-- <ul>
    @foreach($all_messages as $message)
    	<?php if ((Auth::user()->id == $message->user_id) || (Auth::user()->id == $message->sendto_id)) {?>
    	
        <li>
            <a href='{{url("messages/$message->id")}}'> {{ $message-> title }} </a>
            <p> {{ $message->name }}</p>
            <p> {{ $message->messageabout }}</p>
            <p> <?php echo $message->actualmessage; ?> </p>
            @if($message->firstimage != '0' )
            <img src="{{ $message->firstimage }}" style="width:150px; height:150px; border-radius: 50%; margin-right:25px;">
            @endif
            @if($message->secondimage != '0' )
            <img src="{{ $message->secondimage }}" style="width:150px; height:150px; border-radius: 50%; margin-right:25px;">
            @endif
            @if( $message->thirdimage != '0')
            <img src="{{ $message->thirdimage }}" style="width:150px; height:150px; border-radius: 50%; margin-right:25px;">
            @endif
        </li>
        <?php } ?>
    @endforeach
</ul> -->
<div>

	

	@if (count($errors) > 0)

		<ul>
			@foreach ($errors->all() as $error)
				<li> <h2> {{ $error }} </h2> </li>
			@endforeach
		</ul>
	@endif

</div>


@endsection

