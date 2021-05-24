@extends('layouts.app')

@section('content')
    <div class="container">
        <section style="margin-top: 20%">
            <div class="container space-bottom-1 mt-2 mb-5">
                <div class="card bg-shadow mb-4">
                    <div class="card-body card-item-container mx-spacing">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h1 class="h6 card-item-title text-secondary mb-3">Cereri de inregistrare a saloanelor</h1>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-explorer">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($salonRequests as $salon)
                                                <tr>
                                                    <td>{{ $salon->name }}</td>
                                                    <td>{{ $salon->address }}</td>
                                                    <td>{{ $salon->email }}</td>
                                                    <td>{{ $salon->phone_number }}</td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Informații</button></td>
                                                </tr>
                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Name: {{$salon->name}}</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="p-3">Address: {{$salon->address}}</div>
                                                                <div class="p-3">Email: {{$salon->email}}</div>
                                                                <div class="p-3">Phone Number: {{$salon->phone_number}}</div>
                                                                <div class="p-3">City: {{$salon->city}}</div>
                                                                <div class="p-3">Description: {{$salon->description}}</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" id="accept-salon-request" data-dismiss="modal" data-email="{{$salon->email}}" data-id="{{$salon->id}}" class="btn btn-primary">Acceptă</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="buy-button">
                                            <div id="export-salon-requests" class="btn btn-primary">Excel</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
