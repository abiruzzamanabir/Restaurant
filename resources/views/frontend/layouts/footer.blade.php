@php
$setting = App\Models\Setting::get();
@endphp
<footer class="zerogrid">
	<div class="wrap-footer">
		<div class="row">
			<div class="col-1-3">
				<div class="wrap-col">
					<h4>Customer Testimonials</h4>
					<div class="row">
						<div class="col">
							<img src="frontend/images/a-1.jpg">
							<h5>Nick Roach</h5>
							<p>Pellentesque elementum leo et justo dapibus convalli. In justo nibh, congue nec dapibus
								ac, placerat eget sem. Nunc consequat felis non elit ultricies in varius massa laoreet.
								Aenean lectus nisl, ellentesque in fermentum sit amet, convallis a lorem condimentum
								mollis. Aenean lectus nisl, ellentesque in fermentum sit amet.</p>
						</div>
					</div>
				</div>
			</div>
			@foreach ($setting as $item)

			<div class="col-1-3">
				<div class="wrap-col">
					<h4>Location</h4>
					<div class="wrap-map"><iframe
							src="{{$item->map}}"
							width="100%" height="200" frameborder="0" style="border:0"></iframe></div>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<h4>Open Daily</h4>
					@foreach (json_decode($item->open) as $day)
						
					<p><span>{{$day->week}} : </span> {{$day->time}}</p>
					@endforeach
					<p><span>Need help getting home?</span></br>
						We will call a cab for you!</p>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="wrapper">
			{{$item->copyright}} - Designed by <a href="https://portfolio.decortexbd.com/">Abir</a>
			<ul class="quick-link f-right">
				{{-- <li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Terms of Use</a></li> --}}
			</ul>
		</div>

	</div>
	@endforeach
</footer>