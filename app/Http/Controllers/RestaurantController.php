<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use App\Models\rest_pack;
use App\Models\Package;
use App\Models\Restaurant;

use Illuminate\Http\Request;

class restaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('Restaurant.restaurant');
    }

    public function add_show()
    {
        return view('Restaurant.add');
    }

    public function add()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required','image']
        ]);

        $image_path = request('image')->store('restoran', 'public');
        $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
        $image->save();

        restaurant::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image_path,
        ]);
        
        return redirect('/restaurant?success');
    }

    public function list()
    {
        $restaurant = restaurant::get();

        foreach ($restaurant as $rest) {
            $rest->count = rest_pack::where('restaurant_id',$rest->id)->count();
        }

        return Datatables::of($restaurant)
            ->make(true);
    }

    public function edit(restaurant $restaurant)
    {
        return view('Restaurant.edit', compact('restaurant'));
    }

    public function update(restaurant $restaurant, Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => [],
            'image' => ['image'],
        ]);

        $update_data = array();
        $update_data = $data['name'];

        if (request('image')) {
            $image_path = request('image')->store('restoran', 'public');
            $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
            $image->save();
            $update_data['image'] = $image_path;
        }

        if (request('description')) {
            $update_data['description'] = $data['description'];
        }

        $restaurant->update(
            array(
                $update_data
            )
        );

        return redirect('/restaurant/?success');
    }

    public function destroy(restaurant $restaurant)
    {
        $restaurant->rest_packs()->delete();
        $restaurant->delete();
        return redirect('/restaurant/?success');
    }

    public function getData(Request $request){
        $query = Restaurant::where('name', 'LIKE', '%'.$request->term.'%')
            ->get();

        return json_encode($query);
    }
}
