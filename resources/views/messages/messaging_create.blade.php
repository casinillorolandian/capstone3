@extends('messages.messaginglayout')
@extends('layouts.app')

@section('main_content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Messaging') }}</div>

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




                    <form method="POST" action="/messages/create" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="messageabout" class="col-md-2 col-form-label text-md-right">{{ __('About') }}</label>

                            <div class="col-md-10">

                            	<select id="messageabout" type="text" class="form-control{{ $errors->has('messageabout') ? ' is-invalid' : '' }}" name="messageabout" value="{{ old('messageabout') }}" required>
                                    @if(!$reserve_item)
                                    <option value="" selected>Choose:</option>
                                    <option value="Trade-in">Trade-in</option>
									<option value="Inquire">Inquire</option>
									<option value="Appraise">Appraise</option>
                                    @else
                                    <option value="">Choose:</option>
                                    <option value="Trade-in">Trade-in</option>
                                    <option value="Inquire">Inquire</option>
                                    <option value="Appraise">Appraise</option>
                                    <option selected value="Reserve">Reserve</option>
                                    @endif
								</select>

                                @if ($errors->has('messageabout'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('messageabout') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="actualmessage" class="col-md-2 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-10">

                            	<textarea id="actualmessage" type="text" class="form-control{{ $errors->has('actualmessage') ? ' is-invalid' : '' }}" name="actualmessage" value="{{ old('actualmessage') }}"></textarea>
                                

                                @if ($errors->has('actualmessage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('actualmessage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>

                        @if(!$reserve_item)

                        <h1 style="text-indent: 16%;">Upload</h1>
                        <hr>
                        
                        <div class="form-group row">
                            <label for="1stimage" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-10">
                                <input id="1stimage" type="file" class="form-control{{ $errors->has('1stimage') ? ' is-invalid' : '' }}" name="1stimage" value="{{ old('1stimage') }}" autofocus>

                                @if ($errors->has('1stimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('1stimage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="2ndimage" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-10">
                                <input id="2ndimage" type="file" class="form-control{{ $errors->has('2ndimage') ? ' is-invalid' : '' }}" name="2ndimage" value="{{ old('2ndimage') }}" autofocus>

                                @if ($errors->has('2ndimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('2ndimage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="3rdimage" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-10">
                                <input id="3rdimage" type="file" class="form-control{{ $errors->has('3rdimage') ? ' is-invalid' : '' }}" name="3rdimage" value="{{ old('3rdimage') }}" autofocus>

                                @if ($errors->has('3rdimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('3rdimage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @endif

                        @if( $reserve_item != '0')
                        <div class="form-group row">
                            <label for="reserve" class="col-md-2 col-form-label text-md-right"> You reserve the {{ $reserve_item -> itemname }}. </label>

                            <div class="col-md-10">
                                <input id="reserve" type="hidden" name="reserve" value="{{ $id }}" autofocus>
                            </div>
                        </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-1 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection