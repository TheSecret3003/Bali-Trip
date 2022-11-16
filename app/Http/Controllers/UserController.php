<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Order;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('User.user');
    }

    public function list()
    {
        // $users = User::where('role','user')->get();
        $users = User::get();

        foreach ($users as $user) {
            $user->count_order = Order::where('user_id',$user->id)->count();
            if($user->handphone == null) 
            {
                $user->no_handphone = 'Belum diisi';
            } else {
                $user->no_handphone = $user->handphone;
            }
        }

        return Datatables::of($users)
            ->make(true);
    }

    public function ban(User $user)
    {
        $user->update(
            array(
                'status' => 'banned',
            )
        );

        return redirect('/user?success');
    }

    public function info(User $user)
    {
        if($user->handphone == null) 
        {
            $user->no_handphone = 'Belum diisi';
        } else {
            $user->no_handphone = $user->handphone;
        }
        return view('User.info', compact('user'));
        
    }

    public function edit(User $user)
    { 
        return view('User.edit',compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'handphone' => ['required', 'string', 'max:13'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $user->update(
            array(
                'name' => $data['name'],
                'email' => $data['email'],
                'handphone' => $data['handphone'],
                'status' => $data['status'],
            )
        );

        return redirect('/user/?success');
    }
    
    public function list_order(User $user)
    {
        $order = Order::where('user_id',$user->id)->get();
        foreach($order as $ord)
        {
            $package = Package::where('id',$ord->package_id)->first();
            $ord->package = $package->name;
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
}
