@extends('layouts.app-master')

@section('content')
<style>
    .error{
        color:red;
    }
</style>
    @guest
    <section class="pop-over-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col align-self-center">
                <img src="{{ asset('images/logo-grid.png') }}" class="img-fluid" alt="" width="150" />
                <div class="pop-over-div">
                    @include('layouts.partials.messages')
                    <form method="POST" action="{{ route('wareHouseAccess.addClientService') }}">
                        @csrf
                        <div class="form-group">
                            <label for="activity">Company</label>
                            <select name="client_id" id="client_id" class="form-control" onchange="getClientDetails();">                                                             
                                @foreach ($clients as $item)
                                   @php
                                       $selectedValue = '';
                                       if(old('client_id') == $item->id){
                                         $selectedValue = 'selected';
                                       }
                                   @endphp
                                    <option value="{{$item->id}}" {{$selectedValue}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <span class="error">{{ $errors->first('client_id') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="activity">Services(Activity)</label>                          
                            <div id="services">
                            
                            </div> 
                            <span class="error">{{ $errors->first('activity') }}</span>                              
                        </div>
                        <input type="hidden" name="clientService" id="clientService" value="">
                        <input type="hidden" name="serviceValue" id="serviceValue" value="{{ old('serviceValue') }}">
                        <input type="hidden" name="selectedActivity" id="selectedActivity" value="{{ old('selectedActivity') }}">
                        <input type="hidden" name="serviceSpaceValue" id="serviceSpaceValue" value="{{ old('serviceSpaceValue') }}">
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="qty" name="qty" class="form-control" id="qty" aria-describedby="" placeholder="Quantity" value="{{ old('qty') }}">
                            <span class="error">{{ $errors->first('qty') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">Note</label>
                            <textarea id="description" name="description" class="form-control" name="" rows="2" cols="40">{{ old('description') }}</textarea>
                            <span class="error">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="popup-btn">
                        <button type="submit" class="btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </section>
    @endguest

    <script>    
    $( document ).ready(function() {       
        getClientDetails();
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    function getClientDetails(){
        $('#serviceValue').val('');     
        $('#clientService').val('');             
        $.ajax({                
            url: '{{ route("wareHouseAccess.clientService") }}',
            type: 'POST',
            data: {_token: CSRF_TOKEN, client_id: $('#client_id').val()},
            dataType: 'JSON',                
            success: function (data) {                    
                var service = '';
                if(data.status != 0){
                    service += '<select name="activity" id="activity" class="form-control" onchange="activityValue()">';   
                        service += '<div id="services">';
                            service += '<option value="">Select Activity</option>';                            
                            var oldPresent = $('#selectedActivity').val(); 
                        $.each(data, function (i, value) { 
                            var selected = '';
                            if(i == oldPresent && oldPresent != ''){
                                selected = 'selected';
                            }
                            stringData = i.replace(/([a-z])([A-Z])/g, '$1 $2');
                            stringData = stringData.replace(/([A-Z])([A-Z][a-z])/g, '$1 $2')                         
                            service += '<option value="'+i+'" '+selected+'>'+stringData+'</option>';                        
                        });
                    service += '</div>';  
                    service += '</select>';  
                    $('#services').html(service);

                    $('#clientService').val(JSON.stringify(data));
                    if( oldPresent != ''){
                        activityValue();
                    }
                }else{
                    service += '<select name="activity" id="activity" class="form-control">';   
                        service += '<option value="">No Service For This Client</option>'
                    service += '</select>';  
                    $('#services').html(service);
                }
                
            }
        });                 
    }    


    function activityValue(){            
        var selectedActivity = $('#activity').val();
        var clientService = $('#clientService').val();
        clientService = JSON.parse(clientService);
        var serviceValue = clientService[selectedActivity];  
        $('#serviceValue').val(serviceValue);
        $('#selectedActivity').val(selectedActivity);
        var activitySpace = $( "#activity option:selected" ).text(); 
        $('#serviceSpaceValue').val(activitySpace);         
    };
    </script>
@endsection

