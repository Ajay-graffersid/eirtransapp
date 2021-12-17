<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = DB::select('select * from items');
     return view('item.index',['items'=>$item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:items,name',
           
        ]);
      
        $name= $request->input('name');
            
        DB::table('items')->insert(
            ['name' =>$name ]
        );	 
        
      
      $msg="Item added successfully.";
      
      $request->session()->flash('msg', $msg);
		 
	  	 return redirect()->route('item.index');
		
    
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|unique:items,name',
           
        ]);
        
        Item::where('id', $item->id)
       ->update([
           'name' => $request->name,
          
        ]);
    
        return redirect()->route('item.index')
                        ->with('msg','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
    
        return redirect()->route('item.index')
                        ->with('msg','Item deleted successfully');
    }

    public function iteminctive(Request $request,$id)
    {
    //    $lane = Lane::find($request->id);
       $users = DB::update('update items set status = ? where id = ?',[0,$request->id]);
       
       return redirect()->route('item.index');
  
    }

    public function itemstatusupdate(Request $request,$id)
    {
    //    $lane = Lane::find($request->id);
       $users = DB::update('update  items set status = ? where id = ?',[1,$request->id]);
       
       return redirect()->route('item.index');
  
    }
}
