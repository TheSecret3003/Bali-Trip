<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\TourStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Package;
use App\Models\Ticket;
use App\Models\Restaurant;
use App\Models\Destination;
use App\Models\dest_pack;
use App\Models\rest_pack;
use App\Models\Order;
use App\Models\Day;
use App\Models\Hotel;
use App\Models\hotel_pack;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('Package.package');
    }

    public function add_show()
    {
        $destination = Destination::get();
        $restaurant = Restaurant::get();
        $ticket = Ticket::get();
        
        return view('Package.add',compact('destination', 'restaurant', 'ticket'));
    }

    public function add_tour_hotel_show()
    {
        $hotels = Hotel::get();
        $ticket = Ticket::get();
        
        return view('Package.add_tour',compact('hotels', 'ticket'));
    }

    public function add()
    {
        $data = request()->validate([
            'name' => ['required','string', 'max:255'],
            'ticket_code' => ['string', 'max:255'],
            'destination1' => ['required','string', 'max:255'],
            'destination2' => ['string', 'max:255'],
            'destination3' => ['string', 'max:255'],
            'destination4' => ['string', 'max:255'],
            'destination5' => ['string', 'max:255'],
            'destination6' => ['string', 'max:255'],
            'destination7' => ['string', 'max:255'],
            'destination8' => ['string', 'max:255'],
            'destination9' => ['string', 'max:255'],
            'destination10' => ['string', 'max:255'],
            'restaurant1' => ['string', 'max:255'],
            'restaurant2' => ['string', 'max:255'],
            'restaurant3' => ['string', 'max:255'],
            'restaurant4' => ['string', 'max:255'],
            'schedule' => ['required','string', 'max:255'],
            'price' => ['required', 'integer'],
            'special_price' => ['integer'],
            'description' => [],
            'keterangan' => [],
            'image' => ['image'],
        ]);

        $destinations = array();
        $restaurants = array();
        array_push($destinations,$data['destination1']);
        if (array_key_exists("destination2",$data)) array_push($destinations,$data['destination2']);
        if (array_key_exists("destination3",$data)) array_push($destinations,$data['destination3']);
        if (array_key_exists("destination4",$data)) array_push($destinations,$data['destination4']);
        if (array_key_exists("destination5",$data)) array_push($destinations,$data['destination5']);
        if (array_key_exists("destination6",$data)) array_push($destinations,$data['destination6']);
        if (array_key_exists("destination7",$data)) array_push($destinations,$data['destination7']);
        if (array_key_exists("destination8",$data)) array_push($destinations,$data['destination8']);
        if (array_key_exists("destination9",$data)) array_push($destinations,$data['destination9']);
        if (array_key_exists("destination10",$data)) array_push($destinations,$data['destination10']);
        if (array_key_exists("restaurant1",$data)) array_push($restaurants,$data['restaurant1']);
        if (array_key_exists("restaurant2",$data)) array_push($restaurants,$data['restaurant2']);
        if (array_key_exists("restaurant3",$data)) array_push($restaurants,$data['restaurant3']);
        if (array_key_exists("restaurant4",$data)) array_push($restaurants,$data['restaurant4']);

        if (!array_key_exists("ticket_code",$data)) $data['ticket_code'] =null;
        if (!array_key_exists("description",$data)) $data['description'] ="";

        $image_path = request('image')->store('package', 'public');
        $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
        $image->save();

        // dd($data);

        $package = Package::create([
            'name' => $data['name'],
            'type' => 'optional',
            'id_ticket' => $data['ticket_code'],
            'schedule' => $data['schedule'],
            'schedule_date' => date('Y-m-d'),
            'price' => $data['price'],
            'special_price' => $data['special_price'],
            'description' => $data['description'],
            'keterangan' => $data['keterangan'],
            'image' => $image_path,
        ]);

        foreach($destinations as $dest)
        {
            $package->dest_packs()->create([
                'destination_id' => $dest,
            ]);
        }

        foreach($restaurants as $rest)
        {
            $package->rest_packs()->create([
                'restaurant_id' => $rest,
            ]);
        }

        if($package){
            Alert::success('Package berhasil dibuat');
            return redirect('/package?success');
        }
          
    }

    public function add_tour_hotel(TourStoreRequest $request)
    {
        // dd($request);
        try{
            DB::beginTransaction();
            $data = $request->all();
            // dd($request);
            $hotels = array();
            if (array_key_exists("hotel1",$data)) array_push($hotels,$data['hotel1']);
            if (array_key_exists("hotel2",$data)) array_push($hotels,$data['hotel2']);
            if (array_key_exists("hotel3",$data)) array_push($hotels,$data['hotel3']);
            if (array_key_exists("hotel4",$data)) array_push($hotels,$data['hotel4']);
    
            if (!array_key_exists("ticket_code",$data)) $data['ticket_code'] =null;
            if (!array_key_exists("description",$data)) $data['description'] ="";
            if (!array_key_exists("special_price",$data)) $data['special_price'] =0;

            if (array_key_exists("image",$data)) {
                $image_path = request('image')->store('package', 'public');
                $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
                $image->save();
            }

            $package = Package::create([
                'name' => $data['name'],
                'type' => 'tour',
                'id_ticket' => $data['ticket_code'],
                'schedule' => $data['schedule'],
                'schedule_date' => date('Y-m-d'),
                'price' => $data['price'],
                'special_price' => $data['special_price'],
                'description' => $data['description'],
                'keterangan' => $data['keterangan'],
                'image' => $image_path ?? null,
            ]);

            foreach($hotels as $hotel)
            {
                $package->hotel_packs()->create([
                    'hotel_id' => $hotel,
                ]);
            }
            
            foreach ($data['day'] as $key => $value) {
                foreach ($data['destination'][$key] as $index => $dest) {
                    $package->dest_packs()->create([
                        'destination_id'    => $dest,
                        'day_id'    => $value
                    ]);
                } if(isset($data['restaurant'][$key])){
                    foreach ($data['restaurant'][$key] as $index => $resto) {
                        $package->rest_packs()->create([
                            'restaurant_id'    => $resto,
                            'day_id'    => $value
                        ]);
                    }
                }
                
            }
    
            // $destination = Destination::get();
            // $restaurant = Restaurant::get();
            
            DB::commit();
            return response()->json(['status'   => 'success', 'message' => 'Data berhasil disimpan']);
        } catch (\Throwable $th){
            DB::rollBack();
            return response()->json(['status' => 'fail', 'message' => $th->getMessage()]);
        }
    }

    public function update_tour(Package $package, TourStoreRequest $request)
    {     
        try{
            DB::beginTransaction();
            $data = $request->all();

            $hotels = array();
            if (array_key_exists("hotel1",$data)) array_push($hotels,$data['hotel1']);
            if (array_key_exists("hotel2",$data)) array_push($hotels,$data['hotel2']);
            if (array_key_exists("hotel3",$data)) array_push($hotels,$data['hotel3']);
            if (array_key_exists("hotel4",$data)) array_push($hotels,$data['hotel4']);
    
            if (!array_key_exists("ticket_code",$data)) $data['ticket_code'] =null;
            if (!array_key_exists("description",$data)) $data['description'] ="";
            if (!array_key_exists("special_price",$data)) $data['special_price'] =0;
            // if (!array_key_exists("special_price",$data)) $data['description'] ="";
            if (array_key_exists('image', $data)) {
                $image_path = request('image')->store('package', 'public');
                $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
                $image->save();
            }
            else{
                $image_path = $package->image;
            }

            $package->update([
                'name' => $data['name'],
                'type' => 'tour',
                'id_ticket' => $data['ticket_code'],
                'schedule' => $data['schedule'],
                'schedule_date' => date('Y-m-d'),
                'price' => $data['price'],
                'special_price' => $data['special_price'],
                'description' => $data['description'],
                'keterangan' => $data['keterangan'],
                'image' => $image_path,
            ]);

            $package->hotel_packs()->delete();
            $package->dest_packs()->delete();
            $package->rest_packs()->delete();
    
            foreach($hotels as $hotel)
            {
                $package->hotel_packs()->create([
                    'hotel_id' => $hotel,
                ]);
            }

            foreach ($data['day'] as $key => $value) {
                foreach ($data['destination'][$key] as $index => $dest) {
                    $package->dest_packs()->create([
                        'destination_id'    => $dest,
                        'day_id'    => $value
                    ]);
                }
                if(isset($data['restaurant'][$key])){
                    foreach ($data['restaurant'][$key] as $index => $resto) {
                        $package->rest_packs()->create([
                            'restaurant_id'    => $resto,
                            'day_id'    => $value
                        ]);
                    }
                }
            }
    
            // $destination = Destination::get();
            // $restaurant = Restaurant::get();
            
            DB::commit();
            return response()->json(['status'   => 'success', 'message' => 'Data berhasil disimpan']);
        } catch (\Throwable $th){
            DB::rollBack();
            return response()->json(['status' => 'fail', 'message' => $th->getMessage()]);
        }
    }

    public function list()
    {
        $packages = Package::get();

        foreach ($packages as $package) {
            $package->count_destination = dest_pack::where('package_id',$package->id)->count();
            $package->count_restaurant = rest_pack::where('package_id',$package->id)->count();
            $package->count_order = Order::where('package_id',$package->id)->count();
            if($package->type == 'full') $package->type = 'Full Day';
            if($package->type == 'half') $package->type = 'Half Day';
            if($package->type == 'custom') $package->type = 'Custom';
            $discount = Ticket::select('discount')->where('id',$package->id_ticket)->first();
            if($discount != NULL){
                $package->price_discount = number_format($package->price*(1-$discount->discount/100));
            } else {
                $package->price_discount = number_format($package->price);
            }
            $package->price = number_format($package->price);
            $package->special_price = number_format($package->special_price);
        }

        return Datatables::of($packages)
            ->make(true);
    }

    public function edit(Package $package)
    {
        $hotel = Hotel::get();
        $destination = Destination::get();
        $restaurant = Restaurant::get();
        $ticket = Ticket::get();
        
        $ticket_code = Ticket::where('id',$package->id_ticket)->first();

        $destinations = array();
        $restaurants = array();
        $hotels = array();

        $temp_dest = dest_pack::where('package_id',$package->id)->get();
        $temp_rest = rest_pack::where('package_id',$package->id)->get();
        $temp_hotel = hotel_pack::where('package_id',$package->id)->get();

        

        foreach($temp_dest as $dest)
        {
            $dest_name = Destination::where('id',$dest->destination_id)->first();
            array_push($destinations,$dest_name->name);
        }
        
        foreach($temp_rest as $rest)
        {
            $rest_name = Restaurant::where('id',$rest->restaurant_id)->first();
            array_push($restaurants,$rest_name->name);
        }

        foreach($temp_hotel as $hot)
        {
            $hotel_name = Hotel::where('id',$hot->hotel_id)->first();
            array_push($hotels,$hotel_name->name);
        }
        
        // dd($hotel);
        // dd($destinations[2]);
        if($package->type != 'tour'){
            return view('Package.edit',compact('destination', 'restaurant', 'ticket','package','ticket_code','destinations','restaurants'));
        } else {
            $day_dest = $package->dest_packs->pluck('day_id')->toArray();
            $day_rest = $package->rest_packs->pluck('day_id')->toArray();

            $days = array_unique(array_merge($day_dest, $day_rest));
            $destinations = Destination::all();
            $restaurants = Restaurant::all();
            return view('Package.edit_tour',compact('destination', 'restaurant', 'ticket','package','ticket_code','destinations','restaurants','hotels','hotel', 'days'));
        }
        
    }

    public function update(Package $package, Request $request)
    {
        $data = request()->validate([
            'name' => ['required','string', 'max:255'],
            'ticket_code' => ['string', 'max:255'],
            'destination1' => ['required','string', 'max:255'],
            'destination2' => ['string', 'max:255'],
            'destination3' => ['string', 'max:255'],
            'destination4' => ['string', 'max:255'],
            'destination5' => ['string', 'max:255'],
            'destination6' => ['string', 'max:255'],
            'destination7' => ['string', 'max:255'],
            'destination8' => ['string', 'max:255'],
            'destination9' => ['string', 'max:255'],
            'destination10' => ['string', 'max:255'],
            'restaurant1' => ['string', 'max:255'],
            'restaurant2' => ['string', 'max:255'],
            'restaurant3' => ['string', 'max:255'],
            'restaurant4' => ['string', 'max:255'],
            'schedule' => ['required','string', 'max:255'],
            'price' => ['required', 'integer'],
            'special_price' => ['integer'],
            'description' => [],
            'keterangan' => [],
        ]);

        $destinations = array();
        $restaurants = array();
        array_push($destinations,$data['destination1']);
        if (array_key_exists("destination2",$data)) array_push($destinations,$data['destination2']);
        if (array_key_exists("destination3",$data)) array_push($destinations,$data['destination3']);
        if (array_key_exists("destination4",$data)) array_push($destinations,$data['destination4']);
        if (array_key_exists("destination5",$data)) array_push($destinations,$data['destination5']);
        if (array_key_exists("destination6",$data)) array_push($destinations,$data['destination6']);
        if (array_key_exists("destination7",$data)) array_push($destinations,$data['destination7']);
        if (array_key_exists("destination8",$data)) array_push($destinations,$data['destination8']);
        if (array_key_exists("destination9",$data)) array_push($destinations,$data['destination9']);
        if (array_key_exists("destination10",$data)) array_push($destinations,$data['destination10']);
        if (array_key_exists("restaurant1",$data)) array_push($restaurants,$data['restaurant1']);
        if (array_key_exists("restaurant2",$data)) array_push($restaurants,$data['restaurant2']);
        if (array_key_exists("restaurant3",$data)) array_push($restaurants,$data['restaurant3']);
        if (array_key_exists("restaurant4",$data)) array_push($restaurants,$data['restaurant4']);

        if (!array_key_exists("ticket_code",$data)) $data['ticket_code'] =null;
        if (!array_key_exists("description",$data)) $data['description'] ="";

        $package->update(
            array(
                'name' => $data['name'],
                'id_ticket' => $data['ticket_code'],
                'schedule' => $data['schedule'],
                'schedule_date' => date('Y-m-d'),
                'price' => $data['price'],
                'special_price' => $data['special_price'],
                'description' => $data['description'],
                'keterangan' => $data['keterangan'],
            )
        );

        $package->dest_packs()->delete();
        $package->rest_packs()->delete();

        foreach($destinations as $dest)
        {
            $package->dest_packs()->create([
                'destination_id' => $dest,
            ]);
        }

        foreach($restaurants as $rest)
        {
            $package->rest_packs()->create([
                'restaurant_id' => $rest,
            ]);
        }

        return redirect('/package/?success');
    }

    public function destroy(Package $package)
    {
        $package->dest_packs()->delete();
        $package->rest_packs()->delete();
        $package->hotel_packs()->delete();
        $package->delete();
        return redirect('/package/?success');
    }

    public function info(Package $package)
    {
        if($package->type == 'full') $package->type = 'Full Day';
        if($package->type == 'half') $package->type = 'Half Day';
        if($package->type == 'tour') $package->type = 'Tour';
        $package->ticket_code = "";
        $ticket = Ticket::select('ticket_code')->where('id',$package->id_ticket)->first();
        // dd($ticket->ticket_code);
        if($ticket != NULL) $package->ticket_code = $ticket->ticket_code;
        $days = $package->dest_packs()->select('day_id')->distinct()->get();
    
        $destinations = array();
        $restaurants = array();
        foreach($days as $day){
            $destination = $package->dest_packs()->where('day_id',$day->day_id)->get();
            $restaurant = $package->rest_packs()->where('day_id',$day->day_id)->get();
            // dd($destination);
            $destinations[$day->day_id] = array();
            $restaurants[$day->day_id] = array();
            foreach($destination as $dest)
            {
                $temp = Destination::where('id',$dest->destination_id)->first();
                array_push($destinations[$day->day_id],$temp->name);

            }
            foreach($restaurant as $rest)
            {
                $temp = Restaurant::where('id',$rest->restaurant_id)->first();
                array_push($restaurants[$day->day_id],$temp->name);

            }
        }

        return view('Package.info', compact('package','destinations','restaurants'));
        
    }
}
