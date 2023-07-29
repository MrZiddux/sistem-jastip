<div class="card" style="overflow: hidden; position: relative;">
  <div style="inset: 0;position: absolute;z-index: 2;background-image: linear-gradient(0deg, #f2f7ff, transparent);"></div>
  <div class="card-header">
    <h4><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">{{ str_repeat('_', 20) }}</span></h4>
  </div>
  <div class="card-body">
    <table class="table">
      <tbody>
          @foreach (range(1, 10) as $package)
          <tr>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">___</span></td>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">{{ str_repeat('_', rand(10, 30)) }}</span></td>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">_____</span></td>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">____</span></td>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">____</span></td>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">____</span></td>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">____</span></td>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">____</span></td>
              <td><span class="bg-primary" style="color: transparent!important; opacity: 30%; border-radius: 4px;">{{ str_repeat('_', rand(5, 8)) }}</span></td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
