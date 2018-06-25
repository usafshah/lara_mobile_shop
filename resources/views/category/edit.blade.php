@extends('layouts.app')

@section('content')
<div class="main">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">edit category</div>

                <div class="panel-body">
                @foreach($category as $answer)
            <form class="form-horizontal" method="POST" action="{{ route('category.update') }}">
                        {{ csrf_field() }}
 <input  type="hidden" name="id" value="{{ $answer->id }}" >
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">cat Name</label>
        <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $answer->name }}" required autofocus>
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
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
