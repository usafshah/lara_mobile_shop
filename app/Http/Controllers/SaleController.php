<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SaleController extends Controller
{
    public function pos_search(){
          $term = $_GET['term'];
          $results = array();
          $queries = DB::table('products')
          ->where('unique_id', 'LIKE', '%'.$term.'%')
          //->orWhere('price', 'LIKE', '%'.$term.'%')
          ->get();
          foreach ($queries as $query)
            {
            $results[] = [ 'id' => $query->id, 'value' => $query->name ];
            }
          return json_encode($results);
          }

public function sale(Request $request){
          $query=$request->get('search');
          $i=1;
          if(session('count')==null){
           session()->put('count',1);
          }else{
           $i=session('count');
           $i=$i+1;
           session()->put('count',$i);
          }
          $data=DB::table('products')
               ->where('id',$query)
               ->get();
          $output='';
          foreach ($data as $row) {
                $output .='<tr id="row'.$i.'" ><td>'.$i.'</td>';
                $output .='<td>'.$row->name.'</td>';
                $output .='<td>'.$row->price.'</td>';
                $output .='<td>'.$row->amount.'</td>';
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
public function invoice(Request $request){
	for($i=1;$i<=session('count');$i++){
   //echo session('remove.id'.$i);
    
   
    if (session('remove.id'.$i)!=''){}else {
	 $data[]=DB::table('products')
	 ->where('id',$request->post('id'.$i))
	 ->get();
	 $qtn[]=$request->post('qtn'.$i);	
   }
	}
  //var_dump($data);
	return view('sale.invoice')->with('data',$data)->with('qtn',$qtn);
}
public function remove(Request $request){
          $row=$request->get('search');
          session()->put('remove.id'.$row,$row);
          $data=array(
                'table_data' => 'remove'
                 );
            echo json_encode($data);
        }

}
