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
                <th>Resi</th>
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
  <x-slot:script>
    <script>
      const DATA_URL = "{{ route('status.getData') }}"
    </script>
    <script type="module" src="{{ asset('js/status.js') }}"></script>
  </x-slot:script>
</x-app>
