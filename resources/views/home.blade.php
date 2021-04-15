@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form class="create-appointment">
            @csrf
            <div class="create-appointment-title">Creează Programare</div>
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
                <label class="create-appointment-label" for="service">Ora</label>
                <select name="hour" class="custom-select custom-select-lg mb-3">
                    <option selected>Selectează ora dorită</option>
                </select>
            </div>
        </form>
    </div>
</div>
@endsection
