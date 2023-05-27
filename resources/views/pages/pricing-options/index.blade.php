  <x-app title="Jenis Harga">
    <x-page-heading>
      <x-page-title>Kelola Jenis Harga</x-page-title>
      <section class="section">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">
              Data Jenis Harga
            </h5>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
              Tambah Data
            </button>
          </div>
          <div class="card-body">
            <table class="table" id="pricingOptionsTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Berat/Kg</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </x-page-heading>
    <x-modal-form id="create" title="Tambah Jenis Harga" label="createPricingOptions">
      <div class="form-group">
        <label for="createNameInput">Nama</label>
        <input type="text" class="form-control" id="createNameInput" name="name" placeholder="Masukkan Nama">
        <span class="invalid-feedback"></span>
      </div>
      <div class="form-group">
        <label for="createPriceInput">Harga</label>
        <input type="text" class="form-control" id="createPriceInput" name="price_per_kg">
        <span class="invalid-feedback"></span>
      </div>
    </x-modal-form>
    <x-modal-form id="edit" title="Edit Jenis Harga" label="editPricingOptions">
      <div class="form-group">
        <label for="editNameInput">Nama</label>
        <input type="text" class="form-control" id="editNameInput" name="name" placeholder="Masukkan Nama">
        <span class="invalid-feedback"></span>
      </div>
      <div class="form-group">
        <label for="editPriceInput">Harga</label>
        <input type="text" class="form-control" id="editPriceInput" name="price_per_kg">
        <span class="invalid-feedback"></span>
      </div>
    </x-modal-form>
    <x-modal-form id="delete" title="Hapus Jenis Harga" label="deletePricingOptions" variant="bg-danger"
      btn="danger">
    </x-modal-form>
    <x-slot:script>
      <script>
        const DATA_URL = "{{ route('jenis-harga.getData') }}"
        const CREATE_URL = "{{ route('jenis-harga.store') }}"
      </script>
      <script type="module" src="{{ asset('js/pricing-options.js') }}"></script>
    </x-slot:script>
  </x-app>
