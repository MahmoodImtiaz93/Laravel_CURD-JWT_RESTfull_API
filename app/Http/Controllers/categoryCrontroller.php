<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;
class categoryCrontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Categorys::all();
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
            'productname'=>'required',
            'Drisciption'=>'required',
            'barcodenum'=>'required'
         ]);
         return Categorys::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Categorys::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorys=Categorys::find($id);
        $categorys-> update($request->all());
        return $categorys;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         return Categorys::destroy($id);
    }

    /**
     * Search the specified Name from storage.
     *
     * @param  str  $id
     * @return \Illuminate\Http\Response
     */
    public function search($productname)
    {
        return Categorys::where('productname','like','%'.$productname.'%')->get();
    }

}
