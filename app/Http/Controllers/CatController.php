<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use DB;
//use Session;
class CatController extends Controller
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
   
     public function add()
    {
        return view('category.add');
    }
    public function save(CategoryRequest $Request)
    {
        $category=new Category;
        $category->name=$_POST['name'];
        $category->save();
        session()->put('massage', 'category Add sucessfully!');
        
        $category=DB::select('select * from categories');
        return view('category.all')->with('category', $category); 
        //$this->all();
    }
   
    public function all()
    {
      $category=DB::table('categories')->get();
      return view('category.all')->with('category', $category);  
    }
    public function update()
    {
        DB::table('categories')->where('id',$_POST['id'])
            ->update(['name' => $_POST['name']]);
        session()->put('massage', 'category update sucessfully!');
        $product=DB::select('select * from categories');
        return view('category.all')->with('category', $product);
    }
    public function edit($id)
    {
        $product=DB::select('select * from categories where id='.$id);
        return view('category.edit')->with('category', $product);
    }
    public function delete()
    {
        DB::table('categories')->where('id','=',$_POST['id'])->delete();
        session()->put('massage', 'Category delect sucessfully!');
        $category=DB::select('select * from categories');
        return view('category.all')->with('category', $category); 
    }
    
}
