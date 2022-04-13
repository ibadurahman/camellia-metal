<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Machine;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Schedule;
use App\Models\Smelting;
use App\Models\Workorder;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Oee;

class DataController extends Controller
{
    //User Data Controller
    public function users()
    {
        $users = User::query();
        return datatables()->of($users)
                ->addColumn('action','admin.user.action')
                ->addIndexColumn()
                ->toJson();
    }

    //Workorder Data Controller
    public function workorders()
    {
        $workorders = Workorder::where('status_wo','0')->where('status_prod','0')->orderBy('wo_order_num','ASC');
        return datatables()->of($workorders)
                ->addColumn('bb_qty_combine',function(Workorder $model){
                    $combines = $model->bb_qty_pcs . " / " . $model->bb_qty_coil;
                    return $combines;
                })
                ->addColumn('fg_size_combine',function(Workorder $model){
                    $combines = $model->fg_size_1 . " / " . $model->fg_size_2;
                    return $combines;
                })
                ->addColumn('tolerance',function(Workorder $model){
                    $combines = '(+'.$model->tolerance_plus . ", -" . $model->tolerance_minus . ')';
                    return $combines;
                })
                ->addColumn('status_prod',function(Workorder $model){
                    $combines = $model->status_prod;
                    if($combines){
                        return 'On Process';
                    }
                    return 'Waiting';
                })
                ->addColumn('status_wo',function(Workorder $model){
                    $combines = $model->status_wo;
                    if($combines){
                        return 'Closed';
                    }
                    return 'Open';
                })
                ->addColumn('user',function(Workorder $model){
                    return $model->user->name;
                })
                ->addColumn('machine',function(Workorder $model){
                    return $model->machine->name;
                })
                ->addColumn('action','admin.workorder.action')
                ->addColumn('smelting','admin.workorder.smelting')
                ->rawColumns(['smelting','action'])
                ->setRowClass(function(){
                    return 'workorder-row';
                })
                ->setRowId(function(Workorder $model){
                    return $model->id;
                })
                ->addIndexColumn()
                ->toJson();
    }

    public function wo_smeltings(Request $request)
    {
        $smeltings = Smelting::where('workorder_id',$request->wo_id)->get();
        if(!$smeltings){
            return;
        }
        return $smeltings;
    }

    //OnProcess Data Controller
    public function workordersOnProcess()
    {
        $workorders = Workorder::where('status_prod','1')->orderBy('wo_order_num','ASC');
        return datatables()->of($workorders)
                ->addColumn('bb_qty_combine',function(Workorder $model){
                    $combines = $model->bb_qty_pcs . " / " . $model->bb_qty_coil;
                    return $combines;
                })
                ->addColumn('fg_size_combine',function(Workorder $model){
                    $combines = $model->fg_size_1 . " / " . $model->fg_size_2;
                    return $combines;
                })
                ->addColumn('status_prod',function(Workorder $model){
                    $combines = $model->status_prod;
                    if($combines){
                        return 'On Process';
                    }
                    return 'Waiting';
                })
                ->addColumn('status_wo',function(Workorder $model){
                    $combines = $model->status_wo;
                    if($combines){
                        return 'Closed';
                    }
                    return 'Open';
                })
                ->addColumn('tolerance',function(Workorder $model){
                    $combines = '(+'.$model->tolerance_plus . ", -" . $model->tolerance_minus . ')';
                    return $combines;
                })
                ->addColumn('user',function(Workorder $model){
                    return $model->user->name;
                })
                ->addColumn('machine',function(Workorder $model){
                    return $model->machine->name;
                })
                ->setRowId(function(Workorder $model){
                    return $model->id;
                })
                ->addIndexColumn()
                ->toJson();
    }

    //OnProcess Data Controller
    public function workordersClosed()
    {
        $workorders = Workorder::where('status_wo','1')->orderBy('wo_order_num','ASC');
        return datatables()->of($workorders)
                ->addColumn('bb_qty_combine',function(Workorder $model){
                    $combines = $model->bb_qty_pcs . " / " . $model->bb_qty_coil;
                    return $combines;
                })
                ->addColumn('fg_size_combine',function(Workorder $model){
                    $combines = $model->fg_size_1 . " / " . $model->fg_size_2;
                    return $combines;
                })
                ->addColumn('status_prod',function(Workorder $model){
                    $combines = $model->status_prod;
                    if($combines){
                        return 'On Process';
                    }
                    return 'Waiting';
                })
                ->addColumn('status_wo',function(Workorder $model){
                    $combines = $model->status_wo;
                    if($combines){
                        return 'Closed';
                    }
                    return 'Open';
                })
                ->addColumn('tolerance',function(Workorder $model){
                    $combines = '(+'.$model->tolerance_plus . ", -" . $model->tolerance_minus . ')';
                    return $combines;
                })
                ->addColumn('user',function(Workorder $model){
                    return $model->user->name;
                })
                ->addColumn('machine',function(Workorder $model){
                    return $model->machine->name;
                })
                ->setRowId(function(Workorder $model){
                    return $model->id;
                })
                ->addIndexColumn()
                ->toJson();
    }

    //Productions Data Controller
    public function productions()
    {
        $productions = Production::query();
        return datatables()->of($productions)
                ->addColumn('wo_number',function(Production $model){
                    return $model->workorder->wo_number;
                })
                ->addColumn('smelting_num',function(Production $model){
                    $smelting = Smelting::select('smelting_num')->where('workorder_id',$model->workorder_id)->where('bundle_num',$model->bundle_num)->first();
                    return $smelting['smelting_num'];
                })
                ->addIndexColumn()
                ->toJson();
    }

    //Smeltings Data Controller
    public function smeltings(Request $request)
    {
        $smeltings = Smelting::where('workorder_id',$request->wo_id)->get();
        return datatables()->of($smeltings)
                ->addColumn('wo_number',function(Smelting $model){
                    return $model->workorder->wo_number;
                })
                ->addColumn('action','admin.smelting.action')
                ->addIndexColumn()
                ->toJson();
    }

    //Oees Data Controller
    public function oees(Request $request)
    {
        $productions = Oee::query();
        return datatables()->of($productions)
                ->addColumn('wo_number',function(Oee $model){
                    return $model->workorder->wo_number;
                })
                ->addIndexColumn()
                ->toJson();
    }
}
