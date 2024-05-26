@extends('layout.header')
@section('main')
<style>
   .saved-properties-row.d-flex {
    /*column-gap: 20px;*/
    /*justify-content:space-between;*/
}
.saved-properties-column {
    background-color: transparent;
    border-radius: 12px;
     margin-left: 0rem !important; 
}
.ext-div{
    background-color:white;
     border-radius: 12px;
      padding: 14px 13px;
}
.saved-properties-image{
    height: 22vh;
}
.saved-properties-column .saved-properties-image img {
    width: 100%;
    max-height: 100%;
}
.saved-properties-text h3 {
    color: #000;
    font-family: Inter;
    font-size: 24px;
    margin: 18px 0 10px;
    padding: 0 0.75rem;
}
.saved-properties-column .properties-sm-thumnail img, .saved-properties-column .saved-properties-image img {
    width: 100%;
    min-height: 100%;
    max-height: 100%;
}
h4{
    font-weight:bold;
    margin-top:1rem;
}
.properties-sm-thumnail.d-flex {
    column-gap: 10px;
    border-top: 1px solid #ddd;
    padding-top: 15px;
    margin-bottom: 20px;
    height: 9vh;
}
</style>

<div class="main-wrapper">
    <div class="dashboard-page">

        <div class="dashboard-row d-flex">
            @include('layout.sidebarmanu')
            <div class="dashboard-column right-content" style='padding-right:0;'>

                <div class="top-header d-flex align-items-center">

                    <div class="top-title">

                        <h1>Saved Properties</h1>

                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="right-head-button d-flex align-items-center">
                        <div class="dropdown bell-dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="bell-icon"></i>
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

                        <div class="saved-properties-row d-flex flex-wrap">
                            @foreach($properties as $property)
                            <div class="saved-properties-column col-3">
<div class='ext-div'>
                                <div class="saved-properties-image">

                                    @if(isset(json_decode($property['images'])[0]))
                                        @if(str_contains(json_decode($property['images'])[0], 'https'))
                                            <img src="{{ json_decode($property['images'])[0] }}" class='img-fluid' alt="no image">
                                        @else
                                            <img src="{{ asset('/ProfilePicture/'. json_decode($property['images'])[0]) }}" class='img-fluid' alt="no image">
                                        @endif
                                    @else
                                        <img src="{{ asset('/default-image.jpg') }}" class='img-fluid' alt="no image">
                                    @endif


                                </div>

                                <div class="saved-properties-text">

                                                <h4 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
</svg>     {{ $property['address'] ? $property['address'] : '3964 Reka Dr APT D01, Anchorage,AK,99508' }}
</h4>
                                    <div class='container'>
                                        <h5>Description</h4>
                                        <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$property['description'] ?? ''}}</p>

                                    </div>

                                    <div class="properties-sm-thumnail d-flex">

                                        @php
                                            $images =  json_decode($property['images']);
                                        @endphp

                                        @php $imageCount = 0; @endphp

                                        @foreach($images as $image)
                                            @if($imageCount < 4)
                                                @if(str_contains($image, 'https'))
                                                    <a> <img src="{{ $image }}" alt="no image" class="selectable-image"> </a>
                                                @else
                                                    <a href=""><img src="{{ asset('/ProfilePicture/'. $image ) ?? ''}}"></a>
                                                @endif
                                            @endif

                                            @php $imageCount++; @endphp
                                        @endforeach


                                    </div>

                                    <div class="properties--button">

                                        <a style="padding: 8px;
    width: 30%;" href="{{route('edit.property',$property->id)}}" class="btn transparent cst-yellow-button">Edit</a>
                                        <a style="padding: 8px;
    width: 35%;" href="{{route('create.book',$property->id)}}" class="btn transparent cst-yellow-button">Create</a>
                                        <a style="width: 33%;padding: 8px;
    width: 35%;" href="{{route('delete.property',$property->id)}}" class="btn cst-yellow-button">Delete</a>

                                    </div>

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
