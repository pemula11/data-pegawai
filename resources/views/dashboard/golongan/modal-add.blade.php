<!-- Modal -->
<div class="modal fade" id="add-data" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <!-- form -->
            <form action="/dashboard/golongan" method="post" enctype="multipart/form-data">
                @csrf
                
               <div class="row">
                <div class="col-md-10 py-2">
                    <div class="input-group input-group-outline">
                      <label class="form-label">Nama Golongan</label>
                      <input type="text" class="form-control @error('nama_golongan') is-invalid @enderror" id="nama_golongan" name="nama_golongan" value="{{old('nama_golongan')}}" required minlength="3" maxlength="100">
                      @error('nama_golongan')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                      @enderror
                    </div>
                </div>

                <div class="col-md-10 py-2">
                    <div class="input-group input-group-outline">
                      <label class="form-label">Gaji Pokok</label>
                      <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror"
                             id="gaji_pokok" name="gaji_pokok"  value="{{old('gaji_pokok')}}" required minlength="5" maxlength="15">
                      @error('gaji_pokok')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                      @enderror
                    </div>
                </div>
                
                <div class="col-md-10 py-2">
                    <div class="input-group input-group-outline">
                      <label class="form-label">Tunjangan</label>
                      <input type="number" class="form-control @error('tunjangan_jabatan') is-invalid @enderror"
                             id="tunjangan_jabatan" name="tunjangan_jabatan" value="{{old('tunjangan_jabatan')}}" required >
                      @error('tunjangan_jabatan')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                      @enderror
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


   