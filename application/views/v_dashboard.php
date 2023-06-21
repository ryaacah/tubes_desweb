
<div class="content-wrapper">
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <!-- Content Header (Page header) -->
      <div class="content-header mt-2">
        <div class="container-fluid">
          <div class="mb-2 text-center">
            <h1 class="mb-0">Selamat Datang, <strong><?= $this->session->userdata("login_data_admin_hr")['nama'] ?></h1>
          </div>
          <hr>
        </div><!-- /.container-fluid -->
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $dataOrder ?></h3>

                <p>TOTAL ORDERS</p>
              </div>
              <div class="icon">
                <i class="ion ion-happy"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $dataRoom ?></h3>

                <p>TOTAL ROOM</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $dataRoomTersedia ?></h3>

                <p>AVAILABLE ROOMS</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?= $dataUser ?></h3>

                <p>TOTAL USERS</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>  
</div>