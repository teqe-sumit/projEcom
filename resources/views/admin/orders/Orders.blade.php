@extends('admin.layouts.app')
@section('orders')

    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
        
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">								
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                               
                                
                                <th>Buyer Name</th>
                                
                                <th>Email Id</th>
                             
                                <th>Address</th>
                                {{-- <th>city</th> --}}
                                <th>State</th>
                                <th>Zip</th>
                                <th>Mobile</th>
                                <th>Product</th>
                                <th>Transaction Id</th>
                                <th>Amount</th>
    
                                
                            </tr>
                        </thead>
                        <tbody>   @foreach ($Details as $Detail)
                            <tr>
                                <td>{{$Detail->first_name}}</td>														
                               
                                <td>{{$Detail->email}}</td>
                               
                                <td>{{$Detail->address}} ({{$Detail->city}})</td>
                                {{-- <td></td> --}}
                                <td>{{$Detail->state}}</td>
                                <td>{{$Detail->zip}}</td>
                                <td>{{$Detail->mobile}}</td>
                                <td>{{$Detail->last_name}}</td>
                                <td>{{$Detail->source}}</td>
                                <td>{{$Detail->amount}}</td>
                            </tr>
                            <tr> 
                                
                               
                                
                                @endforeach
                            </tr>
                         
                      
                        
                          
                        </tbody>
                    </table>										
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                      {{-- <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>


@endsection