<!-- Modal -->
<div class="modal fade" id="add-data" data-backdrop="static" data-bs-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <!-- form -->
            <form action="/dashboard/pegawai" method="post" enctype="multipart/form-data">
                @csrf
                
               <div class="row">
                <div class="col-md-10 py-2">
                    <div class="input-group input-group-outline">
                      <label class="form-label">Nama Pegawai</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}" required minlength="3" maxlength="100">
                      @error('nama')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                      @enderror
                    </div>
                </div>

                <div class="col-md-10 py-2">
                    <div class="input-group input-group-outline">
                      <label class="form-label">Alamat</label>
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                             id="alamat" name="alamat"  value="{{old('alamat')}}" required minlength="5" maxlength="100">
                      @error('alamat')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                      @enderror
                    </div>
                </div>
                


               <div class="row py-2">
                <div class="col-md-4">
                  <label class="form-label">Tanggal Lahir</label>
                 
                </div>
                <div class="col-md-8">
                  <div class="input-group input-group-outline">
                    
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                         id="tanggal_lahir" name="tanggal_lahir"  value="{{old('tanggal_lahir')}}" required>
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

                           <option value="{{ $id }}">{{ $nama_golongan }} </option>
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
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
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
            <!-- endform -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close-add" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>

  <script>
        

    $('body').on('click', '#btn-add-buku', function () {
        $('#add-data').modal('show'); 
    });
    $('#close-add').click(function(e) {
        $('#add-data').modal('hide');
    });


    $(document).ready(function() {
        $('#id_golongan').select2(
          {
            dropdownParent: $('#add-data'),
            width: '240px',
           
          }
        );
    });
  </script>


    @if (session('success'))
        <script>
        Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'data berhasil ditambah',
                    showConfirmButton: false,
                    timer: 3000
                });
        </script>
    @endif


   