<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WareHouse;
use App\Models\OrderDetail;
use DB;
use Auth;
class AdminExportWareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
        if($warehouse->total == 0){

            return redirect()->intended('admin/order')->with('error', trans('message.error_warehouse'));
        }
        else{
            $warehouse->total = $request->total - $request->quantity;
            DB::table('order_detail')->where('id', $request->idorder)->update(['status' => 'Đã Xuất Kho']);
            $warehouse->save();
            return redirect()->intended('admin/order')->with('success', trans('message.success_warehouse'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
