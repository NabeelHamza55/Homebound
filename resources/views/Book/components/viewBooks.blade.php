@extends('layout.header')
@section('main')
<style>
    .witdh{
        width:32%;
        color:black;
    }
    .saved-properties-row.d-flex {
    /*column-gap: 20px;*/
   flex-wrap: wrap;
    justify-content:space-around;
}
.col-3 {
    flex: 0 0 auto;
    width: 30%;
}
</style>
    <div class="main-wrapper">
        <div class="dashboard-page">

            <div class="dashboard-row d-flex">
                @include('layout.sidebarmanu')
                <div class="dashboard-column right-content">

                    <div class="top-header d-flex align-items-center">

                        <div class="top-title">

                            <h1>View Books</h1>

                        </div>
                        @if(session('notification'))
                            <div class="alert alert-{{ session('notification')['Message'] }}">
                            </div>
                        @endif

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

                        <div class="saved-properties">

                            <div class="saved-properties-row d-flex">
                                @foreach($books as $book)
                                <div class="saved-properties-column col-3 my-5">
                                    

                                    <div class="saved-properties-image">
                                        @if($book['front_page'])
                                            @if(str_contains($book['front_page'], 'https'))
                                            <img src="{{ $book['front_page'] }}">
                                            @else
                                                <img src="{{ asset('/ProfilePicture/'.$book['front_page']) }}">
                                            @endif
                                        @endif
                                    </div>

                                    <div class="saved-properties-text">

                                        <div class="properties-sm-thumnail d-flex">

                                            @php
                                                $images = json_decode($book['inner_pages']);
                                                $imageCount = 0;
                                            @endphp

                                            @if (!is_null($images) && count($images) > 0)
                                                @foreach ($images as $image)
                                                    @if ($imageCount < 4)
                                                        @if (str_contains($image, 'https'))
                                                            <a> <img src="{{ $image }}" alt="{{ $image }}" class="selectable-image"> </a>
                                                        @else
                                                            <a href=""><img src="{{ asset('/ProfilePicture/' . $image) ?? '' }}"></a>
                                                        @endif
                                                    @endif
                                                    @php $imageCount++; @endphp
                                                @endforeach
                                            @else
                                                <p>No images available.</p>
                                            @endif


                                        </div>

                                        <div  style="column-gap: 7px;"  class="properties--button" >

                                            <a href="{{route('preview.book',$book->id)}}" class="witdh btn transparent  cst-yellow-button" style="width:45%;">View</a>
                                            <a href="{{route('edit.book',$book->id)}}" class="witdh btn transparent cst-yellow-button" style="width:45%;">Delete</a>

                                            <!--<a href="{{route('edit.book',$book->id)}}" class=" witdh btn transparent  cst-yellow-button" style="width:32%;">Edit</a>-->

                                        </div>

                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
