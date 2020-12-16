<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Post;
use App\Models\StatusKesehatanAnak;
use Illuminate\Http\Request;

class IbuController extends Controller
{
    public function index()
    {
        $auth = auth()->guard()->user();
        // $anak = Anak::where('id_ibu', $auth->id)->get();
        $anak = Anak::select(['anak.id as id_anak','anak.nama as nama','tracking.status_stunting as status_stunting'])
                ->leftJoin('tracking','anak.id','=','tracking.id_anak')
                ->where('anak.id_ibu' , $auth->id)
                ->distinct()
                ->orderBy('anak.id')->get();
        return view('ibu.index', compact('auth', 'anak'));
    }

    public function data_anak()
    {
        $auth = auth()->guard()->user();
        $anak = Anak::select('*')
        ->join('status_kesehatan_anak','anak.id','=','status_kesehatan_anak.id_anak')
        ->where('anak.id_ibu' , $auth->id)->get();;            
        return view('ibu.data_anak', compact('auth','anak'));
    }

    public function artikel()
    {
        $artikel = Post::latest()->take(4)->get();
        // dd($artikel);
        return view('ibu.artikel', compact('artikel'));
    }

    public function artikelDetail($slug)
    {
        $artikel = Post::where('slug','=' ,$slug)->get();
        // dd($artikel);
        return view('ibu.artikelDetail', compact('artikel'));
    }
    
}
