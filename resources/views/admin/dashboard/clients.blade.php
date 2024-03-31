@extends('admin.layouts.dashboard')
@section('title', 'Clients')
@section('content')
    <div class="dashboard-column right-content p-0">
        <section>
            <div class="container">
                <div class="row d-flex mt-4">
                    <div class="col-md-6">
                        <h4>Properties</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.01 18.735L21.51 16.245C21.195 15.69 20.91 14.64 20.91 14.025V10.23C20.91 6.705 18.84 3.66 15.855 2.235C15.075 0.855 13.635 0 11.985 0C10.35 0 8.87997 0.885 8.09997 2.28C5.17497 3.735 3.14998 6.75 3.14998 10.23V14.025C3.14998 14.64 2.86497 15.69 2.54997 16.23L1.03498 18.735C0.434975 19.74 0.299975 20.85 0.674975 21.87C1.03498 22.875 1.88998 23.655 2.99998 24.03C5.90998 25.02 8.96998 25.5 12.03 25.5C15.09 25.5 18.15 25.02 21.06 24.045C22.11 23.7 22.92 22.905 23.31 21.87C23.7 20.835 23.595 19.695 23.01 18.735Z"
                                fill="#B38A51" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        <!-- 2nd search section  -->
        <section style="margin-bottom: 1.5rem;">
            <div class="container">
                <div style="border-bottom: 2px solid #ebebeb;" class="row d-flex mt-4">
                    <div class="col-md-6">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.4167 24.5C19.5378 24.5 24.5 19.5378 24.5 13.4167C24.5 7.29551 19.5378 2.33333 13.4167 2.33333C7.29552 2.33333 2.33334 7.29551 2.33334 13.4167C2.33334 19.5378 7.29552 24.5 13.4167 24.5Z"
                                stroke="#B38A51" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M25.6667 25.6667L23.3333 23.3333" stroke="#B38A51" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input style="border: none; background: none; outline: none;" placeholder="Search here"
                            type="text">
                    </div>
                    <div class="col-md-6 d-flex justify-content-end p-0">
                        <section class="back-home1">
                            <a href="#" class="back-to-home-btn ms-4">Add Property</a>
                            <a href="#" class="back-to-home-btn1 ms-2">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.10425 9.57657H28.7297" stroke="#B38A51" stroke-width="2.46254"
                                        stroke-linecap="round" />
                                    <path d="M8.2085 16.417H24.6254" stroke="#B38A51" stroke-width="2.46254"
                                        stroke-linecap="round" />
                                    <path d="M13.6808 23.2574H19.1531" stroke="#B38A51" stroke-width="2.46254"
                                        stroke-linecap="round" />
                                </svg> Filter</a>

                        </section>

                    </div>
                </div>
            </div>

        </section>

        <div class="dashboard-content">

            <div class="save-order-table">
                <div class="table-responsive">
                    <table style="background-color: #ffff;" class="table filter-table">
                        <tr>
                            <td class="order-column" width="40%">
                                <div class="order-row d-flex align-items-center">
                                    <div class="order-img">
                                        <img style=" width: 3.5rem; margin-right: 0.5rem;" src="images/Rectangle 109.png">
                                    </div>
                                    <div class="order-text">
                                        <p style="font-weight: 600;">Rayna Curtis</p>
                                    </div>
                                    <div style="margin-left: 2rem;" class="order-text ">
                                        <span>Phone number</span>
                                        <p style="font-weight: 600;">(202) 456 7890</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>Email</span>
                                <p style="font-weight: 600;">mail@gmail.com</p>
                            </td>
                            <td width="20%" align="center">
                                <span>Address</span>
                                <p style="font-weight: 600;">234 Washington, DC</p>
                            </td>
                            <td width="20%">
                                <div class="d-flex justify-content-end
                            pe-">
                                    <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                    </a>
                                    <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png" alt="Delete">
                                    </a>
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
                                        <img style=" width: 3.5rem; margin-right: 0.5rem;" src="images/Rectangle 109.png">
                                    </div>
                                    <div class="order-text">
                                        <p style="font-weight: 600;">Rayna Curtis</p>
                                    </div>
                                    <div style="margin-left: 2rem;" class="order-text ">
                                        <span>Phone number</span>
                                        <p style="font-weight: 600;">(202) 456 7890</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>Email</span>
                                <p style="font-weight: 600;">mail@gmail.com</p>
                            </td>
                            <td width="20%" align="center">
                                <span>Address</span>
                                <p style="font-weight: 600;">234 Washington, DC</p>
                            </td>
                            <td width="20%">
                                <div class="d-flex justify-content-end
                            pe-">
                                    <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                    </a>
                                    <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png"
                                            alt="Delete">
                                    </a>
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
                                        <img style=" width: 3.5rem; margin-right: 0.5rem;" src="images/Rectangle 109.png">
                                    </div>
                                    <div class="order-text">
                                        <p style="font-weight: 600;">Rayna Curtis</p>
                                    </div>
                                    <div style="margin-left: 2rem;" class="order-text ">
                                        <span>Phone number</span>
                                        <p style="font-weight: 600;">(202) 456 7890</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>Email</span>
                                <p style="font-weight: 600;">mail@gmail.com</p>
                            </td>
                            <td width="20%" align="center">
                                <span>Address</span>
                                <p style="font-weight: 600;">234 Washington, DC</p>
                            </td>
                            <td width="20%">
                                <div class="d-flex justify-content-end
                            pe-">
                                    <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                    </a>
                                    <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png"
                                            alt="Delete">
                                    </a>
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
                                        <img style=" width: 3.5rem; margin-right: 0.5rem;" src="images/Rectangle 109.png">
                                    </div>
                                    <div class="order-text">
                                        <p style="font-weight: 600;">Rayna Curtis</p>
                                    </div>
                                    <div style="margin-left: 2rem;" class="order-text ">
                                        <span>Phone number</span>
                                        <p style="font-weight: 600;">(202) 456 7890</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>Email</span>
                                <p style="font-weight: 600;">mail@gmail.com</p>
                            </td>
                            <td width="20%" align="center">
                                <span>Address</span>
                                <p style="font-weight: 600;">234 Washington, DC</p>
                            </td>
                            <td width="20%">
                                <div class="d-flex justify-content-end
                            pe-">
                                    <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                    </a>
                                    <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png"
                                            alt="Delete">
                                    </a>
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
                                        <img style=" width: 3.5rem; margin-right: 0.5rem;" src="images/Rectangle 109.png">
                                    </div>
                                    <div class="order-text">
                                        <p style="font-weight: 600;">Rayna Curtis</p>
                                    </div>
                                    <div style="margin-left: 2rem;" class="order-text ">
                                        <span>Phone number</span>
                                        <p style="font-weight: 600;">(202) 456 7890</p>
                                    </div>
                                </div>
                            </td>
                            <td width="20%" align="center">
                                <span>Email</span>
                                <p style="font-weight: 600;">mail@gmail.com</p>
                            </td>
                            <td width="20%" align="center">
                                <span>Address</span>
                                <p style="font-weight: 600;">234 Washington, DC</p>
                            </td>
                            <td width="20%">
                                <div class="d-flex justify-content-end
                            pe-">
                                    <a class="eye-box mx-2" href="#"><img src="images/eye.png" alt="Edit">
                                    </a>
                                    <a class="bin-box ms-2" href="#"><img src="images/trash-icon.png"
                                            alt="Delete">
                                    </a>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="4" class="bg-transparent" style="height: 10px;"></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
