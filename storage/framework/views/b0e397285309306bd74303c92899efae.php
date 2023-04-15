<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add product</title>
</head>
<body>
    <div class="container mt-3">
        <h2>Add new product</h2>
        <?php if(Session::has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(Session::get('success')); ?>

        </div>
        <?php endif; ?>
        <form action="<?php echo e(url('save')); ?>" method="POST">
            <?php echo csrf_field(); ?>
          <div class="mb-3 mt-3">
            <label for="id">Product ID:</label>
            <input type="text" class="form-control" id="id" 
                   placeholder="Enter product id" name="id">
          </div>
          <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" 
                   placeholder="Enter product name" name="name">
          </div>
          <div class="mb-3 mt-3">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" 
                   placeholder="Enter product price" name="price">
          </div>
          <div class="mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
          <div class="mb-3 mt-3">
            <label for="details">Details:</label>
            <textarea class="form-control" rows="5" id="details" name="details"></textarea>
          </div>
          <div class="mb-3 mt-3">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control">
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->catID); ?>"><?php echo e($cat->catName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?php echo e(url('index')); ?>" class="btn btn-danger"> Back </a>
        </form>
      </div>
</body>
</html><?php /**PATH D:\DB\xampp\htdocs\Hung10-app\resources\views/add.blade.php ENDPATH**/ ?>