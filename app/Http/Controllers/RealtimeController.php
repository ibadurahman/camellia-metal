<?php

namespace App\Http\Controllers;

use App\Models\Realtime;
use App\Models\Workorder;
use Illuminate\Http\Request;

class RealtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.home',[
            'title'     => 'Home',
            'speed'     => 0,
            'counter'   => 0
        ]);
    }

    public function ajaxRequest()
    {
        //
        $woId =  Workorder::where('status_prod',1)->orderBy('wo_order_num','asc')->first();
        if(!$woId)
        {
            return response()->json([
                'speed'     => 0,
                'counter'   => 0
            ]);
        }
        $data =  Realtime::where('workorder_id',$woId['id'])->orderBy('created_at','desc')->first();
        return response()->json([
            'speed'     => $data->speed,
            'counter'   => $data->counter
        ]);
    }

    public function ajaxRequestAll()
    {
        //
        $woId =  Workorder::where('status_prod',1)->orderBy('wo_order_num','asc')->first();
        if(!$woId)
        {
            return response()->json([
                'speed'         => [],
                'created_at'    => []
            ]);
        }

        $data = json_decode(Realtime::select('speed','created_at')->where('workorder_id',$woId['id'])->orderBy('created_at','desc')->limit(20)->get());
        $response = [
            'speed'         => array_column($data,'speed'),
            'created_at'    => array_column($data,'created_at')
        ];
        return response()->json($response);
        // return response()->json([
        //     'speed'     => $data->speed,
        //     'counter'   => $data->counter,
        //     'created_at'=> $data->created_at
        // ]);
    }

    public function workorderOnProcess()
    {
        //
        $data =  Workorder::where('status_prod',1)->orderBy('wo_order_num','asc')->first();
        if(!$data){
            return null;
        }
        return response()->json([
            'wo_number'     => $data['wo_number'],
            'createdBy'     => $data->user->name,
            'customer'      => $data['fg_customer'],
            'machine'       => $data->machine->name
        ],200);
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
     * @param  \App\Models\Realtime  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show(Realtime $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realtime  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Realtime $monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realtime  $realtime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Realtime $monitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realtime  $realtime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Realtime $monitoring)
    {
        //
    }
}