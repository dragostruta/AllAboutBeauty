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
                                            <h1 class="h6 card-item-title text-secondary mb-3">Angajați</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <select id="choose-salon-admin-employee" class="form-select" aria-label="Default select example">
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
                                                <th scope="col">Prenume</th>
                                                <th>Nume de familie</th>
                                                <th>Adresă</th>
                                                <th>Număr de telefon</th>
                                                <th>Venituri (ultimele 30 de zile)</th>
                                            </tr>
                                            </thead>
                                            <tbody id="table-body-admin-employee">
                                            </tbody>
                                        </table>
                                        <div class="buy-button">
                                            <div id="export-employee-info" class="btn btn-primary">Excel</div>
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
