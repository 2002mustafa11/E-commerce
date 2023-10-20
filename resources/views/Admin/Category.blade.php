@extends('Admin.master.index')
@section('container')
<div class="content-wrapper">
    <!-- Main content -->
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
              <!-- /.card-header -->
              @if(isset($category))
              <form class="form-horizontal" method="post" action='{{ route("dashboard.category.update",$category->id) }}'enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')

                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control"  placeholder="Category">
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">category</label>
                      <div class="col-sm-10">
                        <select name="category" >
                            <option >select category</option>
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
                      <label for="inputEmail3" class="col-sm-2 col-form-label">image</label>
                      <div class="col-sm-10">
                        <input name="image" type="file" class="form-control"  placeholder="image">
                        @error('image')
                        {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">add</button>

                </div>
                <!-- /.card-footer -->
              </form>
              @else
              <!-- form start -->
              <form class="form-horizontal" method="post" action='{{ route("dashboard.category.store") }}'enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control"  placeholder="Category">
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">category</label>
                      <div class="col-sm-10">
                        <select name="category" >
                            <option >select category</option>
                                @foreach ( $categories as $category )
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
                      <label for="inputEmail3" class="col-sm-2 col-form-label">image</label>
                      <div class="col-sm-10">
                        <input name="image" type="file" class="form-control"  placeholder="image">
                        @error('image')
                        {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">add</button>

                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            @endif
        </div>
        </div>
        <!-- /.row -->
        {{-- @dd($categories) --}}
@if(isset($categories))
<div class="card">
  <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 30%">Name</th>
                            <th style="width: 10px">Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $category->name }}</td>
                            <td><span class="badge bg-danger">{{ $category->products_count }}</span></td>
                            <td>
                                <a class="badge bg-primary" href="{{ route('dashboard.category.edit', $category->id) }}">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="{{ route('dashboard.category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger">Destroy</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
              <div class="card-footer clearfix">

                </div>
              </div>
@endif
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>

@endsection


