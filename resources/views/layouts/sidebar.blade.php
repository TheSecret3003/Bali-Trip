@extends('layouts.master')

@section('navlinks')
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    </ul>
</nav> 

@endsection

@section('sidebar')
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview">
      <a href="{{ url('/') }}" class="nav-link {{ (preg_match('/dashboard/i',request()->route()->getName())==1)?'active':''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          DASHBOARD
        </p>
        @if( request()->route()->getName()=='dashboard')
            <span style="float:right;color:yellow;">{{ ($total_count==0)?'':$total_count.'!' }}</span>
        @endif
      </a>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/order/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon 	fa fa-bookmark"></i>
            <p>
            PESANAN
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/order/add') }}" class="nav-link {{ (strcmp('order.add',request()->route()->getName())==0)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buat Pesanan Paket</p>
            </a>
            </li>
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/order/add_car') }}" class="nav-link {{ (preg_match('/order.add_car/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buat Pesanan Mobil</p>
            </a>
            </li>
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/disable_date') }}" class="nav-link {{ (preg_match('/disable_date.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Disable Date</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/disable_date/add') }}" class="nav-link {{ (preg_match('/disable_date.add/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Disable Date</p>
            </a>
            </li>
      </ul>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/package/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            PAKET
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/package') }}" class="nav-link {{ (preg_match('/package.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Paket</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/package/add') }}" class="nav-link {{ (strcmp('package.add',request()->route()->getName())==0)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buat Paket (Optional)</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/package/add_tour_hotel') }}" class="nav-link {{ (strcmp('package.add_tour_hotel',request()->route()->getName())==0)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buat Paket (Tour)</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/destination/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon fas fa-map"></i>
            <p>
            DESTINASI
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/destination') }}" class="nav-link {{ (preg_match('/destination.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Destinasi</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/destination/add') }}" class="nav-link {{ (preg_match('/destination.add/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Destinasi</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/restaurant/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon fas fa-hamburger"></i>
            <p>
            RESTORAN
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/restaurant') }}" class="nav-link {{ (preg_match('/restaurant.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Restoran</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/restaurant/add') }}" class="nav-link {{ (preg_match('/restaurant.add/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Restoran</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/hotel/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon fas fa-hotel"></i>
            <p>
            HOTEL
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/hotel') }}" class="nav-link {{ (preg_match('/hotel.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Hotel</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/hotel/add') }}" class="nav-link {{ (preg_match('/hotel.add/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Hotel</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/ticket/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>
            TIKET
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/ticket') }}" class="nav-link {{ (preg_match('/ticket.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Tiket</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/ticket/add') }}" class="nav-link {{ (preg_match('/ticket.add/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Tiket</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/car/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon fas fa-bus"></i>
            <p>
            MOBIL
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/car') }}" class="nav-link {{ (preg_match('/car.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Mobil</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/car/add') }}" class="nav-link {{ (preg_match('/car.add/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Mobil</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/user/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon fas fas fa-hands"></i>
            <p>
            USER
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/user') }}" class="nav-link {{ (preg_match('/user.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar User</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview {{ (preg_match('/destination/i',request()->route()->getName())==1)?'menu-open':''}}">
        <a class="nav-link">
            <i class="nav-icon fas fa-map"></i>
            <p>
            GALLERY
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ url('/gallery') }}" class="nav-link {{ (preg_match('/gallery.index/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kumpulan Foto</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/gallery/add') }}" class="nav-link {{ (preg_match('/gallery.add/i',request()->route()->getName())==1)?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Foto</p>
            </a>
            </li>
        </ul>
    </li>
  </ul>
</nav>
@endsection

@section('content')
@yield('content-wrapper')
@endsection

@section('js')
@yield('js')
@endsection