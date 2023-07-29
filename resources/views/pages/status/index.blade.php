<x-app title="Status">
  <x-page-heading>
    <x-page-title>Kelola Status</x-page-title>
    <section class="section">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h5 class="card-title">
            Data Status
          </h5>
          <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Data
          </button>
        </div>
        <div class="card-body">
          <table class="table" id="statusesTable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
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
  <x-modal-form id="create" title="Tambah Status" label="createStatus">
    <div class="form-group">
      <label for="createNameInput">Nama</label>
      <input type="text" class="form-control" id="createNameInput" name="name" placeholder="Masukkan Nama">
      <span class="invalid-feedback"></span>
    </div>
  </x-modal-form>
  <x-modal-form id="edit" title="Edit Status" label="editStatus">
    <div class="form-group">
      <label for="editNameInput">Nama</label>
      <input type="text" class="form-control" id="editNameInput" name="name" placeholder="Masukkan Nama">
      <span class="invalid-feedback"></span>
    </div>
  </x-modal-form>
  <x-modal-form id="delete" title="Hapus Status" label="deleteStatus" variant="bg-danger" btn="danger">
  </x-modal-form>
  <x-slot:script>
    <script>
      const DATA_URL = "{{ route('status.getData') }}"
      const CREATE_URL = "{{ route('status.store') }}"
    </script>
    <script type="module" src="{{ asset('js/status.js') }}"></script>
  </x-slot:script>
</x-app>
