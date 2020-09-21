@extends('layout.app')

@section('main-content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User List</h4>
                <div class="ml-auto text-right">
                    <a href="{{ route('add') }}" class="btn btn-info">Add User</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead class="bg-secondary text-white text-center font-weight-bold">
                                    <tr>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone N.</th>
                                        <th>Start D.</th>
                                        <th>End Date</th>
                                        <th>Left</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($users as $user)
                                        
                                    
                                        <tr>
                                            <td>{{$user->user_id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->created_at->format('d-m-Y')}}</td>
                                            
                                            @if ($user->end)
                                                <td>{{carbon\carbon::parse($user->end)->format('d-m-Y')}}</td>
                                                @php
                                                    $leftday = carbon\carbon::parse($user->end)->diffIndays(carbon\carbon::parse(carbon\carbon::now()));
                                                    $endDateCompare = carbon\carbon::now()->addDays($leftday)->format('d-m-Y');
                                                
                                                @endphp
                                                
                                                @if(carbon\carbon::parse($user->end)->format('d-m-Y') == $endDateCompare)
                                                    
                                                    <td>{{ $leftday }} Days</td>
                                                @else
                                                    <td>{{ 0 }} Day</td>
                                                @endif
                                            @else
                                                <td> </td>
                                                <td>{{0}} Day</td>
                                            @endif
                                            
                                            <td>
                                                <a href="{{route('single_owner' , $user->user_id)}}" class="btn btn-info">Detail</a>
                                                <button class="btn btn-warning">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('o/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection


@section('js')
    <script src="{{ asset('o/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        /****************************************
        *       Basic Table                   *
        ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection