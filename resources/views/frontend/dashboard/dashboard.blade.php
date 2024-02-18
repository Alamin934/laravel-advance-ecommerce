@extends('frontend.layouts.app')

@section('dashboard-content')
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card bg-success">
            <div class="card-body text-center">
                <a href="" class="text-white">My Total Order</a>
                <p class="text-white mb-0">15</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning">
            <div class="card-body text-center">
                <a href="" class="text-white">My Total Order</a>
                <p class="text-white mb-0">15</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info">
            <div class="card-body text-center">
                <a href="" class="text-white">My Total Order</a>
                <p class="text-white mb-0">15</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-danger">
            <div class="card-body text-center">
                <a href="" class="text-white">My Total Order</a>
                <p class="text-white mb-0">15</p>
            </div>
        </div>
    </div>
</div>
{{-- Recent Order --}}
<div class="mt-3">
    <h3>Recent Orders</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection