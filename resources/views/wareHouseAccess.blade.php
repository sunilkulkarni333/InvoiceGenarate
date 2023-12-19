@extends('layouts.app-master')

@section('content')
    @guest
    <section class="pop-over-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col align-self-center">
                <img src="{{ asset('images/logo-grid.png') }}" class="img-fluid" alt="" width="150" />
                <div class="pop-over-div">
                    <form>
                        <div class="form-group">
                            <label for="activity">Company</label>
                            <select name="client_id" id="client_id" class="form-control">
                                <option vlaue="">Select Company</option>
                                @foreach ($clients as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="activity">Services</label>                          
                            <div id="services">
                            
                            </div>                               
                        </div>
                        <input type="text" name="clientService" id="clientService" value="">
                        <div class="form-group">
                            <label for="activity">Quantity</label>
                            <input type="qty" name="qty" class="form-control" id="activity" aria-describedby="" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <label for="description">Note</label>
                            <textarea id="description" name="description" class="form-control" name="" rows="2" cols="40"></textarea>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#client_id").change(function(){
            $.ajax({
                /* the route pointing to the post function */
                url: '{{ route("wareHouseAccess.clientService") }}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, client_id: $('#client_id').val()},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) { 
                    //console.log('console.log',data.status);
                    var service = '';
                    if(data.status != 0){
                        service += '<select name="activity" id="activity" class="form-control">';   
                            service += '<div id="services">';
                            $.each(data, function (i, value) { 
                                stringData = i.replace(/([a-z])([A-Z])/g, '$1 $2');
                                stringData = stringData.replace(/([A-Z])([A-Z][a-z])/g, '$1 $2')                         
                                service += '<option value="'+i+'">'+stringData+'</option>';                        
                            });
                        service += '</div>';  
                        service += '</select>';  
                        $('#services').html(service);

                        $('#clientService').val(JSON.stringify(data));
                    }else{
                        service += '<select name="activity" id="activity" class="form-control">';   
                            service += '<option value="">No Service For This Client</option>'
                        service += '</select>';  
                        $('#services').html(service);
                    }
                   
                }
            }); 
        });    
     </script>
@endsection

