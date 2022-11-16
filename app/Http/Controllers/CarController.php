<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Car;
use App\Models\car_order;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('Car.car');
    }

    public function add_show()
    {
        return view('Car.add');
    }

    public function add()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required','image'],
            'max_person' => ['required','integer'],
            'price' => ['required','integer'],
            'hours' => ['required','integer'],
        ]);

        $image_path = request('image')->store('mobil', 'public');
        $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
        $image->save();

        $create = Car::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image_path,
            'max_person' => $data['max_person'],
            'price' => $data['price'],
            'hours' => $data['hours'],
        ]);
        if($create){
            Alert::success('Mobil berhasil ditambahkan');
            return redirect('/car?success');
        }
        
    }

    public function list()
    {
        $cars = Car::get();

        foreach($cars as $car){
            $car->price = number_format($car->price);
            $car->count_order = car_order::where('car_id',$car->id)->count();
        }
        return Datatables::of($cars)
            ->make(true);
    }

    public function edit(Car $car)
    {
        // dd($car->description);
        return view('car.edit', compact('car'));
    }

    public function update(Car $car, Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'image' => ['image'],
            'max_person' => ['integer'],
            'price' => ['integer'],
            'hours' => ['integer'],
        ]);

        // dd($data);

        $update_data = array();

        $update_data['name'] = $data['name'];
        $update_data['description'] = $data['description'];
        $update_data['max_person'] = $data['max_person'];
        $update_data['price'] = $data['price'];
        $update_data['hours'] = $data['hours'];

        if (request('image')) {
            $image_path = request('image')->store('mobil', 'public');
            $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
            $image->save();
            $update_data['image'] = $image_path;
        }

        $update = $car->update(
            $update_data
        );

        if($update){
            Alert::success('Mobil berhasil diubah');
            return redirect('/car?success');
        }
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/car/?success');
    }
}
