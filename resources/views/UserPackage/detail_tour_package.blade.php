@extends('layouts.navbar_2')

@section('main')
<div class="main" >
    <div id="fh5co-blog-section" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading-section animate-box" style="margin-top:50px;margin-bottom:80px;">
                    <h3>{{ $package->name }}</h3>
                </div>
            </div>
        </div>
        <div class="tours-cars">
            <div class="row row-bottom-padded-md">
                <div class="card" style="border-readius:5%;">
                    <div class="col-md-12">
                        <div class="row" style="margin-top:40px;margin-bottom:40px;">
                            <h1> <span class="fa fa-map"></span> Description</h1>
                            <p style="text-align:justify;">{{ $package->description }}</p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <h1> <span class="fas fa-hotel"></span> Hotels</h1>
                            <br>
                            @foreach($package->hotel_packs as $hotel_pack)
                            <div class="card" style="display:inline-block; margin:20px 10px 0 0">
                                <div class="col-md-4" style="padding:0;">
                                    <div class="card rounded">
                                        <img class="img-responsive" src="{{ $hotel_pack->hotel->image() }}" style="border-radius: 2%;"> 
                                    </div>
                                </div>
                                <div class="col-md-8" style="padding:0;">
                                    <div class="card rounded">
                                        <div class="card-body">
                                            <h3 class="card-title" style="font-size:25px;"> {{ $hotel_pack->hotel->name }}</h3>   
                                            <br>
                                            <span style="font-size:20px;font-weight: 400;">Description:</span>
                                            <p style="text-align:justify;"> {{ $hotel_pack->hotel->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <ul class="nav nav-tabs mt-4" role="tablist" id="tab_list">
                        @foreach($days as $day)
                            <li class="nav-item">
                                <a class="nav-link {{$day <= 1 ? 'active' : ''}}" href="#day-{{$day}}" role="tab" data-toggle="tab">Day - {{$day}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="tab_content">
                        @foreach($days as $day)
                        <div role="tabpanel" class="tab-pane {{$day <= 1 ? 'active' : ''}}" aria-selected="true" id="day-{{$day}}">
                            <div class="col-md-12">
                                <div class="row">
                                    <h1> <span class="fas fa-map-marker-alt"></span> Destinations</h1>
                                    <br>
                                    @foreach($package->dest_packs->where('day_id', $day) as $dest_pack)
                                    <div class="card" style="display:inline-block; margin:20px 10px 0 0">
                                        <div class="col-md-4" style="padding:0;">
                                            <div class="card rounded">
                                                <img class="img-responsive" src="{{ $dest_pack->destination->image() }}" style="border-radius: 2%;"> 
                                            </div>
                                        </div>
                                        <div class="col-md-8" style="padding:0;">
                                            <div class="card rounded">
                                                <div class="card-body">
                                                    <h3 class="card-title" style="font-size:25px;"> {{ $dest_pack->destination->name }}</h3>   
                                                    <br>
                                                    <span style="font-size:20px;font-weight: 400;">Description:</span>
                                                    <p style="text-align:justify;"> {{ $dest_pack->destination->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="row">
                                    <h1> <span class="fas fa-map-marker-alt"></span> Restaurants</h1>
                                    <br>
                                    @foreach($package->rest_packs->where('day_id', $day) as $rest_pack)
                                    <div class="card" style="display:inline-block; margin:20px 10px 0 0">
                                        <div class="col-md-4" style="padding:0;">
                                            <div class="card rounded">
                                                <img class="img-responsive" src="{{ $rest_pack->restaurant->image() }}" style="border-radius: 2%;"> 
                                            </div>
                                        </div>
                                        <div class="col-md-8" style="padding:0;">
                                            <div class="card rounded">
                                                <div class="card-body">
                                                    <h3 class="card-title" style="font-size:25px;"> {{ $rest_pack->restaurant->name }}</h3>   
                                                    <br>
                                                    <span style="font-size:20px;font-weight: 400;">Description:</span>
                                                    <p style="text-align:justify;"> {{ $rest_pack->restaurant->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    

                    <div class="col-md-12">
                        <div class="row" style="margin-top:40px;">
                            <h1> <span class="fas fa-clock"></span> Schedule</h1>
                            <p style="text-align:justify;">{{ $package->schedule }} every day</p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row" style="margin-top:40px;">
                            <h1> <span class="fa fa-bullhorn"></span> Important Information</h1>
                            <p style="text-align:justify;">{{ $package->keterangan }}</p>
                        </div>
                    </div>

                    <div class="col-md-12" >
                        <div class="row" style="margin-top:40px;">
                        @if($package->discount==0)
                            <h1> <span class="fa fa-money"></span> Price</h1>
                            <span style="font-size:25px;"><b>Rp.{{$package->price_discount}}</b></span>
                        @else
                            <h1> <span class="fa fa-money"></span> Price</h1>
                            <span style="font-size:20px;"><b>(Before Discount) Rp.{{ number_format($package->price) }} -> Rp.{{$package->price_discount}} (After Discount)</b></span>
                        @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row" style="margin-top:40px;">
                            <h1> <span class="fa fa-comment"></span> Traveler Review ({{ $count }} reviews)</h1>
                            <div class="text-left" style="margin-bottom:20px;">
                                <span class="badge badge-info" style="background-color:#17a2b8;border-radius: 0.4rem;"> <i class="fa fa-star" style="color:#fff;font-size:10px;"> {{ $avg_rating }} / 5 </i></span>
                                <span style="font-size:14px;"> ({{$count}} reviews) </span>
                            </div>
                            <div id="paginated-list" style="display: block;">
                                <section style="position:relative;">
                                    @foreach($orders as $order)
                                        <article class="comment">
                                            
                                            <div class="col-md-8">
                                                <div class="box-testimony animate-box">
                                                    <blockquote style="padding:0px 20px;">
                                                    @for($i=1;$i<=5;$i++)
                                                        @if($i<=$order->rating)
                                                            <i class="fa fa-star color-star"></i>
                                                        @else
                                                            <i class="fa fa-star color-gray"></i>
                                                        @endif
                                                    @endfor
                                                    <br>
                                                        <p class="card" style="text-align:justify;font-size:13px;">{{ $order->review }}</p>
                                                    </blockquote>
                                                    <span style="display:inline-flex;padding:0px 20px">
                                                        <img src="https://img.icons8.com/ios/50/000000/user.png">
                                                        <p style="margin: auto; font-size:14px;">by 
                                                            <strong>{{ $order->user }}</strong> 
                                                            at {{ Carbon\Carbon::parse($order->updated_at) }}
                                                        </p>
                                                    </span>
                                                    
                                                </div>        
                                            </div>
                                              
                                        
                                        </article>
                                    @endforeach
                                    <div>
                                        <nav class="pagination-container">
                                            <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page">
                                            &lt;
                                            </button>

                                            <div id="pagination-numbers">

                                            </div>

                                            <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
                                            &gt;
                                            </button>
                                        </nav>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                     
                    <button class="btn btn-primary btn-submit col-md-4 col-md-offset-4 text-white" style="font-size:18px;margin-top:40px;margin-bottom:40px;">
                        <a href="{{ route('user_package.order', $package->id) }}" class="text-white">Order Now</a>
                    </button>
                <div>
                    
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const paginationNumbers = document.getElementById("pagination-numbers");
    const paginatedList = document.getElementById("paginated-list");
    const listItems = paginatedList.querySelectorAll("article");
    const nextButton = document.getElementById("next-button");
    const prevButton = document.getElementById("prev-button");

    const paginationLimit = 3;
    const pageCount = Math.ceil(listItems.length / paginationLimit);
    let currentPage = 1;

    const disableButton = (button) => {
        button.classList.add("disabled");
        button.setAttribute("disabled", true);
    };

    const enableButton = (button) => {
        button.classList.remove("disabled");
        button.removeAttribute("disabled");
    };

    const handlePageButtonsStatus = () => {
        if (currentPage === 1) {
            disableButton(prevButton);
        } else {
            enableButton(prevButton);
        }

        if (pageCount === currentPage) {
            disableButton(nextButton);
        } else {
            enableButton(nextButton);
        }
    };

    const handleActivePageNumber = () => {
        document.querySelectorAll(".pagination-number").forEach((button) => {
            button.classList.remove("active");
            const pageIndex = Number(button.getAttribute("page-index"));
            if (pageIndex == currentPage) {
            button.classList.add("active");
            }
        });
    };

    const appendPageNumber = (index) => {
        const pageNumber = document.createElement("button");
        pageNumber.className = "pagination-number";
        pageNumber.innerHTML = index;
        pageNumber.setAttribute("page-index", index);
        pageNumber.setAttribute("aria-label", "Page " + index);

        paginationNumbers.appendChild(pageNumber);
    };

    const getPaginationNumbers = () => {
        for (let i = 1; i <= pageCount; i++) {
            appendPageNumber(i);
        }
    };

    const setCurrentPage = (pageNum) => {
        currentPage = pageNum;

        handleActivePageNumber();
        handlePageButtonsStatus();
        
        const prevRange = (pageNum - 1) * paginationLimit;
        const currRange = pageNum * paginationLimit;

        listItems.forEach((item, index) => {
            item.classList.add("hidden");
            if (index >= prevRange && index < currRange) {
            item.classList.remove("hidden");
            }
        });
    };

    window.addEventListener("load", () => {
        getPaginationNumbers();
        setCurrentPage(1);

        prevButton.addEventListener("click", () => {
            setCurrentPage(currentPage - 1);
        });

        nextButton.addEventListener("click", () => {
            setCurrentPage(currentPage + 1);
        });

        document.querySelectorAll(".pagination-number").forEach((button) => {
            const pageIndex = Number(button.getAttribute("page-index"));

            if (pageIndex) {
                button.addEventListener("click", () => {
                    setCurrentPage(pageIndex);
                });
            }
        });
    });
</script>
@endsection
