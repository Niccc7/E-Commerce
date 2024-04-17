@extends('Template.Dashboard.index')
@section('content')
<div class="main-content-innere">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center mt-3">Halaman {{ $title }}</h1>
                    <a class="btn btn-primary mb-3 mt-3" style="font-size: 14px" href="{{ route('admin.export') }}">Export To Excel</a>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable2" class="text-center" width="100%">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Order Date</th>
                                    <th>Subtotal</th>
                                    <th>Diskon</th>
                                    <th>Total</th>
                                    <th>Delivered Date</th>
                                    <th>Canceled Date</th>
                                    <th>Status Order</th>
                                    <th>Pembeli</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                    <td>Rp {{ number_format($order->subtotal,0, ',', '.') }}</td>
                                    <td>{{ $order->discount }}%</td>
                                    <td>Rp {{ number_format($order->total,0, ',', '.') }}</td>
                                    <td>{{ $order->delivered_date }}</td>
                                    <td>
                                        <span class="badge text-bg-danger">
                                            {{ $order->canceled_date ?? 'tidak dibatalkan'}}
                                        </span>
                                    </td>
                                    <td>
                                        @if($order->status_order === 'done')
                                        <span class="badge text-bg-success">{{ $order->status_order }}</span>
                                        @elseif($order->status_order === 'pending')
                                        <span class="badge text-bg-warning">{{ $order->status_order }}</span>
                                        @else
                                        <span class="badge text-bg-danger">{{ $order->status_order }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('admin.order-detail', ['id' => $order->id]) }}">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection