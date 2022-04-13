@extends('user.templates.default')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Workorder Data</h3>
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
                                        <th>WO Number</th>
                                        <th>Total Runtime</th>
                                        <th>Total Downtime</th>
                                        <th>Total Production</th>
                                        <th>Status Production</th>
                                        <th>Status WO</th>
                                        <th>Action</th>
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
            ajax:'{{route('workorder.ajaxRequestAll')}}',
            columns:[
                {data:'DT_RowIndex',orderable:false, searchable:false},
                {data:'wo_number'},
                {data:'total_runtime'},
                {data:'total_downtime'},
                {data:'total_production'},
                {data:'status_prod'},
                {data:'status_wo'},
                {data:'action'}
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