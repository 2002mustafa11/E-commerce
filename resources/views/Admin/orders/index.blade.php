@extends('Admin.master.index')
@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
@if(isset($orders))
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
                      <th style="width: 20%">created_at</th>
                      <th style="width: 10px">quantity</th>
                      <th >action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                    {{-- <td><img src="{{asset('market/images/order/'.$order->image)}}"width="70px"  height="auto"  alt="{{ $order->image }}"> </td> --}}
                      {{-- <td>{{ $order->name }}</td> --}}
                      <td>{{ $order->created_at }}</td>
                    <td><span class="badge bg-danger">
                        <a class="badge " href="{{ route('dashboard.order.show',$order->id) }}">show</a>
                    </span></td>
                      <td>
                        {{-- <a class="badge " href="">edit</a> --}}
                        <form action="{{ route('dashboard.order.update',$order->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="submit" value="update">
                        </form>

                        <form action="{{ route('dashboard.order.destroy',$order->id) }}" method="post">
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

                </div>
              </div>
@endif
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>

@endsection


