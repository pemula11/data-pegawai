@extends('dashboard.layouts.main')
@section('title', 'Edit Pegawai')

@section('plugin')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('content')

<div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Edit Pegawai</h6>
        </div>
        </div>


        <div class="card-body">
            <form action="/dashboard/pegawai/{{$pegawai->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
            <div class="row">
                <div class="row py-2">
                    <div class="col-md-4">
                        <label class="form-label">Nama</label>
                        
                    </div>
                    <div class="col-md-8">
                        <div class="input-group input-group-outline ">
                            
                            <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama', $pegawai->nama)}}" required minlength="3" maxlength="100">
                            @error('nama')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}.
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            
                <div class="row py-2">
                    <div class="col-md-4">
                        <label class="form-label">Alamat</label>
                        
                    </div>
                    
                    <div class="col-md-8">
                        <div class="input-group input-group-outline ">
                            <input type="text" class="form-control   @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat"  value="{{old('alamat', $pegawai->alamat)}}" required minlength="5" maxlength="100">
                            @error('alamat')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}.
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
            
            
            <div class="row py-2">
                <div class="col-md-4">
                <label class="form-label">Tanggal Lahir</label>
                
                </div>
                <div class="col-md-8">
                <div class="input-group input-group-outline ">
                    
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_lahir" name="tanggal_lahir"  value="{{old('tanggal_lahir', $pegawai->tanggal_lahir)}}" required>
                    @error('tanggal_lahir')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                    @enderror
                </div>
                </div>
            </div>
            
            
            
            <div class="row py-2">
                <div class="col-md-4">
                <label class="form-label">Golongan</label>
                
                </div>
                <div class="col-md-8">
                    <div class="input-group input-group-outline">
                        
                        <select class="form-control @error('id_golongan') is-invalid @enderror" id="id_golongan" name="id_golongan">
                        
                        <@foreach ($dataGolongan as $id=>$nama_golongan)
            
                        <option {{old('id_golongan', $pegawai->id_golongan) == $id ? "selected" : "" }} value="{{ $id }}">{{ $nama_golongan }} </option>
                        @endforeach
                        </select>
                        @error('id_golongan')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                        @enderror
                    </div>
                    </div>
                </div>
                
            
            
                <div class="row py-2">
                <div class="col-md-4">
                    <label class="form-label">jenis kelamin</label>
                
                </div>
                    <div class="col-md-8">
                        <div class="input-group input-group-outline">
                        
                        
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                            <option {{ $pegawai->jenis_kelamin == 0 ? "selected" : "" }} value="0">Laki-laki</option>
                            <option {{ $pegawai->jenis_kelamin == 1 ? "selected" : "" }} value="1">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}.
                            </div>
                        @enderror
                        </div>
                    </div>
                </div>
            
            
                </div>
            
            
                <div class="col-12" align="right">
                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                </div>
            </form>
        </div>
    
    </div>
</div>

<!-- endform -->


<script>
        $(document).ready(function() {
        $('#id_golongan').select2(
          {
            
            width: '240px',
           
          }
        );
    });

</script>

@endsection