<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('Gallery.gallery');
    }

    public function add_show()
    {
        return view('Gallery.add');
    }

    public function add()
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:100'],
            'image' => ['required','image']
        ]);

        $image_path = request('image')->store('gallery', 'public');
        $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
        $image->save();

        gallery::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $image_path,
        ]);
        
        return redirect('/gallery?success');
    }

    public function list()
    {
        $gallery = Gallery::get();

        return Datatables::of($gallery)
            ->make(true);
    }

    public function edit(gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Gallery $gallery, Request $request)
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:100'],
            'image' => ['required','image']
        ]);

        if (request('image')) {
            $image_path = request('image')->store('gallery', 'public');
            $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
            $image->save();
        }

        $gallery->update(
            array(
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $image_path,
            )
        );

        return redirect('/gallery/?success');
    }

    public function destroy(gallery $gallery)
    {
        $gallery->delete();
        return redirect('/gallery/?success');
    }
}
