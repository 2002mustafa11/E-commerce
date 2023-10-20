@extends('Admin.master.index')
@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
@if(isset($messages))
<div class="card">
  <div class="card-header">
                <h3 class="card-title">Bmessageed Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bmessageed">
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
                    @foreach($messages as $message)
                    <tr>
                      <td>{{ $loop->iteration }}.</td>

                      <td>{{ $message->created_at }}</td>
                    <td><span class="badge bg-danger">
                    {{$message->user->phone}}
                    </span></td>
                      <td>
                        {{$message->message}}
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


