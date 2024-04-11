@extends('admin.layouts.dashboard')
@section('title', 'Orders')
@section('content')
    <div class="dashboard-column right-content">
        <div class="top-header d-flex align-items-center">
            <div class="top-title">
                <h1>Total Orders</h1>
            </div>
            <div class="right-head-button d-flex align-items-center">
                <div class="dropdown bell-dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
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

            <div class="save-order-table">
                <div class="table-responsive">
                    <table class="table filter-table">
                        @foreach ($collection as $data)
                            <tr>
                                <td class="order-column" width="40%">
                                    <div class="order-row d-flex align-items-center">
                                        <div class="order-img">
                                            <img src="images/product-img.png">
                                        </div>
                                        <div class="order-text">
                                            <p>{{ $data->book_title }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td width="20%" align="center">
                                    <span>QTY</span>
                                    <strong>{{ $data->quantity }}</strong>
                                </td>
                                <td width="20%" align="center"><span class="avaible-badge">Active</span></td>
                                <td width="20%" align="right">
                                    <div class="dropdown action-dropdown d-flex justify-content-end">
                                        <div class="d-flex">
                                            <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                            </a>
                                            <a class="bin-box ms-2"
                                                href="{{ route('admin.orders.delete', $data->id) }}"><img
                                                    src="images/trash-icon.png" alt="Delete">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bg-transparent" style="height: 10px;"></td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td class="order-column" width="40%">
                                <div class="order-row d-flex align-items-center">
                                    <div class="order-img">
                                        <img src="images/product-img.png">
                                    </div>
                                    <div class="order-text">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>QTY</span>
                                <strong>2</strong>
                            </td>
                            <td width="20%" align="center"><span class="avaible-badge">Active</span></td>
                            <td width="20%" align="right">
                                <div class="dropdown action-dropdown d-flex justify-content-end">
                                    <div class="d-flex">
                                        <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                        </a>
                                        <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png"
                                                alt="Delete">
                                        </a>
                                    </div>
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
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>QTY</span>
                                <strong>2</strong>
                            </td>
                            <td width="20%" align="center"><span class="avaible-badge">Active</span></td>
                            <td width="20%" align="right">
                                <div class="dropdown action-dropdown d-flex justify-content-end">
                                    <div class="d-flex">
                                        <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                        </a>
                                        <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png"
                                                alt="Delete">
                                        </a>
                                    </div>
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
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>QTY</span>
                                <strong>2</strong>
                            </td>
                            <td width="20%" align="center"><span class="avaible-badge">Active</span></td>
                            <td width="20%" align="right">
                                <div class="dropdown action-dropdown d-flex justify-content-end">
                                    <div class="d-flex">
                                        <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                        </a>
                                        <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png"
                                                alt="Delete">
                                        </a>
                                    </div>
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
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>QTY</span>
                                <strong>2</strong>
                            </td>
                            <td width="20%" align="center"><span class="avaible-badge">Active</span></td>
                            <td width="20%" align="right">
                                <div class="dropdown action-dropdown d-flex justify-content-end">
                                    <div class="d-flex">
                                        <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                        </a>
                                        <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png"
                                                alt="Delete">
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="bg-transparent" style="height: 10px;"></td>
                        </tr> --}}

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
