<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Validator;
use Image;



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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Product = Product::paginate(10);
        $Category = Category::get();
      
        return view('Product.view',compact('Product','Category')); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = Category::get();
        return view('Product.add',compact('Category')); 

    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = array(
                'name' => 'required',
                'image' => 'required',
                'category' => 'required | not_in:0',
                'desc' => 'required');

        $validate = Validator::make($data,$rules);
        if($validate->fails()){         
            return redirect()->back()->withInput()->withErrors($validate);  
        }else{

           if ($data['image'] != "") {
                $extension = $data['image']->getClientOriginalExtension();
                if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg' ) {
                    $fileName = time() . '.' .$data['image']->getClientOriginalExtension();
                    $destinationPath = "public/product";
                    $data['image']->move($destinationPath, $fileName);
                    $documentFile = $destinationPath . '/' . $fileName;
                    $image = $fileName;
                }else{

                   $Message = "invalid image extension";
                   return redirect('/product/add')->with('error',$Message);     
                }
            }

            $form_data = array(
              'name'  => $data['name'],
              'image' => $image,
              'category' => $data['category'],
              'desc'    => $data['desc']
            );

            $Product = Product::create($form_data);
            $Message = "successfully added";
            return redirect('/product/view')->with('success',$Message);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $Product = Product::find($request->id);
        $Category = Category::get();
        return view('Product.edit',compact('Category','Product'));    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        
           if (@$data['image'] != "") {
                $extension = @$data['image']->getClientOriginalExtension();
                if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg' ) {
                    $fileName = time() . '.' .@$data['image']->getClientOriginalExtension();
                    $destinationPath = "public/product";
                    @$data['image']->move($destinationPath, $fileName);
                    $documentFile = $destinationPath . '/' . $fileName;
                    $image = $fileName;
                }
            }

            $Product = Product::find($data['id']);
            $form_data = array(

              'name'        => @$data['name'] ? $data['name'] :  $Product->name,
              'image'       => @$image ? @$image : $Product->image,
              'category'    => @$data['category'] ? $data['category']: $Product->category,
              'desc'        => @$data['desc'] ? $data['desc'] : $Product->desc
            );

            $Product->update($form_data);
            $Message = "update successfully";
            return redirect('/product/view')->with('success',$Message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $Product = Product::find($request->id)->delete();
        $Message = " Delete successfully";
        return redirect('/product/view')->with('error',$Message);

    }

}
