@extends('admin.layouts.dashboard')
@section('title', 'Properties')
@section('content')
    <div class="dashboard-column right-content">
        <!-- jawad edit  -->
        <!-- properties section  -->
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
        <section>
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
        <!-- cards section  -->
        <div class="container">
            <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col col-md-4">
                        <div class="card">
                            <img src="images/Rectangle 109 (1).png" class="card-img-top" alt="...">
                            <div style="font-size: 12px; padding: 0; padding-left: 5px;" class="card-body">
                                <h6 class="card-title fw-700 pt-3 pb-1">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.1095 5.89004C13.3013 2.33375 10.1992 0.732651 7.47421 0.732651C7.47421 0.732651 7.47421 0.732651 7.46651 0.732651C4.74926 0.732651 1.63943 2.32605 0.831186 5.88234C-0.0694321 9.8543 2.36301 13.2182 4.56452 15.335C5.38047 16.1201 6.42734 16.5127 7.47421 16.5127C8.52108 16.5127 9.56796 16.1201 10.3762 15.335C12.5777 13.2182 15.0102 9.862 14.1095 5.89004ZM7.47421 9.74654C6.13483 9.74654 5.04947 8.66117 5.04947 7.32179C5.04947 5.98241 6.13483 4.89705 7.47421 4.89705C8.81359 4.89705 9.89895 5.98241 9.89895 7.32179C9.89895 8.66117 8.81359 9.74654 7.47421 9.74654Z"
                                            fill="#B38A51" />
                                    </svg>
                                    Kimberly Armstrong Co.
                                </h6>
                                <p style="border-bottom: 1px solid #e5e5e5; padding-bottom: 4px;" class="card-text">Lorem
                                    Ipsum
                                    is simply
                                    dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's</p>
                            </div>
                            <div style="padding: 1rem;" class="row">

                                <div class="col-md-3 p-0">
                                    <img class="pe-1" src="images/1.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/2.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/3.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/4.png" alt="">
                                </div>
                                <div class=" d-flex p-0 mt-3">
                                    <button
                                        style="padding: 10px 38px;background-color: #ffff; border: 1px solid #B38A51;border-radius: 12px;"
                                        class="btn ms-1 back-to-home-btn1">Edit</button>
                                    <button
                                        style="padding: 10px 35px;  background-color: #FF0000; color: #ffff; border-radius: 12px;"
                                        class=" btn ms-2">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card">
                            <img src="images/Rectangle 109 (2).png" class="card-img-top" alt="...">
                            <div style="font-size: 12px; padding: 0; padding-left: 5px;" class="card-body">
                                <h6 class="card-title fw-700 pt-3 pb-1">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.1095 5.89004C13.3013 2.33375 10.1992 0.732651 7.47421 0.732651C7.47421 0.732651 7.47421 0.732651 7.46651 0.732651C4.74926 0.732651 1.63943 2.32605 0.831186 5.88234C-0.0694321 9.8543 2.36301 13.2182 4.56452 15.335C5.38047 16.1201 6.42734 16.5127 7.47421 16.5127C8.52108 16.5127 9.56796 16.1201 10.3762 15.335C12.5777 13.2182 15.0102 9.862 14.1095 5.89004ZM7.47421 9.74654C6.13483 9.74654 5.04947 8.66117 5.04947 7.32179C5.04947 5.98241 6.13483 4.89705 7.47421 4.89705C8.81359 4.89705 9.89895 5.98241 9.89895 7.32179C9.89895 8.66117 8.81359 9.74654 7.47421 9.74654Z"
                                            fill="#B38A51" />
                                    </svg>
                                    Kimberly Armstrong Co.
                                </h6>
                                <p style="border-bottom: 1px solid #e5e5e5; padding-bottom: 4px;" class="card-text">Lorem
                                    Ipsum
                                    is simply
                                    dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's</p>
                            </div>
                            <div style="padding: 1rem;" class="row">

                                <div class="col-md-3 p-0">
                                    <img class="pe-1" src="images/1.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/2.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/3.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/4.png" alt="">
                                </div>
                                <div class=" d-flex p-0 mt-3">
                                    <button
                                        style="padding: 10px 38px;background-color: #ffff; border: 1px solid #B38A51;border-radius: 12px;"
                                        class="btn ms-1 back-to-home-btn1">Edit</button>
                                    <button
                                        style="padding: 10px 35px;  background-color: #FF0000; color: #ffff; border-radius: 12px;"
                                        class=" btn ms-2">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card">
                            <img src="images/Rectangle 109 (3).png" class="card-img-top" alt="...">
                            <div style="font-size: 12px; padding: 0; padding-left: 5px;" class="card-body">
                                <h6 class="card-title fw-700 pt-3 pb-1">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.1095 5.89004C13.3013 2.33375 10.1992 0.732651 7.47421 0.732651C7.47421 0.732651 7.47421 0.732651 7.46651 0.732651C4.74926 0.732651 1.63943 2.32605 0.831186 5.88234C-0.0694321 9.8543 2.36301 13.2182 4.56452 15.335C5.38047 16.1201 6.42734 16.5127 7.47421 16.5127C8.52108 16.5127 9.56796 16.1201 10.3762 15.335C12.5777 13.2182 15.0102 9.862 14.1095 5.89004ZM7.47421 9.74654C6.13483 9.74654 5.04947 8.66117 5.04947 7.32179C5.04947 5.98241 6.13483 4.89705 7.47421 4.89705C8.81359 4.89705 9.89895 5.98241 9.89895 7.32179C9.89895 8.66117 8.81359 9.74654 7.47421 9.74654Z"
                                            fill="#B38A51" />
                                    </svg>
                                    Kimberly Armstrong Co.
                                </h6>
                                <p style="border-bottom: 1px solid #e5e5e5; padding-bottom: 4px;" class="card-text">Lorem
                                    Ipsum
                                    is simply
                                    dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's</p>
                            </div>
                            <div style="padding: 1rem;" class="row">

                                <div class="col-md-3 p-0">
                                    <img class="pe-1" src="images/1.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/2.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/3.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/4.png" alt="">
                                </div>
                                <div class=" d-flex p-0 mt-3">
                                    <button
                                        style="padding: 10px 38px;background-color: #ffff; border: 1px solid #B38A51;border-radius: 12px;"
                                        class="btn ms-1 back-to-home-btn1">Edit</button>
                                    <button
                                        style="padding: 10px 35px;  background-color: #FF0000; color: #ffff; border-radius: 12px;"
                                        class=" btn ms-2 ">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card">
                            <img src="images/Rectangle 109 (1).png" class="card-img-top" alt="...">
                            <div style="font-size: 12px; padding: 0; padding-left: 5px;" class="card-body">
                                <h6 class="card-title fw-700 pt-3 pb-1">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.1095 5.89004C13.3013 2.33375 10.1992 0.732651 7.47421 0.732651C7.47421 0.732651 7.47421 0.732651 7.46651 0.732651C4.74926 0.732651 1.63943 2.32605 0.831186 5.88234C-0.0694321 9.8543 2.36301 13.2182 4.56452 15.335C5.38047 16.1201 6.42734 16.5127 7.47421 16.5127C8.52108 16.5127 9.56796 16.1201 10.3762 15.335C12.5777 13.2182 15.0102 9.862 14.1095 5.89004ZM7.47421 9.74654C6.13483 9.74654 5.04947 8.66117 5.04947 7.32179C5.04947 5.98241 6.13483 4.89705 7.47421 4.89705C8.81359 4.89705 9.89895 5.98241 9.89895 7.32179C9.89895 8.66117 8.81359 9.74654 7.47421 9.74654Z"
                                            fill="#B38A51" />
                                    </svg>
                                    Kimberly Armstrong Co.
                                </h6>
                                <p style="border-bottom: 1px solid #e5e5e5; padding-bottom: 4px;" class="card-text">Lorem
                                    Ipsum
                                    is simply
                                    dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's</p>
                            </div>
                            <div style="padding: 1rem;" class="row">

                                <div class="col-md-3 p-0">
                                    <img class="pe-1" src="images/1.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/2.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/3.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/4.png" alt="">
                                </div>
                                <div class=" d-flex p-0 mt-3">
                                    <button
                                        style="padding: 10px 38px;background-color: #ffff; border: 1px solid #B38A51;border-radius: 12px;"
                                        class="btn ms-1 back-to-home-btn1">Edit</button>
                                    <button
                                        style="padding: 10px 35px;  background-color: #FF0000; color: #ffff; border-radius: 12px;"
                                        class=" btn ms-2">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card">
                            <img src="images/Rectangle 109 (2).png" class="card-img-top" alt="...">
                            <div style="font-size: 12px; padding: 0; padding-left: 5px;" class="card-body">
                                <h6 class="card-title fw-700 pt-3 pb-1">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.1095 5.89004C13.3013 2.33375 10.1992 0.732651 7.47421 0.732651C7.47421 0.732651 7.47421 0.732651 7.46651 0.732651C4.74926 0.732651 1.63943 2.32605 0.831186 5.88234C-0.0694321 9.8543 2.36301 13.2182 4.56452 15.335C5.38047 16.1201 6.42734 16.5127 7.47421 16.5127C8.52108 16.5127 9.56796 16.1201 10.3762 15.335C12.5777 13.2182 15.0102 9.862 14.1095 5.89004ZM7.47421 9.74654C6.13483 9.74654 5.04947 8.66117 5.04947 7.32179C5.04947 5.98241 6.13483 4.89705 7.47421 4.89705C8.81359 4.89705 9.89895 5.98241 9.89895 7.32179C9.89895 8.66117 8.81359 9.74654 7.47421 9.74654Z"
                                            fill="#B38A51" />
                                    </svg>
                                    Kimberly Armstrong Co.
                                </h6>
                                <p style="border-bottom: 1px solid #e5e5e5; padding-bottom: 4px;" class="card-text">Lorem
                                    Ipsum
                                    is simply
                                    dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's</p>
                            </div>
                            <div style="padding: 1rem;" class="row">

                                <div class="col-md-3 p-0">
                                    <img class="pe-1" src="images/1.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/2.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/3.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/4.png" alt="">
                                </div>
                                <div class=" d-flex p-0 mt-3">
                                    <button
                                        style="padding: 10px 38px;background-color: #ffff; border: 1px solid #B38A51;border-radius: 12px;"
                                        class="btn ms-1 back-to-home-btn1">Edit</button>
                                    <button
                                        style="padding: 10px 35px;  background-color: #FF0000; color: #ffff; border-radius: 12px;"
                                        class=" btn ms-2">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card">
                            <img src="images/Rectangle 109 (3).png" class="card-img-top" alt="...">
                            <div style="font-size: 12px; padding: 0; padding-left: 5px;" class="card-body">
                                <h6 class="card-title fw-700 pt-3 pb-1">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.1095 5.89004C13.3013 2.33375 10.1992 0.732651 7.47421 0.732651C7.47421 0.732651 7.47421 0.732651 7.46651 0.732651C4.74926 0.732651 1.63943 2.32605 0.831186 5.88234C-0.0694321 9.8543 2.36301 13.2182 4.56452 15.335C5.38047 16.1201 6.42734 16.5127 7.47421 16.5127C8.52108 16.5127 9.56796 16.1201 10.3762 15.335C12.5777 13.2182 15.0102 9.862 14.1095 5.89004ZM7.47421 9.74654C6.13483 9.74654 5.04947 8.66117 5.04947 7.32179C5.04947 5.98241 6.13483 4.89705 7.47421 4.89705C8.81359 4.89705 9.89895 5.98241 9.89895 7.32179C9.89895 8.66117 8.81359 9.74654 7.47421 9.74654Z"
                                            fill="#B38A51" />
                                    </svg>
                                    Kimberly Armstrong Co.
                                </h6>
                                <p style="border-bottom: 1px solid #e5e5e5; padding-bottom: 4px;" class="card-text">Lorem
                                    Ipsum
                                    is simply
                                    dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's</p>
                            </div>
                            <div style="padding: 1rem;" class="row">

                                <div class="col-md-3 p-0">
                                    <img class="pe-1" src="images/1.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/2.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/3.png" alt="">
                                </div>
                                <div class="col-md-3 p-0"><img class="pe-1" src="images/4.png" alt="">
                                </div>
                                <div class=" d-flex p-0 mt-3">
                                    <button
                                        style="padding: 10px 38px;background-color: #ffff; border: 1px solid #B38A51;border-radius: 12px;"
                                        class="btn ms-1 back-to-home-btn1">Edit</button>
                                    <button
                                        style="padding: 10px 35px;  background-color: #FF0000; color: #ffff; border-radius: 12px;"
                                        class=" btn ms-2">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- <div class="dashboard-content">
                <div class="add-properties"> -->


    </div>

@endsection
