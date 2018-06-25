@extends('layouts.app')

@section('content')
<div class="main">
   <div class="row">
        <div class="col-md-10 col-md-offset-1">
                    @if (session('massage'))
                        <div class="alert alert-success" id="msg">
                           {{ session('massage') }}
                           @php session()->forget('massage'); @endphp 
                        </div>
                    @endif
@php 
$a = 0;
@endphp
<div class="panel panel-default">
    <div class="panel-heading">
<div class="row">
    <div class="col-md-8" id="count">
    </div>
    <div class="col-md-4">
    <input type="text" name="searchname" id="searchname" placeholder="Search" class="form-control">
</div>
</div>
    </div>
  <div class="panel-body">
<table class="table">
<tr><td>S no</td><td>Barcode</td><td>Name</td><td>price</td><td>amount</td><td>category</td><td>Action</td></tr>
<tbody id="di">
</tbody>
   </table>
   </div></div></div>
   </div>

  </div>
</div>
<script type="text/javascript">
  function fun(id){
    $( "#d_id" ).val(id);
    $('#myModal').modal('show');
  }
</script>

<script>
  $(document).ready(function(){
       search_fun();
       function search_fun(txt=''){
                $.ajax({  
                     url:"{{ route('product.search') }}",  
                     method:"GET",  
                     data:{search:txt},  
                     dataType:"json",  
                     success:function(data)  
                     {  
                          $('#di').html(data.table_data);  
                          $('#count').html(data.table_count);  
                     }  
                });  
       }
$(document).on('keyup','#searchname',function(){
  var query=$(this).val();
  search_fun(query);
});


  });
</script>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <form action="{{ route('product_delete') }}" method="POST">
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
@endsection