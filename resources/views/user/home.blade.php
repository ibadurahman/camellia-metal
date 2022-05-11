@extends('user.templates.default')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-6 col-6" id="onprocess_data">
                <div class="card card-row card-danger">
                    <div class="card-header">
                        <h3 class="card-title">
                            No Running Process
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                   
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kanban overlay">
                        <i class="fas fa-sync-alt fa-spin"></i>
                    </div>
                </div>       
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="speedVal">{{$speed}}<sup style="font-size: 20px">MPM</sup></h3>
                        <br>
                        <p>Current Machine Speed</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-speedometer"></i>
                    </div>
                    <div class="speed overlay">
                        <i class="fas fa-sync-alt fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="counterVal">{{$counter}}<sup style="font-size: 20px">Pcs</sup></h3>
                        <br>
                        <p>Total Production Counter</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <div class="counter overlay">
                        <i class="fas fa-sync-alt fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Speed Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="chart">
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    </div>
                    <div class="speed-chart overlay">
                        <i class="fas fa-sync-alt fa-spin"></i>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

     <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{asset('dist/css/loader.css')}}">
    <div class="loader-cover">
        <div class="loader-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <span>Loading</span>
        </div> 
    </div> --}}
    
     
@endsection

@push('scripts')

<script>
    window.setInterval(() => {
        $('.kanban').show();
        $('.speed').show();
        $('.counter').show();
        $('.speed-chart').show();

        $.ajax({
            method:'GET',
            url:'{{route('realtime.ajaxRequestAll')}}',
            dataType:'json',
            success:function(response){
                var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

                var areaChartData = {
                    labels  : response['created_at'],
                    datasets: [
                        {
                        label               : 'Production Speed',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : response['speed']
                        },
                    ]
                }

                var areaChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }],
                        yAxes: [{
                        gridLines : {
                            display : false,
                        }
                        }]
                    }
                }

                // This will get the first returned node in the jQuery collection.
                new Chart(areaChartCanvas, {
                    type: 'line',
                    data: areaChartData,
                    options: areaChartOptions
                })

                $('.speed-chart').hide();
            }
        });
        
        $.ajax({
            method:'GET',
            url:'{{route('realtime.ajaxRequest')}}',
                dataType:'json',
            success:function(response){
                document.getElementById('speedVal').innerHTML = response.speed +'<sup style="font-size: 20px">MPM</sup>';
                $('.speed').hide();
            }
        });
        
        
        $.ajax({
            method:'GET',
            url:'{{route('realtime.ajaxRequest')}}',
                dataType:'json',
            success:function(response){
                document.getElementById('counterVal').innerHTML = response.counter +'<sup style="font-size: 20px">MPM</sup>';
                $('.counter').hide();
            }
        });
           
        $.ajax({
            method:'GET',
            url:'{{route('realtime.workorderOnProcess')}}',
            dataType:'json',
            success:function(response){
                if(response == null){
                    return;
                }
                $('#onprocess_data').html(
                    '<div class="card card-row card-success">'+
                        '<div class="card-header">'+
                            '<h3 class="card-title">'+
                                'On Process'+
                            '</h3>'+
                        '</div>'+
                        '<div class="card-body">'+
                            '<div class="row">'+
                                '<div class="col-6">'+
                                    '<div class="card-body">'+
                                       '<div class="text-muted">'+
                                            '<p class="text-sm">Workorder'+
                                                '<b class="d-block">'+response.wo_number+'</b>'+
                                            '</p>'+
                                            '<p class="text-sm">Created By'+
                                                '<b class="d-block">'+response.createdBy+'</b>'+
                                            '</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-6">'+
                                    '<div class="card-body">'+
                                        '<div class="text-muted">'+
                                            '<p class="text-sm">Customer'+
                                                '<b class="d-block">'+response.customer+'</b>'+
                                            '</p>'+
                                            '<p class="text-sm">Mesin'+
                                                '<b class="d-block">'+response.machine+'</b>'+
                                            '</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            },
            error:function(response){
                $('.kanban').hide();
            }
        });
        
    }, 10000);
    
</script>

<script>
    
</script>
@endpush
