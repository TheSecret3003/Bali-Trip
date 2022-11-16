<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disable_date;
use Yajra\DataTables\Facades\DataTables;

class DisableDateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('DisableDate.date');
    }

    public function add_show()
    {
        return view('DisableDate.add');
    }

    public function add()
    {
        $data = request()->validate([
            'date' => ['required','date'],
            'keterangan' => ['string', 'max:255'],
        ]);

        // dd($data);


        Disable_date::create([
            'disable_date' => $data['date'],
            'type' => 'all',
            'keterangan' => $data['keterangan'],
        ]);
        
        return redirect('/disable_date?success');
    }

    public function list()
    {
        $disable_date = Disable_date::get();

        return Datatables::of($disable_date)
            ->make(true);
    }

    public function destroy(Disable_date $date)
    {
        $date->delete();
        return redirect('/disable_date?success');
    }
}
