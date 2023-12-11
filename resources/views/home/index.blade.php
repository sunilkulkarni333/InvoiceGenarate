@extends('layouts.app-master')

@section('content')
    @auth    
    <section class="table-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h2 class="table-title-h2">Active FHU Clients</h2>  
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Clients</th>
                            <th>Client ID</th>
                            <th>Location</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <a href="{{ route('home.clientInvoices')}}">
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->client_id}}</td>
                                        <td>{{$client->location}}</td>
                                        <td><a href="">Generate Invoice</a></td>
                                    </a>   
                                </tr>                                 
                            @endforeach                   
                        </tbody>
                    </table>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
      </section>
    @endauth
    
    @guest        
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
@endsection