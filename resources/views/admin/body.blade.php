<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Dashboard</h2>
    </div>
  </div>

  <!-- Top Stats Section -->
  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-user-1"></i></div><strong>Total Users</strong>
              </div>
              <div class="number dashtext-1">{{ $total_user }}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                class="progress-bar progress-bar-template dashbg-1"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-contract"></i></div><strong>Total Items</strong>
              </div>
              <div class="number dashtext-2">{{ $total_food}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                class="progress-bar progress-bar-template dashbg-2"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Review</strong>
              </div>
              <div class="number dashtext-3">{{ $total_review }}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
                class="progress-bar progress-bar-template dashbg-3"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Total Order</strong>
              </div>
              <div class="number dashtext-4">{{ $total_order }}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
                class="progress-bar progress-bar-template dashbg-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sales Section -->
  <section>
    <div class="container-fluid">
      <div class="row">
        @if(!empty($foodOrderStats))
          @foreach($foodOrderStats as $stat)
            <div class="col-lg-4">
              <div class="stats-with-chart-2 block">
                <div class="title"><strong class="d-block">{{ $stat['title'] }}</strong><span class="d-block">Orders</span></div>
                <div class="piechart chart">
                  <canvas id="pieChartHome{{ $loop->iteration }}"></canvas>
                  <div class="text"><strong class="d-block">{{ $stat['orders'] }}</strong><span class="d-block">Orders</span></div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer__block block no-margin-bottom">
      <div class="container-fluid text-center">
        <p class="no-margin-bottom">2025 &copy; Next Crumb. Built by Anan</p>
      </div>
    </div>
  </footer>
</div>
