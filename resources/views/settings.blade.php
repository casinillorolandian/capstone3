@extends('messages.messaginglayout')
@extends('layouts.app')

@section('main_content')
<div>

	<br>
	<br>

	<table class="table table-hover table-dark table-sm ">
	  <thead>

	    <tr>
	      <th style="width: 25%" scope="col">Name </th>
	      <th style="width: 25%" scope="col">Email</th>
	      <th style="width: 25%" scope="col">Username</th>
	      <th style="width: 25%" scope="col">Time Created</th>

	    </tr>
	  </thead>

	    @foreach($all_users as $user)
	        
	        <tbody>
	            <tr>
	              		<td> {{$user->name}} </td>
						<td> {{$user->email}} </td>
						<td> {{$user->username}} </td>
						<td> {{$user->created_at}} </td>
	            </tr>
	        </tbody>


	    @endforeach
	</table>

	<br>
	<br>
	
</div>

@endsection

