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
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
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
                            <th scope="col">No Antrian</th>
                            <th scope="col">Aksi</th>
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
                            <td>{{ $patient->queue->queue }}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <button class="btn btn-info btn-sm text-bold" data-toggle="modal" data-target="#sudahPoli-{{ $patient->id }}" >Sudah Poli</button>
                                </div>
                            </td>
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
                            <th scope="col">No Antrian</th>
                            <th scope="col">Aksi</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach ($patients as $patient)
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="sudahPoli-{{ $patient->id }}">
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route('dipoli', $patient->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Diagnosa Pasien</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                            
                            <div class="form-group">
                                <label for="diagnose">Diagnosa Pasien @error('diagnose')
                                    <div class="text-danger text-sm">{{ $message }}</div>
                                @enderror</label>
                                <textarea  type="text" id="diagnose" name="diagnose" class="form-control @error('diagnose') is-invalid @enderror" rows="3">{{ old('diagnose') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class='nav-icon fas fa-check'></i> &nbsp; Dipoli</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endforeach
@endsection

@section('scripts')

@endsection


