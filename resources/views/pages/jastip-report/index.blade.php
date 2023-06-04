<x-app title="Laporan Jastip">
  <x-page-heading>
    <x-page-title>Laporan Jastip</x-page-title>
    <section class="section">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h5 class="card-title">
            Data Laporan Jastip
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="jastipTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Penerima</th>
                  <th>Resi</th>
                  <th>Berat</th>
                  <th>P</th>
                  <th>L</th>
                  <th>T</th>
                  <th>KGVOL</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($packages as $package)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $package->recipient->name }}</td>
                    <td>{{ $package->tracking_number }}</td>
                    <td>{{ $package->weight }}</td>
                    <td>{{ $package->length }}</td>
                    <td>{{ $package->width }}</td>
                    <td>{{ $package->height }}</td>
                    <td>{{ $package->cubic_weight }}</td>
                    <td>Rp. {{ number_format($package->price, 0, ',', '.') }}</td>
                @endforeach
              </tbody>
              @php
                $totalWeight = 0;
                $totalCubicWeight = 0;
                $totalPrice = 0;
                foreach ($packages as $package) {
                    $package->weight = floatval(str_replace(',', '.', $package->weight));
                    $package->cubic_weight = floatval(str_replace(',', '.', $package->cubic_weight));
                
                    $totalWeight += $package->weight;
                    $totalCubicWeight += $package->cubic_weight;
                    $totalPrice += $package->price;
                }
              @endphp
              <tfoot>
                <tr>
                  <th colspan="3">Total</th>
                  <th>{{ $totalWeight }}</th>
                  <th colspan="3">&nbsp;</th>
                  <th>{{ $totalCubicWeight }}</th>
                  <th>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>
  </x-page-heading>
  <x-slot:script>
    <script type="module" src="{{ asset('js/jastip.js') }}"></script>
  </x-slot:script>
</x-app>
