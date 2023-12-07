@extends('layouts.app-master')

@section('content')
    @auth    
    <h2 class="table-title-h2">Active FHU Clients</h2>

    <table class="table table-responsive">
            <thead>
                <tr>
                <th>Clients</th>
                <th>Client ID</th>
                <th>Location</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Walmart</td>
                <td>FHU924</td>
                <td>Miami, FL, USA</td>
                <td><a href="">Generate Invoice</a></td>
                </tr>
                <tr>
                <td>Walmart</td>
                <td>FHU924</td>
                <td>Miami, FL, USA</td>
                <td><a href="">Generate Invoice</a></td>
                </tr>
                <tr>
                <td>Walmart</td>
                <td>FHU924</td>
                <td>Miami, FL, USA</td>
                <td><a href="">Generate Invoice</a></td>
                </tr>
            </tbody>
        </table>
          
  
    @endauth

    @guest        
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
@endsection