    




     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Siswa</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <!--Tambah data-->
              <div class="panel panel-primary">
                  <div class="panel-heading"> 
                    <h3 class="panel-title" id="add_title">Master Provinsi</h3> 
                  </div>

                  <div class="panel-body">
                    <?php if(isset($_SESSION['add_notification'])){ ?>
                    <div class="alert <?php echo ($_SESSION['add_notification']['response']=='true' ? 'alert-success' : 'alert-danger'); ?> alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <?= $_SESSION['add_notification']['message'] ?>
                    </div>
                    <?php 
                            }
                            $this->session->unset_userdata('add_notification'); 
                    ?>
                     <table id="main_table" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID Provinsi</th>
                          <th>Kode Provinsi</th>
                          <th>Nama Provinsi</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                <!-- From footer -->
                <div class="panel-footer">
                  <div class="text-center">
                    <img src="<?= base_url() ?>assets/images/loading.gif" id="loader" width="12%"> 
                  </div>
                </div>
              </div>

              <!--table-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>