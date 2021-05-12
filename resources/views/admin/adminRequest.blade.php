@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table" style="margin-top: 25%">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nume</th>
                <th scope="col">Adresă</th>
                <th scope="col">Email</th>
                <th scope="col">Număr de telefon</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>0745701801</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>0745701801</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>0745701801</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
