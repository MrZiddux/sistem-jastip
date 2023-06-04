<x-app title="Tambah Jastip">
  <x-page-heading>
    <x-page-title>Tambah Jastip</x-page-title>
    <section class="section">

      <form id="createForm" action="{{ route('jastip.store') }}" autocomplete="off">
        @csrf
        <div class="row match-height">
          <div class="col-md-4 col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Penerima</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="name">Nama Penerima</label>
                          <input type="text" id="name" class="form-control" name="name"
                            placeholder="Masukkan Nama Penerima">
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-wrap">
                    <h5 class="fw-normal">Total Harga :</h5>
                    <p class="fs-5 fw-bold">Rp. <span id="totalPrice">0</span></p>
                  </div>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                      <button type="submit" id="submitButton" class="btn btn-primary me-1 mb-1">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="cardsWrapper" class="col-md-8 col-12">
            <div class="card package">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title mb-0">Data Paket</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="trackingNumber-1">Resi</label>
                          <input type="text" id="trackingNumber-1" class="form-control"
                            placeholder="Masukkan Resi Disini" name="packages[1][tracking_number]">
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="pricingOption-1">Jenis Hitung Harga</label>
                          <select class="choices form-select pricing-option" id="pricingOption-1"
                            name="packages[1][pricing_option]">
                            <option selected value="normal">Normal</option>
                            <option value="kubikasi">Kubikasi</option>
                          </select>
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="weight-1">Berat Paket (kg)</label>
                          <input type="text" id="weight-1" class="form-control weight" name="packages[1][weight]">
                          <input type="hidden" id="price-1" class="form-control" name="packages[1][price]" readonly>
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                      <div id="lengthGroup-1" class="col-md-4 col-12 group" style="display: none">
                        <div class="form-group">
                          <label for="length-1">Panjang (cm)</label>
                          <input type="text" id="length-1" class="form-control" name="packages[1][length]"
                            value="0">
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div id="widthGroup-1" class="col-md-4 col-12 group" style="display: none">
                        <div class="form-group">
                          <label for="width-1">Lebar (cm)</label>
                          <input type="text" id="width-1" class="form-control" name="packages[1][width]"
                            value="0">
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div id="heightGroup-1" class="col-md-4 col-12 group" style="display: none">
                        <div class="form-group">
                          <label for="height-1">Tinggi (cm)</label>
                          <input type="text" id="height-1" class="form-control" name="packages[1][height]"
                            value="0">
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div id="cubicWeightGroup-1" class="col-md-6 col-12 group" style="display: none">
                        <div class="form-group">
                          <label for="cubicWeight-1">Berat Kubikasi (kg)</label>
                          <input type="text" id="cubicWeight-1" class="form-control cubic-weight"
                            name="packages[1][cubic_weight]" value="0" readonly>
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-8 col-12">
            <button type="button" class="ms-auto d-block btn btn-sm btn-outline-primary icon icon-left"
              id="addPackageButton">
              <i class="bi bi-plus-circle"></i>
              Tambah Paket
            </button>
          </div>
        </div>
      </form>
    </section>
  </x-page-heading>
  <x-slot:script>
    <script type="module" src="{{ asset('js/jastip-action.js') }}"></script>
  </x-slot:script>
</x-app>
