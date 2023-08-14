<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data= Category::all();
        return view('admin.view_catagory', compact('data'));
    }

    public function add_category(Request $req)
    {
        $data= new Category();
        $data->category_name= $req->name;
        $data->save();

        return redirect()->back()->with('message','Categroy added succesfully!!!');

    }

    public function delete_post($id)
    {
        $data= Category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'data deleted succesfully');

    }

    public function add_product()
    {
        $category= Category::all();
         return view('admin.add_product',compact('category'));
    }

    public function store_product(Request $req)
    {
        $product= new Product();
        $product->title       =$req->title;
        $product->description =$req->description;
        $product->price       =$req->price;
        $product->dis_price   =$req->dis_price;
        $product->quantity    =$req->quantity;
        $product->category    =$req->category;

        $image= $req->file('image');
        if($image)
        {
            $imgname        =time().'.'.$image->getClientOriginalExtension();
            $image->move('product_image',$imgname);
            $product->image =$imgname;
        }

        $product->save();

        return redirect()->back()->with('message', 'product added successfully!!!');
    }

    public function show_product()
    {
        $product= Product::all();

        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {

        $data= Product::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'product deleted successfuly!!');

    }

    public function edit_product($id)
    {
        $data= Product::find($id);
        $category= Category::all();
        return view('admin.edit_product', compact('data','category'));

    }

    public function update_product(Request $req,$id)
    {
        $product= Product::find($id);
        $product->title       =$req->title;
        $product->description =$req->description;
        $product->price       =$req->price;
        $product->dis_price   =$req->dis_price;
        $product->quantity    =$req->quantity;
        $product->category    =$req->category;

        $image= $req->file('image');
        if($image)
        {
            $imgname        =time().'.'.$image->getClientOriginalExtension();
            $image->move('product_image',$imgname);
            $product->image =$imgname;
        }

        $product->save();

        return redirect()->back()->with('message', 'product Updated successfully!!!');

    }
}
