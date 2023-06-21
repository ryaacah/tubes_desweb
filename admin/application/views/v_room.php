<style>
    ul{
      padding-left:0;
    }
    ol{
      padding-left:10px;
    }
    ul> li{
      list-style-type: none;
    }
    .fa-eye:hover{
      cursor: pointer;
    }
    .test-popup-link > img{
        object-fit: cover;
    }
    .img-wrap{
        position: relative;
    }
    .test-popup-link > img {
        width: 200px!important; 
        height: 200px!important;
        object-fit: cover;
    }
    .test-popup-link > img:hover{
        box-shadow: 5px 5px 9px 0px lightgrey;
    }
    .img-wrap > .test-popup-link:hover{
        cursor: -moz-zoom-in; 
        cursor: -webkit-zoom-in; 
        cursor: zoom-in;
    }
    .action-img{
        position: absolute;
        top:5%;
        right:5%;
    }
    .action-img > i:hover{
        color: blue;
        cursor: pointer;
    }
  </style>
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid px-4 py-2">
          <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>&nbsp;Tambah Kamar</a>
          <hr>
          <div class="table-responsive">
            <table id="table-full-fitur" class="table table datatable table-bordered table-striped" style="width:100%">
                <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Harga Per Malam</th>
                      <th>Gambar</th>
                      <th>Status</th>
                      <th>Aksi Lain</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($dataRoom)){ ?>
                    <?php 
                        $no = 1;
                        foreach ($dataRoom as $row) { ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td>Rp. <?= $row['harga'] ?></td>
                        <td style="text-align:center;"><a class="test-popup-link" href="<?= base_url() ?>assets/images/<?= $row['img_dir'] ?>"><img src="<?= base_url() ?>assets/images/<?= $row['img_dir'] ?>" id="img-room-<?= $row['id'] ?>" alt="Rounded image" class="rounded"></a></td>
                        <td class="text-center">
                          <?php if($row['status_tersedia']): ?>
                            <button class="btn btn-sm btn-primary">Tersedia</button>
                          <?php else: ?>
                            <button class="btn btn-sm btn-danger">Tidak Tersedia</button>
                          <?php endif; ?>
                        </td>
                        <td class="text-center">
                          <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $row['id'] ?>" > <i class="fas fa-edit"></i></a>
                          <a href="<?= base_url() ?>RoomController/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm hapus-room"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url() ?>RoomController/edit/<?= $row['id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="">Nama :</label>
                                <input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Masukkan Nama" required value="<?= $row['nama'] ?>">
                              </div>
                              <div class="form-group">
                                <label for="">Harga per Malam :</label>
                                <input type="number" name="harga" class="form-control" autocomplete="off" placeholder="Masukkan Harga" required value="<?= $row['harga'] ?>">
                              </div>
                              <div class="form-group">
                                <label for="">Status Tersedia?</label>
                                <select name="status_tersedia" class="form-control" required>
                                  <option value="<?= $row['status_tersedia'] ?>" selected><?= $row['status_tersedia'] ? "Tersedia" : "Tidak Tersedia"?></option>
                                  <option value="1">Tersedia</option>
                                  <option value="0">Tidak Tersedia</option>
                                </select>
                              </div>
                              <div class="form-group ">
                                <label for="">Gambar :</label>
                                <input type="file" class="form-control" name="img-room" id="sampul-<?= $row['id'] ?>" onchange="previewImg('<?= $row['id'] ?>')" accept="image/jpg, image/jpeg, image/png">
                                <img class="img-thumbnail" id="img-preview-<?= $row['id'] ?>">
                                <script>
                                    function previewImg(id) {
                                        const sampule = document.querySelector('#sampul-' + id);
                                        const imgPreview = document.querySelector('#img-preview-' + id);

                                        if(sampule.files[0].size > 1000000){
                                            alert("File foto produk terlalu besar! , maximum file size : 2MB");
                                            sampule.value = "";
                                        };
                                        
                                        const fileSampule = new FileReader();
                                        fileSampule.readAsDataURL(sampule.files[0]);

                                        fileSampule.onload = function(e) {
                                            imgPreview.src = e.target.result;
                                        }
                                    }
                                </script>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <?php $no++; } ?>
                <?php }else{?>
                        <tr>
                            <td colspan="1" style="text-align:center;"><p style="color:grey;font-size:18px;">Data Ruangan Belum Tersedia</p></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
          </div>
    </div>
  </section>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Add Room</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url() ?>RoomController/add" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="">Nama:</label>
                  <input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                  <label for="">Harga per Malam:</label>
                  <input type="number" name="harga" class="form-control" autocomplete="off" placeholder="Masukkan Harga" required>
                </div>
                <div class="form-group ">
                  <label for="">Gambar:</label>
                  <input type="file" class="form-control" name="img-room" id="add-sampul" onchange="addPreviewImg()" accept="image/jpg, image/jpeg, image/png" required>
                  <img class="add-img-thumbnail" id="add-img-preview" style="width:100%;">
                  <script>
                      function addPreviewImg() {
                          const addsampule = document.querySelector('#add-sampul');
                          const addimgPreview = document.querySelector('#add-img-preview');

                          if(addsampule.files[0].size > 1000000){
                              alert("File foto produk terlalu besar! , maximum file size : 2MB");
                              addsampule.value = "";
                          };
                          
                          const addfileSampule = new FileReader();
                          addfileSampule.readAsDataURL(addsampule.files[0]);

                          addfileSampule.onload = function(e) {
                            addimgPreview.src = e.target.result;
                          }
                      }
                  </script>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      

<script>
$(document).ready(function() {
  $(".hapus-room").on("click", function (e) {
    e.preventDefault();
    const href = $(this).attr("href");

    Swal.fire({
      title: "Hapus Room?",
      text: "Menghapus room bersifat permanen pada database, mohon berhati-hati.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Delete!",
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
    });
  });
});
</script>

<script src="<?= base_url() ?>assets/js/magnific-popup/jquery.magnific-popup.js"></script>
<script>
    $(document).ready(function($) {
          $('.test-popup-link').magnificPopup({
            type:'image',
            mainClass: 'mfp-with-zoom', // this class is for CSS animation below

        zoom: {
          enabled: true, // By default it's false, so don't forget to enable it

          duration: 300, // duration of the effect, in milliseconds
          easing: 'ease-in-out', // CSS transition easing function

          // The "opener" function should return the element from which popup will be zoomed in
          // and to which popup will be scaled down
          // By defailt it looks for an image tag:
          opener: function(openerElement) {
            // openerElement is the element on which popup was initialized, in this case its <a> tag
            // you don't need to add "opener" option if this code matches your needs, it's defailt one.
            return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        }
          });
    });
</script>