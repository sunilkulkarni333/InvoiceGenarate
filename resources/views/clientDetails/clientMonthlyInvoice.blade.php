@extends('layouts.app-master')

@section('content')
<style>
  .error{
      color:red;
  }
</style>
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
                   <a href="{{ route('home.clientMonthlyInvoice',[$user_id,$invoiceId,$month,$year])}}" class="btn cus-btn-white cus-btn-active">Invoice</a>
                   <a href="{{ route('home.clientFees',[$user_id,$invoiceId,$month,$year]) }}" class="btn cus-btn-white">Fulfillment Fees</a>
                   <a href="{{ route('warehouse.requestedList',[$user_id,$invoiceId,$month,$year]) }}" class="btn cus-btn-white">Approvals</a>
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
              {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" onlick="closeEventPopup()">
                <span aria-hidden="true">&times;</span>
              </button> --}}
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('client.addClientLineItem') }}">
                @csrf
                <input type="hidden" name="client_id" id="client_id" value="{{$user_id}}">
                <input type="hidden" name="invoiceId" id="invoiceId" value="{{$invoiceId}}">
                <input type="hidden" name="year" id="year" value="{{$year}}">
                <input type="hidden" name="month" id="month" value="{{$month}}">
                <div class="form-group">
                  <label for="activity">Activity</label>
                  <input type="text" name="activity" class="form-control" id="activity" aria-describedby="" placeholder="Activity" value="{{ old('activity') }}">
                  <span class="error">{{ $errors->first('activity') }}</span>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" name="description" class="form-control" name="" rows="2" cols="40" placeholder="Description">{{ old('description') }}</textarea>
                  <span class="error">{{ $errors->first('description') }}</span>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="qty">Qty</label>
                    <input type="text" name="qty" id="qty" class="form-control" placeholder="Qty" value="{{ old('qty') }}">
                    <span class="error">{{ $errors->first('qty') }}</span>
                  </div>
                  <div class="col">
                    <label for="rate">Rate</label>
                    <input type="text" name="rate" id="rate" class="form-control" placeholder="Rate" value="{{ old('rate') }}">
                    <span class="error">{{ $errors->first('rate') }}</span>
                  </div>
                </div>
                {{-- <div class="row">
                  <div class="col">
                    <label for="amount">Amount</label>
                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                    <span class="error">{{ $errors->first('amount') }}</span>
                  </div>
                </div> --}}
                <div class="popup-btn">
                  <a href="{{ route('home.clientMonthlyInvoice',[$user_id,$invoiceId,$month,$year])}}" type="button" class="btn" onlick="closeEventPopup()">Cancel</a>
                  <button type="submit" class="btn">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endauth
    
    <script>
      $(document).ready(function() {
        var activity,description,qty,rate,amount = '';
        activity = '{{ $errors->first('activity') }}';
        description = '{{ $errors->first('description') }}';
        qty = '{{ $errors->first('qty') }}';
        rate = '{{ $errors->first('rate') }}';
        amount = '{{ $errors->first('amount') }}';

        if(activity != '' || description != '' || qty != '' || rate != '' || amount != ''){
          $('#exampleModal').modal('show');
        }                  
      });

      function closeEventPopup(){
        alert('closeEventPopup');
        $('#exampleModal').modal('hide');
      }
    </script>
@endsection