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
              @if(isset($setting))
              <form class="form-horizontal" method="post" action='{{ route("dashboard.Setting.update",$setting->id) }}'enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')

                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Setting</label>
                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control"  placeholder="Setting">
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
                <!-- /.card-footer -->
              </form>
              @else
              <!-- form start -->

            </div>
            @endif
        </div>
        </div>
        <!-- /.row -->
@if(isset($settings))
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
                      <th style="width: 30%">name</th>
                      <th style="width: 10px">quantity</th>
                      <th >action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($settings as $setting)
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                      <td>{{ $setting->key }}</td>
                      <td><span class="badge bg-danger">{{ $setting->value }}</span></td>
                      <td>
                        <a class="badge " href="{{ route('dashboard.Setting.edit',$setting->id) }}">edit</a>


                      </td>
                    </tr>
                    @endforeach
                </table>
              </div>
              <!-- /.card-body -->
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


