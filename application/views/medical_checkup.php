<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <span>Dashboard > <?php echo $title ?></span>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
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
                      <div class="text font-weight-bold text-info text-uppercase mb-1"><a href="<?php echo base_url('data/usg') ?>">USG</a></div>
                    </div>
                    <div class="col-auto">
                      <input type="checkbox" name="checkup[]" value="usg">
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
              <input id="cariNama" type="text" name="namapasien" placeholder="Cari Nama Pasien" class="form-control">
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
