<!-- Modal -->
<div class="modal fade" id="modal-edit" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <form action="/dashboard/golongan" method="post" enctype="multipart/form-data">
            @csrf
            
            
           <div class="row">
            <input type="hidden" id="golongan_id">
            <div class="col-md-10 py-2">
                <div class="input-group input-group-outline is-filled">
                  <label class="form-label">Nama Golongan</label>
                  <input type="text" class="form-control @error('nama_golongan') is-invalid @enderror" id="nama_golongan_edit" name="nama_golongan" value="{{old('nama_golongan')}}" required minlength="3" maxlength="100">
                  @error('nama_golongan')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}.
                    </div>
                  @enderror
                </div>
            </div>

            <div class="col-md-10 py-2">
                <div class="input-group input-group-outline is-filled">
                  <label class="form-label">Gaji Pokok</label>
                  <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror"
                         id="gaji_pokok_edit" name="gaji_pokok" value="{{old('gaji_pokok')}}" required minlength="5" maxlength="15">
                  @error('gaji_pokok')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}.
                    </div>
                  @enderror
                </div>
            </div>
            
            <div class="col-md-10 py-2">
                <div class="input-group input-group-outline is-filled" >
                  <label class="form-label">Tunjangan</label>
                  <input type="number" class="form-control @error('tunjangan_jabatan') is-invalid @enderror"
                         id="tunjangan_jabatan_edit" name="tunjangan_jabatan" value="{{old('tunjangan_jabatan')}}" required minlength="5" maxlength="15">
                  @error('tunjangan_jabatan')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}.
                    </div>
                  @enderror
                </div>
            </div>
  
           </div>

        

            

            <div class="modal-footer">
               
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </form>
            <!-- endform -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close-edit" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>

  <script>
        

    $('#close-edit').click(function(e) {
        $('#modal-edit').modal('hide');
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

    <script>
      //button create post event
      $('body').on('click', '#btn-edit-golongan', function () {
       
          let golongan_id = $(this).data('id');
          $('#nama_golongan').val("ssss");
          //fetch detail post with ajax
          $.ajax({
           
              url: `/dashboard/golongan/${golongan_id}/edit`,
              type: "GET",
              cache: false,
              success:function(response){
                  //fill data to form
                  
                  $('#golongan_id').val(response.data.id);
                 
                  $('#nama_golongan_edit').val(response.data.nama_golongan);
                  $('#gaji_pokok_edit').val(response.data.gaji_pokok);
                 
                  $('#tunjangan_jabatan_edit').val(response.data.tunjangan_jabatan);
  
                 
                      // Get select
                 
  
                  // Set selected value
  
                  //open modal
                  $('#modal-edit').modal('show');
              }
          });
          
      });
  
      //action update post
      $('#update').click(function(e) {
          e.preventDefault();
  
          //define variable
          let golongan_id = $('#golongan_id').val();
          let name   = $('#nama_golongan_edit').val();
          let gaji   = $('#gaji_pokok_edit').val();
          let tunjangan   = $('#tunjangan_jabatan_edit').val();
        
          
          let token   = $("meta[name='csrf-token']").attr("content");
         
          //ajax
          $.ajax({
              
              url: `/dashboard/golongan/${golongan_id}`,
              type: "PUT",
              cache: false,
              data: {
                  "nama_golongan": name,
                  "gaji_pokok": gaji,
                  "tunjangan_jabatan": tunjangan,
                  "_token": token
              },

              success:function(response){
  
                  //show success message
                  Swal.fire({
                      type: 'success',
                      icon: 'success',
                      title: `${response.message}`,
                      timer: 3000
                      }).then(function(){ 
                           location.reload();
                       }
                  );
                  //data post
                  let post = `
                      <tr id="index_${response.data.id}">
                          <td>${response.data.title}</td>
                          <td>${response.data.content}</td>
                          <td class="text-center">
                              <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                              <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                          </td>
                      </tr>
                  `;
                  
                  //append to post data
                  $(`#index_${response.data.id}`).replaceWith(post);
  
                  //close modal
                  $('#modal-edit').modal('hide');
                  
  
              },
              error:function(error){
                 
                  console.log((error.responseJSON));
                 
                      //show alert
                      Swal.fire({
                      type: 'failed',
                      icon: 'warning',
                      title: `${JSON.stringify(error.responseJSON)}`,
                      timer: 3000
                      })
                  
  
              }
  
          });
  
      });
  
      $('#close').click(function(e) {
          $('#modal-edit').modal('hide');
      });
  
  </script>