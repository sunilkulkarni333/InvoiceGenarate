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
                   <a href="{{ route('home.clientMonthlyInvoice',[$user_id,$invoiceId])}}" class="btn cus-btn-white cus-btn-active">Invoice</a>
                   <a href="{{ route('home.clientFees',[$user_id,$invoiceId]) }}" class="btn cus-btn-white">Fulfillment Fees</a>
                   <a href="" class="btn cus-btn-white">Approvals</a>
                </div>
                <div class="table-button-div-right">
                  <a href="#!" class="btn cus-btn-or"  data-toggle="modal" data-target="#exampleModal">Add Line item</a>
                  <a href="" class="btn cus-btn-or">Save Changes</a>
                </div>
               </div>
            </div>
          </div>
        </div>
      </section>

       <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Line item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
          <div class="form-group">
            <label for="activity">Activity</label>
            <input type="email" class="form-control" id="activity" aria-describedby="" placeholder="">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
           <textarea id="description" class="form-control" name="" rows="2" cols="40"></textarea>
          </div>
          <div class="row">
            <div class="col">
              <label for="">Qty</label>
              <input type="text" class="form-control" >
            </div>
            <div class="col">
              <label for="">Rate</label>
              <input type="text" class="form-control" >
            </div>
            <div class="col">
              <label for="">Amount</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="popup-btn">
            <button type="submit" class="btn">Submit</button>
          </div>
        </form>
          
        </div>
        
      </div>
    </div>
  </div>
    @endauth   
@endsection