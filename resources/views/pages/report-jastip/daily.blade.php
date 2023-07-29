<x-app>
  <x-page-heading>
    <x-page-title>Laporan Harian Jastip</x-page-title>
    <div class="row">
      <div class="col-12">
        <div id="js-packages-partial-target">
          @if (!empty($cachedPackages))
              {!! $cachedPackages !!}
          @endif
        </div>
      </div>
    </div>
  </x-page-heading>
  <x-slot:script>
    <script>
      const IS_CACHED = {{ empty($cachedPackages) ? 'false' : 'true' }}
      const DAILY_REPORT_JASTIP_URL = `{{ route('laporan-jastip.getDailyData') }}`
      const PLACEHOLDER_ELEMENT = `@include('pages.report-jastip._placeholder')`
    </script>
    <script type="module" src="{{ asset('js/daily-report-jastip.js') }}"></script>
  </x-slot:script>
</x-app>
