<?=$this->extend("layout/layout_admin")?>

<?=$this->section("content")?>
<div class="container-fluid">
  <div id="viewmodal" style="display:none;"></div>
  <div class="row">
  <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-12">
                  <div class="d-flex flex-column h-100">
                      <h1>Daftar Anggota - DataTables</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 mb-lg-0 mb-4 mt-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-12">
                  <div class="d-flex flex-column h-100">
                    <div id="viewdata"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>


<!-- <script>
          function tambah() {
            status = 'tambah';
            $('#formmodal').modal('show');
            $('#form')[0].reset();
        }
        
</script> -->


<?=$this->endSection()?>