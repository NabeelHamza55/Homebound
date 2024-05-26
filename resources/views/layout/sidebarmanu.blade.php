<style>
    /* Style the sidenav links and the dropdown button */
    .anew,
    .dropdown-btn {
        color: rgba(0, 0, 0, 0.50);
        font-family: Inter;
        font-size: 22px;
        text-decoration: none;
        display: flex;
        align-items: center;
        border-radius: 15px;
        padding: 18px 25px;
        text-decoration: none;
    }

    /* On mouse-over */
    .anew:hover {
        background: linear-gradient(270deg, #FAF2AE 0%, #B38A51 100%);
        cursor: pointer;
        color: white;
        text-decoration: none
    }

    .dropdown-btn:hover {
        color: white;
        background: linear-gradient(270deg, #FAF2AE 0%, #B38A51 100%);
        cursor: pointer;
    }

    /* Add an active class to the active dropdown button */
    .active {
        background-color: #B48B52;
        color: white;
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
        display: none;
        background-color: white;
        padding-left: 8px;
        transition: display 0.3s ease;
        background-color: beige;
        border-radius: 20px;
        /* Add smooth transition effect */
    }

    /* Optional: Style the caret down icon */
    .custom {
        position: absolute;
        right: 4rem;
    }

    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .anew {
            font-size: 18px;
        }
    }
</style>
<div class="dashboard-column leftside-bar">
    <div class="top-logo text-center">
        <div class="container">
            <div class="row">
                <div class="col"> <a href=""><img src="{{ asset('images/logo.png') }}"></a></div>
                <div class="col">
                    <div style="display:flex; justify-content: end;
            margin-top: 1rem;" class="user-profile">
                        <!--     <div class="dropdown">-->
                        <!--    <li class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"-->
                        <!--        aria-expanded="false">-->
                        <!--        <img width="50" height="50" class="rounded-circle"-->
                        <!--            src="{{ asset('/ProfilePicture/' . \Illuminate\Support\Facades\Auth::user()->profile_picture) }}">-->

                        <!--    </li>-->
                        <!--    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">-->
                        <!--        <li><p style="background-color:burlywood" class="dropdown-item">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p></li>-->
                        <!--        <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>-->
                        <!--         <li><a class="dropdown-item" href="{{ route('profile.setting') }}">Settings</a></li>-->
                        <!--        <li><a class="dropdown-item" href="{{ route('logout') }}">Log Out</a></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>

                </div>
            </div>


        </div>
    </div>
    <div class="sidebar-list">
        <ul class="menu-list">
            <li>
                <a href="{{ route('user.dashboard') }}"><i class="dashboard-icon"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('user.order') }}"><i class="order-icon"></i> Orders</a>
            </li>
            <li>
                <a href="{{ route('save.order') }}"><i class="save-order-icon"></i> Saved Order</a>
            </li>
            <li class="dropdown-btn"><i class="save-properties-icon"></i> Property
                <i class="fa fa-caret-down custom"></i>
            </li>
            <div class="dropdown-container">
                <a class="anew" href="{{ route('add.property') }}"> Add
                    Properties</a>
                <a class="anew" href="{{ route('save.property') }}"> Saved
                    Properties</a>
                <a class="anew" href="{{ route('search.property') }}"> Search
                    Properties</a>
            </div>
            {{-- <li class="dropdown-btn"><i class="save-existing-icon"></i> Books
                <i class="fa fa-caret-down custom"></i>
            </li> --}}
            {{-- <div class="dropdown-container">
                <a class="anew" href="{{ route('create.book') }}"> Create
                    Book</a>
                <a class="anew" href="{{ route('view.book') }}"> View
                    Books</a>
                <a class="anew" href="{{ route('book.list') }}"> Book
                    List</a>
            </div> --}}
            <li>
                <a href="{{ route('book.list') }}"> <i class="save-existing-icon"></i> Book
                    List</a>
            </li>
            <li>
                <a href="{{ route('existing.order') }}"><i class="save-existing-icon"></i> Existing Orders</a>
            </li>

            {{-- <li>
                <a href="{{ route('create.book') }}"><i class="save-existing-icon"></i>Creat Book</a>
            </li>
            <li>
                <a href="{{ route('view.book') }}"><i class="save-existing-icon"></i>View Books</a>
            </li>
            <li>
                <a href="{{ route('book.list') }}"><i class="save-existing-icon"></i>Books list</a>
            </li> --}}
            <!--<li>-->
            <!--    <a href="{{ route('total.order') }}"><i class="total-order-icon"></i> Total Orders</a>-->
            <!--</li>-->
        </ul>
    </div>
    <div class="user-profile  d-flex align-items-center">

        <div class="dropdown">

            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">

                <img width="50" height="50" class="rounded-circle"
                    src="{{ asset('/ProfilePicture/' . \Illuminate\Support\Facades\Auth::user()->profile_picture) }}">

                {{ \Illuminate\Support\Facades\Auth::user()->name }}

                <span>My Account <i class="fa fa-caret-down"></i></span>

            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('profile.setting') }}">Settings</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Log Out</a></li>

            </ul>

        </div>

        <a href="" class="setting-button"><i class="setting-icon"></i></a>

    </div>

</div>
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "flex") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "flex";
                dropdownContent.style.flexDirection = "column";
            }
        });
    }
</script>
