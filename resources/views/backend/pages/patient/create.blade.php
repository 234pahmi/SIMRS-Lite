@extends('backend.layouts.master')

@section('title')
    SIMRS Lite | Tambah Pasien
@endsection

@section('css')

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Tambah Pasien</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="col-md-12">
        <form action="{{ route('pasien.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="polyclinic_id">Nama Polikliniki @error('polyclinic_id')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror</label>
                        <select id="polyclinic_id" name="polyclinic_id" class="select2bs4 form-control @error('polyclinic_id') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Polikilinik --</option>
                                @foreach ($polyclinics as $polyclinic)
                                    <option value="{{ $polyclinic->id }}" {{ old('polyclinic_id') == $polyclinic->id ? 'selected' : '' }}>{{ $polyclinic->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_patient">Jenis Pasien @error('category_patient')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror</label>
                        <select id="category_patient" id="category_patient" name="category_patient" class="select2bs4 form-control @error('category_patient') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Pasien --</option>
                            <option value="Lama" {{ old('category_patient') == 'Lama' ? 'selected' : '' }}>Lama</option>
                            <option value="Baru" {{ old('category_patient') == 'Baru' ? 'selected' : '' }}>Baru</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12" id="kategori_lama">
                    <div class="form-group">
                        <label for="id">Nama Pasien Lama @error('id')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror</label>
                        <select id="id" name="id" class="select2bs4 form-control @error('id') is-invalid @enderror">
                            <option value="">-- Nama Pasien --</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ old('id') == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div id="kategori_baru" class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Pasien Baru @error('name')
                                <div class="text-danger text-sm">{{ $message }}</div>
                            @enderror</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukan nama lengkap pasien">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">No Telepon @error('phone_number')
                                <div class="text-danger text-sm">{{ $message }}</div>
                            @enderror</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" placeholder="contoh 0858xxxxxxxx">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Alamat Pasien @error('address')
                                <div class="text-danger text-sm">{{ $message }}</div>
                            @enderror</label>
                            <textarea  id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="justify-content-between">
                <button type="submit" class="btn btn-primary btn-block"><i class="nav-icon fas fa-save mr-2"></i>Tambahkan</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('#kategori_lama').hide();
    $('#kategori_baru').hide();
    $('#category_patient').on('change',function(){
        if( $(this).val()=== "Lama"){
            $('#kategori_lama').show();
            $('#kategori_baru').hide();
        }
        else if($(this).val()=== "Baru"){
            $('#kategori_lama').hide();
            $('#kategori_baru').show();
        }
    });
});

</script>
@endsection
