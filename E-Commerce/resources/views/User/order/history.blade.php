@extends('Template.Dashboard.index')

@section('content')
    <div class="main-content-innere">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-center mt-3">Halaman {{ $title }}, {{ auth()->user()->name }}
                            </h1>
                            <div class="data-tables">
                                <table width="100%" id="dataTable" class="table dt-responsive">
                                    <thead class="bg-light text-capitalize">
                                        <tr>
                                            <th>No</th>
                                            <th>Subtotal</th>
                                            <th>Diskon</th>
                                            <th>Total</th>
                                            <th>Delivered Date</th>
                                            <th>Canceled Date</th>
                                            <th>Status Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Rp {{ $order['subtotal'] }}</td>
                                                <td>{{ $order['discount'] }}%</td>
                                                <td>Rp {{ $order['total'] }}</td>
                                                <td>{{ $order['delivered_date'] }}</td>
                                                <td>
                                                    <span class="badge text-bg-danger">{{ $order['canceled_date'] ?? 'tidak dibatalkan' }}</span>
                                                </td>
                                                <td>
                                                    @if($order['status_order'] === 'done')
                                                    <span class="badge text-bg-success">{{ $order['status_order'] }}</span>
                                                    @elseif($order['status_order'] === 'pending')
                                                    <span class="badge text-bg-warning">{{ $order['status_order'] }}</span>
                                                    @else
                                                    <span class="badge text-bg-danger">{{ $order['status_order'] }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-info"
                                                        href="{{ route('user.history-detail', $order['id']) }}">detail</a>
                                                </td>
                                            </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
