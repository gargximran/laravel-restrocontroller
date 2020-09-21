@extends('layout.app')

@section('main-content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">New User</h4>
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
           
                            <form action="{{route('store')}}" method="POST">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-4 offset-md-4 jumbotron">
                                        <h2>Add New User!</h2>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" required name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Full Name">                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" required name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" required name="address" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter Full Address">                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" required name="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Phone Number">                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" required name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter Password">                                            
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                   
                                </div>
                                
                              
                            </form>
              
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

