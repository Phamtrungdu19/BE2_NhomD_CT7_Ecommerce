@extends('layouts.admin');

@section('content');

<div class="row">
  <div class="col-md-12">

    <div></div>
    <div class="card">
      <div class="card-header">
        <h4>Add Products
          <a href="{{url('admin/products')}}" class="btn btn-primary btn-sm float-end">Back</a>
        </h4>
      </div>
      <div class="card-body">
        <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <ul class="nav nav-tabs" id="nav-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">SEO Tags</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Detail</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Product Image</button>
            </li>
          </ul>

          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
              <div class="md-3">
                <label> Category</label>
                <select name="category_id" id=" " class="form-control">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>

                  @endforeach
                </select>
              </div>
              <div class="md-3">
                <label> Product Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="md-3">
                <label> Product Slug</label>
                <input type="text" name="slug" class="form-control">
              </div>
              <div class="md-3">
                <label> Select brand</label>
                <select name="brand" id=" " class="form-control">
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>

                  @endforeach
                </select>
              </div>
              <div class="md-3">
                <label> Small Description</label>
                <textarea name="small_description" class="form-control" rows="4"> </textarea>
              </div>
              <div class="md-3">
                <label> Description</label>
                <textarea name="description" class="form-control" rows="4"> </textarea>
              </div>
            </div>

            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
              <div class="md-3">
                <label> Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
              </div>
              <div class="md-3">
                <label> Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="4"> </textarea>
              </div>
              <div class="md-3">
                <label> Meta Keyword</label>
                <textarea name="meta_keyword" class="form-control" rows="4"> </textarea>
              </div>
            </div>
            <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
              <div class="row">
                <div class="col-md-4">
                  <div class="md-3">
                    <label> Original Price</label>
                    <input type="text" name="original_price" class="form-control">
                  </div>
                  <div class="md-3">
                    <label> Selling Price</label>
                    <input type="text" name="selling_price" class="form-control">
                  </div>
                  <div class="md-3">
                    <label> Quantity</label>
                    <input type="text" name="quantity" class="form-control">
                  </div>

                </div>
                <div class="col-md-4">
                  <div class="md-3">

                    <label> trending</label><br>
                    <input type="checkbox" name="trending"  style="width: 50px ; height: 50px">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="md-3">

                    <label> Status</label><br>
                    <input type="checkbox" name="status"  style="width: 50px ; height: 50px">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
              <div class="mb-3">
                <label for="">Upload Products Image</label>
                <input type="file" name="image[]" multiple class="form-control">
              </div>
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
</div>
@endsection
