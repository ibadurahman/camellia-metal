@extends('admin.templates.default')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-tittle">Smelting Number</h3>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>WO Number</th>
                                        <th>No. Bundle</th>
                                        <th>Weight</th>
                                        <th>No. Leburan</th>
                                        <th>Area</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add New Smelting</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.smelting.store')}}" method="POST">
                                @csrf
                                <input id="wo-id" name="wo_id" type="text" value="{{$wo_id}}" hidden>
                                <div class="form-group">
                                    <label for="">WO Number</label>
                                    <input id="wo-number" name="wo_num" type="text" readonly class="form-control @error('wo_num') is-invalid @enderror" placeholder="WO Number" value="{{$wo_number ?? old('wo_num')}}">
                                    @error('wo_num')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Weight</label>
                                    <input id="smelt-weight" name="weight" type="text" class="form-control @error('weight') is-invalid @enderror" placeholder="Weight" value="{{old('weight')}}">
                                    @error('weight')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Smelting Number</label>
                                    <input id="smelt-num" name="smelting_num" type="text" class="form-control @error('smelting_num') is-invalid @enderror" placeholder="No. Leburan" value="{{old('smelting_num')}}">
                                    @error('smelting_num')
                                        <span class="text-danger help-block">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Area</label>
                                    <div class="row">
                                        <input id="smelt-area" name="area" type="text" class="form-control @error('area') is-invalid @enderror" placeholder="Area" value="{{old('area')}}">
                                        @error('area')
                                            <span class="text-danger help-block">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <button id="create-smelt" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
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
    $('#dataTable').DataTable({
        processing:true,
        serverSide:true,
        ajax:{
            type:'GET', 
            url:'{{route('admin.smelting.data')}}', 
            data:{
                wo_id: $('#wo-id').val(),
            }
        },
        columns:[
            {data:'wo_number'},
            {data:'bundle_num'},
            {data:'weight'},
            {data:'smelting_num'},
            {data:'area'},
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
</script>
<script>
    var newTest = {'wo_id':$('#wo-id').val(),'weight':null,'smelting_num':null,'area':null};
    $('#smelt-weight').on('keyup',function(){
        newTest.weight = $(this).val();
    });
    $('#smelt-num').on('keyup',function(){
        newTest.smelting_num = $(this).val();
    });
    $('#smelt-area').on('keyup',function(){
        newTest.area = $(this).val();
    });
    $('#create-smelt').on('click', function(event){
        event.preventDefault();
		if(newTest.wo_id == null || newTest.weight == null || newTest.smelting_num == null || newTest.area == null){
			alert('Column cannot be null');
		}else{
			addRow(newTest)
			$('#smelt-weight').val('');
			$('#smelt-num').val('');
			$('#smelt-area').val('');
		}
	});

    function addRow(obj){
        $.ajax({
            type: "POST",
            dataType: "json", 
            url: '{{route('admin.smelting.addSmelting')}}',
            data: {
                wo_id:obj.wo_id,
                weight:obj.weight,
                smelting_num:obj.smelting_num,
                area:obj.area,
                _token: '{{csrf_token()}}'
            },
            success: function(response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Smelting data has been saved',
                    showConfirmButton: false,
                    timer: 2000
                });
                location.reload();
            },
            fail: function(response){
                Swal.fire({
                    position: 'top-end',
                    icon: 'Failed',
                    title: 'Failed to add new data. check data again',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    }
</script>
@endpush