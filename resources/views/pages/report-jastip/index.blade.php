<x-app>
  <x-page-heading>
    <x-page-title>Laporan Jastip</x-page-title>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tanggal Barang Masuk</h4>
          </div>
          <form id="form-jastip-date">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="start-date">Tanggal Awal</label>
                    <input type="date" class="form-control form-control-sm input-date" id="start-date" name="start_date">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="end-date">Tanggal Akhir </label>
                    <input type="date" class="form-control form-control-sm input-date" id="end-date" name="end_date">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
                <div class="col-md-12 mt-4">
                  <button type="submit" id="button-submit-jastip-date" class="btn btn-sm btn-primary" disabled>Cari Jastip</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div id="js-packages-partial-target"></div>
      </div>
    </div>
  </x-page-heading>
  <x-slot:script>
    <script>
      const PLACEHOLDER_ELEMENT = `@include('pages.report-jastip._placeholder')`;
      const REPORT_JASTIP_URL = `{{ route('laporan-jastip.getReportData') }}`
  </script>
  <script type="module" src="{{ asset('js/report-jastip.js') }}"></script>
  </x-slot:script>
</x-app>
