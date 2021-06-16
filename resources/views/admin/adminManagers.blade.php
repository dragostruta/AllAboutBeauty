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
                                            <h1 class="h6 card-item-title text-secondary mb-3">Manageri</h1>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-explorer">
                                            <tr>
                                                <th>Prenume</th>
                                                <th>Nume</th>
                                                <th>Email</th>
                                            </tr>
                                            </thead>
                                            <tbody id="table-body-admin-manager">
                                            @foreach($managers as $manager)
                                                <tr>
                                                    <td>{{ $manager->firstname }}</td>
                                                    <td>{{ $manager->lastname }}</td>
                                                    <td>{{ $manager->email }}</td>
                                                </tr>
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
