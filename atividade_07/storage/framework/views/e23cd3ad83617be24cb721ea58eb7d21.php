<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Detalhes do Livro</h1>

    <div class="card mb-4">
        <div class="card-header">
            <?php echo e($book->title); ?>

        </div>
        <div class="card-body row">
            <div class="col-md-4">
            <?php if($book->cover_image): ?>
                <img src="<?php echo e(asset('storage/' . $book->cover_image)); ?>" alt="Capa do Livro" class="img-thumbnail" width="150">
            <?php else: ?>
                <p>Nenhuma imagem disponível.</p>
            <?php endif; ?>
            </div>
            <div class="col-md-8">
                <p><strong>Autor:</strong> <?php echo e($book->author->name); ?></p>
                <p><strong>Editora:</strong> <?php echo e($book->publisher->name); ?></p>
                <p><strong>Categoria:</strong> <?php echo e($book->category->name); ?></p>
            </div>
        </div>
    </div>

    <!-- Formulário para Empréstimos -->
    <div class="card mb-4">
        <div class="card-header">Registrar Empréstimo</div>
        <div class="card-body">
            <form action="<?php echo e(route('books.borrow', $book)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuário</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="" selected>Selecione um usuário</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Registrar Empréstimo</button>
            </form>
        </div>
    </div>

    <!-- Histórico de Empréstimos -->
    <div class="card">
        <div class="card-header">Histórico de Empréstimos</div>
        <div class="card-body">
            <?php if($book->users->isEmpty()): ?>
                <p>Nenhum empréstimo registrado.</p>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Data de Empréstimo</th>
                            <th>Data de Devolução</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $book->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('users.show', $user->id)); ?>">
                                        <?php echo e($user->name); ?>

                                    </a>
                                </td>
                                <td><?php echo e(\Carbon\Carbon::parse($user->pivot->borrowed_at)->format('d/m/Y')); ?></td>
                                <td><?php echo e($user->pivot->returned_at ? \Carbon\Carbon::parse($user->pivot->returned_at)->format('d/m/Y') : 'Em Aberto'); ?></td>
                                <td>
                                    <?php if(is_null($user->pivot->returned_at)): ?>
                                        <form action="<?php echo e(route('borrowings.return', $user->pivot->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <button class="btn btn-warning btn-sm">Devolver</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary mt-3">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/brunorodrigo/Documents/projects-general/curso-IFPE/web2/atividade_07/resources/views/books/show.blade.php ENDPATH**/ ?>