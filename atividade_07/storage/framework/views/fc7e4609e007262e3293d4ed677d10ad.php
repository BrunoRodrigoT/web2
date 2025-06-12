<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Adicionar Livro (Com Select)</h1>
    <form action="<?php echo e(route('books.store.select')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('books.partials.form', ['method' => 'POST', 'useSelects' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/brunorodrigo/Documents/projects-general/curso-IFPE/web2/atividade_07/resources/views/books/create-select.blade.php ENDPATH**/ ?>