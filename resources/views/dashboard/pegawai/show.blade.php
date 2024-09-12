@extends('dashboard.layouts.main')
@section('title', 'dashboard')

@section('plugin')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')


    <div class="container-fluid px-2 px-md-4">
     
      <div class="card card-body mx-3 mx-md-4 ">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{$pegawaiTable->nama}}
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                {{$pegawaiTable->golongan->nama_golongan}}
              </p>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="row">
          
            <div class="col-12 col-xl-8">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                    
                  </div>
                </div>
                <div class="card-body p-3">
                  {{-- <p class="text-sm">
                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                  </p> --}}
                  <hr class="horizontal gray-light my-4">
                 

                        
   
     
        <div class="orders">
            <div class="row">
                <div class="col-12">
                    
                
                        <table class="table table-border">
      
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{$pegawaiTable->nama}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$pegawaiTable->alamat}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{$pegawaiTable->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>
                                    @if ($pegawaiTable->jenis_kelamin == '0')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Golongan</th>
                                <td> {{$pegawaiTable->golongan->nama_golongan}} </td>
                            </tr>
                            <tr>
                                <th>Gaji Pokok</th>
                                <td>{{$pegawaiTable->golongan->gaji_pokok}}</td>
                            </tr>
                            <tr>
                                <th>Tunjangan</th>
                                <td>
                                    {{$pegawaiTable->golongan->tunjangan_jabatan}}
                                </td>
                            </tr>
                            
                        </table>
  
                        </div>
                    </div>
                </div>
       
    
                <div class="row">
                    <div class="col-2">
                        <a href="/dashboard/pegawai" class="btn btn-primary btn-block">
                            <i class="fa fa-back"></i> Back
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="/dashboard/pegawai/{{$pegawaiTable->id}}/edit" class="btn btn-primary btn-success">
                            <i class="fa fa-back"></i> Edit
                        </a>
                    </div>
                </div>


                

                </div>
              </div>
            </div>
          
            
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Riwayat Cuti</h6>
                  </div>

                  <div class="col-6">
                    <a id="btn-add-cuti" class="btn btn-primary btn-block">
                        <i class="fa fa-back"></i> Tambah Cuti
                    </a>
                </div>
                  <div class="card-body p-3">
                    <table class="table table-border w-100">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Mulai</th>
                            <th>Durasi</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            
                            @foreach ($pegawaiTable->cuti as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->tanggal_mulai }}</td>
                                    <td>{{ $data->lama_cuti }} Hari</td>
                                    <td>
                                      <form action="/dashboard/cuti/{{ $data->id }}" class="d-inline" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 show_confirm " data-toggle="tooltip" id="deleteData" id="deleteData"> 
                                            
                                            X
                                        </button>
                                       
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tr>
                        
                    </table>
                  </div>
                </div>
              </div>
  

          </div>
        </div>
      </div>
    </div>


    <script>
      $('.show_confirm').click(function(event) {
          event.preventDefault();
          Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
          }).then((result) => {
          if (result.isConfirmed) {
              event.currentTarget.form.submit();
             
          }
          });
      });
  </script>

@include('dashboard.cuti.modal-add')
    
@endsection