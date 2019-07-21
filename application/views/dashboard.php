<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard</span>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pasien</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pasien ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Obat</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $obat ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-medkit fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Dokter</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $dokter ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pegawai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pegawai ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <canvas id="myChart"></canvas>

          <script>
          var color = Chart.helpers.color;
          var MONTHS = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
          ];
          var ctx = document.getElementById('myChart').getContext('2d');
          ctx.canvas.width = 1000;
		      ctx.canvas.height = 300;
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: MONTHS,
                  datasets: [{
                      type: 'line',
                      backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
					            borderColor: window.chartColors.red,
                      label: 'Jumlah Kunjungan Pasien',
                      data: [
                        <?=$this->mdata->pasien_perbulan(1)?>,
                        <?=$this->mdata->pasien_perbulan(2)?>,
                        <?=$this->mdata->pasien_perbulan(3)?>,
                        <?=$this->mdata->pasien_perbulan(4)?>,
                        <?=$this->mdata->pasien_perbulan(5)?>,
                        <?=$this->mdata->pasien_perbulan(6)?>,
                        <?=$this->mdata->pasien_perbulan(7)?>,
                        <?=$this->mdata->pasien_perbulan(8)?>,
                        <?=$this->mdata->pasien_perbulan(9)?>,
                        <?=$this->mdata->pasien_perbulan(10)?>,
                        <?=$this->mdata->pasien_perbulan(11)?>,
                        <?=$this->mdata->pasien_perbulan(12)?>],
                      borderWidth: 2,
                      pointRadius: 5,
                      fill: false,
                      lineTension: 0,
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
          </script>
        </div>
      </div>
    </div>
  </div>
