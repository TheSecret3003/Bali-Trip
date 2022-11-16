<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use App\Models\dest_pack;
use App\Models\Package;
use App\Models\Destination;


use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('Destination.destination');
    }

    public function add_show()
    {
        return view('Destination.add');
    }

    public function add()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required','image']
        ]);

        $image_path = request('image')->store('destinasi', 'public');
        $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
        $image->save();

        Destination::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image_path,
        ]);
        
        return redirect('/destination?success');
    }

    public function list()
    {
        $destination = Destination::get();

        foreach ($destination as $dest) {
            $dest->count = dest_pack::where('destination_id',$dest->id)->count();
        }

        return Datatables::of($destination)
            ->make(true);
    }

    public function edit(Destination $destination)
    {
        return view('Destination.edit', compact('destination'));
    }

    public function update(Destination $destination, Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => [],
            'image' => ['image'],
        ]);

        $update = array();
        $update['name'] = $data['name'];

        if (request('image')) {
            $image_path = request('image')->store('destinasi', 'public');
            $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
            $image->save();
            $update['image'] = $image_path;

        }

        if (request('description')) {
            $update['description'] = $data['description'];
        }

        $destination->update(
            $update
        );

        return redirect('/destination/?success');
    }

    public function destroy(Destination $destination)
    {
        $destination->dest_packs()->delete();
        $destination->delete();
        return redirect('/destination/?success');
    }

    public function getData(Request $request){
        $query = Destination::where('name', 'LIKE', '%'.$request->term.'%')
            ->get();

        return json_encode($query);
    }
}
