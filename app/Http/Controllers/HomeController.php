<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
//use App\Category;
use DB;
//use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget('count');
        session()->forget('remove');
        return view('home');
    }

    public function add_product()
    {
        $category=DB::select('select * from categories');  
        return view('product.add')->with('category', $category);
    }
    public function product_save(ProductRequest $Request)
    {
        $product=new Product;
        $product->name=$_POST['name'];
        $product->unique_id=$_POST['unique_id'];
        
        $product->price=$_POST['price'];
        
        $product->category=$_POST['category'];
        $product->save();
        session()->put('massage', 'Product Add sucessfully!');
        return view('product.all');
    }
    public function product_update(Request $request)
    {

      if ($_POST['unique_id']==$_POST['old_unique_id']) {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'unique_id'=>'required',
        ]);
      }else{
      $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'unique_id'=>'required|unique:products',
        ]);  
      }
         
        DB::table('products')->where('id',$_POST['id'])
            ->update(['name' => $_POST['name'],'price'=>$_POST['price'],
                'category'=>$_POST['category'],'unique_id'=>$_POST['unique_id']]);
        session()->put('massage', 'Product update sucessfully!');
        return view('product.all');
    }
public function edit_product($id)
    {
       $product=DB::select('select * from products where id='.$id);
       $cat=DB::select('select * from categories');
       //$product['catid']=2;
       //var_dump($cat);
      // exit();
        
return view('product.edit')->with('product', $product)->with('cat',$cat);
    }
public function product_delete()
    {
        DB::table('products')->where('id','=',$_POST['id'])->delete();
        session()->put('massage', 'Product delect sucessfully!');
        return view('product.all');
    }
public function product()
    {
      return view('product.all');  
    }
public function search(Request $request){
            $query=$request->get('search');
            if ($query != '') {
               $data=DB::table('products')
               ->leftJoin('categories', 'products.category', '=', 'categories.id')
               ->select('products.*', 'categories.name as catname')
               ->where('products.unique_id','LIKE','%'.$query.'%')
               ->orwhere('products.name','LIKE','%'.$query.'%')
               ->orwhere('products.price','LIKE','%'.$query.'%')
               ->orwhere('products.amount','LIKE','%'.$query.'%')
               ->orwhere('categories.name','LIKE','%'.$query.'%')
               ->get();
            }else{
               $data=DB::table('products')
               ->leftJoin('categories', 'products.category', '=', 'categories.id')
               ->select('products.*', 'categories.name as catname')
               ->get();
               $ist_time=1; 
            }
            $output='';
            $rows=$data->count();
            if ($rows>0) {
                $a=1;
               foreach ($data as $row) {
                $output .='<tr><td>'.$a.'</td>';
                $output .='<td>'.$row->unique_id.'</td>';
                $output .='<td>'.$row->name.'</td>';
                $output .='<td>'.$row->price.'</td>';
                $output .='<td>'.$row->amount.'</td>';
                $output .='<td>'.$row->catname.'</td>';
                $output .='<td>
     <a href="edit_product/'.$row->id.'"><i class="glyphicon glyphicon-edit" style="font-size: 20px;"></i></a>
     <a href="javascript:;" onclick="fun('.$row->id.');"><i class="glyphicon glyphicon-trash" style="font-size: 20px;"></i></a></td></tr>';
                $a++;
               }
            }else{
                $output='<tr><td align="center" colspan="6"><b>No Data Found</b></td></tr>';
            }
        $output2=(isset($ist_time))?'All Products':
        'Search Result '.$rows.' Record Found';
              
            $data=array(
                'table_data' => $output,
                'table_count' => $output2
                 );
            echo json_encode($data);
        }

}