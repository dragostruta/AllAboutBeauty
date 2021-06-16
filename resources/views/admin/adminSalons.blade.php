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
                                            <h1 class="h6 card-item-title text-secondary mb-3">Saloane</h1>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-explorer">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th>Address</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($salons as $salon)
                                                <tr>
                                                    <td>{{ $salon->name }}</td>
                                                    <td>{{ $salon->address }}</td>
                                                    <td>{{ $salon->email }}</td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".{{str_replace(' ', '', $salon->name)}}">Informații</button></td>
                                                </tr>
                                                @include('admin.adminSalonModal', ['salon' => $salon])
                                            @endforeach
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
