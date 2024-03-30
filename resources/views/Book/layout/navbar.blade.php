<section class="main-header">
    <nav class="navbar">
        <div class="container-fluid" style="background-color: white !important;">
            <div class="navbar-header logo">
                <a class="navbar-brand" href="{{route('user.dashboard')}}" >
                    <img src="{{asset('images/logo.png')}}"></a>
            </div>
            <div class="nav navbar-nav header-buttons" >
                <a href="{{route('view.book')}}" class="back-button">Back</a>
                 <a href="{{route('view.book')}}" class="back-button">Add To Cart</a>
                <a href="{{route('user.dashboard')}}" class="home-button">Home</a>
            </div>
        </div>
    </nav>
</section>
