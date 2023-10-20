@extends('Admin.master.index')
@section('container')
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
<div class="row-10">
        <div class="col">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
          <!-- Horizontal Form -->
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Horizontal Form</h3>
              </div>
<form  method="post" action='{{ route("dashboard.product.update",$product->id) }}' enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">products</label>
                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control"  placeholder="name" value="{{$product->name}}">
                      @error('name')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">category</label>
                      <div class="col-sm-10">
                        <select name="category" >
                            <option value="{{$product->category_id}}">select category</option>
                                @foreach ( $categorys as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                        @error('category')
                        {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">price</label>
                      <div class="col-sm-5">
                        <input value="{{$product->regular_price}}" name="regular_price" type="text" class="form-control"  placeholder="regular_price">
                        @error('regular_price')
                        {{ $message }}
                        @enderror
                        <input value="{{$product->discount_price}}" name="discount_price" type="text" class="form-control"  placeholder="discount_price">
                        @error('discount_price')
                        {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">quantity</label>
                      <div class="col-sm-10">
                        <input value="{{$product->quantity}}" name="quantity" type="text" class="form-control"  placeholder="quantity">
                        @error('quantity')
                        {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">image</label>
                      <div class="col-sm-10">
                        <input name="image" type="file" class="form-control"  placeholder="image">
                        @error('image')
                        {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">add</button>

                </div>
</form>
            </div>
        </div>
        </div>
    </div>

    </section>
        </div>
        <!-- /.content -->


    @endsection
