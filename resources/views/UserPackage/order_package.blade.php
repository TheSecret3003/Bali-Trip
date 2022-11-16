@extends('layouts.navbar_1')

@section('main')
<div class="main" >
    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="tours-cars">
            <div class="row">
                <div class="col-md-12 text-center heading-section animate-box">
                    <h3>Order A Package</h3>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="card col-md-6">
                    <div class="animate-box">
                        <div class="row" style="margin-top:20px;margin-bottom:40px;">
                            <h1 class="m-0" >Order Form</h1>
                        </div>
                        <form method="POST" action="{{ route('user_package.store',$package->id) }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <div for="regency" class="col-md-12 text-md-center" style="font-size:20px;">Regency/Kabupaten</div>

                                <div class="col-md-12">
                                    <select id="regency" class="form-control @error('regency') is-invalid @enderror" name="regency" value="{{ old('regency')}}" autocomplete="tiket_code" autofocus>
                                        <option selected>---Regency/Kabupaten---</option>
                                        @foreach($regencies as $regency)
                                        <option value="{{ $regency->id}}">{{ $regency->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('regency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div for="district" class="col-md-12 text-md-center" style="font-size:20px;">District/Kecamatan</div>

                                <div class="col-md-12">
                                    <select id="district" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district')}}" autocomplete="tiket_code" autofocus>
                                        <option selected>---District/Kecamatan---</option>
                                    </select>

                                    @error('district')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div for="village" class="col-md-12 text-md-center" style="font-size:20px;">Desa/Village</div>

                                <div class="col-md-12">
                                    <select id="village" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village')}}" autocomplete="tiket_code" autofocus>
                                        <option selected>---Village/Desa---</option>
                                    </select>

                                    @error('village')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div for="pax" class="col-md-12 text-md-center" style="font-size:20px;">Jumlah Penumpang/Total Passenger*</div>

                                <div class="col-md-12">
                                    <input id="pax" type="number" name="pax" class="form-control @error('pax') is-invalid @enderror" name="pax" value="{{ old('pax') }}" autocomplete="pax" autofocus placeholder="Total Passenger">

                                    @error('pax')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div for="pick_point" class="col-md-12 text-md-center" style="font-size:20px;">Titik Penjemputan*</div>

                                <div class="col-md-12">
                                    <input id="pick_point" type="text" class="form-control @error('pick_point') is-invalid @enderror" name="pick_point" value="{{ old('pick_point') }}" autocomplete="pick_point" autofocus>

                                    @error('pick_point')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom:40px;">
                                <div for="date" class="col-md-12 text-md-center" style="font-size:20px;">Tanggal Keberangkatan/Departure Date*</div>

                                <div class="col-md-12">
                                    <div class="input-group date datepicker" data-provide="datepicker">
                                        <input type="text" name ="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" autocomplete="date" autofocus>
                                        <div class="input-group-addon" style="display:flex;">
                                            <i class="far fa-calendar" style="font-size:36px;"></i>
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-md-right font-weight-bold" style="margin-bottom:10px;">
                                <span style="font-size:14px;"><b><sup>(*)</sup>Wajib diisi/Must be filled</b></span>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit" style="font-size:18px;background-color:#5ABA4E;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="animate-box" style="padding:0;">
                        <div class="card rounded">
                            <img class="img-responsive" src="{{ $package->image }}" alt="travel">
                            <div class="blog-text">
                                <div class="card-body" style="background: #5ABA4E;">
                                    <h3 class="card-title" style="font-size:20px;color: #fff;"> {{ $package->name }} </h3>
                                    @if($package->type=='tour')
                                        <span style="font-size:18px;color: #fff;">{{ $package->count_day }} Days {{ $package->count_day - 1}} Nights + {{ $package->count_hotel}} Hotels</span>
                                    @endif
                                    <br>   
                                    <span style="font-size:18px;color: #fff;">{{ $package->count_destination }} Destinations + {{ $package->count_restaurant }} Restaurants</span>
                                    <br>
                                    <br>
                                    
                                    @if($package->type!='tour')
                                        <span style="font-size:16px;color: #fff;">Destinations:</span> <br>
                                        @for($j = 0;$j < sizeof($package_dest);$j++)
                                            @if($j != sizeof($package_dest)-1)
                                                <span style="font-size:16px;color: #fff;">{{ $package_dest[$j] }}-></span>
                                            @else
                                                <span style="font-size:16px;color: #fff;">{{ $package_dest[$j] }}</span>
                                            @endif
                                        @endfor
                                    @endif
                                    <br>
                                    <br>
								    <span id="price" style="font-size:20px;color: #fff;font-weight: 700;">Rp{{ $package->price_discount }}</span>
                                </div>
                            </div> 
                        </div>
                    </div>
                <div>
                <div class = "whatsapp-chat">
                    <a href="https://wa.me/6287885818555?text=I'm%20interested%20to%20book%20package%20" target="_blank">
                        <img src="{{ asset("img/WA.png") }}" height="80px" width="80px">
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('js')
<script>
   
   $('#regency').change(function(){
    var regency_id = $(this).val();    
    if(regency_id){
        $.ajax({
           type:"GET",
           url:"/get_districts?regency_id="+regency_id,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#district").empty();
                $("#village").empty();
                $("#district").append('<option>---District/Kecamatan---</option>');
                $("#village").append('<option>---Village/Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#district").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#district").empty();
               $("#village").empty();
            }
           }
        });
    }else{
        $("#district").empty();
        $("#village").empty();
    }      
   });
 
   $('#district').change(function(){
    var district_id = $(this).val();    
    if(district_id){
        $.ajax({
           type:"GET",
           url:"/get_villages?district_id="+district_id,
           dataType: 'JSON',
           success:function(res){             
            if(res){
                $("#village").empty();
                $("#village").append('<option>---Village/Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#village").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#village").empty();
            }
           }
        });
    }else{
        $("#village").empty();
    }      
   });
  
</script>
<script>
    var datesForDisable = <?php echo $dates ?>;

    $('.datepicker').datepicker({
        startDate: new Date(),
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        datesDisabled: datesForDisable
    });
</script>
<script>

    var price = <?php echo json_encode($package->price_discount) ?>;
    var special_price = <?php echo json_encode($package->special_price_discount) ?>;
    var num = parseFloat(price.replace(/,/g, ''));
    var num_special = parseFloat(special_price.replace(/,/g, ''));

    let suffix = "";
    $('#pax').change(function(){
    var pax = $(this).val();
    let total_price; 
    if(pax > 9 && num_special != 0) {
        total_price = pax*num_special;
        suffix = " (Special Price)"
    } else {
        total_price = pax*num;
    }
    let rupiah = "Rp";
    
    total_price = total_price.toLocaleString('en-US');
    let result = rupiah.concat(total_price,suffix);
          
    document.getElementById("price").innerHTML = result;     
   });
</script>
@endsection
