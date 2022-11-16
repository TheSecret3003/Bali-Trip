@extends('layouts.navbar_2')

@section('main')
<div class="main" >
    @php
        $time = explode(':',$timer);
    @endphp
    <div id="fh5co-tours" class="fh5co-section-gray" style="padding-top:30px;">
        <div class="container">
            <div class="row" style="margin-bottom:3rem;">
                <div class="col-md-12 text-center heading-section animate-box" style="margin-top:80px;margin-bottom:10px;">
                    <h3>Payment</h3>
                </div>
                @if($flag)
                    <h4 id="time" class="text-center" style="color:#000000;font-size:28px;text-transform: none;font-family: 'Open Sans';">You have <strong>{{$timer}}</strong> left to make payment </h4>
                @endif
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-6">
                    <div class="card payment" style="margin-right:2vw;">
                        <div class="row" >
                            <h1 class="text-center title-payment">Automatic Payment</h1>
                            <br>
                            <br>
                            <p style="text-align:justify;">
                            Pay your order without having to send proof of transfer
                            via Midtrans which supports automatic bank transfers,
                            virtual accounts, GO-PAY, Visa, Mastercard, and others.
                            No additional fees and automatically processed
                            immediately.
                            </p>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success btn-submit btn-payment" id="pay-button" style="font-size:14px;">Pay via Midtrans</button>
                        </div>
                        <form action="" id="submit_form" method="POST">
                            @csrf
                            <input type="hidden" name="json" id="json_callback">
                        </form>
                       
                    </div>
                    
                </div>

                <div class="col-md-6" style="padding:0;">
                    <div class="card payment" style="margin-left:2vw;">
                        <div class="row">
                            <h1 class="text-center title-payment"> Manual Bank Transfer</h1>
                            <br>
                            <br>
                            <p>
                            
                            Pay your order to 0459892634 (BNI) Bank Account in the
                            name of Ardika via manual bank transfer, ATM, or M-
                            Banking during office hour (08.00 - 16.00 GMT +8). After making payment, please upload proof of
                            transfer or payment in the field below.
                            </p>
                        </div>
                        <form method="POST" action="{{ route('user.update_payment',['type'=>$type,'order'=>$order]) }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right" style="font-size:12px;padding:0 0 0 10px">Payment Invoice/Bukti Bayar</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" name="image" autocomplete="image" autofocus>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit btn-payment" style="font-size:14px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var time = @json($time); 
        var seconds = time[2];
        var hours = time[0];
        var minutes = time[1];
        
        setInterval(() => {
                
            if(seconds<0) {
                minutes--;
                seconds = 59;
            }

            if(minutes<0) {
                if(hours >0){
                    hours--;
                    minutes = 59;
                }
            }

            let tempHours = hours.toString().length > 1? hours:'0'+hours;
            let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
            let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;

            let result = tempHours.concat(":",tempMinutes,":",tempSeconds).bold();
            let prefix = "You have ";
            let suffix = " left to make payment";
            result = prefix.concat(result,suffix);
            document.getElementById("time").innerHTML = result;
            // $('.time').text('You have '+tempHours+':'+tempMinutes+':'+tempSeconds+' left to make payment');

            if(seconds > 0 || hours > 0 || minutes > 0)
            {
                seconds--;
            }
            
        }, 1000); 
    });
</script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        snap.pay('{{ $snap_token }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                alert("payment success!");
                console.log(result);
                send_response_to_form(result)
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                alert("waiting your payment!");
                console.log(result);
                send_response_to_form(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                alert("payment failed!");
                console.log(result);
                send_response_to_form(result)
            }
        });
    });

    function send_response_to_form(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
    }
</script>

@endsection
