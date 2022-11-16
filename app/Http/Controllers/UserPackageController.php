<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Package;
use App\Models\Ticket;
use App\Models\Restaurant;
use App\Models\Destination;
use App\Models\dest_pack;
use App\Models\rest_pack;
use App\Models\hotel_pack;
use App\Models\Order;
use App\Models\Car;
use App\Models\car_order;
use App\Models\Disable_date;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use App\Mail\ContactMail;
use Mail;
use Midtrans\Snap;
use App\Services\Midtrans\Midtrans;

class UserPackageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list_car()
    {  
        $pagination = 10;
        $cars = Car::paginate($pagination);
        // dd($cars);

        return view('UserPackage.user_car',compact('cars'));
    }

    public function list_optional_package()
    {  
        $pagination = 9;
        $optional_packages = Package::where('type','!=','tour')->paginate($pagination);
        $package_dest = array();
        $count = 0;

        foreach ($optional_packages as $package){
            $discount = Ticket::select('discount')->where('id',$package->id_ticket)->first();
            if($discount != NULL){
                $package->price_discount = number_format($package->price*(1-$discount->discount/100));
                $package->discount = $discount->discount;
            } else {
                $package->price_discount = number_format($package->price);
            }

            $destination = dest_pack::where('package_id',$package->id)->first();
            $image = Destination::select('image')->where('id',$destination->destination_id)->first();
            $package->image = $image->image();

            $destinations = dest_pack::where('package_id',$package->id)->get();
            $package->destinations = array();
            $package_dest[$count] = array();

            foreach($destinations as $dest) {
                $name = Destination::select('name')->where('id',$dest->destination_id)->first();
                array_push($package_dest[$count],$name->name);
            }

            $package->count_destination = dest_pack::where('package_id',$package->id)->count();
            $package->count_restaurant = rest_pack::where('package_id',$package->id)->count();
            $count++;
        }

        return view('UserPackage.user_optional',compact('optional_packages','package_dest'));
    }

    public function optional_package_detail(Package $package)
    {
        $destinations = dest_pack::where('package_id',$package->id)->get();
        $restaurants = rest_pack::where('package_id',$package->id)->get();
        $package_dest = array();
    
        foreach($destinations as $dest) {
            $destination = Destination::where('id',$dest->destination_id)->first();
            $dest->name = $destination->name;
            $dest->description = $destination->description;
            $dest->image = $destination->image();
        }

        foreach($restaurants as $rest) {
            $restaurant = Restaurant::where('id',$rest->restaurant_id)->first();
            $rest->name = $restaurant->name;
            $rest->description = $restaurant->description;
            $rest->image = $restaurant->image();
        }

        $discount = Ticket::select('discount')->where('id',$package->id_ticket)->first();
        if($discount != NULL){
            $package->price_discount = number_format($package->price*(1-$discount->discount/100));
            $package->price = number_format($package->price);
            $package->discount = $discount->discount;
        } else {
            $package->price_discount = number_format($package->price);
            $package->discount = 0;
        }

        $orders = Order::where('package_id',$package->id)->where('rating','!=',NULL)->get();
        $sum_rating = 0;
        $count = Order::where('package_id',$package->id)->where('rating','!=',NULL)->count();
    
        foreach($orders as $order) {
            if($order->rating != NULL) {
                $user = User::where('id',$order->user_id)->first();
                $order->user = $user->name;
            }
            $sum_rating += $order->rating;
                
        }
        if(sizeof($orders) != 0){
            $avg_rating = round($sum_rating/sizeof($orders),1);
        } else {
            $avg_rating = 0;
        }
        
        // dd($package->rest_packs->count());
        return view('UserPackage.detail_optional_package1',compact('package','destinations','restaurants','avg_rating','orders','count'));
    }

    public function tour_package_detail(Package $package){
        $day_dest = $package->dest_packs->pluck('day_id')->toArray();
        $day_rest = $package->rest_packs->pluck('day_id')->toArray();

        $days = array_unique(array_merge($day_dest, $day_rest));

        $discount = Ticket::select('discount')->where('id',$package->id_ticket)->first();

        if($discount != NULL){
            $package->price_discount = number_format($package->price*(1-$discount->discount/100));
            $package->price = number_format($package->price);
            $package->discount = $discount->discount;
        } else {
            $package->price_discount = 0;
            $package->price = number_format($package->price);
            $package->discount = 0;
        }

        $orders = Order::where('package_id',$package->id)->where('rating','!=',NULL)->get();
        $sum_rating = 0;
        $count = Order::where('package_id',$package->id)->where('rating','!=',NULL)->count();
    
        foreach($orders as $order) {
            if($order->rating != NULL) {
                $user = User::where('id',$order->user_id)->first();
                $order->user = $user->name;
            }
            $sum_rating += $order->rating;
                
        }
        if(sizeof($orders) != 0){
            $avg_rating = round($sum_rating/sizeof($orders),1);
        } else {
            $avg_rating = 0;
        }
        
        // dd($package->rest_packs);

        return view('UserPackage.detail_tour_package1',compact('package','days','avg_rating','orders','count'));
    }


    public function list_tour_package()
    {  
        $pagination = 9;
        $tour_packages = Package::where('type','tour')->paginate($pagination);
        $count = 0;

        foreach ($tour_packages as $package){
            $discount = Ticket::select('discount')->where('id',$package->id_ticket)->first();
            if($discount != NULL){
                $package->price_discount = number_format($package->price*(1-$discount->discount/100));
                $package->discount = $discount->discount;
            } else {
                $package->price_discount = number_format($package->price);
            }
            $destination = dest_pack::where('package_id',$package->id)->first();
            $image = Destination::select('image')->where('id',$destination->destination_id)->first();
            $package->image = $image->image();

            $package->count_day = dest_pack::distinct()->where('package_id',$package->id)->get(['day_id'])->count();
            $package->count_hotel = hotel_pack::where('package_id',$package->id)->count();
            $package->count_destination = dest_pack::where('package_id',$package->id)->count();
            $package->count_restaurant = rest_pack::where('package_id',$package->id)->count();
            $count++;
        }

        return view('UserPackage.user_tour',compact('tour_packages'));
    }

    public function order_car(Car $car)
    {
        $disable_dates = Disable_date::where('type','car')->orWhere('type','all')->get();
        $dates = array();
        
        foreach($disable_dates as $date){
            array_push($dates,$date->disable_date);
        }
        // dd($disable_dates);
        $dates = json_encode($dates);
        if (Auth::check()){
            return view('UserPackage.order_car',compact('car','dates'));
        } else {
            Alert::warning('Not Login', 'You have to login before order a car');
            return back()->with('message_sent','You have to login before order a car');
        }
    
    }

    public function store_car_order(Car $car)
    {
        $data = request()->validate([
            'date' => ['required', 'date'],
            'max_person' => ['required', 'integer'],
            'car_amount' => ['required', 'integer'],
        ]);
        
        if($data['max_person'] > $car->max_person*$data['car_amount']){
            Alert::error('Overload', 'Max person for '. $car->name .' is ' . $car->max_person . ' persons for every car');
            return redirect('/home/car/'. $car->id .'/order');
        } else {
            $order = $car->car_orders()->create([
                'user_id' => Auth::user()->id,
                'rental_date' => $data['date'],
                'date' => date('Y-m-d H:i:s'),
                'car_amount' => $data['car_amount'],
                'total_price' => $data['car_amount']*$car->price,
                'status' => 'pending',
            ]);
            $type = "car";
            return redirect('/home/'.$type.'/'.$order->id.'/payment');
        }
    
    }

    public function payment($type, $order)
    {   
        $flag = true;
        if($type=='package'){
            $date_transaction = Order::where('id',$order)->first();
        } else {
            $date_transaction = car_order::where('id',$order)->first();
        }
        $deadline_date = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($date_transaction->date)));
        $now = date('Y-m-d H:i:s');
        $timer = 0;
        if($deadline_date < $now){
            $flag = false;
        } else {
            $timer = strtotime($deadline_date) - strtotime($now);
            $timer = date('H:i:s',$timer);
        } 
        // dd($timer);

        // Midtrans
        if($type=='package')
        {
            $order_package = Order::where('id',$order)->first();    
            $package = Package::where('id',$order_package->package_id)->first();
            $discount = Ticket::select('discount')->where('id',$package->id_ticket)->first();
            $name = $package->name;
            $id = $package->id;
            $total_price = $order_package->total_price; 
            if($discount != NULL){
                $price = $package->price*(1-$discount->discount/100);
                $package->discount = $discount->discount;
            } else {
                $price = $package->price;
            }
        } else {
            $order_car = car_order::where('id',$order)->first();    
            $car = Car::where('id',$order_car->car_id)->first();
            $name = $car->name;
            $total_price = $order_car->total_price;
            $id = $car->id;
        }
        
        $midtrans = new Midtrans();

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total_price,
            ),
            "item_details" => array( 
                [
                    "id" => $id,
                    "price" => $total_price,
                    "quantity" => 1,
                    "name" => $name 
                ]      
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->handphone,
            ),
        );

        // dd($params);
         
        $snap_token = Snap::getSnapToken($params);
        return view('UserPackage.payment',compact('type','order','deadline_date','flag','timer','snap_token'));
    }

    public function payment_post($type, $order, Request $request)
    {
        $json = json_decode($request->get('json'));
        if($json->transaction_status == 'settlement') $status = 'success';
        if($json->transaction_status == 'pending') $status = 'pending';
        if($json->transaction_status == 'cancel') $status = 'canceled';
        if($type=="package") {
            $create_order = Order::where('id',$order)->update(
                array(
                    'transaction_id' => $json->order_id,
                    'payment_method' => $json->payment_type,
                    'status' => $status,
                    'pdf_url' => isset($json->pdf_url)?$json->pdf_url:NULL,
                )
            );
        } else {
            $create_order = car_order::where('id',$order)->update(
                array(
                    'transaction_id' => $json->order_id,
                    'payment_method' => $json->payment_type,
                    'status' => $status,
                    'pdf_url' => isset($json->pdf_url)?$json->pdf_url:NULL,
                )
            ); 
        }
    
        if($type=="package") {
            if($create_order) return redirect('/home/profile/list')->with('alert-success','Order Created');
            else return redirect('/home/profile/list')->with('alert-failed','Something Wrong');
        } else {
            if($create_order) return redirect('/home/profile/list_car')->with('alert-success','Order Created');
            else return redirect('/home/profile/list_car')->with('alert-failed','Something Wrong');
        }
    }

    public function order_package(Package $package)
    {
        $destination = dest_pack::where('package_id',$package->id)->first();
        $image = Destination::select('image')->where('id',$destination->destination_id)->first();
        $package->image = $image->image();

        $destinations = dest_pack::where('package_id',$package->id)->get();
        $package_dest = array();

        $discount = Ticket::select('discount')->where('id',$package->id_ticket)->first();
        if($discount != NULL){
            $package->price_discount = number_format($package->price*(1-$discount->discount/100));
            $package->special_price_discount = number_format($package->special_price*(1-$discount->discount/100));
            $package->discount = $discount->discount;
        } else {
            $package->price_discount = number_format($package->price);
            $package->special_price_discount = number_format($package->special_price);
        }
    
        foreach($destinations as $dest) {
            $name = Destination::select('name')->where('id',$dest->destination_id)->first();
            array_push($package_dest,$name->name);
        }

        $package->count_day = dest_pack::distinct()->where('package_id',$package->id)->get(['day_id'])->count();
        $package->count_hotel = hotel_pack::where('package_id',$package->id)->count();
        $package->count_destination = dest_pack::where('package_id',$package->id)->count();
        $package->count_restaurant = rest_pack::where('package_id',$package->id)->count();
        
        // dd($package);

        $disable_dates = Disable_date::where('type','package')->orWhere('type','all')->get();
        $dates = array();
        
        foreach($disable_dates as $date){
            array_push($dates,$date->disable_date);
        }

        // dd($package);

        $dates = json_encode($dates);

        $packages = Package::get();
        $regencies = DB::table('regencies')->where('province_id','51')->get();

        if (Auth::check()){
            if($package->special_price != NULL) Alert::info('Special Price', 'Get special price for order more than 9 pax');
            return view('UserPackage.order_package',compact('package','package_dest','regencies','dates'));
        } else {
            Alert::warning('Not Login', 'You have to login before order a package');
            return back()->with('message_sent','You have to login before order a package');
        }
    
    }

    public function store_package_order(Package $package)
    {
        $data = request()->validate([
            'regency' => ['string', 'max:255'],
            'district' => ['string', 'max:255'],
            'village' => ['string', 'max:255'],
            'pick_point' => ['required','string', 'max:255'],
            'pax' => ['required','integer'],
            'date' => ['required', 'date'],
        ]);

        $discount = Ticket::select('discount')->where('id',$package->id_ticket)->first();
        if($data['pax'] > 9 && $package->special_price != 0){
            $price = $package->special_price;
        } else {
            $price = $package->price; 
        }
        if($discount != NULL){
            $price = $price*(1-$discount->discount/100);
            $package->discount = $discount->discount;
        } 

        // dd($data);

        if($data['pax'] < 2){
            Alert::error('Minimum Pax', 'Minimum pax for this package is 2 persons');
            return redirect('/home/package/'. $package->id .'/order');
        } else {
            $order = $package->orders()->create([
                'user_id' => Auth::user()->id,
                'regency' => $data['regency'],
                'district' => $data['district'],
                'village' => $data['village'],
                'departure_date' => $data['date'],
                'pick_point' => $data['pick_point'],
                'date' => date('Y-m-d H:i:s'),
                'status' => 'pending',
                'pax' => $data['pax'],
                'total_price' => $data['pax']*$price,
            ]);
            $type = "package";
            return redirect('/home/'.$type.'/'.$order->id.'/payment');
        }        
    }

    public function update_payment($type, $order, Request $request)
    {
        $data = request()->validate([
            'image' => ['required','image'],
        ]);

        if (request('image')) {
            $image_path = request('image')->store('bukti_bayar', 'public');
            $image = Image::make(public_path("storage/{$image_path}"));
            $image->save();
        } else {
            $image_path = NULL;
        }

        if($type=="package") {
            Order::where('id',$order)->update(
                array(
                    'payment_method' => 'Manual Transfer',
                    'image' => $image_path,
                )
            );
            return redirect('/home/profile/list?success');
        } else {
            car_order::where('id',$order)->update(
                array(
                    'payment_method' => 'Manual Transfer',
                    'image' => $image_path,
                )
            ); 
            return redirect('/home/profile/list_car?success');
        }
        
    }
}