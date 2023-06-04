<x-app title="Tambah Jastip">
  <x-page-heading>
    <x-page-title>Tambah Jastip</x-page-title>
    <section class="section">

      <form id="editForm" action="{{ route('jastip.update', $recipient->id) }}" autocomplete="off">
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
                            placeholder="Masukkan Nama Penerima" value="{{ $recipient->name }}">
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
            @php($i = 0)
            @foreach ($recipient->packages as $package)
              @php($i++)
              <div class="card package">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h4 class="card-title mb-0">Data Paket</h4>
                  <?php if ($i > 1): ?>
                  <button type="button" class="btn text-danger removeButton"><i class="bi bi-x-lg"></i></button>
                  <?php endif; ?>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="trackingNumber-{{ $i }}">Resi</label>
                            <input type="text" id="trackingNumber-{{ $i }}" class="form-control"
                              placeholder="Masukkan Resi Disini" name="packages[{{ $i }}][tracking_number]"
                              value="{{ $package->tracking_number }}">
                            <span class="invalid-feedback"></span>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="pricingOption-{{ $i }}">Jenis Hitung Harga</label>
                            <select class="choices form-select pricing-option" id="pricingOption-{{ $i }}"
                              name="packages[{{ $i }}][pricing_option]">
                              <option value="normal" {{ $package->pricing_option === 'normal' ? 'selected' : '' }}>
                                Normal
                              </option>
                              <option value="kubikasi" {{ $package->pricing_option === 'kubikasi' ? 'selected' : '' }}>
                                Kubikasi
                              </option>
                            </select>
                            <span class="invalid-feedback"></span>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="weight-{{ $i }}">Berat Paket (kg)</label>
                            <input type="text" id="weight-{{ $i }}" class="form-control weight"
                              name="packages[{{ $i }}][weight]" value="{{ $package->weight }}">
                            <input type="hidden" id="price-{{ $i }}" class="form-control"
                              name="packages[{{ $i }}][price]" value="{{ $package->price }}" readonly>
                            <span class="invalid-feedback"></span>
                          </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div id="lengthGroup-{{ $i }}" class="col-md-4 col-12 group" style="display: none">
                          <div class="form-group">
                            <label for="length-{{ $i }}">Panjang (cm)</label>
                            <input type="text" id="length-{{ $i }}" class="form-control"
                              name="packages[{{ $i }}][length]" value="{{ $package->length }}">
                            <span class="invalid-feedback"></span>
                          </div>
                        </div>
                        <div id="widthGroup-{{ $i }}" class="col-md-4 col-12 group" style="display: none">
                          <div class="form-group">
                            <label for="width-{{ $i }}">Lebar (cm)</label>
                            <input type="text" id="width-{{ $i }}" class="form-control"
                              name="packages[{{ $i }}][width]" value="{{ $package->width }}">
                            <span class="invalid-feedback"></span>
                          </div>
                        </div>
                        <div id="heightGroup-{{ $i }}" class="col-md-4 col-12 group"
                          style="display: none">
                          <div class="form-group">
                            <label for="height-{{ $i }}">Tinggi (cm)</label>
                            <input type="text" id="height-{{ $i }}" class="form-control"
                              name="packages[{{ $i }}][height]" value="{{ $package->height }}">
                            <span class="invalid-feedback"></span>
                          </div>
                        </div>
                        <div id="cubicWeightGroup-{{ $i }}" class="col-md-6 col-12 group"
                          style="display: none">
                          <div class="form-group">
                            <label for="cubicWeight-{{ $i }}">Berat Kubikasi (kg)</label>
                            <input type="text" id="cubicWeight-{{ $i }}"
                              class="form-control cubic-weight" name="packages[{{ $i }}][cubic_weight]"
                              value="{{ $package->cubic_weight }}" readonly>
                            <span class="invalid-feedback"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
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
