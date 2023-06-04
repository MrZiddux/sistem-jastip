<x-app title="Jastip">
  <x-page-heading>
    <x-page-title>Kelola Jastip</x-page-title>
    <section class="section">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h5 class="card-title">
            Data Jastip
          </h5>
          <a href="{{ route('jastip.create') }}" class="btn btn-sm btn-primary">
            Tambah Data
          </a>
        </div>
        <div class="card-body">
          <table class="table" id="jastipTable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Penerima</th>
                <th>Status</th>
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
  <x-modal id="detail" title="Detail Jastip" label="detailJastip">
    <div class="table-responsive">
      <table id="detailTable" class="table table-lg">
        <thead>
          <tr>
            <th>Nomor Resi</th>
            <th>Berat (kg)</th>
            <th>Berat Kubikasi (kg)</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <tr>
            <th>Total</th>
            <th id="totalWeight"></th>
            <th id="totalCubicWeight"></th>
            <th id="totalPrice"></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </x-modal>
  <x-modal-form id="delete" title="Hapus Jastip" label="deleteJastip" variant="bg-danger" btn="danger">
  </x-modal-form>
  <x-slot:script>
    <script>
      const DATA_URL = "{{ route('jastip.getData') }}"
    </script>
    <script type="module" src="{{ asset('js/jastip.js') }}"></script>
  </x-slot:script>
</x-app>
