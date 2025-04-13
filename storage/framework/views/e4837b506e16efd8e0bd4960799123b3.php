<!DOCTYPE html>
<html lang="en">
  
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <body class="nav-md">
            <?php echo $__env->make('admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin-menufooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        </div>
        <?php echo $__env->make('admin-topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                        <div class="count"><?php echo e($drugCount); ?></div>
                      </div>
                      <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-truck"></i> Total Suppliers</span>
                        <div class="count"><?php echo e($supplierCount); ?></div>
                      </div>
                      <div class="col-md-4 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Cashier</span>
                        <div class="count"><?php echo e($cashierCount); ?></div>
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
                        <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($sale->medicineName); ?></td>
                          <td><?php echo e($sale->totalQuantity); ?></td>
                          <td><?php echo e($sale->price); ?></td>
                          <td><?php echo e($sale->totalAmount); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      const salesData = <?php echo json_encode($sales, 15, 512) ?>;
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

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH C:\Users\pakhr\Desktop\Internship\Pharmacy-Management-System-Laravel\resources\views/admin-index.blade.php ENDPATH**/ ?>