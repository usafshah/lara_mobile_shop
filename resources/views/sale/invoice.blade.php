@extends('layouts.app')

@section('content')
<div class="main">
 <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                 <div class="row">
                 <div class="col-md-9">
                Invoice
                </div>
                 <div class="col-md-3">
            <button class="btn btn-primary btn-block" type="submit" >Print</button></div>
                </div>
               </div>
                <div class="panel-body">
                   <table class="table display" id="example" >
<thead><tr><td>S no</td><td>Name</td><td>Price</td><td>Amount</td><td>Total Amount</td></tr></thead>
<tbody >
@php $i=0;
$total=0;
 @endphp
   @foreach($data as $row)
      <tr>
      <td>{{ $i+1 }}</td>
      <td>{{ $row[0]->name }}</td>
      <td>{{ $row[0]->price }}</td>
      <td>{{ $qtn[$i] }}</td>
      <td>{{ $row[0]->price*$qtn[$i] }}</td>
       </tr>
   @php 
    $total+=$row[0]->price*$qtn[$i];
    $i++;
    @endphp
   @endforeach 
   <tr><td colspan="3"></td><td>Total amount:</td><td>{{ $total .' RS' }}</td></tr>
</tbody>
   </table>
                </div>
            </div>
            
        </div>
</div>

@endsection