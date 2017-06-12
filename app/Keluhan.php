<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    protected $table = 'keluhans';
    protected $primaryKey = 'id_keluhan';
	protected $filable =['id_user','jenis_keluhan','isi_keluhan','keanoniman','status_keluhan'];
	public $timestamps = false;
	
}
