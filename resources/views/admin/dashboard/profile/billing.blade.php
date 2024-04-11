@extends('layout.header')
@section('main')
<div class="main-wrapper">
    <div class="dashboard-page">
        <div class="dashboard-row d-flex">
            @include('layout.sidebarmanu')
            <div class="dashboard-column right-content">
                <div class="top-header d-flex align-items-center">
                    <div class="top-title">
                        <h1>Account</h1>
                    </div>
                    <div class="right-head-button d-flex align-items-center">
                        <div class="dropdown bell-dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bell-icon"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dashbaord-banner">
                </div>
            <div class="dashboard-content">
					<div class="add-properties">
						<form action="{{route('billing.store')}}" method=post class="upload-property-form">
						    @csrf
							<div class="row">
								<div class="col-lg-4 col-md-4 form-group">
									<label>Account Holder Name</label>
									<input type="text" class="form-control" name="name" value="{{$billing->name ?? ''}}" required>
								</div>
								<div class="col-lg-4 col-md-4 form-group">
									<label>Credit Card Number</label>
									<input type="text" class="form-control" name="credit_card_number" value="{{$billing->credit_card_number ?? ''}}" required>
								</div>
								<div class="col-lg-4 col-md-4 form-group">
									<label>CVC Number</label>
									<input type="text" class="form-control" name="cvc_number" value="{{$billing->cvc_number ?? ''}}" required>
								</div>
								<div class="col-lg-4 col-md-4 form-group">
									<label>Expiration Date</label>
									<input type="text" class="form-control" name="expire_date" value="{{$billing->expire_date ?? ''}}" required>
								</div>
								<div class="col-lg-4 col-md-4 form-group">
									<label>Country</label>
									<input type="text" class="form-control" name="country" value="{{$billing->country ?? ''}}" required>
								</div>
								<div class="col-lg-4 col-md-4 form-group">
									<label>City</label>
									<input type="text" class="form-control" name="city" value="{{$billing->city ?? ''}}" required>
								</div>
								<div class="col-lg-4 col-md-4 form-group">
									<label>State</label>
									<input type="text" class="form-control" name="state" value="{{$billing->state ?? ''}}" required>
								</div>
								<div class="col-lg-4 col-md-4 form-group">
									<label>Zip Code</label>
									<input type="text" class="form-control" name="zip_code" value="{{$billing->zip_code ?? ''}}" required>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 upload-property-button d-flex">
									<button class="btn cst-res-button">Back</button>
									<button type=submit class="btn cst-yellow-button">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
