<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
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
use App\Models\Disable_date;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        $history = array("delivered"=>0,"success"=>0,"canceled"=>0);
        $history["delivered"] = Order::where('status','delivered')->count();
        $history["success"] = Order::where('status','success')->count();
        $history["canceled"] = Order::where('status','canceled')->count();
        $total_count = Order::where('status','pending')->whereDate('date',date('Y-m-d'))->count() + car_order::where('status','pending')->whereDate('date',date('Y-m-d'))->count();
        $packages = $this->pie_chart();
        $destinations = $this->bar_chart();
        $orders = $this->line_chart();
        $departures = $this->calendar();

        // dd($destinations);
        // dd($packages);

        // dd($departures);

        return view('Dashboard.dashboard',compact('history','packages','destinations','orders','departures','total_count'));
    }

    public function calendar()
    {
        $departures = array();
        $departures['date'] = array();
        $departures['type'] = array();
        $date_order = Order::select('departure_date')->distinct()->get();
        $car_order = car_order::select('rental_date')->distinct()->get();

        foreach($date_order as $date)
        {
            array_push($departures['date'],$date->departure_date);
            array_push($departures['type'],'package');
        }

        foreach($car_order as $date)
        {
            array_push($departures['date'],$date->rental_date);
            array_push($departures['type'],'car');
        }

        $departures = json_encode($departures);
        return($departures);
    }

    public function departure($date)
    {
        $is_disable_date['package'] = false;
        $is_disable_date['car'] = false;
        $disable_date_package = Disable_date::where('type','package')->get();
        $disable_date_car = Disable_date::where('type','car')->get();

        foreach($disable_date_package as $disable_date)
        {
            if($date == $disable_date->disable_date ) {
                $is_disable_date['package'] = true;
                break;
            }
        }

        foreach($disable_date_car as $disable_date)
        {
            if($date == $disable_date->disable_date ) {
                $is_disable_date['car'] = true;
                break;
            }
        }

        // dd($is_disable_date);


        return view('Dashboard.departure',compact('date','is_disable_date'));
    }

    public function departure_list($date)
    {
        $order = Order::where('departure_date',$date)->get();
        foreach($order as $ord)
        {
            $package = Package::where('id',$ord->package_id)->first();
            $user = User::where('id',$ord->user_id)->first();
            $ord->package = $package->name;
            $ord->user = $user->name;

            $regency = DB::table('regencies')->where('id',$ord->regency)->first();
            $district = DB::table('districts')->where('id',$ord->district)->first();
            $village = DB::table('villages')->where('id',$ord->village)->first();
            
            ($regency == NULL)?$ord->regency = $regency:$ord->regency = $regency->name;
            ($district == NULL)?$ord->district = $district:$ord->district = $district->name;
            ($village == NULL)?$ord->village = $village:$ord->village = $village->name;
        }

        
        $order =  Datatables::of($order)
        ->editColumn('date',function($order){
            return date('d-m-Y',strtotime($order->date));
        })
        ->editColumn('departure_date',function($order){
            return date('d-m-Y',strtotime($order->departure_date));
        })
            ->make(true);
        return $order;
    }

    public function car_list($date)
    {
        $order = car_order::where('rental_date',$date)->get();
        foreach($order as $ord)
        {
            $car = Car::where('id',$ord->car_id)->first();
            $user = User::where('id',$ord->user_id)->first();
            $ord->car = $car->name;
            $ord->user = $user->name;
            $ord->price = $car->price;
        }
        $order =  Datatables::of($order)
        ->editColumn('date',function($order){
            return date('d-m-Y',strtotime($order->date));
        })
        ->editColumn('rental_date',function($order){
            return date('d-m-Y',strtotime($order->rental_date));
        })
        ->editColumn('total_price',function($order){
            return number_format($order->total_price);
        })
            ->make(true);
        return $order;
    }

    public function disable_date($date)
    {
        $disable_date = Disable_date::where('disable_date',$date)->where('type','package')->first();
        if(!isset($disable_date)){
            Disable_date::create([
                'disable_date' => $date,
                'type' => 'package',
            ]);    
        }
        return redirect('/dashboard/'. $date . '/departure_date');
    }

    public function enable_date($date)
    {
        Disable_date::where('disable_date',$date)->where('type','package')->delete();
        
        return redirect('/dashboard/'. $date . '/departure_date');
    }

    public function disable_date_car($date)
    {
        $disable_date = Disable_date::where('disable_date',$date)->where('type','car')->first();
        if(!isset($disable_date)){
            Disable_date::create([
                'disable_date' => $date,
                'type' => 'car',
            ]);    
        }
        return redirect('/dashboard/'. $date . '/departure_date');
    }

    public function enable_date_car($date)
    {
        Disable_date::where('disable_date',$date)->where('type','car')->delete();
        
        return redirect('/dashboard/'. $date . '/departure_date');
    }

    public function line_chart()
    {
        $orders['delivered'] = array();
        $orders['canceled'] = array();
        for($i = 1;$i <= 12;$i++){
            $delivered = Order::where('status','delivered')->whereMonth('date',$i)->count();
            $delivered = $delivered+Order::where('status','success')->whereMonth('date',$i)->count();
            $canceled = Order::where('status','canceled')->whereMonth('date',$i)->whereYear('date',date('Y'))->count();
            array_push($orders['delivered'],$delivered);
            array_push($orders['canceled'],$canceled);
        }

        $max_delivered = max($orders['delivered']);
        $max_canceled = max($orders['canceled']);

        if($max_delivered > $max_canceled) {
            $max = $max_delivered;
        } else {
            $max = $max_canceled;
        }

        $power = 1;

        while($max > 10){
            $max = $max/10;
            $power += 1;
        }

        $orders['max'] = pow(10,$power);

        $orders = json_encode($orders);
        
        return $orders;
    }

    public function pie_chart()
    {
        $packages = array();

        $orders = Order::where('status','=','delivered')->orWhere('status','=','success')->get();
        $optional = 0;
        $tour = 0;

        foreach($orders as $order)
        {
            $package = Package::where('id',$order->package_id)->first();
            if($package->type == 'tour') $tour += 1;
            if($package->type != 'tour') $optional += 1;
            
        }
        
        array_push($packages,$tour);
        array_push($packages,$optional);

        $packages = json_encode($packages);

        return $packages;

    }

    public function bar_chart()
    {
        $dest_name = array();

        $destinations = Order::join('packages', 'packages.id', '=', 'orders.package_id')
            ->join('dest_packs', 'dest_packs.package_id', '=', 'packages.id')
            ->join('destinations', 'destinations.id', '=', 'dest_packs.destination_id')
            ->select('orders.id','destinations.name')->
            where('orders.status','=','delivered')->orWhere('orders.status','=','success')
            ->get();

        foreach($destinations as $dest)
        {
            if (!array_key_exists($dest->name,$dest_name)) {
                $dest_name[$dest->name] = 1;
            } else {
                $dest_name[$dest->name] += 1;
            }
        }

        arsort($dest_name);

        $dest_name = array_slice($dest_name, 0, 5, true);
        $dest_name = json_encode($dest_name);

        return $dest_name;
    }

    public function list()
    {
        $order = Order::whereDate('date',date('Y-m-d'))->get();

        foreach($order as $ord)
        {
            $package = Package::where('id',$ord->package_id)->first();
            $user = User::where('id',$ord->user_id)->first();
            $ord->package = $package->name;
            $ord->user = $user->name;

            $regency = DB::table('regencies')->where('id',$ord->regency)->first();
            $district = DB::table('districts')->where('id',$ord->district)->first();
            $village = DB::table('villages')->where('id',$ord->village)->first();
            
            ($regency == NULL)?$ord->regency = $regency:$ord->regency = $regency->name;
            ($district == NULL)?$ord->district = $district:$ord->district = $district->name;
            ($village == NULL)?$ord->village = $village:$ord->village = $village->name;
        }
        $order =  Datatables::of($order)
        ->editColumn('date',function($order){
            return date('d-m-Y',strtotime($order->date));
        })
        ->editColumn('departure_date',function($order){
            return date('d-m-Y',strtotime($order->departure_date));
        })
            ->make(true);
        return $order;
    }

    public function edit_order(Order $order)
    { 
        $packages = Package::get();
        $packages_name = Package::where('id',$order->package_id)->first();
        $regencies = DB::table('regencies')->where('province_id','51')->get();
        $regency = DB::table('regencies')->where('id',$order->regency)->first();
        // dd($regency->id);
        $districts = NULL;
        $villages = NULL;
        $district = DB::table('districts')->where('id',$order->district)->first();
        if($regency != NULL) $districts = DB::table('districts')->where('regency_id',$regency->id)->get();
        $village = DB::table('villages')->where('id',$order->village)->first();
        if($district != NULL) $villages = DB::table('villages')->where('district_id',$district->id)->get();

        ($regency == NULL)?$order->regency_name = $regency:$order->regency_name = $regency->name;
        ($district == NULL)?$order->district_name = $district:$order->district_name = $district->name;
        ($village == NULL)?$order->village_name = $village:$order->village_name = $village->name;

        // dd($districts);
        
        $order->package = $packages_name->name;
        return view('Dashboard.edit_order',compact('order','packages','regencies','districts','villages'));
    }

    public function update(Order $order, Request $request)
    {
        $data = request()->validate([
            'package' => ['required','string', 'max:255'],
            'status' => ['required','string', 'max:255'],
            'regency' => ['string', 'max:255'],
            'district' => ['string', 'max:255'],
            'village' => ['string', 'max:255'],
            'pick_point' => ['string', 'max:255'],
            'date' => [],
            'image' => ['image'],
        ]);

        $regency = DB::table('regencies')->where('id',$data['regency'])->first();
        $district = DB::table('districts')->where('id',$data['district'])->first();
        $village = DB::table('villages')->where('id',$data['village'])->first();

        ($regency == NULL)?$regency_id = $regency:$regency_id = $regency->id;
        ($district == NULL)?$district_id = $district:$district_id = $district->id;
        ($village == NULL)?$village_id = $village:$village_id = $village->id;

        $update_data = array();
        $update_data['package_id'] = $data['package'];
        $update_data['status'] = $data['status'];
        $update_data['regency'] = $regency_id;
        $update_data['district'] = $district_id;
        $update_data['village'] = $village_id;
        $update_data['pick_point'] = $data['pick_point'];

        if (request('image')) {
            $image_path = request('image')->store('bukti_bayar', 'public');
            $image = Image::make(public_path("storage/{$image_path}"));
            $image->save();
            $update_data['image'] = $image_path;   
        } 

        if(request('date')) {
            $update_data['departure_date'] = $data['date'];
        }

        $update = $order->update(
            $update_data
        );

        if($update){
            Alert::success('Order berhasil diupdate');
            return redirect('/?success');    
        }
    }

    public function list_car_order()
    {
        $order = car_order::whereDate('date',date('Y-m-d'))->get();

        foreach($order as $ord)
        {
            $car = Car::where('id',$ord->car_id)->first();
            $user = User::where('id',$ord->user_id)->first();
            $ord->car = $car->name;
            $ord->user = $user->name;
            $ord->price = $car->price;
        }
        $order =  Datatables::of($order)
        ->editColumn('date',function($order){
            return date('d-m-Y',strtotime($order->date));
        })
        ->editColumn('rental_date',function($order){
            return date('d-m-Y',strtotime($order->rental_date));
        })
        ->editColumn('total_price',function($order){
            return number_format($order->total_price);
        })
            ->make(true);
        return $order;
    }

    public function edit_car_order(car_order $car_order)
    { 
        $cars = Car::get();
        $cars_name = Car::where('id',$car_order->car_id)->first();
        
        $car_order->car = $cars_name->name;
        return view('Dashboard.edit_car_order',compact('car_order','cars'));
    }

    public function update_car_order(car_order $car_order, Request $request)
    {
        // dd($request);
        $data = request()->validate([
            'car' => ['required','string', 'max:255'],
            'status' => ['required','string', 'max:255'],
            'rental_date' => [],
            'image' => ['image'],
        ]);

        // dd($data);

        $update_data = array();
        $update_data['car_id'] = $data['car'];
        $update_data['status'] = $data['status'];
        if (request('rental_date')) {
            $update_data['rental_date'] = $data['rental_date'];
        }

        if (request('image')) {
            $image_path = request('image')->store('bukti_bayar', 'public');
            $image = Image::make(public_path("storage/{$image_path}"));
            $image->save();
            $update_data['image'] = $image_path;
            
        } 

        $update = $car_order->update(
            $update_data
        );


        if($update){
            Alert::success('Order berhasil diupdate');
            return redirect('/?success');    
        }
    }
}
