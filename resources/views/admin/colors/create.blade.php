@extends('layouts.admin');

@section('content');

<div class="row">
  <div class="col-md-12">
    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="card">
      <div class="card-header">
        <h4>Add Colors
          <a href="{{url('admin/colors')}}" class="btn btn-primary btn-sm float-end">Back</a>
        </h4>
      </div>
      <div class="card-body">
        <form action="{{url('admin/colors/create')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Color Code</label>
                <input type="text" name="code" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Status</label> <br>
                <input type="checkbox" name="status" style="width: 50px; height:50px">
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">save  </button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
