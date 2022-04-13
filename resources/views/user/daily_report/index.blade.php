@extends('user.templates.default')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daily Report Data</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Report Date</th>
                                        <th>Total Runtime</th>
                                        <th>Total Downtime</th>
                                        <th>Total Pcs</th>
                                        <th>Total Weight FG</th>
                                        <th>Total Weight BB</th>
                                        <th>Average Speed</th>
                                        <th>Created At</th>
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
@endsection

@push('scripts')
<script>
    $(function () {
      $('#dataTable').DataTable({
        processing:true,
        serverSide:true,
        ajax:'{{route('dailyReport.ajaxRequestAll')}}',
        columns:[
            {data:'DT_RowIndex',orderable:false, searchable:false},
            {data:'report_date'},
            {data:'total_runtime'},
            {data:'total_downtime'},
            {data:'total_pcs'},
            {data:'total_weight_fg'},
            {data:'total_weight_bb'},
            {data:'average_speed'},
            {data:'created_at'},
        ],
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endpush