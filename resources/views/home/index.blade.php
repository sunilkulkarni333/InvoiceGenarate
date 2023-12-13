@extends('layouts.app-master')

@section('content')
    @auth    
    <section class="table-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @include('layouts.partials.messages')

                    <div class="table-title-div">
                        <h2 class="table-title-h2">Active FHU Clients</h2> 
                        <a href="{{ route('home.addClient') }}" class="btn cus-btn-or">Add Client</a>
                     </div>
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
                            @if(count($clients) > 0)
                                @foreach ($clients as $client)
                                    <tr>
                                        <td><a href="{{ route('home.clientInvoices',$client->id)}}">{{$client->name}}</a></td>
                                        <td>{{$client->client_id}}</td>
                                        <td>{{$client->location}}</td>
                                        <td>
                                            <a href="" data-toggle="tooltip" title="Generate Invoice">
                                                <i data-feather="file-plus"></i>
                                            </a>
                                            <a href="{{ route('home.editClient',$client->id)}}" data-toggle="tooltip" title="Edit">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a href="{{ route('home.deleteClient',$client->id)}}" data-toggle="tooltip" title="Delete"> 
                                                <i data-feather="trash-2"></i>
                                            </a>
                                        </td>                                    
                                    </tr>                                 
                                @endforeach    
                            @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>No Clients Available</td>
                                    <td></td>
                                </tr>
                            @endif
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