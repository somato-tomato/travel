<?php

namespace App\Http\Controllers;

use App\Paket;
use App\Sarket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SarketController extends Controller
{
    public function create($id)
    {
        $data = Paket::findOrFail($id);
        return view('admin.paket.sarPaket', compact('data'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'namaSarket'  =>  'required',
            'fileSarket'    =>  'required|mimes:doc,pdf,docx,ppt,pptx,xlsx,xls,zip'
        ]);

        $file = $request->file('fileSarket');
        $new_name = $file->getClientOriginalName();
        $file->move(public_path('sarket_files'), $new_name);

        $form_data = array(
            'idPaket'     => $request->idPaket,
            'slug'          =>  $request->slug,
            'namaSarket'  => $request->namaSarket,
            'fileSarket'  => $new_name,
            'uuid'        => (string) Str::uuid()
        );

        Sarket::create($form_data);

        return redirect()->route('paket.show', $request->idPaket)->with('message', 'Syarat dan Keterangan berhasil di unggah!');
    }

    public function download($uuid)
    {
        $sarket = Sarket::where('uuid', $uuid)->firstOrFail();
        $pathToFile = public_path('sarket_files/' . $sarket->fileSarket);
        return response()->download($pathToFile);
    }
}

