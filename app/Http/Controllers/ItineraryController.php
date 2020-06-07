<?php

namespace App\Http\Controllers;

use App\Itinerary;
use App\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItineraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('download');
    }

    public function create($id)
    {
        $data = Paket::findOrFail($id);
        return view('admin.paket.itiPaket', compact('data'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'namaItinerary'  =>  'required',
            'fileItinerary'    =>  'required|mimes:doc,pdf,docx,ppt,pptx,xlsx,xls,zip'
        ]);

        $file = $request->file('fileItinerary');
        $new_name = $file->getClientOriginalName();
        $file->move(public_path('itinerary_files'), $new_name);

        $form_data = array(
            'idPaket'        => $request->idPaket,
            'slug'          =>  $request->slug,
            'namaItinerary'  => $request->namaItinerary,
            'fileItinerary'  => $new_name,
            'uuid'           => (string) Str::uuid()
        );

        Itinerary::create($form_data);

        return redirect()->route('paket.show', $request->idPaket)->with('message', 'Itinerary berhasil di unggah!');
    }

    public function download($uuid)
    {
        $iti = Itinerary::where('uuid', $uuid)->firstOrFail();
        $pathToFile = public_path('itinerary_files/' . $iti->fileItinerary);
        return response()->download($pathToFile);
    }
}
