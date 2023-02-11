<?= $this->extend('templates/rencanaPembangunan/rencanaPembangunan'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data RKPD (Masih pake template Renstra)</b></h1>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="/rpjmd1621/update" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row mb-3">
          <div class="col">
            <label for="id_pd"><b>Program</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
            <select class="form-control " id="id_pd" name="id_pd">

              <option value="">- Pilih Program -</option>

              <option value="" id="id_pd">

              </option>
            </select>
            <div class="invalid-feedback">

            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="nama_indikator"><b>Indikator Program</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="nama_indikator" name="nama_indikator" for="nama_indikator" class="form-control" type="text" placeholder="" value="<?= old('nama_indikator'); ?>">
            <div class="invalid-feedback">

            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="id_satuan"><b>Satuan</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span>
            <input type="text" style="width: 100%; background: #ffff;" name="nama_indikator" id="nama_indikator" onclick="" class="form-control " placeholder="-Pilih Satuan-" readonly style="width:200px" />
            <input type="hidden" name="id_satuan" id="id_satuan" class="form-control" />
            <div id="myDropdownIkuikd" class="dropdown-content" style="height: 200px; width: 300px; overflow-y: scroll;">
              <input type="text" placeholder="Search.." id="myInputIkuikd" onkeyup="filterFunction_ikuikd()">
              <a onclick="">-Pilih IKU / IKD-</a>
              <!-- ni untuk selectnya, boleh disesuaikan dengan kaurang punya, saya disini pakai mysqli_fetch_array dan kau rang beda, jadi sesuaikan aja -->

              <a onclick="">

              </a>


            </div>
            <div class="invalid-feedback">

            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label for="t17"><b>Target 2022</b></label></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span><input id="t17" name="t17" for="t17" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="col">
            <label for="r17"><b>Realisasi 2022</b></label><input id="r17" name="r17" for="r17" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label for="t18"><b>Target 2023</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label><input id="t18" name="t18" for="t18" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="col">
            <label for="r18"><b>Realisasi 2023</b></label><input id="r18" name="r18" for="r18" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="t19"><b>Target 2024</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label><input id="t19" name="t19" for="t19" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="col">
            <label for="r19"><b>Realisasi 2024</b></label><input id="r19" name="r19" for="r19" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="t20"><b>Target 2025</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label><input id="t20" name="t20" for="t20" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="col">
            <label for="r20"><b>Realisasi 2025</b></label><input id="r20" name="r20" for="r20" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="t21"><b>Target 2026</b></label>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label><input id="t21" name="t21" for="t21" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="col">
            <label for="r21"><b>Realisasi 2026</b></label><input id="r21" name="r21" for="r21" class="form-control" type="text" placeholder="" value="">
            <div class="invalid-feedback">
            </div>
          </div>
        </div>

        <button type='submit' class="btn btn-primary" href="/renstra/update">Update Data</button>
        <button class="btn btn-danger" type="reset">Batal</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>