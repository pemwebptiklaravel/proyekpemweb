@extends('layouts.app')
@section('content')
 
<div class="panel panel-info">
	<div class="panel-heading">
		<center>
		<h1>
		CRUD Laravel 5.3
		</h1>
		</center>
	</div>
	<div class="panel-body">
		<a href="{{ URL('kendaraan') }}" class="btn btn-raised btn-danger pull-left">Kembali</a>
		
		{{-- part alert --}}
				@if (Session::has('after_update'))
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-{{ Session::get('after_update.alert') }}">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>{{ Session::get('after_update.title') }}</strong>
					  <a href="javascript:void(0)" class="alert-link">{{ Session::get('after_update.text-1') }}</a> {{ Session::get('after_update.text-2') }}
					</div>
				</div>
			</div>
		@endif
		{{-- end part alert --}}
		
		
		<div class="row">
			<div class="col-md-12"><hr>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form class="form-horizontal" action="{{ URL('keLUHAN/update/'. $showById->id) }}" method="POST">
					{{ csrf_field() }}
					  <fieldset>
					    <legend>FORM EDIT KELUHAN</legend>
							<div class = "form-group">
							  <input type = "hidden" class = "form-control" name ="id_user" value="1">
						   </div>
						   <div class = "form-group">
							 <input type = "hidden" class = "form-control" name ="status_keluhan" value="1">  
						   </div>
						   
						   <div class = "form-group">
								<input type="text" class = "form-control" name="id_keluhan" placeholder="Id Keluhan" value="{{ $showById->id_keluhan }}">
							</div>
						   
							<label for = "name">Jenis Keluhan</label>
							<div>
								<label class = "checkbox-inline">
								  <input type = "radio" name = "jenis_keluhan" id = "jenis_keluhan1" value = "1" checked> Kependidikkan
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
								<textarea class = "form-control" rows = "3" name="isi_keluhan" value="{{ $showById->isi_keluhan }}"></textarea>
							</div>
							<label for = "name">Keanoniman</label>
							<div>
								 <label class = "checkbox-inline">
								  <input type = "checkbox" name = "keanoniman" id = "keanoniman1" value = "1" checked> Ya
							   </label>
							   
							   <label class = "checkbox-inline">
								  <input type = "checkbox" name = "keanoniman" id = "keanoniman2" value = "2"> Tidak
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
 
@stop