@extends('backend.layouts.master')

@section('title')
    SIMRS Lite | Pasien hari ini
@endsection

@section('css')

@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pasien Hari ini</h1>
        </div>
      </div>
    </div>
</section>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title float-right">
                <a href="{{ route('print') }}" class="btn btn-info btn-sm" target="_blank">
                    <i class="nav-icon fas fa-print"></i> &nbsp; Cetak Laporan
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive-md">
                <table id="example1" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Poliklinik</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Diagnosa</th>
                            <th scope="col">No Antrian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $patient->polyclinic->name }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ $patient->phone_number }}</td>
                            <td>{{ $patient->date }}</td>
                            <td>{{ $patient->diagnose }}</td>
                            <td>{{ $patient->queue->queue }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Poliklinik</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Diagnosa</th>
                            <th scope="col">No Antrian</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection


