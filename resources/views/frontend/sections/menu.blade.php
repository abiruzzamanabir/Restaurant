<section id="container" class="sub-page">
	<div class="wrap-container zerogrid">
		<div class="crumbs">
			<ul>
				<li><a href="{{ route('home.page') }}">Home</a></li>
				<li><a href="{{ route('menu.page') }}">Menu</a></li>
			</ul>
		</div>
		<div id="main-content">
			<div class="wrap-content">
				<div class="row">
                    @foreach ($all_menus as $item)    
					<div class="col-1-3">
						<div class="wrap-col">
							<h3>{{$item->name}}</h3>
                            @foreach (json_decode($item->items) as $item)
							<div class="post">
								<a href="#"><img src="{{url('storage/menus/'.$item->menu_photo)}}"/></a>
								<div class="wrapper">
								  <h5><a href="#">{{$item->menu_title}}</a></h5>
								  <span>${{$item->menu_price}}</span>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</div> 
	</div>
</section>