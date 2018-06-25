@extends('layouts.app')

@section('content')
<div class="main">
    <div class="row">

     <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Sale a product</div>

                <div class="panel-body">
                    <input type="text" name="q" id="q" placeholder="Search" class="form-control ">
                    <input type="hidden" name="id" id="pid" >
                    <button type="button" id="add_btn" class="btn btn-primary btn-block" style="margin-top: 10px;">Add</button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('#add_btn').click(function(){
          var id=$('#pid').val();
          $('#q').val('');
          $('#pid').val('');
          if (id!='') {
            $.ajax({  
                     url:"{{ route('product.sale') }}",  
                     method:"GET",  
                     data:{search:id},  
                     dataType:"json",  
                     success:function(data)  
                     {  
                        console.log('abc');
                        $('#di').append(data.table_data);  
                          //$('#count').html(data.table_count);  
                     }  
                });  
        }else{
            alert('enter product to add');
        }
        });
          
    $(function(){
     $( "#q" ).autocomplete({
      source: "http://localhost/projects/mobile_shop/search",
      minLength: 2,
      select: function(event, ui) {
        $('#q').val(ui.item.value);
        $('#pid').val(ui.item.id);
      }
    });
});
    function fun(id){
        $('#row'+id).remove();
         $.ajax({  
                     url:"{{ route('remove') }}",  
                     method:"GET",  
                     data:{search:id},  
                     dataType:"json",  
                     success:function(data)  
                     {  
                        console.log(data);
                        //$('#di').append(data.table_data);  
                          //$('#count').html(data.table_count);  
                     }  
                }); 

    }
        </script>
        <div class="col-md-8">
           <form action="{{ route('invoice') }}" method="POST">
           {{ csrf_field() }}
            <div class="panel panel-default">
                <div class="panel-heading">
                 <div class="row">
                 <div class="col-md-7">
                Total products in invoice
                </div>
                 <div class="col-md-3">
            <button class="btn btn-primary btn-block" type="submit" >Sale</button></div><div class="col-md-2">
            <a href="{{ route('home') }}" class="btn btn-danger btn-block" >Clare</a>
                 </div>
                </div>
               </div>
                <div class="panel-body">
                   <table class="table display" id="example" >
<thead><tr><td>S no</td><td>Name</td><td>Price</td><td>Rem Amount</td><td>Amount</td><td>Action</td></tr></thead>
<tbody id="di">
    
</tbody>
   </table>
                </div>
            </div>
            </form>
        </div>
       
    </div>
</div>
@endsection
