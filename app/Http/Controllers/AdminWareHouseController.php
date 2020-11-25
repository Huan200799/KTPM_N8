<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WareHouse;
use DB;
use Illuminate\Support\Facades\Config;
class AdminWareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = DB::table('vp_kho')
        ->join('categories', 'vp_kho.categories_id', '=', 'categories.id')
        ->select('vp_kho.*', 'categories.categories_name')->orderby('id', 'desc')->paginate(Config::get('app.paginate'));
        return view('admin.warehouse.addwarehouse', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warehouse = new WareHouse;
        $warehouse->total = $request->total;
        $warehouse->categories_id = $request->categories_id;
        $warehouse->save();

        return redirect()->intended('admin/warehouse');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouses = WareHouse::find($id);
        return view('admin.warehouse.editwarehouse', compact('warehouses'));
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
        $warehouse = WareHouse::find($id);
        $warehouse->total = $request->total;
        $warehouse->categories_id = $request->categories_id;
        $warehouse->save();

        return redirect()->intended('admin/warehouse');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WareHouse::destroy($id);
        return back();
    }
}
