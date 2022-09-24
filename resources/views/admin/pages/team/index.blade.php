@extends('admin.layouts.app')
@section('main')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Admin Team Member</h4>
            </div>
            @include('validate-main')
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Photo</th>
                                @if ($form_type=='create')
                                <th>Created At</th> @endif
                                @if ($form_type=='edit')
                                <th>Updated At</th> @endif
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teams as $team)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$team->name}}</td>
                                <td>
                                    <img class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover"
                                        src="{{ url('storage/teams/'. $team->photo)}}" alt="Profile Picture">
                                </td>
                                @if ($form_type=='create')
                                <td>{{$team->created_at->diffForHumans()}}</td>
                                @endif
                                @if ($form_type=='edit')
                                <td>{{$team->updated_at->diffForHumans()}}</td>
                                @endif
                                <td>
                                    @if ($team->status)

                                    <span class="badge badge-success">Active Member</span>
                                    @if (Auth::guard('admin')->user()->role->name == 'Admin')

                                    <a class="text-danger" href="{{ route('team.member.status.update',$team->id) }}"><i
                                            class="fa fa-times" aria-hidden="true"></i></a>
                                    @else

                                    @endif
                                    @else

                                    <span class="badge badge-danger">Blocked Member</span>
                                    @if (Auth::guard('admin')->user()->role->name == 'Admin')
                                    <a class="text-success" href="{{ route('team.member.status.update',$team->id) }}"><i
                                            class="fa fa-check" aria-hidden="true"></i></a>
                                    @else

                                    @endif
                                    @endif
                                </td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"
                                            aria-hidden="true"></i></a> --}}
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('team-member.edit', $team->id) }}"><i class="fa fa-edit"
                                            aria-hidden="true"></i></a>
                                    @if ($form_type=='create')
                                    <form class="d-inline delete-form"
                                        action="{{ route('team-member.destroy', $team->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                    {{-- <a class="btn btn-sm btn-danger"
                                        href="{{ route('team.member.trash.update',$team->id) }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></a> --}}
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="5">No Data Found</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @if ($form_type == 'create')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add new team member</h4>
            </div>
            @include('validate')
            <div class="card-body">
                <form action="{{ route('team-member.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group order">
                        <label>Name</label>
                        <input name="name" type="text" value="{{old('name')}}" class="form-control" autofocus>
                    </div>
                    
                    <div class="form-group order">
                        <label>Photo</label>
                        <br>
                        <img style="max-width: 100%;" id="slider-photo-preview" src="" alt="">
                        <br>
                        <input class="d-none" id="slider-photo" name="photo" type="file" class="form-control">
                        <label for="slider-photo"><img style="cursor: pointer" class="w-50"
                                src="{{ url('admin\assets\img\upload.png') }}" alt=""></label>
                    </div>
                    <div class="form-group order">
                        <label>Facebook Link</label>
                        <input name="facebook" type="text" value="{{old('facebook')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Twitter Link</label>
                        <input name="twitter" type="text" value="{{old('twitter')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>LinkedIn Link</label>
                        <input name="linkedin" type="text" value="{{old('linkedin')}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Instagram Link</label>
                        <input name="instagram" type="text" value="{{old('instagram')}}" class="form-control" autofocus>
                    </div>
                    

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @if ($form_type == 'edit')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit team member</h4>
            </div>
            @include('validate')
            <div class="card-body">
                <form action="{{ route('team-member.update',$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" value="{{$edit->name}}" type="text" class="form-control" autofocus>
                    </div>
                    
                    <div class="form-group order">
                        <label>Photo</label>
                        <br>
                        <img style="max-width: 100%;" id="slider-photo-preview"
                            src="{{ url('storage/teams/'.$edit->photo) }}" alt="">
                        <br>
                        <input class="d-none" id="slider-photo" name="new_photo" type="file" class="form-control">
                        <label for="slider-photo"><img style="cursor: pointer" class="w-50"
                                src="{{ url('admin\assets\img\upload.png') }}" alt=""></label>
                        <input type="hidden" value="{{$edit->photo}}" name="old_photo">
                    </div>
                    <div class="form-group order">
                        <label>Facebook Link</label>
                        <input name="facebook" type="text" value="{{$edit->facebook}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Twitter Link</label>
                        <input name="twitter" type="text" value="{{$edit->twitter}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>LinkedIn Link</label>
                        <input name="linkedin" type="text" value="{{$edit->linkedin}}" class="form-control" autofocus>
                    </div>
                    <div class="form-group order">
                        <label>Instagram Link</label>
                        <input name="instagram" type="text" value="{{$edit->instagram}}" class="form-control" autofocus>
                    </div>

                    <div class="text-right">
                        <a class="btn btn-info" href="{{ route('team-member.index') }}">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection