@extends('Admin.master.index')
@section('container')
<div class="content-wrapper">

<section>
    <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Date</th>
              <th>role</th>
              <th>phone</th>
              <th>Order Count</th>
              <th>total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->created_at }}</td>
              <td><span class="tag tag-success">{{ $user->role }}</span></td>
              <td>{{ $user->phone }}</td>
              <td>{{ $user->orders_count }}</td>
              <td>{{ $user->orders_sum_total }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</section>
</div>
@endsection
