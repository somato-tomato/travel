<?php

namespace App\Http\Controllers;

use App\Paket;
use App\PaketGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class PaketGaleriController extends Controller
{
    public $path;
    public $dimensions;

    public function __construct()
    {
        $this->path = public_path('pr_images');
        $this->dimensions = ['1024'];
    }

    public function create($id)
    {
        $data = Paket::findOrFail($id);
        return view('admin.paket.imaPaket', compact('data'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'idPaket'   => 'required',
            'namaPhoto' => 'required',
            'photo'     => 'required|image|max:2048'
        ]);

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }

        $file = $request->file('photo');
        $fileName = uniqid() . '.png';
        Image::make($file)->save($this->path . '/' . $fileName);

        foreach ($this->dimensions as $row) {
            $canvas = Image::canvas($row, $row);
            $resizeImage = Image::make($file)->resize($row, $row, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::isDirectory($this->path . '/' . $row)) {
                File::makeDirectory($this->path . '/' . $row);
            }

            $canvas->insert($resizeImage, 'center');
            $canvas->save($this->path . '/' . $row . '/' . $fileName);
        }

        $form_data = array (
            'idPaket'       =>   $request->idPaket,
            'slug'          =>  $request->slug,
            'namaPhoto'     =>   $request->namaPhoto,
            'photo'         =>   $fileName
        );

        //ddd($form_data);

        PaketGaleri::create($form_data);

        return redirect()->route('paket.show', $request->idPaket )->with('message', 'Photo berhasil di unggah.');
    }
}
