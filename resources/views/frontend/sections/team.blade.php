<section id="container" class="sub-page">
    <div class="wrap-container zerogrid">
        <div class="crumbs">
            <ul>
                <li><a href="{{ route('home.page') }}">Home</a></li>
                <li><a href="{{ route('team.page') }}">Staff</a></li>
            </ul>
        </div>
        <div id="main-content">
            <div class="wrap-content">
                <div class="chef">
                    <div class="row">
                        @foreach ($all_teams as $item)                            
                        <div class="col-1-4">
                            <div class="wrap-col">
                                <div class="zoom-container">
                                    <a href="#">
                                        <img src="{{url('storage/teams/'.$item->photo)}}">
                                    </a>
                                </div>
                                <h3 class="text-capitalize">{{$item->name}}</h3>
                                <ul class="social t-center">
                                    @isset($item->twitter)
                                    <li><a href="{{$item->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                    @endisset
                                    @isset($item->facebook)
                                    <li><a href="{{$item->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                    @endisset
                                    @isset($item->linkedin)
                                    <li><a href="{{$item->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                    @endisset
                                    @isset($item->instagram)
                                    <li><a href="{{$item->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                    @endisset
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>