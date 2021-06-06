<div class="row justify-content-center">
    <div class="col-12 text-center">
        <div class="section-title mb-0 pb-2">
            <div class="modal fade {{str_replace(' ', '', $salon['name'])}}" tabindex="-1" role="dialog"
                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content rounded shadow">
                        <div class="modal-header justify-content-center">
                            <h5 class="modal-title" id="exampleModalLabel">{{$salon['name']}}</h5>
                        </div>
                        <div class="modal-body">
                            <div class="p-3">{{$salon['address']}}</div>
                            <div class="p-3">{{$salon['city']}}</div>
                            <div class="p-3">{{$salon['description']}}</div>
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-star h4 mb-0 text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star h4 mb-0 text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star h4 mb-0 text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star h4 mb-0 text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star-half mb-0 h4 text-warning"></i></li>
                                <li class="list-inline-item">4.5 Stele <span class="text-muted">(380 Review-uri primite)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->

