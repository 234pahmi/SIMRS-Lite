@extends('backend.layouts.master')

@section('title')
    SIMRS Lite | Dashboard
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-4 col-6 mt-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $patient_today }}</h3>
                <p>Pasien Hari Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus nav-icon"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6 mt-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $patients }}</h3>
                <p>Jumlah Pasien</p>
            </div>
            <div class="icon">
                <i class="fas fa-users nav-icon"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
