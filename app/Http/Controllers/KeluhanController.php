<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    public function index()
    {
    	return view('crud.keluhan.tampilkan');
    }
	public function create()
	{
		$keluhans = \App\Keluhan::all();
		return view('crud.keluhan.create', compact('keluhans'));
	}
	public function store (Request $request)
	{
		$validate = \Validator::make($request->all(), [
			'jenis_keluhan' => 'required',
			'isi_keluhan' => 'required'
			
			
		
		],
		$after_save =[
			'alert'=>'danger',
			'title'=>'oh wait!',
			'text-1'=>'Ada kesalahan',
			'text-2' => 'Silahkan coba lagi.'
		]);
		if($validate->fails()){
			return redirect()->back()->with('after_save',$after_save);
		}
		 $after_save = [
            'alert' => 'success',
            'title' => 'God Job!',
            'text-1' => 'Tambah lagi',
            'text-2' => 'Atau kembali.'
        ];
		$data = [
			'id_user' => $request->id_user,
			'jenis_keluhan' => $request->jenis_keluhan,
            'isi_keluhan' => $request->isi_keluhan,
			'keanoniman' => $request->keanoniman,
			'status_keluhan' => $request->status_keluhan,
			
			
        ];
		$store = \App\Keluhan::insert($data);
		return redirect()->back()->with('after_save', $after_save);
	}
	
	public function show($id_keluhan) {
		$keluhans = \App\Keluhan::all();
		
		$showById = \App\Keluhan::find($id_keluhan);
		return view('crud.keluhan.edit', compact('showById', 'keluhans'));
		
	}
	
	public function update(Request $request, $id_keluhan)
    {
 
        $validate = \Validator::make($request->all(), [
			'jenis_keluhan' => 'required',
			'isi_keluhan' => 'required'
			
            ],
 
            
 
            $after_update = [
                'alert' => 'danger',
                'title' => 'Oh wait!',
                'text-1' => 'Ada kesalahan',
                'text-2' => 'Silakan coba lagi.'
            ]);
 
        
 
        if($validate->fails()){
            return redirect()->back()->with('after_update', $after_update);
        }
 
        
 
        $after_update = [
            'alert' => 'success',
            'title' => 'God Job!',
            'text-1' => 'Update berhasil',
            'text-2' => '.'
        ];

 
        $data = [
			'id_user' => $request->id_user,
			'jenis_keluhan' => $request->jenis_keluhan,
            'isi_keluhan' => $request->isi_keluhan,
			'keanoniman' => $request->keanoniman,
			'status_keluhan' => $request->status_keluhan
        ];
 
 
        $update = \App\Keluhan::where('id_keluhan', $id_keluhan)->update($data);
 
        
        return redirect()->to('keluhan')->with('after_update', $after_update);
    }
}
