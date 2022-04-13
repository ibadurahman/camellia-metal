@extends('admin.templates.default')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Machine</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.workorder.update',$workorder)}}" method="POST">
                                @csrf
                                @method("PUT")
                                <input type="hidden" value="{{$workorder->id}}" name="workorder_id" />
                                <div class="form-group">
                                    <label for="">WO Number</label>
                                    <input name="wo_number" readonly type="text" class="form-control @error('wo_number') is-invalid @enderror" placeholder="Workorder Number" value="{{$workorder->wo_number ?? old('wo_number')}}">
                                    @error('wo_number')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="alert alert-primary text-center" role="alert">
                                    Bahan Baku
                                </div>
                                <div class="form-group">
                                    <label for="">Supplier</label>
                                    <input name="bb_supplier" type="text" class="form-control @error('bb_supplier') is-invalid @enderror" placeholder="(Bahan Baku) Supplier" value="{{$workorder->bb_supplier ?? old('bb_supplier')}}">
                                    @error('bb_supplier')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Grade</label>
                                    <input name="bb_grade" type="text" class="form-control @error('bb_grade') is-invalid @enderror" placeholder="(Bahan Baku) Grade" value="{{$workorder->bb_grade ?? old('bb_grade')}}">
                                    @error('bb_grade')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Diameter</label>
                                    <div class="row">
                                        <div class="col-11">
                                            <input name="bb_diameter" type="text" class="form-control @error('bb_diameter') is-invalid @enderror" placeholder="(Bahan Baku) Diameter" value="{{$workorder->bb_diameter ?? old('bb_diameter')}}">
                                            @error('bb_diameter')
                                                <span class="text-danger help-block">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <label for="">mm</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Qty</label>
                                    <div class="row">
                                        <div class="col-5">
                                            <input name="bb_qty_pcs" type="text" class="form-control @error('bb_qty_pcs') is-invalid @enderror" placeholder="(Bahan Baku) Qty PCS" value="{{$workorder->bb_qty_pcs ?? old('bb_qty_pcs')}}">
                                            @error('bb_qty_pcs')
                                                <span class="text-danger help-block">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <label for="">Kg</label>
                                        </div>
                                        <div class="col-5">
                                            <input name="bb_qty_coil" type="text" class="form-control @error('bb_qty_coil') is-invalid @enderror" placeholder="(Bahan Baku) Qty COIL" value="{{$workorder->bb_qty_coil ?? old('bb_qty_coil')}}">
                                            @error('bb_qty_coil')
                                                <span class="text-danger help-block">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <label for="">Coil</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-primary text-center" role="alert">
                                    Finish good
                                </div>
                                <div class="form-group">
                                    <label for="">Customer</label>
                                    <input name="fg_customer" type="text" class="form-control @error('fg_customer') is-invalid @enderror" placeholder="(Finish Good) Customer" value="{{$workorder->fg_customer ?? old('fg_customer')}}">
                                    @error('fg_customer')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Size</label>
                                    <div class="row">
                                        <div class="col-5">
                                            <input name="fg_size_1" type="text" class="form-control @error('fg_size_1') is-invalid @enderror" placeholder="(Finish Good) Size" value="{{$workorder->fg_size_1 ?? old('fg_size_1')}}">
                                            @error('fg_size_1')
                                                <span class="text-danger help-block">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <label class="right" for="">X</label>
                                        </div>
                                        <div class="col-5">
                                            <input name="fg_size_2" type="text" class="form-control @error('fg_size_2') is-invalid @enderror" placeholder="(Finish Good) Size" value="{{$workorder->fg_size_2 ?? old('fg_size_2')}}">
                                            @error('fg_size_2')
                                                <span class="text-danger help-block">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-1">
                                            <label for="">mm</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tolerance (+)</label>
                                    <input name="tolerance_plus" type="text" class="form-control @error('tolerance_plus') is-invalid @enderror" placeholder="Tolerance (+)" value="{{$workorder->tolerance_plus ?? old('tolerance_plus')}}">
                                    @error('tolerance_plus')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Tolerance (-)</label>
                                    <input name="tolerance_minus" type="text" class="form-control @error('tolerance_minus') is-invalid @enderror" placeholder="Tolerance (-)" value="{{$workorder->tolerance_minus ?? old('tolerance_minus')}}">
                                    @error('tolerance_minus')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Reduction Rate</label>
                                    <input name="fg_reduction_rate" type="text" class="form-control @error('fg_reduction_rate') is-invalid @enderror" placeholder="(Finish Good) Reduction Rate" value="{{$workorder->fg_reduction_rate ?? old('fg_reduction_rate')}}">
                                    @error('fg_reduction_rate')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Shape</label>
                                    <input name="fg_shape" type="text" class="form-control @error('fg_shape') is-invalid @enderror" placeholder="(Finish Good) Shape" value="{{$workorder->fg_shape ?? old('fg_shape')}}">
                                    @error('fg_shape')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Qty</label>
                                    <input name="fg_qty" type="text" class="form-control @error('fg_qty') is-invalid @enderror" placeholder="(Finish Good) Qty" value="{{$workorder->fg_qty ?? old('fg_qty')}}">
                                    @error('fg_qty')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Operator</label>
                                    <input name="operator" type="text" class="form-control @error('operator') is-invalid @enderror" placeholder="(Finish Good) Operator" value="{{$workorder->operator ?? old('operator')}}">
                                    @error('operator')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Machine</label>
                                    <select name="machine_id" class="form-control" id="">
                                        @foreach ($machines as $machine)
                                            <option 
                                                value="{{$machine->id}}"
                                                @if ($machine->id == $workorder->machine_id)
                                                    selected
                                                @endif
                                            >
                                                {{$machine->name}}
                                            </option>  
                                        @endforeach
                                    </select>
                                    @error('machine_id')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Date and time:</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input name="production_date" type="text" class="form-control datetimepicker-input @error('production_date') is-invalid @enderror" data-target="#reservationdatetime" value="{{$workorder->production_date ?? old('production_date')}}"/>
                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('production_date')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <input type="hidden" value="{{$workorder->wo_order_num}}" name="wo_order_num" />
                                <div class="form-group">
                                    <input value="Edit" type="submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->  
@endsection