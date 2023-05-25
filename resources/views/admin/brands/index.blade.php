@extends('layouts.admin')

@section('content')

<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>
                        Brands list
                        <a href="{{url('admin/brands/create')}}" class="btn btn-primary btn-sm float-end">Add
                            Brands</a>

                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stiped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->slug}}</td>
                                <td>{{$brand->status == '0'? 'visible':'Hidden'}}</td>
                                <td>
                                    <a href="" class=" btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
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
