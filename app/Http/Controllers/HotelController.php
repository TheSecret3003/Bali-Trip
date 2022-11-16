<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\Hotel;
use App\Models\hotel_pack;

class HotelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('Hotel.hotel');
    }

    public function add_show()
    {
        return view('Hotel.add');
    }

    public function add()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required','image']
        ]);

        $image_path = request('image')->store('hotel', 'public');
        $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
        $image->save();

        hotel::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image_path,
        ]);
        
        return redirect('/hotel?success');
    }

    public function list()
    {
        $hotels = Hotel::get();

        foreach ($hotels as $hotel) {
            $hotel->count = hotel_pack::where('hotel_id',$hotel->id)->count();
        }

        return Datatables::of($hotels)
            ->make(true);
    }

    public function edit(hotel $hotel)
    {
        return view('hotel.edit', compact('hotel'));
    }

    public function update(Hotel $hotel, Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required','image']
        ]);

        if (request('image')) {
            $image_path = request('image')->store('hotel', 'public');
            $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
            $image->save();
        }

        $hotel->update(
            array(
                'name' => $data['name'],
                'description' => $data['description'],
                'image' => $image_path,
            )
        );

        return redirect('/hotel/?success');
    }

    public function destroy(hotel $hotel)
    {
        $hotel->hotel_packs()->delete();
        $hotel->delete();
        return redirect('/hotel/?success');
    }
}
