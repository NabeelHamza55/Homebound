@extends('layout.datatableHeader')
@section('main')
    <style>
        .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: rgb(255 255 255) !important;
            color: var(--bs-table-striped-color) !important;
        }

        tbody {
            background-color: white !important;
        }

        table {
            border-spacing: 0em 2rem;
        }

        .active-lbl {
            display: inline-block;
            border-radius: 4px;
            border: 1px solid #08D110;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            width: auto;
            color: #08D110;
            font-family: Inter;
            font-size: 14px;
            padding: 4px 13px;
        }

        #orders tbody td {
            padding: 1rem;
        }

        .paginate_button {
            border: 1px solid #b48b52;
            text-decoration: none;
            list-style: none;
            color: black;
            cursor: pointer;
            margin-right: 1rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0.3rem;
            padding-right: 0.3rem;
            border-radius: 4px;
        }

        .dataTables_scrollBody {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 26rem;

        }

        .table-responsive {
            /* min-height: .01%; */
            overflow-x: visible !important;
        }
    </style>
    <div class="main-wrapper">
        <div class="dashboard-page">
            <div class="dashboard-row d-flex">
                @include('layout.sidebarmanu')
                <div class="dashboard-column right-content">
                    <div class="top-header d-flex align-items-center">
                        <div class="top-title">
                            <h1>Orders</h1>
                        </div>
                        <div class="right-head-button d-flex align-items-center">
                            <div class="dropdown bell-dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
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
                                <h2>Saved Orders: <span>02</span></h2>
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
                                <table id="orders" class="table table-striped table-hover table-dynamic filter-head"
                                    style="width:100%">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.1/moment.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    {{-- <script src="{{asset('js/datatables.min.js')}}"></script> --}}

    <script>
        function deleteRow(id) {
            // Make an Ajax call or redirect to your route with the selected id
            window.location.href = "{{ route('delete.cart.item') }}/" + id;
        }
        $(document).ready(function() {

            var table = $('#orders').DataTable({
                pageLength: 20,
                processing: true,
                scrollX: true,
                search: {
                    return: true
                },
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, "All"]
                ],
                bFilter: true,
                bLengthChange: true,
                processing: true,
                serverSide: true,
                buttons: [{
                        extend: 'pdf',
                        className: 'btn-danger ml-2 mr-1',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                    },
                    {
                        extend: 'copy',
                        className: 'btn-primary mr-1'
                    },
                    {
                        extend: 'csv',
                        className: 'btn-success'
                    }
                ],
                ajax: {
                    url: "{{ route('save.order') }}",
                    dataSrc: "data",
                    type: "GET",
                    data: function(data) {

                    },
                },
                order: [
                    [0, 'desc']
                ],
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            // Check if row.front_page contains 'https'
                            var imageUrl = row.front_page.includes('https') ? row.front_page :
                                "{{ asset('/ProfilePicture/') }}" + '/' + row.front_page;

                            return `
            <td class="order-column" width="40%" align="center">
                <div class="order-row d-flex align-items-center mt-3">
                    <div class="order-img">
                        <img src="${imageUrl}">
                    </div>
                    <div class="order-text">
                        <p>${row.book_title}</p>
                    </div>
                </div>
            </td>
        `;
                        }

                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return `
                                <td width="20%" align="center">
                                     <span style="margin-top: 2.5rem;" class="active-lbl">Pending</span>
                                </td>
                            `;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data, type, row, meta) {
                            return `
                                <td width="20%" align="right">
                                    <div class="dropdown action-dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton_${meta.row}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('images/dot-icon.png') }}">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton_${meta.row}">
                                            <li><a class="dropdown-item" href="#"><img src="{{ asset('images/pencil-icon.png') }}"> Edit</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="deleteRow(${data})"><img src="{{ asset('images/trash-icon.png') }}"> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            `;
                        }
                    },
                ],
            });
        });
    </script>
@endsection
