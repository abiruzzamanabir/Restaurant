@extends('admin.layouts.app')
@section('main')
<div class="row">
    @if ($form_type=='create')
    <div class="{{count($settings)<1 ? 'col-lg-8':'col-lg-12'}}">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Portfolio</h4>
            </div>
            @include('validate-main')
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Copyright</th>
                                @if ($form_type=='create')
                                <th>Created At</th> @endif
                                @if ($form_type=='edit')
                                <th>Updated At</th> @endif
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($settings as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->copyright}}</td>


                                @if ($form_type=='create')
                                <td>{{$item->created_at->diffForHumans()}}</td>
                                @endif
                                @if ($form_type=='edit')
                                <td>{{$item->updated_at->diffForHumans()}}</td>
                                @endif
                                <td>
                                    @if ($item->status)

                                    <span class="badge badge-success">Published</span>
                                    @if (Auth::guard('admin')->user()->role->name == 'Admin')

                                    <a class="text-danger" href="{{ route('slider.status.update',$item->id) }}"><i
                                            class="fa fa-times" aria-hidden="true"></i></a>
                                    @else

                                    @endif
                                    @else

                                    <span class="badge badge-danger">Unpublished</span>
                                    @if (Auth::guard('admin')->user()->role->name == 'Admin')
                                    <a class="text-success" href="{{ route('slider.status.update',$item->id) }}"><i
                                            class="fa fa-check" aria-hidden="true"></i></a>
                                    @else

                                    @endif
                                    @endif
                                </td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"
                                            aria-hidden="true"></i></a> --}}
                                    <a class="btn btn-sm btn-warning" href="{{ route('setting.edit', $item->id) }}"><i
                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                    @if ($form_type=='create')
                                    <form class="d-inline delete-form"
                                        action="{{ route('setting.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                    {{-- <a class="btn btn-sm btn-danger"
                                        href="{{ route('slider.trash.update',$item->id) }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></a> --}}
                                    @endif
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
    @endif
    @if ($form_type=='edit')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Portfolio</h4>
            </div>
            @include('validate-main')
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Copyright</th>
                                @if ($form_type=='create')
                                <th>Created At</th> @endif
                                @if ($form_type=='edit')
                                <th>Updated At</th> @endif
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($settings as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->copyright}}</td>


                                @if ($form_type=='create')
                                <td>{{$item->created_at->diffForHumans()}}</td>
                                @endif
                                @if ($form_type=='edit')
                                <td>{{$item->updated_at->diffForHumans()}}</td>
                                @endif
                                <td>
                                    @if ($item->status)

                                    <span class="badge badge-success">Published</span>
                                    @if (Auth::guard('admin')->user()->role->name == 'Admin')

                                    <a class="text-danger" href="{{ route('slider.status.update',$item->id) }}"><i
                                            class="fa fa-times" aria-hidden="true"></i></a>
                                    @else

                                    @endif
                                    @else

                                    <span class="badge badge-danger">Unpublished</span>
                                    @if (Auth::guard('admin')->user()->role->name == 'Admin')
                                    <a class="text-success" href="{{ route('slider.status.update',$item->id) }}"><i
                                            class="fa fa-check" aria-hidden="true"></i></a>
                                    @else

                                    @endif
                                    @endif
                                </td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"
                                            aria-hidden="true"></i></a> --}}
                                    <a class="btn btn-sm btn-warning" href="{{ route('setting.edit', $item->id) }}"><i
                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                    @if ($form_type=='create')
                                    <form class="d-inline delete-form"
                                        action="{{ route('setting.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                    {{-- <a class="btn btn-sm btn-danger"
                                        href="{{ route('slider.trash.update',$item->id) }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></a> --}}
                                    @endif
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
    @endif
    <div class="col-md-4">
        @if (count($settings)<1)
        @if ($form_type == 'create')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Setting</h4>
            </div>
            @include('validate')
            <div class="card-body">
                <form action="{{ route('setting.store') }}" method="POST">
                    @csrf
                    <div class="form-group order">
                        <label>Email</label>
                        <input name="email" type="text" value="{{old('email')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Phone</label>
                        <input name="phone" type="text" value="{{old('phone')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Fax</label>
                        <input name="fax" type="text" value="{{old('fax')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Facebook</label>
                        <input name="facebook" type="text" value="{{old('facebook')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Twitter</label>
                        <input name="twitter" type="text" value="{{old('twitter')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Google</label>
                        <input name="google" type="text" value="{{old('google')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Linkedin</label>
                        <input name="linkedin" type="text" value="{{old('linkedin')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Instagram</label>
                        <input name="instagram" type="text" value="{{old('instagram')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Address</label>
                        <input name="address" type="text" value="{{old('address')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Map</label>
                        <input name="map" type="text" value="{{old('map')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Copyright</label>
                        <input name="copyright" type="text" value="{{old('copyright')}}" class="form-control" autofocus>
                    </div>

                    <div class="form-group order">
                        <label>Open Hours</label>
                        <div class="accordion" id="accordionExample">
                            <div class="card portfolio-step shadow-sm">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0" data-toggle="collapse" data-target="#collapseOne"
                                        style="cursor: pointer">
                                        Sunday
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <label>Week Name</label>
                                            <input type="text" name="week[]" id="" class="form-control" value="Sunday"
                                                placeholder="Sunday" autofocus>
                                        </div>
                                        <div class="my-3">
                                            <label>Time</label>
                                            <input type="text" name="time[]" id="" class="form-control"
                                                value="8:00 AM - 8:00 PM" placeholder="8:00 AM - 8:00 PM" autofocus>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card portfolio-step shadow-sm">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0" data-toggle="collapse" data-target="#collapseTwo"
                                        style="cursor: pointer">
                                        Monday
                                    </h6>
                                </div>

                                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <label>Week Name</label>
                                            <input type="text" name="week[]" id="" class="form-control" value="Monday"
                                                placeholder="Monday" autofocus>
                                        </div>
                                        <div class="my-3">
                                            <label>Time</label>
                                            <input type="text" name="time[]" id="" class="form-control"
                                                value="8:00 AM - 8:00 PM" placeholder="8:00 AM - 8:00 PM" autofocus>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card portfolio-step shadow-sm">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0" data-toggle="collapse" data-target="#collapseThree"
                                        style="cursor: pointer">
                                        Tuesday
                                    </h6>
                                </div>

                                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <label>Week Name</label>
                                            <input type="text" name="week[]" id="" class="form-control" value="Tuesday"
                                                placeholder="Tuesday" autofocus>
                                        </div>
                                        <div class="my-3">
                                            <label>Time</label>
                                            <input type="text" name="time[]" id="" class="form-control"
                                                value="8:00 AM - 8:00 PM" placeholder="8:00 AM - 8:00 PM" autofocus>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card portfolio-step shadow-sm">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0" data-toggle="collapse" data-target="#collapseFour"
                                        style="cursor: pointer">
                                        Wednesday
                                    </h6>
                                </div>

                                <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <label>Week Name</label>
                                            <input type="text" name="week[]" id="" class="form-control"
                                                value="Wednesday" placeholder="Wednesday" autofocus>
                                        </div>
                                        <div class="my-3">
                                            <label>Time</label>
                                            <input type="text" name="time[]" id="" class="form-control"
                                                value="8:00 AM - 8:00 PM" placeholder="8:00 AM - 8:00 PM" autofocus>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card portfolio-step shadow-sm">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0" data-toggle="collapse" data-target="#collapseFive"
                                        style="cursor: pointer">
                                        Thursday
                                    </h6>
                                </div>

                                <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <label>Week Name</label>
                                            <input type="text" name="week[]" id="" class="form-control" value="Thursday"
                                                placeholder="Thursday" autofocus>
                                        </div>
                                        <div class="my-3">
                                            <label>Time</label>
                                            <input type="text" name="time[]" id="" class="form-control"
                                                value="8:00 AM - 8:00 PM" placeholder="8:00 AM - 8:00 PM" autofocus>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card portfolio-step shadow-sm">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0" data-toggle="collapse" data-target="#collapseSix"
                                        style="cursor: pointer">
                                        Friday
                                    </h6>
                                </div>

                                <div id="collapseSix" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <label>Week Name</label>
                                            <input type="text" name="week[]" id="" class="form-control" value="Friday"
                                                placeholder="Friday" autofocus>
                                        </div>
                                        <div class="my-3">
                                            <label>Time</label>
                                            <input type="text" name="time[]" id="" class="form-control"
                                                value="8:00 AM - 8:00 PM" placeholder="8:00 AM - 8:00 PM" autofocus>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card portfolio-step shadow-sm">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0" data-toggle="collapse" data-target="#collapseSeven"
                                        style="cursor: pointer">
                                        Saturday
                                    </h6>
                                </div>

                                <div id="collapseSeven" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <label>Week Name</label>
                                            <input type="text" name="week[]" id="" class="form-control" value="Saturday"
                                                placeholder="Saturday" autofocus>
                                        </div>
                                        <div class="my-3">
                                            <label>Time</label>
                                            <input type="text" name="time[]" id="" class="form-control"
                                                value="8:00 AM - 8:00 PM" placeholder="8:00 AM - 8:00 PM" autofocus>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @endif
        
        @if ($form_type == 'edit')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Setting</h4>
            </div>
            @include('validate')
            <div class="card-body">
                <form action="{{ route('setting.update',$edit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="{{$edit->email}}" type="text" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Phone</label>
                        <input name="phone" type="text" value="{{$edit->phone}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Fax</label>
                        <input name="fax" type="text" value="{{$edit->fax}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Facebook</label>
                        <input name="facebook" type="text" value="{{$edit->facebook}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Twitter</label>
                        <input name="twitter" type="text" value="{{$edit->twitter}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Google</label>
                        <input name="google" type="text" value="{{$edit->google}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Linkedin</label>
                        <input name="linkedin" type="text" value="{{$edit->linkedin}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Instagram</label>
                        <input name="instagram" type="text" value="{{$edit->instagram}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Address</label>
                        <input name="address" type="text" value="{{$edit->address}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Map</label>
                        <input name="map" type="text" value="{{$edit->map}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Copyright</label>
                        <input name="copyright" type="text" value="{{$edit->copyright}}" class="form-control" autofocus>
                    </div>
                
                    <div class="form-group order">
                        <label>Open Hour</label>
                        <div class="accordion" id="accordionExample">
                            @foreach (json_decode($edit->open) as $item)
                            <div class="card portfolio-step shadow-sm">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0" data-toggle="collapse" data-target="#collapse{{$loop->index+1}}"
                                        style="cursor: pointer">
                                        {{$item->week}}
                                    </h6>
                                </div>

                                <div id="collapse{{$loop->index+1}}" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <label>Title</label>
                                            <input type="text" name="week[]" value="{{$item->week}}" id=""
                                                class="form-control" autofocus>
                                        </div>
                                        <div class="my-3">
                                            <label>Description</label>
                                            <input type="text" name="time[]" value="{{$item->time}}" id=""
                                                class="form-control" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            

                        </div>
                    </div>
                    
                    <div class="text-right">
                        <a class="btn btn-info" href="{{ route('setting.index') }}">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection