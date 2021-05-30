<div class="modal fade {{str_replace(' ', '', $salon['name'])}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Name: {{$salon['name']}}</h5>
            </div>
            <div class="modal-body">
                <div class="p-3">Address: {{$salon['address']}}</div>
                <div class="p-3">City: {{$salon['city']}}</div>
                <div class="p-3">Description: {{$salon['description']}}</div>
                <div class="p-3">Rating: 5 burgeri</div>
            </div>
        </div>
    </div>
</div>
