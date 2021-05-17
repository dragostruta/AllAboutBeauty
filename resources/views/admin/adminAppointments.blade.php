@extends('layouts.app')

@section('content')
    <div class="container">
        <section style="margin-top: 30%">
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
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-explorer">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th>Address</th>
                                                <th>Info</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>HairTestName</td>
                                                <td>AddressName</td>
                                                <td>InfoName</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="buy-button">
                                            <div class="btn btn-primary">Excel</div>
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
