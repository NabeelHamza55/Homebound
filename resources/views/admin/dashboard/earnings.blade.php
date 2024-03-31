@extends('admin.layouts.dashboard')
@section('title', 'Earnings')
@section('content')
    <div class="dashboard-column right-content">
        <div class="dashboard-content mt-5 pt-5">
            <div class="dashboard-counter-row d-flex row">
                <div class="col-md-3">
                    <div class="dashboard-counter-column d-flex align-items-center">
                        <div class="counter-image">
                            <img src="images/shopping-cart-icon.png">
                        </div>
                        <div class="counter-text">
                            <span>Total Orders</span>
                            <h3>24</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-counter-column d-flex align-items-center">
                        <div class="counter-image">
                            <img src="images/total amount.png">
                        </div>

                        <div class="counter-text">
                            <span>Total Amount</span>
                            <h3>1.3K</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-counter-column d-flex align-items-center">
                        <div class="counter-image">
                            <img src="images/discount.png">
                        </div>
                        <div class="counter-text">
                            <span>Earnings</span>
                            <h3>4.5K</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-counter-column d-flex align-items-center">
                        <div class="counter-image">
                            <img src="images/owner-icon.png">
                        </div>
                        <div class="counter-text">
                            <span>Cancel orders</span>
                            <h3>76</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-graph graph-text">
                <h2 class="">Total Earnings</h2>
                <span class="fw-bold ">$2.5k</span>
            </div>
            <div class="row">
                <div id="chart" class="col-12"></div>
            </div>
        </div>
    </div>
@endsection
