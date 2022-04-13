<?php

namespace App\Http\Controllers\Api;

use App\Models\Oee;
use App\Models\Smelting;
use App\Models\Workorder;
use App\Models\Production;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductionApiRequest;
use App\Http\Resources\Production\ProductionResource;
use App\Http\Resources\Production\ProductionCollection;


class ProductionApiController extends Controller
{   

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

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
    public function store(ProductionApiRequest $request)
    {
        //
        $data = $request->all();

        $productionId = Production::select('id')->where('workorder_id',$data['workorder_id'])->where('bundle_num',$request['bundle_num'])->get();
        if(count($productionId)!=0)
        {
            return response()->json([
                'messages'=>'workorder bundle data already input'
            ],400);
        }

        $workorderId = Workorder::select('id')->where('id',$data['workorder_id'])->get();
        if(count($workorderId)==0)
        {
            return response()->json([
                'messages'=>'workorder data not found'
            ],404);
        }

        $smeltingId = Smelting::select('id')->where('workorder_id',$workorderId[0]['id'])->where('bundle_num',$request['bundle_num'])->get();
        if(count($smeltingId)==0)
        {
            return response()->json([
                'messages'=>'smelting data not found'
            ],404);
        }

        Production::create($data);

        $smeltingData = Smelting::select('id')->where('workorder_id',$data['workorder_id'])->get();
        $smeltingNum = count($smeltingData);
        $productionData = Production::select('id')->where('workorder_id',$data['workorder_id'])->get();
        $productionNum = count($productionData);
        $oeeData        = Oee::select('id')->where('workorder_id',$data['workorder_id'])->first();
        if($smeltingNum == $productionNum && $oeeData != null){
            Workorder::where('id',$data['workorder_id'])->update(['status_wo'=>1,'status_prod'=>0]);
        }
        
        return response()->json([
            'messages'=>'New data submited successfully'
        ],201);
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
        $data = Production::find($id);

        if(is_null($data))
        {
            return response()->json([
                'message'=>'Resouce not found!'
            ],404);
        }

        return new ProductionResource($data);

        // return response()->json($data, 200);
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
    public function update(ProductionApiRequest $request, Production $production)
    {
        //
        $data = $request->all();

        $production->update($data);
        return response()->json($production,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        //
        $production->delete();
        return response()->json(null,200);
    }
}