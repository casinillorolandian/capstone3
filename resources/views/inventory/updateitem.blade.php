@extends('inventory.itemlayout')
@extends('layouts.app') 

@section('item_content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Item Update') }}</div>

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




                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $all_items->itemname }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-2 col-form-label text-md-right">{{ __('Item Category') }}</label>

                            <div class="col-md-10">

                                <select id="category" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}" required>
                                    <option value="" selected disabled>Choose:</option>

                                    <option value="{{ $all_items->category }}" selected> Old Value: {{ $all_items->category }} </option>

                                    @if($all_items->category != 'New Arrival')
                                    <option value="New Arrival">New Arrival</option>
                                    @endif

                                    @if($all_items->category != 'Pre-Loved')
                                    <option value="Pre-Loved">Pre-Loved</option>
                                    @endif

                                    @if($all_items->category != 'Summer Collection')
                                    <option value="Summer Collection">Summer Collection</option>
                                    @endif

                                    @if($all_items->category != 'Fall Collection')
                                    <option value="Fall Collection">Fall Collection</option>
                                    @endif

                                    @if($all_items->category != 'Winter Collection')
                                    <option value="Winter Collection">Winter Collection</option>
                                    @endif

                                    @if($all_items->category != 'Spring Collection')
                                    <option value="Spring Collection">Spring Collection</option>
                                    @endif

                                </select>

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <br>
                        <hr>
                        <br>
                        <h1 style="text-indent: 16%;">Upload</h1>
                        
                        
                        <div class="form-group row">
                            <label for="1stimage" class="col-md-2 col-form-label text-md-right">{{ __('Primary Image') }}</label>

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
                            <label for="2ndimage" class="col-md-2 col-form-label text-md-right">{{ __(' Image') }}</label>

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
                            <label for="3rdimage" class="col-md-2 col-form-label text-md-right">{{ __(' Image') }}</label>

                            <div class="col-md-10">
                                <input id="3rdimage" type="file" class="form-control{{ $errors->has('3rdimage') ? ' is-invalid' : '' }}" name="3rdimage" value="{{ old('3rdimage') }}" autofocus>

                                @if ($errors->has('3rdimage'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('3rdimage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount" class="col-md-2 col-form-label text-md-right">{{ __('Discount') }}</label>

                            <div class="col-md-10">
                                <input id="discount" type="number" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" value="0" autofocus>

                                @if ($errors->has('discount'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <h1 style="text-indent: 1%;">DESCRIPTION</h1>
                        

                        <div class="form-group row">
                            <label for="itemdescription" class="col-md-1 col-form-label text-md-right">{{ __('') }}</label>

                            <div class="col-md-12">

                                <textarea id="itemdescription" type="text" class=" {{ $errors->has('itemdescription') ? ' is-invalid' : '' }}" name="itemdescription" value="">{{$all_items->itemdescription }}</textarea>
                                

                                @if ($errors->has('itemdescription'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('itemdescription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('UPDATE THE ITEM') }}
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
