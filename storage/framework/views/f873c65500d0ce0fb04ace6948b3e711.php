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
                <h4><i class="fa fa-medkit"></i> Add Medicine</h3>
              </div>
            </div>

            <div class="clearfix"></div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Medicine Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="add-medicine">
                  <?php echo csrf_field(); ?>
                  <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" placeholder="Medicine Code" name="code">
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4">
                  <select class="form-control" name="category">
                            <option>Select Category</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category['name']); ?>"> <?php echo e($category['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                  </div>
                  <div class="col-md-4 col-sm-4">
                  <select class="form-control" name="supplier">
                            <option>Select Supplier</option>
                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($supplier['name']); ?>"> <?php echo e($supplier['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                  </div><br><br><br>
                  <div class="col-md-12 col-sm-12">
                    <input type="text" class="form-control has-feedback-left" placeholder="Medicine Name" name="name">
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" placeholder="Medicine Description" name="description"></textarea>
                  </div><br><br><br><br>
                  
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" placeholder="Generic Name" name="genericName">
                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" placeholder="Purchase Price" name="purchasePrice">
                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" placeholder="Retail Price" name="retailPrice">
                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" placeholder="Quantity" name="quantity">
                    <span class="fa fa-hourglass-o form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control has-feedback-left" placeholder="Unit" name="unit">
                    <span class="fa fa-balance-scale form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <input type="date" class="form-control has-feedback-left" placeholder="" name="expiry">
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <br>
                  <div class="col-md-12 col-sm-12 ">
                      <a  href="<?php echo e(route('medicine')); ?>" class="btn btn-primary" type="button">Cancel</a>
                      <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH C:\Users\pakhr\Desktop\Internship\Pharmacy-Management-System-Laravel\resources\views/add-medicine.blade.php ENDPATH**/ ?>