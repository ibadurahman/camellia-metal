<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Machine;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Workorder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WorkorderRequest;

class WorkorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.workorder.index',[
            'title' => 'Admin: Workorder'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // workorder number auto-generate
        $workorders = Workorder::select('wo_number')->where('wo_number','LIKE','%'.date("Y").'%')->max('wo_number');
        
        $woOrder = str_pad("1",5,"0",STR_PAD_LEFT);
        if($workorders)
        {
            $woOrder = explode("/",$workorders);
            $woOrder = (integer) $woOrder[2] + 1;
            $woOrder = str_pad($woOrder,5,"0",STR_PAD_LEFT);
        }
        
        //
        return view('admin.workorder.create',[
            'wo_num'        => 'WO/'.date("Y")."/".$woOrder,
            'title'         => 'Admin: Create Workorder',
            'machines'      => Machine::orderBy('name','asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkorderRequest $request)
    {
        //
        $workorders = Workorder::select('wo_order_num')->max('wo_order_num');
        $woOrderNum = $workorders + 1;
        
        $workorder = Workorder::create([
            'wo_number'         =>$request->wo_number,
            'bb_supplier'       =>$request->bb_supplier,
            'bb_grade'          =>$request->bb_grade,
            'bb_diameter'       =>$request->bb_diameter,
            'bb_qty_pcs'        =>$request->bb_qty_pcs,
            'bb_qty_coil'       =>$request->bb_qty_coil,
            'fg_customer'       =>$request->fg_customer,
            'fg_size_1'         =>$request->fg_size_1,
            'fg_size_2'         =>$request->fg_size_2,
            'tolerance_plus'    =>$request->tolerance_plus,
            'tolerance_minus'   =>$request->tolerance_minus,
            'fg_reduction_rate' =>$request->fg_reduction_rate,
            'fg_shape'          =>$request->fg_shape,
            'fg_qty'            =>$request->fg_qty,
            'wo_order_num'      =>$woOrderNum,
            'operator'          =>$request->operator,
            'status_prod'       => '0',
            'status_wo'         => '0',
            'production_date'   =>$request->production_date,
            'user_id'           =>Auth::user()->id,
            'machine_id'        =>$request->machine_id,
        ]);

        return redirect()->route('admin.workorder.index')->with('success','Data Added Successfully');
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
    public function edit(Workorder $workorder)
    {
        return view('admin.workorder.edit',[
            'title'         => 'Admin: edit Workorder',
            'workorder'     => $workorder,
            'machines'      => Machine::orderBy('name','asc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkorderRequest $request, Workorder $workorder)
    {
        //
        $workorders = Workorder::select('wo_order_num')->max('wo_order_num');
        $woOrderNum = $workorders + 1;
        
        $workorder->update([
            'wo_number'         =>$request->wo_number,
            'bb_supplier'       =>$request->bb_supplier,
            'bb_grade'          =>$request->bb_grade,
            'bb_diameter'       =>$request->bb_diameter,
            'bb_qty_pcs'        =>$request->bb_qty_pcs,
            'bb_qty_coil'       =>$request->bb_qty_coil,
            'fg_customer'       =>$request->fg_customer,
            'fg_size_1'         =>$request->fg_size_1,
            'fg_size_2'         =>$request->fg_size_2,
            'tolerance_plus'    =>$request->tolerance_plus,
            'tolerance_minus'   =>$request->tolerance_minus,
            'fg_reduction_rate' =>$request->fg_reduction_rate,
            'fg_shape'          =>$request->fg_shape,
            'fg_qty'            =>$request->fg_qty,
            'wo_order_num'      =>$request->wo_order_num,
            'operator'          =>$request->operator,
            'status_prod'       => '0',
            'status_wo'         => '0',
            'production_date'   =>$request->production_date,
            'user_id'           =>Auth::user()->id,
            'machine_id'        =>$request->machine_id,
        ]);

        return redirect()->route('admin.workorder.index')->with('success','Data Updated Successfully');
    }

    public function updateOrder(Request $request){
        $workorders = Workorder::where('status_wo','0')->get();

        // $workorders = Workorder::where('status_wo','0')->get();
        foreach($workorders as $workorder){
            $workorder->timestamps = false;
            $id = $workorder->id;

            foreach($request->order as $order){
                if($order['id'] == $id){
                    $workorder->update(['wo_order_num' => $order['position']]);
                }
            }
        }

        return response()->json([
            'message'=>'updated successfully'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workorder $workorder)
    {
        //
        $workorder->delete();
        return redirect()->route('admin.workorder.index')->with('success','Data Deleted Successfully');
    }
}
