


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
            <form action="/dashboard/cuti" method="post" enctype="multipart/form-data">
                @csrf
                
               <div class="row">

                <input type="hidden" name="id_pegawai" value="{{$pegawaiTable->id}}">

                <div class="col-md-10 py-2">
                    <div class="input-group input-group-outline is-filled">
                      <label class="form-label">Nama Pegawai</label>
                      <input type="text" disabled class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama', $pegawaiTable->nama)}}" required minlength="3" maxlength="100">
                      @error('nama')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                      @enderror
                    </div>
                </div>



               <div class="row py-2">
                <div class="col-md-4">
                  <label class="form-label">Tanggal Cuti </label>
                 
                </div>
                <div class="col-md-8">
                  <div class="input-group input-group-outline">
                    
                    <input type="text" class="form-control @error('tanggal_cuti') is-invalid @enderror"
                         id="tanggal_cuti" name="tanggal_cuti"  value="{{old('tanggal_cuti')}}" required>
                      @error('tanggal_mulai')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                      @enderror
                      @error('lama_cuti')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}.
                        </div>
                      @enderror
                  </div>
                </div>
              </div>

              <input type="hidden" name="lama_cuti" id="lama_cuti">
              <input type="hidden" name="tanggal_mulai" id="tanggal_mulai">

             


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
        

    $('body').on('click', '#btn-add-cuti', function () {

        $('#add-data').modal('show'); 
        $('#lama_cuti').val('1');
        $('#tanggal_mulai').val(moment().format('YYYY-MM-DD'));
    });
    $('#close-add').click(function(e) {
        $('#add-data').modal('hide');
    });

    
    $(function() {
        $('input[name="tanggal_cuti"]').daterangepicker({
          minDate: moment(),
          maxDate: moment().add(1, 'months'),
        }, function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
          $('#tanggal_mulai').val(moment(start).format('YYYY-MM-DD'));
          $('#lama_cuti').val(moment(end).diff(start, 'days'));
        });
    });
  </script>


    @if (session('success'))
        <script>
        Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });
        </script>
    @endif


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
