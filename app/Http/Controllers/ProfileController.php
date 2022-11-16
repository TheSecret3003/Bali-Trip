<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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
use App\Models\Gallery;
use Yajra\DataTables\Facades\DataTables;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function information()
    {  
        return view('Profile.profile_1');
    }

    public function order()
    {
        return view('Profile.order_1'); 
    }

    public function list_order()
    {
        $user = auth()->user();
        $pagination = 5;
        $order = Order::where('user_id',$user->id)->get();

        foreach($order as $ord)
        {
            $package = Package::where('id',$ord->package_id)->first();
            $ord->package = $package->name;
            // $ord->date = date('d-m-Y',strtotime($ord->date));
            // $ord->departure_date = date('d-m-Y',strtotime($ord->departure_date));
        }

        $order =  Datatables::of($order)
        ->editColumn('date',function($order){
            return date('Y-m-d',strtotime($order->date));
        })
        ->editColumn('departure_date',function($order){
            return date('Y-m-d',strtotime($order->departure_date));
        })
            ->make(true);
        return $order;
        
    }

    public function car_order()
    {
        return view('Profile.car_order_1'); 
    }

    public function list_car_order()
    {
        $user = auth()->user();
        $pagination = 5;
        $car_order = car_order::where('user_id',$user->id)->get();

        foreach($car_order as $ord)
        {
            $car = Car::where('id',$ord->car_id)->first();
            $ord->car = $car->name;
            $ord->price = number_format($car->price);
            // $ord->date = date('d-m-Y',strtotime($ord->date));
            // $ord->rental_date = date('d-m-Y',strtotime($ord->rental_date));
        }

        $car_order =  Datatables::of($car_order)
        ->editColumn('date',function($car_order){
            return date('Y-m-d',strtotime($car_order->date));
        })
        ->editColumn('rental_date',function($car_order){
            return date('Y-m-d',strtotime($car_order->rental_date));
        })
            ->make(true);

         return $car_order;

    }

    public function edit_order(Order $order)
    { 
        $disable_dates = Disable_date::where('type','package')->orWhere('type','all')->get();
        $dates = array();
        
        foreach($disable_dates as $date){
            array_push($dates,$date->disable_date);
        }
        // dd($disable_dates);
        $dates = json_encode($dates);
        
        return view('Profile.edit_order_1',compact('order','dates'));
    }

    public function update_order(Order $order, Request $request)
    {
        $data = request()->validate([
            'review' => [],
            'rating' => [],
            'pick_point' => ['string', 'max:255'],
            'date' => ['required', 'string'],
        ]);

        $update_array = array(
            'departure_date' => $data['date'],
            'pick_point' => $data['pick_point'],
        );

        if(isset($data['rating']) && $data['review'] != null){
            $update_array['rating'] =  $data['rating'];
            $update_array['review'] =  $data['review'];
        }
        
        // dd($data);
        $update = $order->update(
            $update_array
        );

        if($update) {
            Alert::success('Edit Order', 'Your order successfully edited');
            return redirect('/home/profile/list?success');
        }
        
    }

    public function cancel_order(Order $order)
    {
        $order->update(
            array(
                'status' => 'canceled',
            )
        );

        return redirect('/home/profile/list?success');
    }

    public function cancel_car_order(car_order $order)
    {
                
        $order->update(
            array(
                'status' => 'canceled',
            )
        );

        return redirect('/home/profile/list_car?success');
    }

    public function review(Order $order)
    {   
        $disable_dates = Disable_date::where('type','package')->get();
        $dates = array();
        
        foreach($disable_dates as $date){
            array_push($dates,$date->disable_date);
        }
        // dd($disable_dates);
        $dates = json_encode($dates);
        return view('Profile.review_1',compact('order','dates'));
    }

    // public function review_order(Order $order, Request $request)
    // {
    //     $data = request()->validate([
    //         'review' => ['required','string'],
    //         'rating' => ['required', 'integer'],
    //     ]);
        
    //     $order->update(
    //         array(
    //             'review' => $data['review'],
    //             'rating' => $data['rating'],
    //         )
    //     );

    //     return redirect('/home/profile/list?success');
    // }


    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }

    public function edit() 
    {
        return view('Profile.edit_1');
    }

    public function update(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'handphone' => ['required', 'string', 'max:13'],
            'old_password' => [],
            'new_password' => [],
            'new_confirm_password' => ['same:new_password'],
        ]);

        // dd($data);

        $user = auth()->user();
        if($data['old_password'] != null) {
            if(!Hash::check($request->old_password, auth()->user()->password)){
                Alert::error('Edit Profile', 'Edit profile failed, check your password');
                return redirect('/home/profile?failed');
            } else  {
                $update = $user->update(
                    array(
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'handphone' => $data['handphone'],
                        'password'=> Hash::make($data['new_password']),
                    )
                );
                Alert::success('Edit Profile', 'Your profile successfully edited');
                return redirect('/home/profile?success');
            }
        } else  {
            $update = $user->update(
                array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'handphone' => $data['handphone'],
                )
            );
            Alert::success('Edit Profile', 'Your profile successfully edited');
            return redirect('/home/profile?success');
        }
            
    }

    public function delete()
    {
        $user = auth()->user();
        auth()->logout();
        $user->delete();
        return redirect('/');
    }

}
