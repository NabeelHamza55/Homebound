@extends('layout.header')
@section('main')
<div class="main-wrapper">
    <div class="dashboard-page">
        <div class="dashboard-row d-flex">
            @include('layout.sidebarmanu')
            <div class="dashboard-column right-content">

                <div class="top-header d-flex align-items-center">

                    <div class="top-title">

                        <h1>Existing Orders</h1>

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

                    <div class="save-order-filters d-flex align-items-center">

                        <div class="top-md-title">

                            <h2>Existing Orders:  <span>04</span></h2>

                        </div>

                        <div class="order-filter">

                            <select class="form-control">

                                <option>Filter for Orders</option>

                                <option>Filter for Orders</option>

                                <option>Filter for Orders</option>

                                <option>Filter for Orders</option>

                            </select>

                        </div>

                    </div>

                    <div class="save-order-table">

                        <div class="table-responsive">

                            <table class="table filter-table">

                                <tr>

                                    <td class="order-column" width="40%">

                                        <div class="order-row d-flex align-items-center">

                                            <div class="order-img">

                                                <img src="images/product-img.png">

                                            </div>

                                            <div class="order-text">

                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>

                                            </div>

                                        </div>

                                    </td>

                                    <td width="20%" align="center">

                                        <span>QTY</span>

                                        <strong>2</strong>

                                    </td>

                                    <td width="20%" align="center"><span class="avaible-badge">Active</span></td>

                                    <td width="20%" align="right">

                                        <div class="dropdown action-dropdown">

                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                                                <img src="images/dot-icon.png">

                                            </button>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li><a class="dropdown-item" href="#"><img src="images/pencil-icon.png">  Edit</a></li>

                                                <li><a class="dropdown-item" href="#"><img src="images/trash-icon.png"> Delete</a></li>

                                            </ul>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td colspan="4" class="bg-transparent" style="height: 10px;"></td>

                                </tr>

                                <tr>

                                    <td class="order-column" width="40%">

                                        <div class="order-row d-flex align-items-center">

                                            <div class="order-img">

                                                <img src="images/product-img.png">

                                            </div>

                                            <div class="order-text">

                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>

                                            </div>

                                        </div>

                                    </td>

                                    <td width="20%" align="center">

                                        <span>QTY</span>

                                        <strong>2</strong>

                                    </td>

                                    <td width="20%" align="center"><span class="cancel-badge">Cancel</span></td>

                                    <td width="20%" align="right">

                                        <div class="dropdown action-dropdown">

                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                                                <img src="images/dot-icon.png">

                                            </button>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                <li><a class="dropdown-item" href="#"><img src="images/pencil-icon.png">  Edit</a></li>

                                                <li><a class="dropdown-item" href="#"><img src="images/trash-icon.png"> Delete</a></li>

                                            </ul>

                                        </div>

                                    </td>

                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection
