<?php

namespace App\Http\Controllers;

use App\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialMediaController extends Controller
{
    public function index()
    {
        $data = SocialMedia::all();
        return view('admin.soc.socmedDex', compact('data'));
    }

    public function create()
    {
        return view('admin.soc.socmedCre');
    }

    public function upcre(Request $request)
    {
        $request->validate([
            'socmed'   =>  'required',
            'link' => 'required'
        ]);

        DB::table('social_media')
            ->updateOrInsert(
                ['socmed' => $request->socmed],
                ['link' => $request->link]
            );

        return redirect(url('/administrator/socmed'))->with('message', 'Akun Sosial Media berhasil di tambahkan!');
    }
}
