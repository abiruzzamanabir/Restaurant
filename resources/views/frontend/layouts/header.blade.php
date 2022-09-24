@php
$setting = App\Models\Setting::get();
@endphp
<div class="top">
    @foreach ($setting as $item)

    <div class="zerogrid">
        <ul class="number f-left">
            <li class="mail">
                <p>{{$item->email}}</p>
            </li>
            <li class="phone">
                <p>{{$item->phone}}</p>
            </li>
        </ul>
        <ul class="top-social f-right">
            <li><a href="{{$item->twitter}}"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{$item->facebook}}"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{$item->google}}"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="{{$item->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="{{$item->instagram}}"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>
    @endforeach
</div>
<!--////////////////////////////////////Header-->
<header>
    <div class="zerogrid">
        <center>
            <div class="logo"><img src="frontend/images/logo.png"></div>
        </center>
    </div>
</header>
<div class="site-title">
    <div class="zerogrid">
        <div class="row">
            <div class="col">
                <h2 class="t-center">Truely the best restaurant in town - The New York Times</h2>
            </div>
        </div>
    </div>
</div>
<!--//////////////////////////////////////Menu-->
<a href="#" class="nav-toggle">Toggle Navigation</a>
<nav class="cmn-tile-nav">
    <ul class="clearfix">
        <li class="colour-1"><a href="{{ route('home.page') }}">Home</a></li>
        <li class="colour-2"><a href="{{ route('menu.page') }}">Menu</a></li>
        <li class="colour-3"><a href="location.html">Location</a></li>
        <li class="colour-4"><a href="archive.html">Blog</a></li>
        <li class="colour-5"><a href="{{ route('reservation.page') }}">Reservation</a></li>
        <li class="colour-6"><a href="{{ route('team.page') }}">Our Staff</a></li>
        <li class="colour-7"><a href="news.html">News</a></li>
        <li class="colour-8"><a href="{{ route('gallery.page') }}">Gallery</a></li>
    </ul>
</nav>