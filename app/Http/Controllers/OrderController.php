<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Package;
use App\Models\Ticket;
use App\Models\Restaurant;
use App\Models\Destination;
use App\Models\dest_pack;
use App\Models\rest_pack;
use App\Models\Order;
use App\Models\Car;
use App\Models\car_order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('User.user');
    }

    public function add_show()
    {
        $packages = Package::get();
        $regencies = DB::table('regencies')->where('province_id','51')->get();

        return view('Order.add',compact('packages','regencies'));
    }

    public function get_districts(Request $request){
        $districts = DB::table('districts')->where("regency_id",$request->regency_id)->pluck('id','name');
        return response()->json($districts);
    }
    public function get_villages(Request $request){
        $villages = DB::table('villages')->where("district_id",$request->district_id)->pluck('id','name');
        return response()->json($villages);
    }

    public function add()
    {
        $data = request()->validate([
            'package' => ['required','string', 'max:255'],
            'image' => ['required','image'],
            'regency' => ['string', 'max:255'],
            'district' => ['string', 'max:255'],
            'village' => ['string', 'max:255'],
            'pick_point' => ['string', 'max:255'],
            'date' => ['required', 'date'],
        ]);

        $image_path = request('image')->store('bukti_bayar', 'public');
        $image = Image::make(public_path("storage/{$image_path}"));
        $image->save();

        $regency = DB::table('regencies')->where('id',$data['regency'])->first();
        $district = DB::table('districts')->where('id',$data['district'])->first();
        $village = DB::table('villages')->where('id',$data['village'])->first();

        ($regency == NULL)?$regency_id = $regency:$regency_id = $regency->id;
        ($district == NULL)?$district_id = $district:$district_id = $district->id;
        ($village == NULL)?$village_id = $village:$village_id = $village->id;

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'package_id' => $data['package'],
            'payment_method' => 'Manual Transfer',
            'departure_date' => $data['date'],
            'date' => date('Y-m-d'),
            'pick_point' => $data['pick_point'],
            'regency' => $regency_id,
            'district' => $district_id,
            'village' => $village_id,
            'status' => 'pending',
            'image' => $image_path,
        ]);
        
        return redirect('/order/add?success');
    }

    public function add_car_show()
    {
        $cars = Car::get();
        
        return view('Order.add_car',compact('cars'));
    }

    public function add_car()
    {
        $data = request()->validate([
            'car' => ['required','string', 'max:255'],
            'car_amount' => ['required','integer'],
            'image' => ['required','image'],
            'date' => ['required', 'date'],
            'max_person' => ['required', 'integer'],
        ]);
        // dd($data);
        $car = Car::where('id',$data['car'])->first();


        if($data['max_person'] > $car->max_person*$data['car_amount']){
            Alert::error('Kelebihan Muatan', 'Maksimal muatan untuk '. $car->name .' adalah ' . $car->max_person . ' orang untuk setiap mobil');
            return redirect('/order/add_car');
        } else {
            $car = Car::where('id',$data['car'])->first();
            $image_path = request('image')->store('bukti_bayar', 'public');
            $image = Image::make(public_path("storage/{$image_path}"));
            $image->save();
            $order = car_order::create([
                'user_id' => Auth::user()->id,
                'car_id' => $data['car'],
                'payment_method' => 'Manual Transfer',
                'rental_date' => $data['date'],
                'date' => date('Y-m-d'),
                'car_amount' => $data['car_amount'],
                'total_price' => $data['car_amount']*$car->price,
                'status' => 'pending',
                'image' => $image_path,
            ]);
            return redirect('/order/add_car?success');
        }

    }




}
