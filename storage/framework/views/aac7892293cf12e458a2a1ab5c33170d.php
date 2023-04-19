<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <h2> Product list</h2>
                <div style="margin-right: 5%; margin-bottom:20px; float:right";
                    <a href="<?php echo e(url('add')); ?>" class="btn btn-primary">Add product</a>
                </div>
                <table class="table table-hover">
                    <thead class="table-success">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->productID); ?></td>
                            <td><?php echo e($product->productName); ?></td>
                            <td><?php echo e($product->productPrice); ?></td>
                            <td><?php echo e($product->productImage); ?></td>
                            <td><?php echo e($product->ProductDetails); ?></td>
                            <td><?php echo e($product->catID); ?></td>
                            <td>
                                <a href="<?php echo e(url('edit/' .$product->productID)); ?>" title="Edit this product"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp;
                                <a href="#" title="Delete this product"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    
        </div>
    </div>
    
</body>
</html><?php /**PATH D:\DB\xampp\htdocs\Hung10-app\resources\views/index.blade.php ENDPATH**/ ?>