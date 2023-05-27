<x-app title="Tambah Jastip">
  <x-page-heading>
    <x-page-title>Tambah Jastip</x-page-title>
    <section class="section">

      <form action="{{ route('jastip.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="row match-height">
          <div class="col-md-4 col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Penerima</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <form class="form form-horizontal">
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
                  </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-wrap">
                    <h5 class="fw-normal">Total Harga :</h5>
                    <p class="fs-5 fw-bold">Rp. <span>0</span></p>
                  </div>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                      <button type="button" class="btn btn-primary me-1 mb-1">Simpan</button>
                      <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Paket</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="trackingNumber">Resi</label>
                          <input type="text" id="trackingNumber" class="form-control"
                            placeholder="Masukkan Resi Disini" name="tracking_number[]">
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="pricingOption">Jenis Hitung Harga</label>
                          <select class="choices form-select" id="pricingOption" name="pricing_option[]">
                            <option value="square">Square</option>
                            <option value="rectangle">Rectangle</option>
                            <option value="rombo">Rombo</option>
                            <option value="romboid">Romboid</option>
                            <option value="trapeze">Trapeze</option>
                            <option value="traible">Triangle</option>
                            <option value="polygon">Polygon</option>
                          </select>
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="weight">Berat</label>
                          <input type="text" id="weight" class="form-control" name="weight[]">
                          <span class="invalid-feedback"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" class="ms-auto d-block btn btn-sm btn-outline-primary icon icon-left">
              <i class="bi bi-plus-circle"></i>
              Tambah Paket
            </button>
          </div>
        </div>
      </form>
    </section>
  </x-page-heading>
  <x-slot:script>
    <script>
      const CREATE_URL = "{{ route('jastip.store') }}"
    </script>
    <script type="module" src="{{ asset('js/jastip.js') }}"></script>
  </x-slot:script>
</x-app>
