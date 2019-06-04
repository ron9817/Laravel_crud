<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class prod extends Controller
{

    public function index()
    {
        $data=product::all();
        return view('viewView')->with('data',$data);
    }
    public function create()
    {
        return view('insertView');
    }
    public function store(Request $request)
    {
        $products=new product;
        $products->name=$request->name;
        $products->category=$request->category;
        $products->description=$request->description;
        $products->save();
        return response()
            ->json(['response' => 'Success']);

    }
    public function show($id)
    {
        $d=product::find($id);
        $response='<div class="row"><div class="col">ID</div><div class="col">'.$d->id.'</div></div><div class="row"><div class="col">Name</div><div class="col">'.$d->name.'</div></div><div class="row"><div class="col">Category</div><div class="col">'.$d->category.'</div></div><div class="row"><div class="col">Description</div><div class="col">'.$d->description.'</div></div></div>';
        
        return response()
            ->json(['response' => $response]);
    }

    public function edit($id)
    {
        $data=product::find($id);
        return view('updateView')->with("data",$data);
    }

    public function myupdate(Request $request, $id)
    {
        $products=product::find($id);
        $products->name=$request->name;
        $products->category=$request->category;
        $products->description=$request->description;
        $products->save();
        
        return response()
            ->json(['response' => 'Success']);
    }

    public function mydestroy($id)
    {
        product::destroy($id);
        return response()
            ->json(['response' => 'Success']);
    }
}
