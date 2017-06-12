<?php $__env->startSection('content'); ?>

<div class="panel panel-info">
    <div class="panel-heading">
        <center>
        <h1>
        DAFTAR KELUHAN
        </h1>
        </center>
    </div>
    <div class="panel-body">
        
        <table class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Jenis Keluhan</th>
                    <th>Isi Keluhan</th>
                    <th>Status Keluhan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php (
                    $no = 1
                    ); ?>

                <?php $__currentLoopData = $keluhans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keluhan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($no++); ?></td>
                        <td><?php echo e($keluhan->jenis_keluhan); ?></td>
                        <td><?php echo e($keluhan->isi_keluhan); ?></td>
                        <td><?php echo e($keluhan->status_keluhan); ?></td>
                        <td>
                        <a href="<?php echo e(URL('keluhan/edit')); ?>/<?php echo e($keluhan->id_keluhan); ?>" class="btn btn-sm btn-raised btn-info">Edit</a>
                        <!-- <a href="keluhan/destroy/<?php echo e($keluhan->id_keluhan); ?>" class="btn btn-sm btn-raised btn-danger">Hapus</a> -->
                        <form action="/keluhan/<?php echo e($keluhan->id_keluhan); ?>" method="post">
                        <input type="hidden" name="_method" value="delete"></input>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"></input>
                        <button type="submit" name="name" class="btn btn-sm btn-raised btn-danger">Delete</button>    
                        </form>
                        </td>
                    </tr>
    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>