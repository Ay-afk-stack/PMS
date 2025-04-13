<!DOCTYPE html>
<html lang="en">
  
@include('header')

  <body class="nav-md">
            @include('admin-sidebar')
            @include('admin-menufooter')
          </div>
        </div>
        @include('admin-topnav')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-dashboard"></i> Dashboard</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                  <div class="row">
                    <center>
                    <div class="tile_count">
                      <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-medkit"></i> Total Medicines</span>
                        <div class="count">{{ $drugCount }}</div>
                      </div>
                      <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-truck"></i> Total Suppliers</span>
                        <div class="count">{{ $supplierCount }}</div>
                      </div>
                      <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Cashier</span>
                        <div class="count">{{ $cashierCount }}</div>
                      </div>
                    </div>
                  </center>
                  </div>
                  
               <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sales Amount</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lineChart"></canvas>
                  </div>
                </div>
              </div>                   
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top 5 Selling Items</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table class="table table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Total</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($sales as $sale)
                        <tr>
                          <td>{{ $sale->medicineName}}</td>
                          <td>{{ $sale->totalQuantity}}</td>
                          <td>{{ $sale->price}}</td>
                          <td>{{ $sale->totalAmount}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      const salesData = @json($sales);
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Check if data exists
      if (!salesData || salesData.length === 0) {
        console.warn("No sales data available.");
        return;
      }

      // Extract labels and data
      const labels = salesData.map(item => item.medicineName);
      const totals = salesData.map(item => parseFloat(item.totalAmount));

      // Render Chart
      const ctx = document.getElementById('lineChart').getContext('2d');
      new Chart(ctx, {
        type: 'bar', // You can change to 'line' if you prefer
        data: {
          labels: labels,
          datasets: [{
            label: 'Total Sales Amount (₱)',
            data: totals,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Sales in Rs'
              }
            },
            x: {
              title: {
                display: true,
                text: 'Medicine Name'
              }
            }
          }
        }
      });
    });
  </script>

    @include('footer')
  </body>
</html>
