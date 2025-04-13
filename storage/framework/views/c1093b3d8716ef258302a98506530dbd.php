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
                <h3><i class="fa fa-medkit"></i> Medicine</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Medicines</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="add-drugs" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Medicine</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Medicine Code</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Purchase Price</th>
                          <th>Retail Price</th>
                          <th>Quantity</th>
                          <th>Unit</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        
                        <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($drug['code']); ?></td>
                          <?php if($drug['unit'] == "Boxes"): ?>
                          <td><img src="<?php echo e(asset('/admin/images/alaxan.png')); ?>" width="50" style="border-radius:10px" alt="Image"></td>
                          <?php else: ?>
                          <td><img src="<?php echo e(asset('/admin/images/vial.png')); ?>" width="50" style="border-radius:10px" alt="Image"></td>
                          <?php endif; ?>
                          <td><?php echo e($drug['name']); ?></td>
                          <td><?php echo e($drug['purchasePrice']); ?> </td>
                          <td><?php echo e($drug['retailPrice']); ?></td>
                          <td><?php echo e($drug['quantity']); ?></td>
                          <td><?php echo e($drug['unit']); ?></td>
                          <td>
                              <a href="<?php echo e("editMedicine/".$drug['id']); ?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                              <a href="<?php echo e("deleteMedicine/".$drug['id']); ?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
                          </td>
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

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH C:\Users\pakhr\Desktop\Internship\Pharmacy-Management-System-Laravel\resources\views/medicine.blade.php ENDPATH**/ ?>