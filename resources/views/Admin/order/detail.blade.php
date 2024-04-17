@extends('Template.Dashboard.index')
@section('content')
<div class="main-content-innere">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-3" href="{{ route('admin.order') }}">Back To Order</a>
                    <h4 class="header-title text-center mt-3">Halaman Orders Detail</h1>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable2" class="text-center" width="100%">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->products->name}}</td>
                                    <td>Rp{{ number_format($order->price,0, ',', '.') }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>Rp{{ number_format($order->price * $order->quantity,0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center mt-3">Halaman Orders Detail</h1>
                    <a class="btn btn-primary mb-3" href="{{ route('admin.order') }}">Back To Order</a>
                    <div class="data-tables">
                        <table width="100%" id="dataTable" class="table dt-responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->products->name}}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>Rp {{ $order->price * $order->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection