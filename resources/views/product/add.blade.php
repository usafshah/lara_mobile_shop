@extends('layouts.app')

@section('content')
<div class="main">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add product</div>

                <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('product_save') }}">
                        {{ csrf_field() }}
<div class="form-group{{ $errors->has('unique_id') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Pruduct unique Name OR Barcode No:</label>
        <div class="col-md-6">
<input type="text" class="form-control" name="unique_id"  value="{{ old('unique_id') }}" autofocus>
@php
fun('unique_id',$errors);
@endphp
        </div>
    </div>
   
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Pruduct full Name</label>
        <div class="col-md-6">
<input type="text" class="form-control" name="name"  value="{{ old('name') }}" autofocus>
@php
fun('name',$errors);
@endphp
        </div>
    </div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
        <label for="price" class="col-md-4 control-label">price</label>
                    <div class="col-md-6">
<input type="number" class="form-control" name="price" value="{{ old('price') }}" >
@php
fun('price',$errors);
@endphp
                            </div>
                        </div>


<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
<label for="password-confirm" class="col-md-4 control-label">Category</label>
<div class="col-md-6">
<select class="form-control" name="category" >
@foreach($category as $answer)
<option value="{{ $answer->id }}">{{ $answer->name }}</option>
@endforeach
</select>
@php
fun('category',$errors);
function fun($name,$errors){ 
@endphp
    @if ($errors->has($name))
    <span class="help-block">
      <strong>{{ $errors->first($name) }}</strong>
    </span>
    @endif
@php    
}
@endphp
</div>
</div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                                    Save 
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
