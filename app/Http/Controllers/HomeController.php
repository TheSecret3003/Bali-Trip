<?php

namespace App\Http\Controllers;
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

class HomeController extends Controller
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
    public function index()
    {  
        $packages = $this->top_tours();

        $optional_packages = $this->optional_packages();
        $tour_packages = $this->tour_packages();
        $cars = $this->cars();
        $destinations = $this->destinations();
        
        // dd($packages);

        if (Auth::check()) {
            if (Auth::user()->role != 'user') {
                $dashboard = new DashboardController();
                return $dashboard->index();
            } else {
                return view('Home.home_1',compact('packages','optional_packages','tour_packages','cars','destinations'));
            }
        }
        return view('Home.home_1',compact('packages','optional_packages','tour_packages','cars','destinations'));
    }

    public function index_home()
    {  
        return view('layouts.navbar_3');
    }
    
    public function top_tours()
    {
        $packages = Order::join('packages', 'packages.id', '=', 'orders.package_id')
            ->select(DB::raw('count(*) as total, packages.id'))
            ->where('orders.status','=','delivered')->orWhere('orders.status','=','success')
            ->groupBy('packages.id')->orderBy('total', 'DESC')->limit(3)
            ->get();
        
        foreach ($packages as $package){
            $name = Package::where('id',$package->id)->first();
            $package->name = $name->name;
            $package->type = $name->type;
            $package->description = $name->description;
            $destination = dest_pack::where('package_id',$package->id)->first();
            $image = Destination::select('image')->where('id',$destination->destination_id)->first();
            $package->image = $image->image();
            $package->count_day = dest_pack::distinct()->where('package_id',$package->id)->get(['day_id'])->count();
            $package->count_hotel = hotel_pack::where('package_id',$package->id)->count();
            $package->count_destination = dest_pack::where('package_id',$package->id)->count();
            $package->count_restaurant = rest_pack::where('package_id',$package->id)->count();
            $package->price = $name->price;

        }

        return $packages;

    }

    public function optional_packages()
    {
        $optional_packages = Package::where('type','!=','tour')->limit(3)->get();

        foreach ($optional_packages as $package){
            $destination = dest_pack::where('package_id',$package->id)->first();
            $image = Destination::select('image')->where('id',$destination->destination_id)->first();
            $package->image = $image->image();
            $package->count_destination = dest_pack::where('package_id',$package->id)->count();
            $package->count_restaurant = rest_pack::where('package_id',$package->id)->count();
        }

        return $optional_packages;

    }

    public function tour_packages()
    {
        $tour_packages = Package::where('type','tour')->limit(3)->get();

        foreach ($tour_packages as $package){
            $destination = dest_pack::where('package_id',$package->id)->first();
            $image = Destination::select('image')->where('id',$destination->destination_id)->first();
            $package->image = $image->image();
            $package->count_day = dest_pack::distinct()->where('package_id',$package->id)->get(['day_id'])->count();
            $package->count_hotel = hotel_pack::where('package_id',$package->id)->count();
            $package->count_destination = dest_pack::where('package_id',$package->id)->count();
            $package->count_restaurant = rest_pack::where('package_id',$package->id)->count();
        }
        return $tour_packages;

    }

    public function cars()
    {
        $cars = Car::limit(3)->get();

        return $cars;

    }

    public function destinations()
    {
        // $dest_name = array();

        // $destinations = Order::join('packages', 'packages.id', '=', 'orders.package_id')
        //     ->join('dest_packs', 'dest_packs.package_id', '=', 'packages.id')
        //     ->join('destinations', 'destinations.id', '=', 'dest_packs.destination_id')
        //     ->select('orders.id','destinations.name')->
        //     where('orders.status','=','delivered')->orWhere('orders.status','=','success')
        //     ->get();

        // foreach($destinations as $dest)
        // {
        //     if (!array_key_exists($dest->name,$dest_name)) {
        //         $dest_name[$dest->name] = 1;
        //     } else {
        //         $dest_name[$dest->name] += 1;
        //     }
        // }

        // arsort($dest_name);

        // $dest_name = array_slice($dest_name, 0, 10, true);

        $dest_name = Destination::get();
        return $dest_name;

    }

    public function gallery()
    {
        $pagination = 10;
        $galleries = Gallery::all();
        // dd($galleries);

        return view('Home.gallery_1',compact('galleries'));
    }

    public function contact()
    {

        return view('Home.contact_1');
    }

    public function send_email(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('infohappytripbali@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent','Your message has been sent successfully!');
    }


}
