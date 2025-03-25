<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

    <!-- Create Role Form -->
    <form action="<?php echo e(route('roles.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Enter Role Name" required>
        <input type="text" name="guard_name" placeholder="Enter Guard Name" value="web" required>
        <button type="submit">Submit</button>
    </form>

    <!-- Create Permission Form -->
    <form action="<?php echo e(route('permissions.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Enter Permission Name" required>
        <input type="text" name="guard_name" placeholder="Enter Guard Name" value="web" required>
        <button type="submit">Submit</button>
    </form>

    <!-- Assign Permission to Role Form -->
    <form action="<?php echo e(route('permissions.assign')); ?>" method="POST">  
        <?php echo csrf_field(); ?>
        <input type="text" name="user_id" placeholder="Enter User ID" required>
        <input type="text" name="permission" placeholder="Enter Permission Name" required>
        <button type="submit">Submit</button>

    <!-- Display Roles and Their Permissions -->
    <?php if(isset($role) && $role->count()): ?>
        <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h1><?php echo e($roles->name); ?></h1>
            <?php if(isset($roles->permissions) && $roles->permissions->count()): ?>
                <?php $__currentLoopData = $roles->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($permission->name); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p>No permissions assigned</p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>No roles found</p>
    <?php endif; ?>

    <!-- Display Permissions and Their Assigned Roles -->
    <?php if(isset($permission) && $permission->count()): ?>
        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <h1><?php echo e($permissions->name); ?></h1>
            <?php if(isset($permissions->roles) && $permissions->roles->count()): ?>
                <?php $__currentLoopData = $permissions->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($role->name); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p>No roles assigned</p>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>No permissions found</p>
    <?php endif; ?>

</body>
</html>
<?php /**PATH C:\laragon\www\Spatie-Activity\resources\views/posts/index.blade.php ENDPATH**/ ?>