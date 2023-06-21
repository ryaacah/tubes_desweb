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
  </style>
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid px-4 py-2">
          <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fas fa-user-plus"></i>&nbsp;Tambah User</a>
          <hr>
          <div class="table-responsive">
            <table id="table-full-fitur" class="table table datatable table-bordered table-striped" style="width:100%">
                <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Role</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($dataUser)){ ?>
                    <?php 
                        $no = 1;
                        foreach ($dataUser as $row) { ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['role'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td class="text-center">
                          <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                          <a href="<?= base_url() ?>UserController/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm hapus-user"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url() ?>UserController/edit/<?= $row['id'] ?>" method="post">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="">Nama :</label>
                                <input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Masukkan Nama" required value="<?= $row['nama'] ?>">
                              </div>
                              <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" class="form-control" required>
                                  <option value="<?= $row['role'] ?>" selected><?= $row['role'] === 'admin' ? "Admin" : "Pengguna"?></option>
                                  <option value="pengguna">Pengguna</option>
                                  <option value="admin">Admin</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="">Email :</label>
                                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Masukkan Email" required value="<?= $row['email'] ?>">
                              </div>
                              <div class="form-group ">
                                <label for="">Ubah Password :</label>
                                <div class="input-group">
                                  <input type="password" id="passwordEdit<?= $row['id'] ?>" name="password" class="form-control" autocomplete="off" placeholder="Masukkan Password">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <script>
                                          function pswVisibiltyEdit(id){
                                            var x = document.getElementById(`passwordEdit${id}`);
                                            if (x.type === "password") {
                                              x.type = "text";
                                            } else {
                                              x.type = "password";
                                            }
                                          }
                                      </script>
                                      <span class="fas fa-eye" onclick="pswVisibiltyEdit(<?= $row['id'] ?>)"></span>
                                    </div>
                                  </div>
                                </div>
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
                            <td colspan="1" style="text-align:center;"><p style="color:grey;font-size:18px;">Data User Belum Tersedia</p></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
          </div>
    </div>
  </section>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url() ?>UserController/add" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label for="">Nama:</label>
                  <input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                  <label for="">Role</label>
                  <select name="role" class="form-control" required>
                    <option disabled selected>Pilih Role</option>
                    <option value="pengguna">Pengguna</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Email:</label>
                  <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group ">
                  <label for="">Password:</label>
                  <div class="input-group">
                    <input type="password" id="passwordAdd" name="password" class="form-control" autocomplete="off" placeholder="Masukkan Password" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <script>
                            function pswVisibiltyAdd(){
                              var x = document.getElementById("passwordAdd");
                              if (x.type === "password") {
                                x.type = "text";
                              } else {
                                x.type = "password";
                              }
                            }
                        </script>
                        <span class="fas fa-eye" onclick="pswVisibiltyAdd()"></span>
                      </div>
                    </div>
                  </div>
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
  $(".hapus-user").on("click", function (e) {
    e.preventDefault();
    const href = $(this).attr("href");

    Swal.fire({
      title: "Hapus User?",
      text: "Menghapus user bersifat permanen pada database, mohon berhati-hati.",
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