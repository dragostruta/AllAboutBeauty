@extends('layouts.app')

@section('content')
    <div class="container">
        <section style="margin-top: 10%">
            <div class="container space-bottom-1 mt-2 mb-5">
                <div class="card bg-shadow mb-4">
                    <div class="card-body card-item-container mx-spacing">
                        <form id="edit-user-form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputFirstName">Prenumele</label>
                                    <input type="text" class="form-control" id="inputFirstName" value="{{$user->firstname}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputLastName">Numele de familie</label>
                                    <input type="text" class="form-control" id="inputLastName" value="{{$user->lastname}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" value="{{$user->email}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                            </div>
                            <button id="edit-user-submit" type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
