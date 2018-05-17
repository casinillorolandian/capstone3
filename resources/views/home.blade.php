@extends('layouts.settinglayout')
@extends('layouts.app')

@section('homecontent')
<div class="container" style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                <ul>
                    <li> NAME: {{ $current_user->name }} </li>
                    <li> EMAIL: {{ $current_user->email }} </li>
                </ul>
                    <hr>

                    <h5> CHANGE PROFILE PICTURE </h5>
                    <div class="row">
                        <div class="col-md-1 offset-md-1">
                        <img src="{{ $current_user->image }}" style="width:150px; height:150px; border-radius: 50%; margin-right:25px;">
                        </div>
                        
                        <div class="col-md-9">
                        <form method="POST" action="/profile" enctype="multipart/form-data" style="position: relative; top: 30px;">
                             @csrf

                            <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2" style="margin-top: 5px;">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                            </div>
                          
                            </div>

                            
                            

                        </form>
                        </div>
                    </div>

                    @if($current_user->role == 'user')
                    <hr>

                    <h5> RESERVED ITEMS: </h5>
                    <div class="row">
                        @foreach($all_items as $item)
                            @if($current_user->id == $item->reserve_id and $item->itemlevel == 0)
                            <div class="col-lg-4 col-md-6 mb-4">
                              <div class="card h-100">
                                <a data-toggle="modal" data-target="#myModal{{$item->id}}"><img style="height: 350px;" class="card-img-top" src="{{ $item-> itemimage1 }}" alt=""></a>
                                <div class="card-body" style="height: 60px;"> 
                                  <h4 class="card-title">
                                    <a href="#">{{ $item-> itemname }}</a>
                                  </h4>
                                </div>
                                <div class="card-footer">
                                    <h3> Reserved to: {{ $current_user->name }} </h3>
                                    <small class="text-muted"><?php echo $item->category; ?></small>
                                </div>
                        
                              </div>
                            </div>
                            @endif
                        @endforeach


                  </div>

                  <hr>

                    <h5> BOUGHT ITEMS: </h5>
                    <div class="row">
                        @foreach($all_items as $item)
                            @if($current_user->id == $item->reserve_id and $item->itemlevel == 1)
                            <div class="col-lg-4 col-md-6 mb-4">
                              <div class="card h-100">
                                <a data-toggle="modal" data-target="#myModal{{$item->id}}"><img style="height: 350px;" class="card-img-top" src="{{ $item-> itemimage1 }}" alt=""></a>
                                <div class="card-body" style="height: 60px;"> 
                                  <h4 class="card-title">
                                    <a href="#">{{ $item-> itemname }}</a>
                                  </h4>
                                </div>
                                <div class="card-footer">
                                    <h3> Reserved to: {{ $current_user->name }} </h3>
                                    <small class="text-muted"><?php echo $item->category; ?></small>
                                </div>
                        
                              </div>
                            </div>
                            @endif
                        @endforeach


                  </div>

                  @endif




                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@yield("footercontent")

