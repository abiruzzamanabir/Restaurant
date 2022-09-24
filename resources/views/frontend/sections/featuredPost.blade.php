<section class="content-box box-2">
    <div class="zerogrid">
        <div class="row wrap-box d-block">
            <!--Start Box-->
            <div class="header">
                <h2>Welcome</h2>
                <hr class="line">
                {{-- <span>text text text text text</span> --}}
            </div>
            <div class="row p-5">
                @foreach ($all_featured as $item)
                <div class="col-1-3">
                    <div class="wrap-col">
                        <div class="box-item">
                            <span class="ribbon">{{$item->title}}<b></b></span>
                            <img src="{{url('storage/featured/'.$item->photo)}}" alt="">
                            <p>{{$item->desc}}</p>
                            {{-- <a href="#" class="button button-1">Detail</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>