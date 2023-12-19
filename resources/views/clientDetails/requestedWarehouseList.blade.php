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
                   <a href="{{ route('home.clientMonthlyInvoice',[$user_id,$invoiceId])}}" class="btn cus-btn-white">Invoice</a>
                   <a href="{{ route('home.clientFees',[$user_id,$invoiceId]) }}" class="btn cus-btn-white">Fulfillment Fees</a>
                   <a href="{{ route('warehouse.requestedList',[$user_id,$invoiceId]) }}" class="btn cus-btn-white cus-btn-active">Approvals</a>
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
                    <th>Status</th>
                    <th>Invoice No</th>
                    <th>Invoice Month</th>
                    <th>Generate Date</th>
                    <th>Due Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="color-red">UnPaid</span></td>
                        <td><a href="{{ route('home.clientMonthlyInvoice',[$user_id,182808]) }}">182808</a></td>
                        <td>December</td>
                        <td>12/14/2023</td>
                        <td>12/21/2023</td>
                        <td><b>USD 1,421.31</b></td>
                        <td>
                            <div class="table-ts-img">
                                <a href=""><img src="{{ asset('images/email.png') }}" class="img-fluid"/></a>
                                <a href=""><img src="{{ asset('images/download.png') }}" class="img-fluid"/></a>                                
                            </div>
                        </td>
                    </tr>                                    
                </tbody>
                </table>
            </div>
          </div>
        </div>
      </section>
    @endauth  
@endsection