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
                                        <h1 class="h6 card-item-title text-secondary mb-3">Crează o programare</h1>
                                    </div>
                                </div>
                                <form class="create-appointment" id="create-appointment-form-field">
                                    @csrf
                                    <div id="create-appointment-salon" class="create-appointment-field form-group">
                                        <label class="create-appointment-label" for="salon">Salon</label>
                                        <select name="salon" id="create-appointment-salon-field" class="custom-select custom-select-lg mb-3">
                                            <option selected>Selectează salonul</option>
                                            @foreach($salons as $salon)
                                                <option value="{{ $salon->id }}">{{ $salon->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="create-appointment-service" class="create-appointment-field form-group">
                                        <label class="create-appointment-label" for="service">Serviciu</label>
                                        <select name="service" id="create-appointment-service-field" class="custom-select custom-select-lg mb-3">
                                            <option selected>Selectează serviciul</option>
                                        </select>
                                    </div>
                                    <div id="create-appointment-employee" class="create-appointment-field form-group">
                                        <label class="create-appointment-label" for="employee">Angajat</label>
                                        <select name="employee" id="create-appointment-employee-field" class="custom-select custom-select-lg mb-3">
                                            <option selected>Selectează angajatul</option>
                                        </select>
                                    </div>
                                    <div id="create-appointment-date" class="create-appointment-field form-group">
                                        <label class="create-appointment-label" for="date">Ziua</label>
                                        <input class="form-control" id="create-appointment-date-field" name="date" placeholder="MM/DD/YYY" type="date"/>
                                    </div>
                                    <div id="create-appointment-hour" class="create-appointment-field form-group">
                                        <label class="create-appointment-label" for="hour">Ora</label>
                                        <select name="hour" id="create-appointment-hour-field" class="custom-select custom-select-lg mb-3">
                                            <option selected>Selectează ora dorită</option>
                                        </select>
                                    </div>
                                    <div id="create-appointment-submit" class="create-appointment-field form-group">
                                        <input class="btn btn-primary" id="create-appointment-submit-field" type="submit" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
