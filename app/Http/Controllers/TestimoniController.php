<?php

namespace App\Http\Controllers;

use App\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class TestimoniController extends Controller
{
    public $path;
    public $dimensions;

    public function __construct()
    {
        $this->path = public_path('ts_images');
        $this->dimensions = ['500'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Testimoni::orderby('id', 'desc')->paginate(10);

        return view('admin.testimoni.testiDex', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view ('admin.testimoni.testiCre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'    =>  'required',
            'testimoni'    =>  'required',
            'instansi'    =>  'required',
            'photo'   =>  'required|image|max:2048'
        ]);

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }

        $file = $request->file('photo');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
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
        $form_data = array(
            'nama'      =>   $request->nama,
            'instansi'      =>   $request->instansi,
            'testimoni'      =>   $request->testimoni,
            'photo'     =>   $fileName
        );

        Testimoni::create($form_data);
        return redirect()->route('testimoni.index')->with('message', 'Testimoni berhasil di unggah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Testimoni::findOrFail($id);

        return view('admin.testimoni.testiView', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        File::delete('ts_images/'.$testimoni->photo);
        $testimoni->delete();

        return redirect()->route('testimoni.index')->with('message', 'Testimoni berhasil di hapus');
    }
}
