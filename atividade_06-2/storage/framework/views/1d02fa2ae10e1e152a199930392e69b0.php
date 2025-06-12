<div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title', $book->title ?? '')); ?>" required>
</div>

<?php if($useSelects): ?>
    <?php $__currentLoopData = ['publisher', 'author', 'category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-3">
            <label for="<?php echo e($relation); ?>_id" class="form-label"><?php echo e(ucfirst($relation)); ?></label>
            <select class="form-select" id="<?php echo e($relation); ?>_id" name="<?php echo e($relation); ?>_id" required>
                <option value="" disabled selected>Selecione uma opção</option>
                <?php $__currentLoopData = $<?php echo e($relation.'s'); ?>; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($entity->id); ?>" <?php echo e(old($relation.'_id', $book->{$relation.'_id'} ?? '') == $entity->id ? 'selected' : ''); ?>>
                        <?php echo e($entity->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <?php $__currentLoopData = ['publisher', 'author', 'category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-3">
            <label for="<?php echo e($relation); ?>_id" class="form-label">ID <?php echo e(ucfirst($relation)); ?></label>
            <input type="number" class="form-control" id="<?php echo e($relation); ?>_id" name="<?php echo e($relation); ?>_id" value="<?php echo e(old($relation.'_id', $book->{$relation.'_id'} ?? '')); ?>" required>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /Users/brunorodrigo/Documents/projects-general/curso-IFPE/web2/atividade_05-2/resources/views/books/partials/form.blade.php ENDPATH**/ ?>