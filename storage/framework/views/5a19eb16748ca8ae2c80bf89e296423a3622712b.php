<?php $__env->startSection('content'); ?>
 
<div class="panel panel-info">
	<div class="panel-heading">
		<center>
		<h1>
		Isi Keluhan Anda
		</h1>
		</center>
	</div>
	<div class="panel-body">
		<a href="<?php echo e(URL('keluhan')); ?>" class="btn btn-raised btn-danger pull-left">Kembali</a>
		
		<?php if(Session::has('after_save')): ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-<?php echo e(Session::get('after_save.alert')); ?>">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong><?php echo e(Session::get('after_save.title')); ?></strong>
					  <a href="javascript:void(0)" class="alert-link"><?php echo e(Session::get('after_save.text-1')); ?></a> <?php echo e(Session::get('after_save.text-2')); ?>

					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="row">
			<div class="col-md-12"><hr>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form class="form-horizontal" action="<?php echo e(URL('keluhan/store')); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

					  <fieldset>
					    <legend>FORM TAMBAH KELUHAN</legend>
							<div class = "form-group">
							  <input type = "hidden" class = "form-control" name ="id_user" value="1">
						   </div>
						   <div class = "form-group">
							 <input type = "hidden" class = "form-control" name ="status_keluhan" value="1">  
						   </div>
						   
							<label for = "name">Jenis Keluhan</label>
							<div>
								<label class = "checkbox-inline">
								  <input type = "radio" name = "jenis_keluhan" id = "jenis_keluhan1" value = "1"> Kependidikkan
							   </label>
							   
							   <label class = "checkbox-inline">
								  <input type = "radio" name = "jenis_keluhan" id = "jenis_keluhan2" value = "2"> Fasilitas
							   </label>
							   <label class = "checkbox-inline">
								  <input type = "radio" name = "jenis_keluhan" id = "jenis_keluhan3" value = "3"> Lingkungan
							   </label>
							   <label class = "checkbox-inline">
								  <input type = "radio" name = "jenis_keluhan" id = "jenis_keluhan4" value = "4"> Lain-lain
							   </label>
							</div>
						   
							<div class = "form-group">
								<label for = "name">Isi Keluhan</label>
								<textarea class = "form-control" rows = "3" name="isi_keluhan"></textarea>
							</div>
							<div>
								 <label >
								  <input class = "checkbox-inline" type = "checkbox" name = "keanoniman" value = "1" > Keanoniman
								</label>
							  </div> 
							
							<div class="form-group">
						      <div class="col-md-12">
						        <button type="submit" class="btn btn-raised btn-primary pull-right">Submit</button>
						        <button type="reset" class="btn btn-raised btn-warning pull-right">Reset</button>
						      </div>
						    </div>
						</fieldset>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>