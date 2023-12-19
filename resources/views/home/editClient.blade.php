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
                <div class="form-bg-white">
                    <h2 class="table-title-h2">Edit Client</h2>
                    <form method="POST" action="{{ route('home.updateClient') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$userData->id}}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="name">Client Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$userData->name) }}" aria-describedby="" placeholder="Enter Name">
                                    <span class="error">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="col">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email',$userData->email) }}" aria-describedby="" placeholder="Enter Email">
                                    <span class="error">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label for="client_id">Client Id</label>
                            <input type="text" class="form-control" name="client_id" id="client_id" readonly value="{{ old('client_id',$userData->client_id) }}" aria-describedby="" placeholder="Enter Client Id">
                            <span class="error">{{ $errors->first('client_id') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <textarea class="form-control" name="location" id="location" rows="2" cols="40">{{ old('location',$userData->location) }}</textarea>
                            <span class="error">{{ $errors->first('location') }}</span>
                        </div>
                        
                        <div class="popup-btn">
                            <a href="{{ route('home.index') }}"  class="btn btn-cancel">Cancel</a>
                            <button type="submit" class="btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </section>
    @endauth
@endsection