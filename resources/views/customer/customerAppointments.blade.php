@extends('layouts.app')

@section('content')
    <div class="container">
        <section style="margin-top: 10%">
            <div class="container space-bottom-1 mt-2 mb-5">
                <div class="card bg-shadow mb-4">
                    <div class="card-body card-item-container mx-spacing">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h1 class="h6 card-item-title text-secondary mb-3">Programari</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <select id="choose-salon-customer-appointements" class="form-select" aria-label="Default select example">
                                                <option selected>Alege salonul</option>
                                                @foreach($salons as $salon)
                                                    <option value="{{$salon->id}}">{{$salon->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-explorer">
                                            <tr>
                                                <th scope="col">Appointment Date</th>
                                                <th>Employee</th>
                                                <th>Client</th>
                                                <th>Service</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tbody id="table-admin-appointments-body">
                                            </tbody>
                                        </table>
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
