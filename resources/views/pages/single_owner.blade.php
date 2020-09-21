@extends('layout.app')

@section('main-content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h2 class="page-title">User Detials | {{$owner->name}}</h2>
                <hr>
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
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="border-left border-dark pl-1">Name : <span class="font-weight-light">{{$owner->name}}</span></h4>
                                    <h5 class="border-left border-dark pl-1">Email : <span class="font-weight-light">{{$owner->email}}</span></h5>
                                    <h5 class="border-left border-dark pl-1">Phone : <span class="font-weight-light">{{$owner->phone}}</span></h5>
                                    <h5 class="border-left border-dark pl-1">Address : <span class="font-weight-light">{{$owner->address}}</span></h5>
                                    <h3 class="border-left border-dark pl-1">Registered Date : <span class="font-weight-light text-success">{{$owner->created_at->format('d-m-Y')}}</span></h3>
                                    <h2 class="border-left border-dark pl-1">End Subscription At : <span class="font-weight-light text-danger">{{carbon\carbon::parse($owner->end)->format('d-m-Y')}}</span></h2>
                                </div>

                                <div class="col-md-6 table-responsive">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#addSub">Add Subscription</button>
                                    <table class="table text-center table-bordered ">
                                        <thead >
                                            <tr>
                                                <th class="font-weight-bold">Start</th>
                                                <th class="font-weight-bold">End</th>
                                                <th class="font-weight-bold">Day</th>
                                                <th class="font-weight-bold">Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($owner->subscription as $subscription)
                                                
                                            
                                            <tr>
                                                <td>{{$subscription->created_at->format('d-m-Y')}}</td>
                                                <td>{{carbon\carbon::parse($subscription->created_at)->addDays($subscription->day)->format('d-m-Y')}}</td>
                                                <td>{{$subscription->day}} day</td>
                                                <td>{{$subscription->payment}} tk</td>
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
        </div>


        {{-- Add Subscription Moodal --}}
        <div class="modal fade" id="addSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Subscription</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('subscription', $owner->user_id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="tk">Payment (tk)</label>
                          <input name="tk" type="number" class="form-control" id="tk" aria-describedby="emailHelp" placeholder="ammount">
                        </div>
                        <div class="form-group">
                          <label for="day">Day</label>
                          <input name="day" type="number" class="form-control" id="day" placeholder="Ex. 30">
                        </div>
                        <div class="form-group form-check">
                            <input name="new" type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">New Subscription</label>
                          </div>                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection

