@extends('layouts.admin')

@section('content')

<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card-header">
                    <h4>
                        Slider list
                        <a href="{{url('admin/sliders/create')}}" class="btn btn-primary btn-sm float-end">Add
                            Slider</a>

                    </h4>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stiped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->description}}</td>
                                <td>
                                    <img src="{{asset($slider->image)}}" style="width: 150px;height: 150px;"
                                        alt="Slider">
                                </td>
                                <td>{{$slider->status == '0'? 'Visible':'Hidden'}}</td>
                                <td>
                                    <a href="{{url('admin/slider/'.$slider->id.'/edit')}}" class=" btn btn-success">Edit</a>
                                    <a href="{{url('admin/slider/'.$slider->id.'/delete')}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
