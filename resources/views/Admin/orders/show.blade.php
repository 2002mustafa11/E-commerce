@extends('Admin.master.index')
@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    {{-- <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
@if(isset($products))

<div class="card">
  <div class="card-header">
                <h3 class="card-title">BProducted Table</h3>
              </div>
              <!-- /.card-header -->
              {{$user->name}}
              <br>
              {{$user->phone}}
              <br>
              {{$address}}
              <br>
              {{$created_at}}
              <br>
              <div class="card-body">
                <table class="table table-bProducted">
                  <thead>
                    <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 30%">image</th>
                                    <th style="width: 20%">name</th>

                                    <th style="width: 10px">quantity</th>
                                    <th >total</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>

                    <td>{{ $loop->iteration }}.</td>
                    <td><img src="{{asset('market/images/product/'.$product->image)}}"width="70px"  height="auto"  alt="{{ $product->image }}"> </td>
                    <td>{{ $product->name }}</td>

                    <td>{{ $product->quantity }}</td>
                    <td><span class="badge bg-danger">
                        {{ $product->total }}
                    </span></td>

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
    </section> --}}
    <!-- /.content -->
    <section class="content">
        <div class="container-fluid">
          <!-- /.row -->
          @if(isset($products))
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <strong>Name:</strong> {{$user->name}}
                  </div>
                  <div class="col-md-6">
                    <strong>Phone:</strong> {{$user->phone}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <strong>Address:</strong> {{$address}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <strong>Created At:</strong> {{$created_at}}
                  </div>
                </div>
              </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 30%">Image</th>
                    <th style="width: 20%">Name</th>
                    <th style="width: 10px">Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td><img src="{{asset('market/images/product/'.$product->image)}}" width="70px" height="auto" alt="{{ $product->image }}"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td><span class="badge bg-danger">{{ $product->total }}</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            </div>
          </div>
          @endif
        </div><!-- /.container-fluid -->
      </section>
  </div>
  </div>

@endsection


