@extends('frontend.layouts.app')
@section('main')
@include('frontend.sections.slider')
<section id="container" class="index-page">
	<div class="wrap-container zerogrid">
		<!-----------------content-box-1-------------------->
		<section class="content-box box-1">
			<div class="zerogrid">
				<div class="row box-item"><!--Start Box-->
					<div class="col">
						<h2>“Your awesome company slogan goes here, we have the best food around”</h2>
					<span>Unc elementum lacus in gravida pellentesque urna dolor eleifend felis eleifend</span>
					</div>
				</div>
			</div>
		</section>
		<!-----------------content-box-2-------------------->
@include('frontend.sections.featuredPost')
	</div>
</section>
@endsection