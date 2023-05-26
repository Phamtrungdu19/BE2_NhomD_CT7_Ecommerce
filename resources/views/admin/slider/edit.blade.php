@extends('layouts.admin');

@section('content');

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Edit Slider
                    <a href="{{url('admin/slider')}}" class="btn btn-primary btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/slider/'.$slider->id.'/edit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Title</label>
                            <input type="text" name="title"  value="{{$slider->title}}" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description"  class="form-control" rows="3">{{$slider->description}} </textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{url($slider->image)}}" width="60px" height="60px">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status" {{$slider->status == '1'? 'checked':''}}>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
