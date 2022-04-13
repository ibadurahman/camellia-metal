@extends('admin.templates.default')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('admin.templates.partials.alerts')
                    <div class="card">
                        
                        <div class="card-header">
                            <h3 class="card-title">Waiting Process</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{route('admin.workorder.create')}}" class="btn btn-primary">Add New Workorder</a>         
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>WO Number</th>
                                        <th>BB Supplier</th>
                                        <th>BB Grade</th>
                                        <th>BB Diameter</th>
                                        <th>BB Qty</th>
                                        <th>FG Customer</th>
                                        <th>FG Size</th>
                                        <th>Tolerance</th>
                                        <th>FG Reduction Rate</th>
                                        <th>FG Shape</th>
                                        <th>FG Qty</th>
                                        <th>Operator</th>
                                        <th>Production Status</th>
                                        <th>Workorder Status</th>
                                        <th>Machine</th>
                                        <th>Production Date</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Leburan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> 
                    </div> 
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">On Process</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dataOnProcess" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>WO Number</th>
                                        <th>BB Supplier</th>
                                        <th>BB Grade</th>
                                        <th>BB Diameter</th>
                                        <th>BB Qty</th>
                                        <th>FG Customer</th>
                                        <th>FG Size</th>
                                        <th>FG Tolerance</th>
                                        <th>FG Reduction Rate</th>
                                        <th>FG Shape</th>
                                        <th>FG Qty</th>
                                        <th>Operator</th>
                                        <th>Production Status</th>
                                        <th>Workorder Status</th>
                                        <th>Machine</th>
                                        <th>Production Date</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Closed</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dataClosed" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>WO Number</th>
                                        <th>BB Supplier</th>
                                        <th>BB Grade</th>
                                        <th>BB Diameter</th>
                                        <th>BB Qty</th>
                                        <th>FG Customer</th>
                                        <th>FG Size</th>
                                        <th>FG Tolerance</th>
                                        <th>FG Reduction Rate</th>
                                        <th>FG Shape</th>
                                        <th>FG Qty</th>
                                        <th>Operator</th>
                                        <th>Production Status</th>
                                        <th>Workorder Status</th>
                                        <th>Machine</th>
                                        <th>Production Date</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> 
                    </div>  
                             
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->   
    <form action="" method="POST" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="Delete" style="display:none">
    </form>
@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
      $('#dataOnProcess').DataTable({
        processing:true,
        serverSide:true,
        ajax:'{{route('admin.workorder.dataonprocess')}}',
        columns:[
            {data:'wo_order_num'},
            {data:'wo_number'},
            {data:'bb_supplier'},
            {data:'bb_grade'},
            {data:'bb_diameter'},
            {data:'bb_qty_combine'},
            {data:'fg_customer'},
            {data:'fg_size_combine'},
            {data:'tolerance'},
            {data:'fg_reduction_rate'},
            {data:'fg_shape'},
            {data:'fg_qty'},
            {data:'operator'},
            {data:'status_prod'},
            {data:'status_wo'},
            {data:'machine'},
            {data:'production_date'},
            {data:'user'},  
            {data:'created_at'},
        ],
        "paging": false,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

      $('#dataClosed').DataTable({
        processing:true,
        serverSide:true,
        ajax:'{{route('admin.workorder.dataclosed')}}',
        columns:[
            {data:'wo_order_num'},
            {data:'wo_number'},
            {data:'bb_supplier'},
            {data:'bb_grade'},
            {data:'bb_diameter'},
            {data:'bb_qty_combine'},
            {data:'fg_customer'},
            {data:'fg_size_combine'},
            {data:'tolerance'},
            {data:'fg_reduction_rate'},
            {data:'fg_shape'},
            {data:'fg_qty'},
            {data:'operator'},
            {data:'status_prod'},
            {data:'status_wo'},
            {data:'machine'},
            {data:'production_date'},
            {data:'user'},  
            {data:'created_at'},
        ],
        "paging": false,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

      $('#dataTable').DataTable({
        processing:true,
        serverSide:true,
        ajax:'{{route('admin.workorder.data')}}',
        columns:[
            {data:'wo_order_num'},
            {data:'wo_number'},
            {data:'bb_supplier'},
            {data:'bb_grade'},
            {data:'bb_diameter'},
            {data:'bb_qty_combine'},
            {data:'fg_customer'},
            {data:'fg_size_combine'},
            {data:'tolerance'},
            {data:'fg_reduction_rate'},
            {data:'fg_shape'},
            {data:'fg_qty'},
            {data:'operator'},
            {data:'status_prod'},
            {data:'status_wo'},
            {data:'machine'},
            {data:'production_date'},
            {data:'user'},  
            {data:'created_at'},
            {data:'smelting'},
            {data:'action'},
        ],
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

      $("#dataTable").sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function() {
            var order = [];
            $('tr.workorder-row').each(function(index,element) {
                order.push({
                    id: $(this).attr('id'),
                    position: index+1
                });
            });
            $.ajax({
                type: "POST",
                dataType: "json", 
                url: '{{route('admin.workorder.updateorder')}}',
                data: {
                    order:order,
                    _token: '{{csrf_token()}}'
                },
                success: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Order update has been saved',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    location.reload();
                }
            });
        },
      });
    });
</script>
@endpush