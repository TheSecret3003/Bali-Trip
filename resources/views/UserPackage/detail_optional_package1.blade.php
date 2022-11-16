@extends('layouts.navbar_2')

@section('css')
    <link href="{{ asset('css/tour_package/detail.css') }}" rel="stylesheet"></link>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('main')
<div class="main" >
    <div id="fh5co-blog-section" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading-section animate-box" style="margin-top:50px;margin-bottom:50px;">
                    <h3>{{ $package->name }}</h3>
                </div>
            </div>
        </div>
        <div class="tours-detail">
            <div class="row row-bottom-padded-md">
                <!-- <div class="card" style="border-readius:5%;"> -->
                    <div class="tab-content mb-6" id="tab_content">
                        
                        <div class="col-md-12 mb-6">
                            <div class="row">
                                <div class="text-center" style="margin-bottom:3rem;">
                                    <h1> <span class="fas fa-map-marker-alt fa-2xs"></span> Destinations</h1>
                                </div>
                                <br>
                                <div id="myCarousel-dest-1" class="carousel slide" data-ride="carousel" >
                                    <!-- Indicators -->
                                    @php
                                        $cnt = 0;
                                    @endphp
                                    <ol class="carousel-indicators">
                                        @foreach($destinations as $dest)
                                            <li data-target="#myCarousel-dest-1" data-slide-to="{{$cnt}}" class="mx-2 {{ $cnt == 0 ? 'active' : '' }}" ></li>
                                            @php
                                                $cnt++;
                                            @endphp
                                        @endforeach
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    @php
                                        $first = 1;
                                    @endphp
                                    <div class="carousel-inner">
                                        @foreach($destinations as $dest)
                                        <div class="item {{ $first == 1 ? 'active' : '' }}" style="height: 100% !important;">
                                            <div class="card card-package card-border" style="width:80vw !important;">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        
                                                        <img src="{{ $dest->image }}" class="rounded w-100 m-4">
                                                    </div>
                                                    <div class="col-md-7 px-3">
                                                        <div class="card-block px-3">
                                                            <h4 class="card-title text-black text-center title-text">{{ $dest->name }}</h4>
                                                            <p class="card-text mt-4 description-text text-justify">{{ $dest->description }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $first = 0;
                                        @endphp
                                        @endforeach
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel-dest-1" data-slide="prev" style="margin:0 0 0 0 !important;">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel-dest-1" data-slide="next" style="margin:0 0 0 0 !important;">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    @if($package->rest_packs->count() > 0)
                        <div class="col-md-12 mt-6" style="margin-top:5vh;">
                            <div class="row">
                                <div class="text-center" style="margin-bottom:3rem;">
                                    <h1> <i class="material-icons">restaurant</i> Restaurants</h1>
                                </div>
                                <br>
                                <div id="myCarousel-rest-1" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    @php
                                        $cnt = 0;
                                    @endphp
                                    <ol class="carousel-indicators">
                                        @foreach($restaurants as $rest)
                                            <li data-target="#" data-slide-to="{{$cnt}}" class="mx-2 {{ $cnt == 0 ? 'active' : '' }}" ></li>
                                            @php
                                                $cnt++;
                                            @endphp
                                        @endforeach
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    @php
                                        $first = 1;
                                    @endphp
                                    <div class="carousel-inner">
                                        @foreach($restaurants as $rest)
                                        <div class="item {{ $first == 1 ? 'active' : '' }}" style="height: 100% !important;">
                                            <div class="card card-package card-border" style="width:80vw !important;">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                       
                                                        <img src="{{ $rest->image }}" class="rounded w-100 m-4">
                                                    </div>
                                                    <div class="col-md-7 px-3">
                                                        <div class="card-block px-3">
                                                            <h4 class="card-title text-black text-center title-text">{{ $rest->name }}</h4>
                                                            <p class="card-text mt-4 description-text text-justify">{{ $rest->description }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $first = 0;
                                        @endphp
                                        @endforeach
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel-rest-1" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel-rest-1" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    </div>

                    <hr class="line-break">

                    <div class="row">
                        <div class="col-md-4 p-4">
                            <div class="d-flex flex-row">
                                <div class="p-2"><h3><span class="fas fa-clock"></span></h3></div>
                                <div class="p-2"><h1>Schedule</h1></div>
                            </div>
                            <p style="text-align:justify;">{{ $package->schedule }} every day</p>                            
                        </div>
                        <div class="col-md-4 p-4">
                            <div class="d-flex flex-row">
                                <div class="p-2"><h3><span class="fas fa-book-open"></span></h3></div>
                                <div class="p-2"><h1>Description Package</h1></div>
                            </div>                            
                            <p style="text-align:justify;">{{ $package->description }}</p>    
                        </div>
    
                        <div class="col-md-4 p-4">
                            <div class="d-flex flex-row">
                                <div class="p-2"><h3><span class="fas fa-bullhorn"></span></h3></div>
                                <div class="p-2"><h1>Important Information</h1></div>
                            </div>
                            <p style="text-align:justify;">{{ $package->keterangan }}</p>
                        </div>
                    </div>

                    <hr class="line-break">

                    <div class="col-md-12">
                        <div class="row" style="margin-top:40px;">
                            <h1 class="text-center"> <span class="fa fa-star fa-sm"></span> Traveler Review</h1>
                            <div class="text-center" style="margin-bottom:20px;">
                                <h2>This Package Got <span class="fa fa-star fa-xs"></span> {{ $avg_rating }}/5 & {{$count}} Reviews</h2>
                            </div>
                        </div>
                        @if($orders->count() > 0)
                        <div class="row">
                            <div id="myCarousel-review" class="carousel slide review" data-ride="carousel" style="min-height: 35rem !important;">
                               
                                @php
                                    $first = 1;
                                @endphp
                                <div class="carousel-inner">
                                    @foreach($orders as $order)
                                    <div class="item {{ $first == 1 ? 'active' : '' }}" style="height: 36rem !important;">
                                        <div class="card card-package">
                                            <div class="row">
                                                <div class="review-profile text-center">
                                                    <!-- <img class="rounded-circle img-thumbnail" style="width: 125px !important; height: 125px !important;" src="https://img.icons8.com/ios/50/000000/user.png" alt="" width="75"> -->
                                                    <h2 class="mt-2 user-review">{{ $order->user }}</h2>
                                                    <p>
                                                        @for($i=1;$i<=5;$i++)
                                                            @if($i<=$order->rating)
                                                                <i class="fa fa-star color-gray"></i>
                                                            @else
                                                                <i class="fa-regular fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </p>
                                                </div>                                                 
                                            </div>
                                            <div class="row">
                                                <div class="card-block px-3" style="height: 20rem !important;">
                                                    <div class="review-quote text-black text-center mt-4" style="margin:0 !important;">
                                                        <blockquote class="blockquote border-0 p-0" style="width:50vw;">
                                                            <p class="font-italic lead text-white">
                                                                <i class="fa fa-quote-left mr-3"></i>
                                                                {{ $order->review }}
                                                                <i class="fa fa-quote-right ml-3"></i>
                                                            </p>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $first = 0;
                                    @endphp

                                    @endforeach
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel-review" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel-review" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-md-12 mt-4" style="margin-top:10vh !important;">

                        <div class="d-flex align-items-end flex-column">
                            <div class="row">
                                <h3>Get it Only</h3>
                            </div>
                            @if($package->discount==0)
                                <div class="row">
                                    <span style="font-size: 4rem;"><b>Rp. {{$package->price_discount}}/pax</b></span>
                                </div>
                            @else
                                <div class="row">
                                    <span class="text-muted discount-price"><del>Rp. {{$package->price}}</del></span>
                                </div>
                                <div class="row">
                                    <span class="price-text"><b>Rp.{{ $package->price_discount }}/pax</b></span>
                                </div>
                            @endif
                        </div>
                    </div>                     
                    <button class="btn btn-primary btn-submit col-md-4 col-md-offset-4 text-white" style="font-size:18px;margin-top:40px;margin-bottom:40px;">
                        <a href="{{ route('user_package.order', $package->id) }}" class="text-white">Order Now</a>
                    </button>
                <!-- <div> -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<!-- <script>
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
</script> -->
@endsection