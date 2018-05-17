 @extends('messages.messaginglayout')
@extends('layouts.app')

@section('main_content')


<h3> Spam Messages</h3>
<div class="table-responsive">
<table class="table table-hover table-dark table-sm table-responsive">
  <thead>

    <tr>
      <th style="width: 15%" scope="col">Date</th>
      <th style="width: 15%" scope="col">Name</th>
      <th style="width: 20%" scope="col">Title</th>
      <th style="width: 20%" scope="col">About</th>
      <th style="width: 200px" scope="col">Message</th>
      <th style="width: auto" scope="col">Image</th>
      <th style="width: auto" scope="col">Image</th>
      <th style="width: auto" scope="col">Image</th>

    </tr>
  </thead>

    @foreach($all_messages as $message)
        <?php if (((Auth::user()->id == $message->user_id) || (Auth::user()->id == $message->sendto_id)) and $message->spam == '1') {?>
        
        <tbody>
            <tr>
              <td scope="row">{{ $message-> created_at }} </td>
              <td>{{ $message->user->name }}</a></td>
              <td>{{ $message-> title }}</a></td>
              <td>{{ $message->messageabout }}</a></td>
              <td><?php echo $message->actualmessage ?></a></td>
              <td>
                @if($message->firstimage != '0' )
                <img src="/{{ $message->firstimage }}" style="width:150px; height:150px; margin-right:25px;">
                @endif
              </td>
              <td>
                @if($message->secondimage != '0' )
                <img src="/{{ $message->secondimage }}" style="width:150px; height:150px; margin-right:25px;">
                @endif
              </td>
              <td>
                @if( $message->thirdimage != '0')
                <img src="/{{ $message->thirdimage }}" style="width:150px; height:150px; margin-right:25px;">
                @endif  
              </td>
            </tr>
        </tbody>

        <?php } ?>
    @endforeach

</table>
</div>


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