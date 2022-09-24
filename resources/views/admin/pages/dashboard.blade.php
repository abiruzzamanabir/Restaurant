@extends('admin.layouts.app')
@section('main')
<div class="row">
	<div class="col-xl-3 col-sm-6 col-12">
		<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-primary border-primary">
						<i class="fe fe-users"></i>
					</span>
					<div class="dash-count">
						<h3>168</h3>
					</div>
				</div>
				<div class="dash-widget-info">
					<h6 class="text-muted">Doctors</h6>
					<div class="progress progress-sm">
						<div class="progress-bar bg-primary w-50"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-success">
						<i class="fe fe-credit-card"></i>
					</span>
					<div class="dash-count">
						<h3>487</h3>
					</div>
				</div>
				<div class="dash-widget-info">

					<h6 class="text-muted">Patients</h6>
					<div class="progress progress-sm">
						<div class="progress-bar bg-success w-50"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-danger border-danger">
						<i class="fe fe-money"></i>
					</span>
					<div class="dash-count">
						<h3>485</h3>
					</div>
				</div>
				<div class="dash-widget-info">

					<h6 class="text-muted">Appointment</h6>
					<div class="progress progress-sm">
						<div class="progress-bar bg-danger w-50"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 col-12">
		<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-warning border-warning">
						<i class="fe fe-folder"></i>
					</span>
					<div class="dash-count">
						<h3>$62523</h3>
					</div>
				</div>
				<div class="dash-widget-info">

					<h6 class="text-muted">Revenue</h6>
					<div class="progress progress-sm">
						<div class="progress-bar bg-warning w-50"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card">
            <div class="card-header">
                <h4 class="card-title">All Reservation</h4>
            </div>
            @include('validate-main')
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Reserved ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Created At</th> 
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reservation as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$item->reservation_id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{date('d F, Y',strtotime($item->date))}}</td>
                                <td>{{$item->time}}</td>
                                <td>{{$item->subject}}</td>
                                <td>{{$item->message}}</td>
                                <td>{{$item->created_at->diffForHumans()}}</td>
                                <td>
                                    @if ($item->type=='Pending')
                                    <span class="badge badge-warning">Pending</span>        
                                    @elseif ($item->type=='Reserved')
									<span class="badge badge-success">Reserved</span>
                                    @else
                                    <span class="badge badge-danger">Canceled</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"
                                            aria-hidden="true"></i></a> --}}
                                    <a class="btn btn-sm btn-success" href="{{ route('reserve.update', $item->id) }}"><i
                                            class="fa fa-check" aria-hidden="true"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('cancel.update', $item->id) }}"><i
                                            class="fa fa-times" aria-hidden="true"></i></a>
                                    {{-- <form class="d-inline delete-form" action="{{ route('menu.destroy', $item->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form> --}}
                                    {{-- <a class="btn btn-sm btn-danger"
                                        href="{{ route('slider.trash.update',$item->id) }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></a> --}}
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-lg-6">

		<!-- Sales Chart -->
		<div class="card card-chart">
			<div class="card-header">
				<h4 class="card-title">Revenue</h4>
			</div>
			<div class="card-body">
				<div id="morrisArea"></div>
			</div>
		</div>
		<!-- /Sales Chart -->

	</div>
	<div class="col-md-12 col-lg-6">

		<!-- Invoice Chart -->
		<div class="card card-chart">
			<div class="card-header">
				<h4 class="card-title">Status</h4>
			</div>
			<div class="card-body">
				<div id="morrisLine"></div>
			</div>
		</div>
		<!-- /Invoice Chart -->

	</div>
</div>
@endsection