<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Editar Livro</h1>
    <form action="<?php echo e(route('books.update', $book)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <?php echo $__env->make('books.partials.form', ['method' => 'PUT', 'useSelects' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/brunorodrigo/Documents/projects-general/curso-IFPE/web2/atividade_07/resources/views/books/edit.blade.php ENDPATH**/ ?>