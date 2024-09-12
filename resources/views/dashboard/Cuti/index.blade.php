@extends('dashboard.layouts.main')
@section('title', 'Data Riwayat Cuti')

@section('plugin')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Data Riwayat Cuti</h6>
          </div>
        </div>
        
        <div class="card-body px-0 pb-2">
           
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="myTable">
              <thead>
                <tr>
                  <th class="text-secondary opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Mulai</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durasi</th>
                  <th class="text-secondary opacity-7">Action </th>
                </tr>
              </thead>
              
              <tbody>
                @foreach ($cutiTable as $data)

              
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <a href="/dashboard/pegawai/{{$data->pegawai->id}}">
                          <h6 class="mb-0 text-sm "> {{ $data->pegawai->nama }}</h6>
                        </a>
                        {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$data->tanggal_mulai}}</p>
                    {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0">{{$data->lama_cuti}} Hari</p>
                  </td>
                  
                  <td class="align-middle">
                   
                    

                      <form action="/dashboard/cuti/{{ $data->id }}" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0 show_confirm " data-toggle="tooltip" id="deleteData" id="deleteData"> 
                            
                            Delete
                        </button>
                       
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




{{-- 
  @include('dashboard.pegawai.modal-add') --}}
 {{-- @include('dashboard.golongan.modal-edit') --}}

<script>

let table = new DataTable('#myTable', {
    // options
});

</script>


@if ($errors->all())

    <script> $(document).ready(function()
        { 
        $('#add-data').modal('show'); 
        }); 
    </script>

    
    
@else
    <script> $(document).ready(function()
        { 
        $('#add_data').modal('hide'); 
        }); 
    </script>
@endif


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

@endsection