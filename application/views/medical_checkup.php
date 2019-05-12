<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <span>Dashboard > <?php echo $title ?></span>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

        <form method="post" onsubmit="return daftar(this)">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow-sm pt-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-primary text-uppercase mb-1"><a href="<?php echo base_url('data/rontgen') ?>">Rontgen</a></div>
                    </div>
                    <div class="col-auto">
                      <input type="checkbox" name="checkup[]" value="rontgen">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow-sm pt-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-success text-uppercase mb-1"><a href="<?php echo base_url('data/spirometri') ?>" class="dotted-border">Spirometri</a></div>
                    </div>
                    <div class="col-auto">
                      <input type="checkbox" name="checkup[]" value="spirometri">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow-sm pt-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-info text-uppercase mb-1"><a href="<?php echo base_url('data/audiometri') ?>">Audiometri</a></div>
                    </div>
                    <div class="col-auto">
                      <input type="checkbox" name="checkup[]" value="audiometri">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow-sm pt-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-warning text-uppercase mb-1"><a href="<?php echo base_url('data/ekg') ?>">EKG</a></div>
                    </div>
                    <div class="col-auto">
                      <input type="checkbox" name="checkup[]" value="ekg">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-9">
              <input type="checkbox" onClick="toggle(this)" /> Check All
              <div class="form-group mt-1 shadow-sm">
                <select class="custom-select select2pasien" name="no_pasien"></select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group mt-4 shadow-sm">
                <button class="form-control btn btn-sm btn-primary" type="submit">Daftar</button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  function toggle(source) {
    checkboxes = document.getElementsByName('checkup[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
  }
  function daftar(source) {
    checkboxes = document.getElementsByName('checkup[]');
    if (document.querySelectorAll('input[name="checkup[]"]:checked').length < 1) {
      window.alert('Anda belum memilih layanan checkup');
      return false
    }
  }
  </script>
