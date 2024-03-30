@extends('layout.header')
@section('main')
    <div class="main-wrapper">
        <div class="dashboard-page">
            <div class="dashboard-row d-flex">
                @include('layout.sidebarmanu')
                <div class="dashboard-column right-content">
                    <div class="top-header d-flex align-items-center">
                        <div class="top-title">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="right-head-button d-flex align-items-center">
                            {{--                            <a href="" class="btn golden-button">Add or Search Property</a>--}}
                            <div class="dropdown bell-dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{--                                    <i class="bell-icon"></i>--}}
                                    <a class="btn golden-button">Add or Search Property</a>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{route('add.property')}}">Add Property</a></li>
                                    <li><a class="dropdown-item" href="{{route('search.property')}}">Search Property</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dashbaord-banner">
                    </div>
                    <div class="dashboard-content">
                        <div class="dashboard-counter-row d-flex">
                            <!-- resources/views/property-card.blade.php -->
                            <div class="dashboard-counter-column d-flex align-items-center">
                                <div class="counter-image">
                                    <img src="images/shopping-cart-icon.png">
                                </div>
                                <div class="counter-text">
                                    @php
                                        $Userorders = 0;
                                        if($user->orders )
                                        {
                                            foreach($user->orders as $orders)
                                            {
                                                $Userorders++;
                                            }
                                        }
                                    @endphp
                                    <h3>{{$Userorders ?? 0}}</h3>
                                    <span>Total Order</span>
                                </div>
                            </div>
                            <div class="dashboard-counter-column d-flex align-items-center">
                                <div class="counter-image">
                                    <img src="images/shopping-cart-icon.png">
                                </div>
                                <div class="counter-text">
                                    @php
                                        $UserBooks = 0;
                                        if($user->orders )
                                        {
                                            foreach($user->Books as $book)
                                            {
                                                $UserBooks++;
                                            }
                                        }
                                    @endphp
                                    <h3>{{$UserBooks ?? 0}}</h3>
                                    <span>Total Books</span>
                                </div>
                            </div>
                            <div class="dashboard-counter-column d-flex align-items-center">
                                <div class="counter-image">
                                    <img src="images/buildings-icon.png">
                                </div>
                                <div class="counter-text">
                                    @php
                                        $Userproperties = 0;
                                        if($user->orders )
                                        {
                                            foreach($user->properties as $property)
                                            {
                                                $Userproperties++;
                                            }
                                        }
                                    @endphp
                                    <h3>{{$Userproperties ?? 0}}</h3>
                                    <span>Saved Properties</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
