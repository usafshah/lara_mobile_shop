@extends('layouts.app')

@section('content')
<div class="main">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit product</div>

                <div class="panel-body">
                @foreach($product as $answer)
            <form class="form-horizontal" method="POST" action="{{ route('product_update') }}">
                        {{ csrf_field() }}
 <input  type="hidden" name="id" value="{{ $answer->id }}" >
   
   <div class="form-group{{ $errors->has('unique_id') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Pruduct unique Name OR Barcode No:</label>
        <div class="col-md-6">
<input type="text" class="form-control" name="unique_id"  value="{{ $answer->unique_id }}" autofocus>
<input type="hidden" name="old_unique_id"  value="{{ $answer->unique_id }}">
                @if ($errors->has('unique_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('unique_id') }}</strong>
                    </span>
                @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Pruduct Name</label>
        <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $answer->name }}" require>
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">price</label>
                    <div class="col-md-6">
        <input id="email" type="number" class="form-control" name="price" value="{{ $answer->price }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group">
<label for="password-confirm" class="col-md-4 control-label">Category</label>

    <div class="col-md-6">
<select class="form-control" name="category" >
    @foreach($cat as $ans)
    <option value="{{ $ans->id }}" {{ ($ans->id==$answer->category)?'selected':'' }} >{{ $ans->name }}</option> 
    @endforeach
</select>
    </div>
</div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                                    Update 
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
