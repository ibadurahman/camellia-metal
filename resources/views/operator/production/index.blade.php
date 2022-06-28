@extends('templates.default')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Workorder</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Total Runtime</span>
                                            {{-- @if (!$oee)
                                                <span class="info-box-number text-center text-muted mb-0">0</span>
                                            @else
                                                <span class="info-box-number text-center text-muted mb-0"></span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Total Downtime</span>
                                            {{-- @if (!$oee)
                                                <span class="info-box-number text-center text-muted mb-0">0</span>
                                            @else
                                                <span class="info-box-number text-center text-muted mb-0"></span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Total Production</span>
                                            <span class="info-box-number text-center text-muted mb-0"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- Production Performance Column --}}
                                <div class="col-6">
                                    <h4>Production Result</h4>
                                    <div class="card card-primary card-outline">
                                        <div class="card-header p-2">
                                            <p>Bundle Num</p>
                                            <ul class="nav nav-pills">
                                                @foreach ($smeltings as $smelt)
                                                    <li class="nav-item"><a class="nav-link" href="#production{{$smelt->bundle_num}}" data-toggle="tab">{{$smelt->bundle_num}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="card-body box-profile">
                                            @if (count($productions) == 0)
                                                <div class="alert alert-danger text-center" role="alert">
                                                    No Data
                                                </div>
                                            @else
                                                <div class="tab-content">
                                                    @foreach ($smeltings as $smelt)
                                                        <div class="tab-pane" id="production{{$smelt->bundle_num}}">
                                                            @php
                                                                $found = 0;
                                                            @endphp
                                                            @foreach ($productions as $prod)
                                                                @if ($smelt->bundle_num == $prod->bundle_num)
                                                                    <ul class="list-group list-group-unbordered mb-3">
                                                                        @foreach($smeltings as $smelt)
                                                                            @if ($smelt->bundle_num == $prod->bundle_num)
                                                                                <h3 class="profile-username text-center">No. Leburan : {{$smelt->smelting_num}}</h3>
                                                                            @endif
                                                                        @endforeach
                                                                        <li class="list-group-item">
                                                                            <b>Dies Number</b> <p class="float-right">{{$prod->dies_num}}</p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Diameter Ujung (mm)</b> <p class="float-right">{{$prod->diameter_ujung}} mm</p> 
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Diameter Tengah (mm)</b> <p class="float-right">{{$prod->diameter_tengah}} mm</p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Diameter Ekor (mm)</b> <p class="float-right">{{$prod->diameter_ekor}} mm</p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Kelurusan Actual</b> <p class="float-right">{{$prod->kelurusan_aktual}} mm</p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Berat FG (Kg)</b> <p class="float-right">{{$prod->berat_fg}} Kg</p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Pcs Per Bundle (Pcs)</b> <p class="float-right">{{$prod->pcs_per_bundle}} Pcs</p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Bundle Judgement</b> <p class="float-right">
                                                                                @if ($prod->bundle_judgement == '1')
                                                                                    Good
                                                                                @else
                                                                                    No Good
                                                                                @endif
                                                                                {{-- {{$prod->bundle_judgement}} --}}
                                                                            </p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Visual</b> <p class="float-right">
                                                                                {{$prod->visual}}
                                                                                {{-- {{$prod->visual}} --}}
                                                                            </p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Created by </b> <p class="float-right">
                                                                                {{$prod->user->name}} ({{date('Y-m-d H:i:s',strtotime($prod->created_at))}})
                                                                                {{-- {{$prod->visual}} --}}
                                                                            </p>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <b>Last Edit by </b> <p class="float-right">
                                                                                {{$prod->user->name}} ({{date('Y-m-d H:i:s',strtotime($prod->updated_at))}})
                                                                                {{-- {{$prod->visual}} --}}
                                                                            </p>
                                                                        </li>
                                                                    </ul>
                                                                    @php
                                                                        $found = 1;
                                                                    @endphp
                                                                    @break
                                                                @endif
                                                            @endforeach
                                                            @if ($found == 0)
                                                                <h3 class="profile-username text-center">No. Leburan : {{$smelt->smelting_num}}</h3>
                                                                <div class="alert alert-danger text-center" role="alert">
                                                                    No Data
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>                                        
                                </div>
                                {{-- Production Report Column --}}
                                <div class="col-6">
                                    <h4>Production Report</h4>
                                    <div class="card card-primary card-outline">
                                        <div class="card-header p-2">
                                            Production Report
                                        </div>
                                        <div class="card-body box-profile">
                                            @if (count($smeltingInputList)==0)
                                                <div class="alert alert-success text-center" role="alert">
                                                    All Data Already Input
                                                </div>
                                            @else
                                                <form id="production-report" action="" method="post">
                                                    @csrf
                                                    <h3 id="smelting-num" class="profile-username text-center">No. Leburan :</h3>
                                                    <input hidden name="workorder_id" type="text" class="form-control @error('workorder_id') is-invalid @enderror" placeholder="No. Leburan" value="{{$workorder->id??old('workorder_id')}}">
                                                    <div class="form-group">
                                                        <label for="">Bundle Number</label>
                                                        <select name="bundle-num" class="form-control @error('bundle-num') is-invalid @enderror">
                                                            <option value="">-- Select Bundle Number --</option>
                                                            @foreach ($smeltingInputList as $smelt)
                                                                <option value="{{$smelt}}">{{$smelt}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Dies Number</label>
                                                        <input type="text" name="dies-number" class="form-control @error('dies-number') is-invalid @enderror" placeholder="Dies Number" value="{{old('dies-number')}}">
                                                        @error('dies-number')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Diameter Ujung (mm)</label>
                                                        <input type="text" name="diameter-ujung" class="form-control @error('diameter-ujung') is-invalid @enderror" placeholder="Diameter Ujung" value="{{old('diameter-ujung')}}">
                                                        @error('diameter-ujung')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Diameter Tengah (mm)</label>
                                                        <input type="text" name="diameter-tengah" class="form-control @error('diameter-tengah') is-invalid @enderror" placeholder="Diameter Tengah" value="{{old('diameter-tengah')}}">
                                                        @error('diameter-tengah')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Diameter Ekor (mm)</label>
                                                        <input type="text" name="diameter-ekor" class="form-control @error('diameter-ekor') is-invalid @enderror" placeholder="Diameter Ekor" value="{{old('diameter-ekor')}}">
                                                        @error('diameter-ekor')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Kelurusan Aktual</label>
                                                        <input type="text" name="kelurusan-aktual" class="form-control @error('kelurusan-aktual') is-invalid @enderror" placeholder="Kelurusan Aktual" value="{{old('kelurusan-aktual')}}">
                                                        @error('kelurusan-aktual')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Panjang Aktual (mm)</label>
                                                        <input type="text" name="panjang-aktual" class="form-control @error('panjang-aktual') is-invalid @enderror" placeholder="Panjang Aktual" value="{{old('panjang-aktual')}}">
                                                        @error('panjang-aktual')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Berat Finish Good (KG)</label>
                                                        <input type="text" name="berat-fg" class="form-control @error('berat-fg') is-invalid @enderror" placeholder="Berat Finish Good" value="{{old('berat-fg')}}">
                                                        @error('berat-fg')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Pcs per Bundle (Pcs)</label>
                                                        <input type="text" name="pcs-per-bundle" class="form-control @error('pcs-per-bundle') is-invalid @enderror" placeholder="Pcs Per Bundle" value="{{old('pcs-per-bundle')}}">
                                                        @error('pcs-per-bundle')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Bundle Judgement</label>
                                                        <select name="bundle-judgement" id="judgement-select" class="form-control @error('bundle-judgement') is-invalid @enderror">
                                                            <option disabled selected value="">-- Select Judgement --</option>
                                                            <option value="1">Good</option>
                                                            <option value="0">Not Good</option>
                                                        </select>
                                                        @error('bundle-judgement')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Visual</label>
                                                        <select name="visual" id="visual-options" class="form-control @error('visual') is-invalid @enderror">
                                                            
                                                        </select>
                                                        @error('visual')
                                                            <span class="text-danger help-block">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <button class="btn btn-primary">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- OEE Performance Column --}}
                                <div class="col-6">
                                    <h4>OEE Performance</h4>
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">Downtime Data</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body box-profile">
                                            @if (!$oee)
                                                <div class="alert alert-danger text-center" role="alert">
                                                    No Data
                                                </div>
                                            @else
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <div class="alert alert-success text-center" role="alert">
                                                        Management Downtime
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="tab-content p-0">
                                                                <div class="chart tab-pane active" id="management-chart" style="position: relative; height: 300px;">
                                                                    <canvas id="management-chart-canvas" height="300" style="height: 300px;"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <li class="list-group-item">
                                                        <b>Briefing (min)</b> <p class="float-right">{{$oee->dt_briefing}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Check Shot Blast (min)</b> <p class="float-right">{{$oee->dt_cek_shot_blast}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Check Mesin (min)</b> <p class="float-right">{{$oee->dt_cek_mesin}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Sambung Bahan (min)</b> <p class="float-right">{{$oee->dt_sambung_bahan}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Setting Awal (min)</b> <p class="float-right">{{$oee->dt_setting_awal}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Selesai Satu Bundle (min)</b> <p class="float-right">{{$oee->dt_selesai_satu_bundle}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Cleaning Area Mesin (min)</b> <p class="float-right">{{$oee->dt_cleaning_area_mesin}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Istirahat (min)</b> <p class="float-right">{{$oee->dt_istirahat}} min</p>
                                                    </li>
                                                    <div class="alert alert-danger text-center" role="alert">
                                                        Waste Downtime
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="tab-content p-0">
                                                                <div class="chart tab-pane active" id="downtime-chart" style="position: relative; height: 300px;">
                                                                    <canvas id="downtime-chart-canvas" height="300" style="height: 300px;"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <li class="list-group-item">
                                                        <b>Bongkar Pasang Dies (min)</b> <p class="float-right">{{$oee->dt_bongkar_pasang_dies}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Tunggu Bahan Baku (min)</b> <p class="float-right">{{$oee->dt_tunggu_bahan_baku}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Ganti Bahan Baku (min)</b> <p class="float-right">{{$oee->dt_ganti_bahan_baku}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Tunggu Dies (min)</b> <p class="float-right">{{$oee->dt_tunggu_dies}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Gosok Dies (min)</b> <p class="float-right">{{$oee->dt_gosok_dies}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Ganti Part Short Blast (min)</b> <p class="float-right">{{$oee->dt_ganti_part_shot_blast}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>setting Ulang Kelurusan (min)</b> <p class="float-right">{{$oee->dt_setting_ulang_kelurusan}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Ganti Polishing Dies (min)</b> <p class="float-right">{{$oee->dt_ganti_polishing_dies}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Ganti Nozle Polishing Mesin (min)</b> <p class="float-right">{{$oee->dt_ganti_nozle_polishing_mesin}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Ganti Roller Straightener (min)</b> <p class="float-right">{{$oee->dt_ganti_roller_straightener}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Dies Rusak (min)</b> <p class="float-right">{{$oee->dt_dies_rusak}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Mesin Trouble Operator (min)</b> <p class="float-right">{{$oee->dt_mesin_trouble_operator}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Validasi QC (min)</b> <p class="float-right">{{$oee->dt_validasi_qc}} min</p>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Mesin Trouble Maintenance (min)</b> <p class="float-right">{{$oee->dt_mesin_trouble_maintenance}} min</p>
                                                    </li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>                                        
                                </div>
                                {{-- OEE Report Column --}}
                                <div class="col-6">
                                    <h4>OEE Report</h4>
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">Downtime Report</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body box-profile">
                                            @if (!$oee)
                                                <form id="oee-report" action="" method="post">
                                                    @csrf
                                                    <input hidden name="oee_workorder_id" type="text" value="{{$workorder->id}}">
                                                    <div class="form-group">
                                                        <label for="">DT Briefing (min)</label>
                                                        <input name="dt-briefing" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Cek Shot Blast (min)</label>
                                                        <input name="dt-cek-shot-blast" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Cek Mesin (min)</label>
                                                        <input name="dt-cek-mesin" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Sambung Bahan (min)</label>
                                                        <input name="dt-sambung-bahan" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Bongkar Pasang Dies (min)</label>
                                                        <input name="dt-bongkar-pasang-dies" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Setting Awal (min)</label>
                                                        <input name="dt-setting-awal" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Selesai Satu Bundle (min)</label>
                                                        <input name="dt-selesai-satu-bundle" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Cleaning Area Mesin (min)</label>
                                                        <input name="dt-cleaning-area-mesin" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Tunggu Bahan Baku (min)</label>
                                                        <input name="dt-tunggu-bahan-baku" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Ganti Bahan Baku (min)</label>
                                                        <input name="dt-ganti-bahan-baku" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Tunggu Dies (min)</label>
                                                        <input name="dt-tunggu-dies" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Gosok Dies (min)</label>
                                                        <input name="dt-gosok-dies" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Ganti Part Shot Blast (min)</label>
                                                        <input name="dt-ganti-part-shot-blast" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Putus Dies (min)</label>
                                                        <input name="dt-putus-dies" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Setting Ulang Kelurusan (min)</label>
                                                        <input name="dt-setting-ulang-kelurusan" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Ganti Polishing Dies (min)</label>
                                                        <input name="dt-ganti-polishing-dies" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Ganti Nozle Polishing Mesin (min)</label>
                                                        <input name="dt-ganti-nozle-polishing-mesin" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Ganti Roller Straightener (min)</label>
                                                        <input name="dt-ganti-roller-straightener" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Dies Rusak (min)</label>
                                                        <input name="dt-dies-rusak" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Mesin Trouble Operator (min)</label>
                                                        <input name="dt-mesin-trouble-operator" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Validasi QC (min)</label>
                                                        <input name="dt-validasi-qc" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Mesin Trouble Maintenance (min)</label>
                                                        <input name="dt-mesin-trouble-maintenance" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">DT Istirahat (min)</label>
                                                        <input name="dt-istirahat" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Total Runtime (min)</label>
                                                        <input name="total-runtime" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Total Downtime (min)</label>
                                                        <input name="total-downtime" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <button class="btn btn-primary">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                                <div class="alert alert-success text-center" role="alert">
                                                    All Data Already Input
                                                </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h5 class="text-muted" style="margin:1px;padding:1px;"><b>{{$workorder->wo_number}}</b></h5>
                            <p class="text-muted" style="margin:1px;padding:1px;">Created By {{$createdBy->name}} at ({{date('Y-m-d H:i:s',strtotime($workorder->created_at))}})</p>
                            <p class="text-muted" style="margin:1px;padding:1px;">Last Edited By {{$updatedBy->name}} at ({{date('Y-m-d H:i:s',strtotime($workorder->updated_at))}})</p>
                            <h5 class="mt-5 text-muted"><b>Bahan Baku</b></h5>
                            <ul class="list-unstyled">
                                <li>
                                    <p href="" class="text-secondary"> Supplier: {{$workorder->bb_supplier}}</p>
                                </li>
                                <li>
                                    <p href="" class="text-secondary"> Grade: {{$workorder->bb_grade}}</p>
                                </li>
                                <li>
                                    <p href="" class="text-secondary"> Diameter: {{$workorder->bb_diameter}} mm</p>
                                </li>
                                <li>
                                    <p href="" class="text-secondary"> Qty/Bundle: {{$workorder->bb_qty_pcs}} Kg / {{$workorder->bb_qty_coil}} Bundle</p>
                                </li>
                            </ul>
                            <h5 class="mt-5 text-muted"><b>Finish Good</b></h5>
                            <ul class="list-unstyled">
                                <li>
                                    <p href="" class="text-secondary"> Size: {{$workorder->fg_size_1}} mm X {{$workorder->fg_size_2}} mm</p>
                                </li>
                                <li>
                                    <p href="" class="text-secondary"> Tolerance: {{$workorder->tolerance_minus}} mm</p>
                                </li>
                                <li>
                                    <p href="" class="text-secondary"> Reduction Rate: {{$workorder->fg_reduction_rate}} %</p>
                                </li>
                                <li>
                                    <p href="" class="text-secondary"> Shape: {{$workorder->fg_shape}}</p>
                                </li>
                                <li>
                                    <p href="" class="text-secondary"> Qty: {{$workorder->fg_qty_pcs}} Pcs</p>
                                </li>
                            </ul>
                            <h5 class="mt-5 text-muted"><b>Other</b></h5>
                            <ul class="list-unstyled">
                                <li>
                                    <p href="" class="text-secondary"> Status WO: 
                                        {{$workorder->status_wo}}
                                    </p>
                                </li>
                                <li>
                                    <p href="" class="text-secondary"> Machine: {{$workorder->machine->name}}</p>
                                </li>
                                
                            </ul>
                            
                            <div class="mt-5 mb-3">
                                <button id="print-label" class="btn btn-sm btn-primary" 
                                @if ($workorder->status_wo == 'draft')
                                    disabled
                                @endif
                                >Print Label</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->    
@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
        $('#print-label').on('click',function(){
            event.preventDefault();
            window.open("{{url('/report/'.$workorder->id.'/printToPdf')}}");
        });

        $("[name='bundle-num']").on('change', function(event){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{route('production.getSmeltingNum')}}',
                data:{
                    workorder_id:'{{$workorder->id}}',
                    bundle_num:$("[name='bundle-num']").val(),
                    _token:'{{csrf_token()}}'
                },
                success:function(response){
                    $("#smelting-num").html('No. Leburan: ' + response);
                }
            })
        });

        $('#production-report').on('submit', function(event){
            event.preventDefault();
            var bundle_num          = $("[name='bundle-num']").val();
            var workorder_id        = $("[name='workorder_id']").val();
            var dies_number         = $("[name='dies-number']").val();
            var diameter_ujung      = $("[name='diameter-ujung']").val();
            var diameter_tengah     = $("[name='diameter-tengah']").val();
            var diameter_ekor       = $("[name='diameter-ekor']").val();
            var kelurusan_aktual    = $("[name='kelurusan-aktual']").val();
            var panjang_aktual      = $("[name='panjang-aktual']").val();
            var berat_fg            = $("[name='berat-fg']").val();
            var pcs_per_bundle      = $("[name='pcs-per-bundle']").val();
            var bundle_judgement    = $("[name='bundle-judgement']").val();
            var visual              = $("[name='visual']").val();
            var data = {
                bundle_num:bundle_num,
                workorder_id:workorder_id,
                dies_num:dies_number,
                diameter_ujung:diameter_ujung,
                diameter_tengah:diameter_tengah,
                diameter_ekor:diameter_ekor,
                kelurusan_aktual:kelurusan_aktual,
                panjang_aktual:panjang_aktual,
                berat_fg:berat_fg,
                pcs_per_bundle:pcs_per_bundle,
                bundle_judgement:bundle_judgement,
                visual:visual
            };
            storeData(data);
	    });

        $('#oee-report').on('submit', function(event){
            event.preventDefault();
            var workorder_id                    = $("[name='oee_workorder_id']").val();
            var dt_briefing                     = $("[name='dt-briefing']").val();
            var dt_cek_shot_blast               = $("[name='dt-cek-shot-blast']").val();
            var dt_cek_mesin                    = $("[name='dt-cek-mesin']").val();
            var dt_sambung_bahan                = $("[name='dt-sambung-bahan']").val();
            var dt_bongkar_pasang_dies          = $("[name='dt-bongkar-pasang-dies']").val();
            var dt_setting_awal                 = $("[name='dt-setting-awal']").val();
            var dt_selesai_satu_bundle          = $("[name='dt-selesai-satu-bundle']").val();
            var dt_cleaning_area_mesin          = $("[name='dt-cleaning-area-mesin']").val();
            var dt_tunggu_bahan_baku            = $("[name='dt-tunggu-bahan-baku']").val();
            var dt_ganti_bahan_baku             = $("[name='dt-ganti-bahan-baku']").val();
            var dt_tunggu_dies                  = $("[name='dt-tunggu-dies']").val();
            var dt_gosok_dies                   = $("[name='dt-gosok-dies']").val();
            var dt_ganti_part_shot_blast        = $("[name='dt-ganti-part-shot-blast']").val();
            var dt_putus_dies                   = $("[name='dt-putus-dies']").val();
            var dt_setting_ulang_kelurusan      = $("[name='dt-setting-ulang-kelurusan']").val();
            var dt_ganti_polishing_dies         = $("[name='dt-ganti-polishing-dies']").val();
            var dt_ganti_nozle_polishing_mesin  = $("[name='dt-ganti-nozle-polishing-mesin']").val();
            var dt_ganti_roller_straightener    = $("[name='dt-ganti-roller-straightener']").val();
            var dt_dies_rusak                   = $("[name='dt-dies-rusak']").val();
            var dt_mesin_trouble_operator       = $("[name='dt-mesin-trouble-operator']").val();
            var dt_validasi_qc                  = $("[name='dt-validasi-qc']").val();
            var dt_mesin_trouble_maintenance    = $("[name='dt-mesin-trouble-maintenance']").val();
            var dt_istirahat                    = $("[name='dt-istirahat']").val();
            var total_runtime                   = $("[name='total-runtime']").val();
            var total_downtime                  = $("[name='total-downtime']").val();

            var data = {
                workorder_id:workorder_id,
                dt_briefing:dt_briefing,
                dt_cek_shot_blast:dt_cek_shot_blast,
                dt_cek_mesin:dt_cek_mesin,
                dt_sambung_bahan:dt_sambung_bahan,
                dt_bongkar_pasang_dies:dt_bongkar_pasang_dies,
                dt_setting_awal:dt_setting_awal,
                dt_selesai_satu_bundle:dt_selesai_satu_bundle,
                dt_cleaning_area_mesin:dt_cleaning_area_mesin,
                dt_tunggu_bahan_baku:dt_tunggu_bahan_baku,
                dt_ganti_bahan_baku:dt_ganti_bahan_baku,
                dt_tunggu_dies:dt_tunggu_dies,
                dt_gosok_dies:dt_gosok_dies,
                dt_ganti_part_shot_blast:dt_ganti_part_shot_blast,
                dt_putus_dies:dt_putus_dies,
                dt_setting_ulang_kelurusan:dt_setting_ulang_kelurusan,
                dt_ganti_polishing_dies:dt_ganti_polishing_dies,
                dt_ganti_nozle_polishing_mesin:dt_ganti_nozle_polishing_mesin,
                dt_ganti_roller_straightener:dt_ganti_roller_straightener,
                dt_dies_rusak:dt_dies_rusak,
                dt_mesin_trouble_operator:dt_mesin_trouble_operator,
                dt_validasi_qc:dt_validasi_qc,
                dt_mesin_trouble_maintenance:dt_mesin_trouble_maintenance,
                dt_istirahat:dt_istirahat,
                total_runtime:total_runtime,
                total_downtime:total_downtime
            };
            storeOee(data);
	    });

        function storeData(data)
        {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{route('production.store')}}',
                data: {
                    workorder_id:data.workorder_id,
                    bundle_num:data.bundle_num,
                    dies_num:data.dies_num,
                    diameter_ujung:data.diameter_ujung,
                    diameter_tengah:data.diameter_tengah,
                    diameter_ekor:data.diameter_ekor,
                    kelurusan_aktual:data.kelurusan_aktual,
                    panjang_aktual:data.panjang_aktual,
                    berat_fg:data.berat_fg,
                    pcs_per_bundle:data.pcs_per_bundle,
                    bundle_judgement:data.bundle_judgement,
                    visual:data.visual,
                    _token: '{{csrf_token()}}'
                },
                success:function(response){
                    // console.log(response);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Production report data has been submitted',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    location.reload();
                },
                error:function(response){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something Went Wrong',
                        html: '<b class="text-danger">'+JSON.parse(response.responseText).message + '</b> <br><br> <B>detail</b>: ' + response.responseText,
                        showConfirmButton: false,
                        // timer: 2000
                    });
                }
            });
        }

        function storeOee(data)
        {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{route('production.storeOee')}}',
                data: {
                    workorder_id:data.workorder_id,
                    dt_briefing:data.dt_briefing,
                    dt_cek_shot_blast:data.dt_cek_shot_blast,
                    dt_cek_mesin:data.dt_cek_mesin,
                    dt_sambung_bahan:data.dt_sambung_bahan,
                    dt_bongkar_pasang_dies:data.dt_bongkar_pasang_dies,
                    dt_setting_awal:data.dt_setting_awal,
                    dt_selesai_satu_bundle:data.dt_selesai_satu_bundle,
                    dt_cleaning_area_mesin:data.dt_cleaning_area_mesin,
                    dt_tunggu_bahan_baku:data.dt_tunggu_bahan_baku,
                    dt_ganti_bahan_baku:data.dt_ganti_bahan_baku,
                    dt_tunggu_dies:data.dt_tunggu_dies,
                    dt_gosok_dies:data.dt_gosok_dies,
                    dt_ganti_part_shot_blast:data.dt_ganti_part_shot_blast,
                    dt_putus_dies:data.dt_putus_dies,
                    dt_setting_ulang_kelurusan:data.dt_setting_ulang_kelurusan,
                    dt_ganti_polishing_dies:data.dt_ganti_polishing_dies,
                    dt_ganti_nozle_polishing_mesin:data.dt_ganti_nozle_polishing_mesin,
                    dt_ganti_roller_straightener:data.dt_ganti_roller_straightener,
                    dt_dies_rusak:data.dt_dies_rusak,
                    dt_mesin_trouble_operator:data.dt_mesin_trouble_operator,
                    dt_validasi_qc:data.dt_validasi_qc,
                    dt_mesin_trouble_maintenance:data.dt_mesin_trouble_maintenance,
                    dt_istirahat:data.dt_istirahat,
                    total_runtime:data.total_runtime,
                    total_downtime:data.total_downtime,
                    _token: '{{csrf_token()}}'
                },
                success:function(response){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Production report data has been submitted',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    location.reload();
                },
                error:function(response){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something Went Wrong',
                        html: '<b class="text-danger">'+JSON.parse(response.responseText).message + '</b> <br><br> <B>detail</b>: ' + response.responseText,
                        showConfirmButton: false,
                        // timer: 2000
                    });
                }
            });
        }

        $('#judgement-select').on('change',function(event)
        {
            if ($('#judgement-select').val() == '0') {
                // console.log('bad selected');
                $('#visual-options').html(
                    '<option disabled selected value="">-- Select Judgement --</option>'+
                    '<option value="PO" @if (old('visual') == 'PO')'+
                        'selected'+
                    '@endif>PO</option>'+
                    '<option value="OT" @if (old('visual') == 'OT')'+
                        'selected'+
                    '@endif>OT</option>'+
                    '<option value="IL" @if (old('visual') == 'IL')'+
                        'selected'+
                    '@endif>IL</option>'+
                    '<option value="OS" @if (old('visual') == 'OS')'+
                        'selected'+
                    '@endif>OS</option>'+
                    '<option value="LS" @if (old('visual') == 'LS')'+
                        'selected'+
                    '@endif>LS</option>'+
                    '<option value="OVAL" @if (old('visual') == 'OVAL')'+
                        'selected'+
                    '@endif>OVAL</option>'+
                    '<option value="TS" @if (old('visual') == 'TS')'+
                        'selected'+
                    '@endif>TS</option>'+
                    '<option value="BM" @if (old('visual') == 'BM')'+
                        'selected'+
                    '@endif>BM</option>'+
                    '<option value="CM" @if (old('visual') == 'CM')'+
                        'selected'+
                    '@endif>CM</option>'+
                    '<option value="SP" @if (old('visual') == 'SP')'+
                        'selected'+
                    '@endif>SP</option>'+
                    '<option value="MH" @if (old('visual') == 'MH')'+
                        'selected'+
                    '@endif>MH</option>'+
                    '<option value="RUSTY" @if (old('visual') == 'RUSTY')'+
                        'selected'+
                    '@endif>RUSTY</option>'
                );
            }

            if ($('#judgement-select').val() == '1') {
                // console.log('Good selected');
                $('#visual-options').html(
                    '<option disabled selected value="">-- Select Judgement --</option>'+
                    '<option value="OK" @if (old('visual') == 'OK')'+
                        'selected'+
                    '@endif>OK</option>'+
                    '<option value="SP/OK" @if (old('visual') == 'SP/OK')'+
                        'selected'+
                    '@endif>SP/OK</option>'+
                    '<option value="BM/OK" @if (old('visual') == 'BM/OK')'+
                        'selected'+
                    '@endif>BM/OK</option>'+
                    '<option value="NG/OK" @if (old('visual') == 'NG/OK')'+
                        'selected'+
                    '@endif>NG/OK</option>'
                );   
            }
        })
    })
</script>
@endpush
