<div class="modal fade {{str_replace(' ', '', $salon->name)}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Name: {{$salon->name}}</h5>
            </div>
            <div class="modal-body">
                <div class="p-3">Manage: {{$salon->firstname . ' ' . $salon->lastname}}</div>
                <div class="p-3">Address: {{$salon->address}}</div>
                <div class="p-3">Email: {{$salon->email}}</div>
                <div class="p-3">Telefon: {{$salon->phone_number}}</div>
                <div class="p-3">Oraș: {{$salon->city}}</div>
                <div class="p-3">Descriere: {{$salon->description}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="delete-salon-request" onclick="deleteSalon(this)" data-dismiss="modal" data-email="{{$salon->email}}" data-id="{{$salon->id}}"  class="btn btn-danger">Delete</button>
                <button type="button" id="accept-salon-request" onclick="acceptSalon(this)" data-dismiss="modal" data-email="{{$salon->email}}" data-id="{{$salon->id}}" class="btn btn-primary">Acceptă</button>
            </div>
        </div>
    </div>
</div>
<script>
    async function deleteSalon(el){
        let formData = {
            'id': el.getAttribute('data-id'),
        };
        let response = await fetch('/admin/deleteSalonRequest', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        let result = await response.json();
        if (result) {
            window.location.reload();
        }
    }
    async function acceptSalon(el){
        let formData = {
            'email': el.getAttribute('data-email'),
            'id': el.getAttribute('data-id'),
        };
        let response = await fetch('/admin/acceptSalonRequest', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
        let result = await response.json();
        if (result) {
            window.location.reload();
        }
    }
</script>
