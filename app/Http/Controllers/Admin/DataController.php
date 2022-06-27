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
use App\Models\Supplier;

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
    public function workordersDraft()
    {
        $workorders = Workorder::where('status_wo','draft')->orderBy('wo_order_num','ASC');
        return datatables()->of($workorders)
                ->addColumn('bb_qty_combine',function(Workorder $model){
                    $combines = $model->bb_qty_pcs . " / " . $model->bb_qty_coil;
                    return $combines;
                })
                ->addColumn('fg_size_combine',function(Workorder $model){
                    $combines = $model->fg_size_1 . " x " . $model->fg_size_2;
                    return $combines;
                })
                ->addColumn('tolerance',function(Workorder $model){
                    $combines = $model->tolerance_minus;
                    return round($combines,2);
                })
                // ->addColumn('status_prod',function(Workorder $model){
                //     $combines = $model->status_prod;
                //     if($combines){
                //         return 'On Process';
                //     }
                //     return 'Waiting';
                // })
                // ->addColumn('status_wo',function(Workorder $model){
                //     $combines = $model->status_wo;
                //     if($combines){
                //         return 'Closed';
                //     }
                //     return 'Open';
                // })
                ->addColumn('user',function(Workorder $model){
                    return $model->user->name;
                })
                ->addColumn('updated_by',function(Workorder $model){
                    $user = User::where('id',$model->edited_by)->first();
                    return $user->name;
                })
                ->addColumn('machine',function(Workorder $model){
                    return $model->machine->name;
                })
                ->addColumn('action','admin.workorder.action')
                ->addColumn('smelting','admin.workorder.smelting')
                ->addColumn('created_at',function(Workorder $model){
                    return date('Y-m-d H:i:s',strtotime($model->created_at));
                })
<<<<<<< HEAD
=======
                ->addColumn('updated_at',function(Workorder $model){
                    return date('Y-m-d H:i:s',strtotime($model->updated_at));
                })
>>>>>>> 09390d398a721377b295ee29a39fb6f4382eb011
                ->rawColumns(['smelting','action'])
                ->setRowClass(function(){
                    return 'workorder-row';
                })
                ->setRowId(function(Workorder $model){
                    return $model->id;
                })
                ->setRowClass(function(Workorder $model){
                    if($model->status_wo == 'draft'){
                        return 'workorder-row alert-danger';
                    }
                    return 'workorder-row';
                })
                ->setRowAttr([
                    'data-toggle'       => 'tooltip',
                    'data-placement'    => 'top',
                    'title'             => function(Workorder $model){
                        if($model->status_wo == 'draft'){
                            return 'Smelting Number Must Be Input Correctly';
                        }
                        return 'Data OK';
                    }
                ])
                ->addIndexColumn()
                ->toJson();
    }

    //Workorder Data Controller
    public function workordersWaiting()
    {
        $workorders = Workorder::where('status_wo','waiting')->orderBy('wo_order_num','ASC');
        return datatables()->of($workorders)
                ->addColumn('bb_qty_combine',function(Workorder $model){
                    $combines = $model->bb_qty_pcs . " / " . $model->bb_qty_coil;
                    return $combines;
                })
                ->addColumn('fg_size_combine',function(Workorder $model){
                    $combines = $model->fg_size_1 . " x " . $model->fg_size_2;
                    return $combines;
                })
                ->addColumn('tolerance',function(Workorder $model){
                    $combines = $model->tolerance_minus;
                    return round($combines,2);
                })
                // ->addColumn('status_prod',function(Workorder $model){
                //     $combines = $model->status_prod;
                //     if($combines){
                //         return 'On Process';
                //     }
                //     return 'Waiting';
                // })
                // ->addColumn('status_wo',function(Workorder $model){
                //     $combines = $model->status_wo;
                //     if($combines){
                //         return 'Closed';
                //     }
                //     return 'Open';
                // })
                ->addColumn('user',function(Workorder $model){
                    return $model->user->name;
                })
                ->addColumn('updated_by',function(Workorder $model){
                    $user = User::where('id',$model->edited_by)->first();
                    return $user->name;
                })
                ->addColumn('machine',function(Workorder $model){
                    return $model->machine->name;
                })
                ->addColumn('action','admin.workorder.action')
                ->addColumn('smelting','admin.workorder.smelting')
                ->addColumn('created_at',function(Workorder $model){
                    return date('Y-m-d H:i:s',strtotime($model->created_at));
                })
<<<<<<< HEAD
=======
                ->addColumn('updated_at',function(Workorder $model){
                    return date('Y-m-d H:i:s',strtotime($model->updated_at));
                })
>>>>>>> 09390d398a721377b295ee29a39fb6f4382eb011
                ->rawColumns(['smelting','action'])
                ->setRowClass(function(){
                    return 'workorder-row';
                })
                ->setRowId(function(Workorder $model){
                    return $model->id;
                })
                ->setRowClass(function(Workorder $model){
                    if($model->status_wo == 'draft'){
                        return 'workorder-row alert-danger';
                    }
                    return 'workorder-row';
                })
                ->setRowAttr([
                    'data-toggle'       => 'tooltip',
                    'data-placement'    => 'top',
                    'title'             => function(Workorder $model){
                        if($model->status_wo == 'draft'){
                            return 'Smelting Number Must Be Input Correctly';
                        }
                        return 'Data OK';
                    }
                ])
                ->addIndexColumn()
                ->toJson();
    }

    //OnProcess Data Controller
    public function workordersOnProcess()
    {
        $workorders = Workorder::where('status_wo','on process')->orderBy('wo_order_num','ASC');
        return datatables()->of($workorders)
                ->addColumn('bb_qty_combine',function(Workorder $model){
                    $combines = $model->bb_qty_pcs . " / " . $model->bb_qty_coil;
                    return $combines;
                })
                ->addColumn('fg_size_combine',function(Workorder $model){
                    $combines = $model->fg_size_1 . " / " . $model->fg_size_2;
                    return $combines;
                })
                // ->addColumn('status_prod',function(Workorder $model){
                //     $combines = $model->status_prod;
                //     if($combines){
                //         return 'On Process';
                //     }
                //     return 'Waiting';
                // })
                // ->addColumn('status_wo',function(Workorder $model){
                //     $combines = $model->status_wo;
                //     if($combines){
                //         return 'Closed';
                //     }
                //     return 'Open';
                // })
                ->addColumn('tolerance',function(Workorder $model){
                    $combines = '-' . $model->tolerance_minus;
                    return $combines;
                })
                ->addColumn('created_at',function(Workorder $model){
                    return date('Y-m-d H:i:s',strtotime($model->created_at));
                })
<<<<<<< HEAD
=======
                ->addColumn('updated_at',function(Workorder $model){
                    return date('Y-m-d H:i:s',strtotime($model->updated_at));
                })
>>>>>>> 09390d398a721377b295ee29a39fb6f4382eb011
                ->addColumn('user',function(Workorder $model){
                    return $model->user->name;
                })
                ->addColumn('updated_by',function(Workorder $model){
                    $user = User::where('id',$model->edited_by)->first();
                    return $user->name;
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
        $workorders = Workorder::where('status_wo','closed')->orderBy('wo_order_num','ASC');
        return datatables()->of($workorders)
                ->addColumn('bb_qty_combine',function(Workorder $model){
                    $combines = $model->bb_qty_pcs . " / " . $model->bb_qty_coil;
                    return $combines;
                })
                ->addColumn('fg_size_combine',function(Workorder $model){
                    $combines = $model->fg_size_1 . " / " . $model->fg_size_2;
                    return $combines;
                })
                // ->addColumn('status_prod',function(Workorder $model){
                //     $combines = $model->status_prod;
                //     if($combines){
                //         return 'On Process';
                //     }
                //     return 'Waiting';
                // })
                // ->addColumn('status_wo',function(Workorder $model){
                //     $combines = $model->status_wo;
                //     if($combines){
                //         return 'Closed';
                //     }
                //     return 'Open';
                // })
                ->addColumn('tolerance',function(Workorder $model){
                    $combines = '-' . $model->tolerance_minus;
                    return $combines;
                })
                ->addColumn('user',function(Workorder $model){
                    return $model->user->name;
                })
                ->addColumn('machine',function(Workorder $model){
                    return $model->machine->name;
                })
                ->addColumn('created_at',function(Workorder $model){
                    return date('Y-m-d H:i:s',strtotime($model->created_at));
                })
<<<<<<< HEAD
=======
                ->addColumn('updated_at',function(Workorder $model){
                    return date('Y-m-d H:i:s',strtotime($model->updated_at));
                })
                ->addColumn('updated_by',function(Workorder $model){
                    $user = User::where('id',$model->edited_by)->first();
                    return $user->name;
                })
>>>>>>> 09390d398a721377b295ee29a39fb6f4382eb011
                ->setRowId(function(Workorder $model){
                    return $model->id;
                })
                ->addIndexColumn()
                ->toJson();
    }

    public function suppliers()
    {
        $suppliers = Supplier::query();
        return datatables()->of($suppliers)
                ->addIndexColumn()
                ->addColumn('action','admin.supplier.action')
                
                ->toJson();
    }

    public function customers()
    {
        $customers = Customer::query();
        return datatables()->of($customers)
                ->addIndexColumn()
                ->addColumn('size',function(Customer $model){
                    $combines = $model->size_1 . " x " . $model->size_2;
                    return $combines;
                })
                ->addColumn('action','admin.customer.action')
                ->toJson();
    }

    // Leburan Data Controller
    public function wo_smeltings(Request $request)
    {
        $smeltings = Smelting::where('workorder_id',$request->wo_id)->orderby('bundle_num','asc')->get();
        if(!$smeltings){
            return;
        }
        return $smeltings;
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
                ->addColumn('created_at',function(Production $model){
                    return date('Y-m-d H:i:s',strtotime($model->created_at));
                })
                ->addIndexColumn()
                ->toJson();
    }

    //Smeltings Data Controller
    public function smeltings(Request $request)
    {
        $smeltings = Smelting::where('workorder_id',$request->wo_id)->orderBy('bundle_num','asc')->get();
        return datatables()->of($smeltings)
                ->addColumn('wo_number',function(Smelting $model){
                    return $model->workorder->wo_number;
                })
                ->addColumn('created_at',function(Smelting $model){
                    return date('Y-m-d H:i:s',strtotime($model->created_at));
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
                ->addColumn('created_at',function(Oee $model){
                    return date('Y-m-d H:i:s',strtotime($model->created_at));
                })
                ->addIndexColumn()
                ->toJson();
    }
}
