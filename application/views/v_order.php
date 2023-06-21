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
          <hr>
          <div class="table-responsive">
            <table id="table-full-fitur" class="table table datatable table-bordered table-striped" style="width:100%">
                <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Pemesan</th>
                      <th>Email Pemesan</th>
                      <th>No HP Pemesan</th>
                      <th>Date</th>
                      <th>Kamar</th>
                      <th>Biaya</th>
                      <th>Status</th>
                      <th>Tanggal Pemesanan</th>
                      <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($dataOrder)){ ?>
                    <?php 
                        $no = 1;
                        foreach ($dataOrder as $row) { ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td><?= $row['nama_pemesan'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['no_hp'] ?></td>
                        <td><?= $row['start_date'].' until '.$row['end_date'] ?></td>
                        <td style="text-align:center;">
                          <?= $row['nama_kamar'] ?>
                          <br>
                          <a class="test-popup-link" href="<?= base_url() ?>assets/images/<?= $row['img_dir'] ?>"><img src="<?= base_url() ?>assets/images/<?= $row['img_dir'] ?>" id="img-room-<?= $row['id'] ?>" alt="Rounded image" class="rounded"></a>
                        </td>
                        <td>Rp. <?= $row['harga'] ?></td>
                        <td class="text-center">
                          <?php if($row['status_bayar']): ?>
                            <button class="btn btn-sm btn-primary">Telah Dibayar</button>
                          <?php else: ?>
                            <button class="btn btn-sm btn-danger">Belum Dibayar</button>
                          <?php endif; ?>
                        </td>
                        <td class="text-center"><?= Date($row['created_at']) ?></td>
                        <td class="text-center">
                          <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $row['id'] ?>" > <i class="fas fa-edit"></i></a>
                          <a href="<?= base_url() ?>OrderController/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm hapus-order"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url() ?>OrderController/edit/<?= $row['id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="">Nama Pemesan :</label>
                                <input type="text" name="nama_pemesan" class="form-control" autocomplete="off" placeholder="Masukkan Nama" required value="<?= $row['nama_pemesan'] ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="">Email :</label>
                                <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Masukkan Email" required value="<?= $row['email'] ?>" >
                              </div>
                              <div class="form-group">
                                <label for="">Nomor Handphone :</label>
                                <input type="text" name="no_hp" class="form-control" autocomplete="off" placeholder="Masukkan Nomor HP" required value="<?= $row['no_hp'] ?>">
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for="">Start Date :</label>
                                    <input type="date" name="start_date" class="form-control" autocomplete="off" required value="<?= $row['start_date'] ?>" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="">End Date :</label>
                                    <input type="date" name="end_date" class="form-control" autocomplete="off" required value="<?= $row['end_date'] ?>" required>  
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="">Ubah Kamar? :</label>
                                <select name="kamar" class="form-control" required>
                                  <option disabled selected>Pilih Kamar</option>
                                  <?php if ($dataRoomTersedia) { 
                                    foreach ($dataRoomTersedia as $key) {
                                    ?>
                                      <option value="<?= $key['id'] ?>"><?= $key['nama'].' - Rp.'.$key['harga'] ?></option>
                                  <?php }}else{ ?>
                                    <option>Not Availiable</option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="">Status Bayar?</label>
                                <select name="status_bayar" class="form-control" required>
                                  <option value="<?= $row['status_bayar'] ?>" selected><?= $row['status_bayar'] ? "Telah Dibayar" : "Belum Dibayar"?></option>
                                  <option value="1">Telah Dibayar</option>
                                  <option value="0">Belum Dibayar</option>
                                </select>
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
                            <td colspan="1" style="text-align:center;"><p style="color:grey;font-size:18px;">Data Pesanan Belum Tersedia</p></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
          </div>
    </div>
  </section>
</div>
      

<script>
$(document).ready(function() {
  $(".hapus-order").on("click", function (e) {
    e.preventDefault();
    const href = $(this).attr("href");

    Swal.fire({
      title: "Hapus Order?",
      text: "Menghapus order bersifat permanen pada database, mohon berhati-hati.",
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