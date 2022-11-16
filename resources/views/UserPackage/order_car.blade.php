@extends('layouts.navbar_1')

@section('main')
<div class="main" >
    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="tours-cars">
            <div class="row">
                <div class="col-md-12 text-center heading-section animate-box">
                    <h3>Order A Car</h3>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                 
                <div class="card col-md-6">
                    <div class="animate-box">
                        <div class="row" style="margin-top:20px;margin-bottom:40px;">
                            <h1 class="m-0" >Order Form</h1>
                        </div>
                        <form method="POST" action="{{ route('user_car.store',$car->id) }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row" style="margin-bottom:40px;">
                                <div for="max_person" class="col-md-12 text-md-center" style="font-size:20px;">Jumlah Penumpang/Total Passenger*</div>

                                <div class="col-md-12">
                                    <input id="max_person" type="number" style="height:28px;width:39vw;" name="max_person" class="form-control @error('max_person') is-invalid @enderror" name="max_person" value="{{ old('max_person') }}" autocomplete="max_person" autofocus placeholder="Total Passenger">

                                    @error('max_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom:40px;">
                                <div for="car_amount" class="col-md-12 text-md-center" style="font-size:20px;">Jumlah Mobil*</div>

                                <div class="col-md-12">
                                    <input id="car_amount" type="number" style="height:28px;width:39vw;" name="car_amount" class="form-control @error('car_amount') is-invalid @enderror" name="car_amount" value="{{ old('car_amount') }}" autocomplete="car_amount" autofocus placeholder="Car Amount">

                                    @error('car_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom:40px;">
                                <div for="date" class="col-md-12 text-md-center" style="font-size:20px;">Tanggal Peminjaman/Rental Date*</div>

                                <div class="col-md-12">
                                    <div class="input-group date datepicker" data-provide="datepicker">
                                        <input type="text"class="form-control @error('date') is-invalid @enderror" name ="date">
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
                            <img class="img-responsive" src="{{ $car->image() }}" alt="travel">
                            <div class="blog-text">
                                <div class="card-body" style="background: #5ABA4E;">
                                    <h3 class="card-title" style="font-size:18px;color: #fff;"> {{ $car->name }} 
                                    </h3>   
                                    <span style="font-size:16px;color: #fff;">Description:</span>
                                    <p style="text-align:justify;color: #fff;"><small> {{ $car->description }}</small></p>
                                    <span style="font-size:14px;color: #fff;">Max {{$car->max_person}} persons</span>
                                    <br>
                                    <span style="font-size:14px;color: #fff;">Duration: {{$car->hours}} hours</span>
                                    <br>
                                    <br>
                                    <span id="price" style="font-size:20px;color: #fff;font-weight: 700;">Rp.{{number_format($car->price)}}</span>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                
            </div>
            <div class = "whatsapp-chat">
                    <a href="https://wa.me/6287885818555?text=I'm%20interested%20to%20book%20car%20" target="_blank">
                        <img src="{{ asset("img/WA.png") }}" height="80px" width="80px">
                    </a>
                </div>
        </div>
    </div>
</div>
@endsection

@section('js')
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

    var price = <?php echo json_encode($car->price) ?>;
    
    let suffix = "";
    $('#car_amount').change(function(){
    var car_amount = $(this).val();
    let total_price; 
    
    total_price = car_amount*price;
    
    let rupiah = "Rp";
    
    total_price = total_price.toLocaleString('en-US');
    let result = rupiah.concat(total_price,suffix);
          
    document.getElementById("price").innerHTML = result;     
   });
</script>
@endsection
