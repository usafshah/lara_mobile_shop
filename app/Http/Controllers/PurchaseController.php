<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PurchaseController extends Controller
{

public function __construct()
    {
        $this->middleware('auth');
    }
public function home(){
   	return view('purchase.home');
    }
 public function record(Request $request){
          $query=$request->get('search');
          $i=1;
          $data=DB::table('purchases')
               ->where('pro_id',$query)
               ->get();
          $output='';
          foreach ($data as $row) {
                $output .='<tr id="row'.$i.'" ><td>'.$i.'</td>';
                $output .='<td>'.$row->pro_id.'</td>';
                $output .='<td>'.$row->purchase_date.'</td>';
                $output .='<td>'.$row->qty.'</td>';
                $output .='<td><input type="text" class="form-control" value="1" name="qtn'.$i.'" ></td>';
                $output .='<td>
      <input type="hidden" value="'.$row->id.'" name="id'.$i.'" >
    <a href="javascript:;" onclick="fun('.$i.');"><i class="glyphicon glyphicon-trash" style="font-size: 20px;"></i></a></td></tr>';
               }
               $data=array(
                'table_data' => $output
                 );
            echo json_encode($data);
        }
}
