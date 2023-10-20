@extends('Admin.master.index')
@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
@if(isset($products))
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
                      <th style="width: 30%">image</th>
                      <th style="width: 20%">name</th>
                      <th style="width: 20%">category</th>
                      <th style="width: 10px">quantity</th>
                      <th >action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                    <td><img src="{{asset('market/images/product/'.$product->image)}}"width="70px"  height="auto"  alt="{{ $product->image }}"> </td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->category }}</td>
                      <td><span class="badge bg-danger">{{ $product->sold}}</span></td>
                      {{-- <td><span class="badge bg-danger">{{ $product->sold}}</span></td> --}}
                      <td>
                        <a class="badge " href="{{ route('dashboard.product.edit',$product->id) }}">edit</a>
                        <form action="{{ route('dashboard.product.destroy',$product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="destroy">
                        </form>

                      </td>
                    </tr>
                    @endforeach
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $products->links() }}
                </div>
              </div>
@endif
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>

@endsection


