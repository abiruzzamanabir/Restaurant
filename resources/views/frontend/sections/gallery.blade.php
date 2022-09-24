<section id="container" class="sub-page">
	<div class="wrap-container zerogrid">
		<div class="crumbs">
			<ul>
				<li><a href="{{ route('home.page') }}">Home</a></li>
				<li><a href="{{ route('gallery.page') }}">Gallery</a></li>
			</ul>
		</div>
		<div id="main-content">
			<div class="wrap-content">
				<div class="row">
                    @foreach ($all_gallery as $item)                        
					<div class="col-1-4">
						<div class="zoom-container">
							<a href="#">
								<span class="zoom-caption">
									<span>{{$item->name}}</span>
								</span>
								<img style="height: 185px;" src="{{url('storage/gallery/'.$item->photo)}}" />
							</a>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</div> 
	</div>
</section>