@extends('layouts.app')

@section('content')
<div class="main">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
                    @if (session('massage'))
                        <div class="alert alert-success" id="msg">
                           {{ session('massage') }}
                           @php session()->forget('massage'); @endphp 
                        </div>
                    @endif
@php 
$a = 0;
@endphp
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<table class="table display" id="example" >

<thead><tr><td>S no</td><td>Name</td><td>Action</td></tr></thead>
@foreach($category as $answer)
<tr>
 @php 
 $a =$a+1;
 @endphp
     <td>{{ $a }}</td>
     <td>{{ $answer->name }}</td>
    
     <td>
     <a href="{{ route('category.edit',$answer->id) }}"><i class="glyphicon glyphicon-edit" style="font-size: 20px;"></i></a>
     <a href="javascript:;" onclick="fun({{ $answer->id }});"><i class="glyphicon glyphicon-trash" style="font-size: 20px;"></i></a></td>
     </tr>
@endforeach

   </table>
   </div>
  </div>
</div>
@endsection
<script type="text/javascript">
  function fun(id){
    $( "#d_id" ).val(id);
    $('#myModal').modal('show');
  }
</script>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <form action="{{ route('category.delete') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <p>Are you sure you want to delete!
               </p>
               <input type="hidden" name="id" id="d_id">
            </div>
            <div class="modal-footer">
    <button type="submit" class="btn btn-default" >Delete</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
                 </form>
        </div>
    </div>
</div>
<!-- Modal End -->