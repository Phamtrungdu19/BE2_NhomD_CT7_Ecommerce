@extends('layouts.admin');

@section('content');

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Add Brands
                    <a href="{{url('admin/brands')}}" class="btn btn-primary btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/brands')}}" method="POST" >
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>slug</label>
                            <input type="text" name="slug" class="form-control">
                             </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status"> Checked = Hidden,UnChecked = visible
                        </div>

                    <div>
                        <button type="submit" class="btn btn-primary btn-sm float-end"> Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
