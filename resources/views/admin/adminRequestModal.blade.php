<div class="modal fade {{$salon->name}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Name: {{$salon->name}}</h5>
            </div>
            <div class="modal-body">
                <div class="p-3">Address: {{$salon->address}}</div>
                <div class="p-3">Email: {{$salon->email}}</div>
                <div class="p-3">Phone Number: {{$salon->phone_number}}</div>
                <div class="p-3">City: {{$salon->city}}</div>
                <div class="p-3">Description: {{$salon->description}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="accept-salon-request" data-dismiss="modal" data-email="{{$salon->email}}" data-id="{{$salon->id}}" class="btn btn-primary">Acceptă</button>
            </div>
        </div>
    </div>
</div>
