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
                                        <div class="col-md-10">
                                            <h1 class="h6 card-item-title text-secondary mb-3">Angajați</h1>
                                        </div>
                                        <div class="col-md-1">
                                            <div id="add-employee" data-toggle="modal" data-target=".add-employee" class="btn btn-primary">Adauga</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9 pb-3">
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
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="table-body-admin-employee">
                                            </tbody>
                                        </table>
                                        <div class="buy-button">
                                            <div id="export-employee-info" class="btn btn-primary">Excel</div>
                                        </div>
                                    </div>
                                    <div class="modal fade add-employee" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Adaugă Angajat</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form id="add-employee-form">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="employee-firstname">Prenume</label>
                                                                <input type="text" class="form-control" id="employee-firstname" placeholder="Prenume">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="employee-lastname">Nume</label>
                                                                <input type="text" class="form-control" id="employee-lastname" placeholder="Nume">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="employee-email">Email</label>
                                                                <input type="email" class="form-control" id="employee-email" placeholder="Email">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="employee-password">Parolă</label>
                                                                <input type="password" class="form-control" id="employee-password" placeholder="Parolă">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="employee-address">Adresă</label>
                                                                <input type="text" class="form-control" id="employee-address" placeholder="Adresă">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="employee-city">Oraș</label>
                                                                <input type="text" class="form-control" id="employee-city" placeholder="Oraș">
                                                            </div>
                                                        </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="employee-phone">Telefon</label>
                                                                    <input type="text" class="form-control" id="employee-phone" placeholder="Telefon">
                                                                </div>
                                                            </div>
                                                        <div class="form-row">
                                                            <label for="employee-salon">Salon</label>
                                                            <select id="employee-salon" class="form-control">
                                                                <option selected>Alege salon</option>
                                                                @foreach($salons as $salon)
                                                                    <option value="{{$salon->id}}">{{$salon->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-row pt-3">
                                                            <button type="submit" id="employee-add" class="btn btn-primary">Adaugă</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
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
