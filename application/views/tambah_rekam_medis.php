<div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <span>Dashboard > <?php echo $title ?></span>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Rekam Medis</h6>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Nama Pasien</label>
                      <input id="cariNama" type="text" name="namapasien" placeholder="Cari Nama Pasien" class="form-control">
                      <small class="text-danger"><?php echo form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Keluhan</label>
                      <input type="text" name="keluhan" placeholder="Keluhan" class="form-control">
                      <small class="text-danger"><?php echo form_error('keluhan'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Diagnosa</label>
                      <input type="text" name="diagnosa" placeholder="Diagnosa" class="form-control">
                      <small class="text-danger"><?php echo form_error('diagnosa'); ?></small>
                    </div>
                    <div class="form-group">
                      <label>Tindakan</label>
                      <input type="text" name="tindakan" placeholder="Tindakan" class="form-control">
                      <small class="text-danger"><?php echo form_error('tindakan'); ?></small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Obat</label>
                      <select class="form-control" name="obat">
                        <?php foreach ($obat as $row) {
                          echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Dokter</label>
                      <select class="form-control" name="dokter">
                        <?php foreach ($dokter as $row) {
                          echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
                        } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('dokter'); ?></small>
                    </div>
                    <div class="form-group">
                      <div class="btn-group d-flex">
                        <input type="submit" name="submit" value="Simpan" class="form-control btn btn-primary">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
</div>
</div>
</div>
</div>
<script>
function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) {
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

var countries = <?php $nama = [];foreach ($pasien as $pasien) {
  $nama[] = $pasien['nama'];
}echo "['".implode("','", array_values($nama))."']"; ?>

autocomplete(document.getElementById("cariNama"), countries);
</script>
