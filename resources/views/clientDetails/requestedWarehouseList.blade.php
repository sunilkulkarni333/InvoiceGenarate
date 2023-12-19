@extends('layouts.app-master')

@section('content')
    @auth
    <section class="table-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <div class="table-title-div">
                 <h2 class="table-title-h2">
                    <a href="{{ route('home.clientPayments',$user_id)}}">
                        <img src="{{ asset('images/arrow.png') }}" class="img-fluid" width="22" />
                        {{$userData->name}} Invoice
                    </a>
                </h2>
              </div>
              <div class="table-button-div">
                <div class="table-button-div-left">
                   <a href="{{ route('home.clientMonthlyInvoice',[$user_id,$invoiceId,$month,$year])}}" class="btn cus-btn-white">Invoice</a>
                   <a href="{{ route('home.clientFees',[$user_id,$invoiceId,$month,$year]) }}" class="btn cus-btn-white">Fulfillment Fees</a>
                   <a href="{{ route('warehouse.requestedList',[$user_id,$invoiceId,$month,$year]) }}" class="btn cus-btn-white cus-btn-active">Approvals</a>
                </div>                
               </div>
            </div>
          </div>
        </div>
    </section>

    <section class="table-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col">             

              <table class="table">
                <thead>
                    <tr>
                    <th>Activity</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($wareHouseRequest) > 0)
                        @foreach($wareHouseRequest as $requestCame)
                        <tr>                        
                            <td>{{$requestCame->activity}}</td>
                            <td>{{$requestCame->description}}</td>
                            <td>{{$requestCame->qty}}</td>
                            <td>{{$requestCame->rate}}</td>
                            <td>{{$requestCame->rate * $requestCame->qty}}</td>         
                            <td>{{$requestCame->created_at}}</td>     
                            <td>
                                @php
                                    if($requestCame->status == 0){
                                        echo 'Pending';
                                    }else if($requestCame->status == 1){
                                        echo 'Approved';
                                    }else{
                                        echo 'Rejected';
                                    }
                                @endphp
                            </td>         
                            <td>
                                <div class="table-ts-img">
                                    <a href=""><img src="{{ asset('images/email.png') }}" class="img-fluid"/></a>
                                    <a href=""><img src="{{ asset('images/download.png') }}" class="img-fluid"/></a>                                
                                </div>
                            </td>
                        </tr> 
                        @endforeach         
                    @else
                    <tr>                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>No Approvals Available</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endif
                </tbody>
                </table>
            </div>
          </div>
        </div>
      </section>
    @endauth  
@endsection