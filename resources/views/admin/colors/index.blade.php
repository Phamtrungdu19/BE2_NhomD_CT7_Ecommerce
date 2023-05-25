@extends('layouts.admin');

@section('content');

<div class="row">
  <div class="col-md-12">
    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="card">
      <div class="card-header">
        <h4> Colors
          <a href="{{url('admin/colors/create')}}" class="btn btn-primary btn-sm float-end">Add Colors</a>
        </h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-stiped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>code</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach($colors as $color)
                <tr>
                    <td>{{$color->id}}</td>
                    <td>{{$color->name}}</td>
                    <td>{{$color->code}}</td>
                    <td>{{$color->status == '0'? 'visible':'Hidden'}}</td>
                    <td>
                        <a href="{{url('admin/colors/'.$color->id.'/edit')}}" class=" btn btn-success">Edit</a>
                        <a href="{{url('admin/colors/'.$color->id.'/delete')}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
