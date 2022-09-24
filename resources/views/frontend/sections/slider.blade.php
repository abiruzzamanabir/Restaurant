<div class="zerogrid">
    <div class="callbacks_container">
        <ul class="rslides" id="slider4">
            @foreach ($all_sliders as $item)    
            <li>
                <img src="{{url('storage/sliders/'.$item->photo)}}" alt="">
                <div class="caption">
                    <h2>{{$item->title}}.</h2></br>
                    <p>{{$item->subtitle}}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>