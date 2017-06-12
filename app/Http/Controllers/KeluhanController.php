<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluhan;
use Illuminate\Support\Facades\DB;

class KeluhanController extends Controller
{
    public function index()
    {

    	//$keluhans = Keluhan::all();
    	$keluhans = DB::table('keluhans')
    				->join('jenis_keluhans', 'keluhans.jenis_keluhan', '=', 'jenis_keluhans.id_jenis_keluhan')
    				->get();

    	return view('crud.keluhan.tampilkan', ['keluhans' => $keluhans]);
    }
	public function create()
	{
		$keluhans = Keluhan::all();
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
 
 
        $update = Keluhan::where('id_keluhan', $id_keluhan)->update($data);
 
        
        return redirect()->to('keluhan')->with('after_update', $after_update);
    }
     public function destroy($id)
	{
      // Item::find($id_keluhan)->delete();
      // return redirect()->route('keluhan.tampilkan')
      //                 ->with('success','Item deleted successfully');
		$datakeluhan = Keluhan::find($id);
		$datakeluhan->delete();
		return redirect('keluhan');
    }

	public function getOne()
	{
		$keluhans = Keluhan::get();
		return view('keluhan.tampilkan', compact('keluhans'));
	}
}
