<div class="modal fade" id="app-{{ $app->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Application Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="row mb-1">
                        <div class="col-6">
                            Application Type:
                        </div>
                        <div class="col-6">
                            {{  $app->type->name  }}
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            Denomination:
                        </div>
                        <div class="col-6">
                            {{ $app->deno->name }}
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            Chassis Number:
                        </div>
                        <div class="col-6">
                            {{ $app->chassis_number }}
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            Motor Number:
                        </div>
                        <div class="col-6">
                            {{ $app->motor_number }}
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            Plate Number:
                        </div>
                        <div class="col-6">
                            {{ $app->plate_number }}
                        </div>
                    </div>
            
            
            
                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: 25%">25%</div>
                    </div>
                    <p> Checking </p>
                    <hr>
                    Note:
                        There is no note!
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">OK</button>
                </div>
            </div>
    </div>
</div>

{{-- requirements --}}

<div class="modal fade" id="requirements-{{ $app->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Application Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dropping.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                        <input type="hidden" name="app_id" value="{{ $app->id }}">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                Verified Application Petition
                            </div>
                            <div class="col-6">
                                <input type="file" name="vap" id="vap" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                Original copy of valid Gov't. issued ID
                            </div>
                            <div class="col-6">
                                <input type="file" name="gov_id" id="gov_id" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                Original copy of LTO OR/CR of unit
                            </div>
                            <div class="col-6">
                                <input type="file" name="orcr" id="orcr" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                Original copy of Surrender of Plates/Return Receipt of Plates

                            </div>
                            <div class="col-6">
                                <input type="file" name="surrender" id="surrender" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                If Loss Plate, Affidavit of Loss, Police Report, Cert. of Non Apprehension
                            </div>
                            <div class="col-6">
                                <input type="file" name="cert_non_apprehension" id="cert_non_apprehension" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                If No Yellow Plate, Updated LTO Cert. of No Hire Plates Issued with Receipt
                            </div>
                            <div class="col-6">
                                <input type="file" name="lto_cert" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                Updated LTO Authorization to use Improvised plate with Receipt
                            </div>
                            <div class="col-6">
                                <input type="file" name="lto_auth" id="lto_auth" class="form-control">
                            </div>
                        </div>
                  
            
            
                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: 25%">25%</div>
                    </div>
                    <p> Checking </p>
                    <hr>
                    Note:
                        There is no note!
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
            </div>
    </div>
</div>

{{-- display --}}
<div class="modal fade" id="display-requirements-{{ $app->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Show Requirements</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            @if ($app->dropping)
                <div class="row">
                    <div class="col">Verified Application Petition</div>
                    <div class="col"><img src="{{ $app->dropping->vap }}" alt="" class="req-image"></div>
                </div>
                <div class="row">
                    <div class="col">Original copy of valid Gov't. issued ID</div>
                    <div class="col"><img src="{{ $app->dropping->gov_id }}" alt="" class="req-image"></div>
                </div>
                <div class="row">
                    <div class="col">Original copy of LTO OR/CR of unit</div>
                    <div class="col"><img src="{{ $app->dropping->or_cr }}" alt="" class="req-image"></div>
                </div>
                <div class="row">
                    <div class="col">Original copy of Surrender of Plates/Return Receipt of Plates</div>
                    <div class="col"><img src="{{ $app->dropping->surrender_of_plates }}" alt="" class="req-image"></div>
                </div>
                <div class="row">
                    <div class="col">If Loss Plate, Affidavit of Loss, Police Report, Cert. of Non Apprehension</div>
                    <div class="col"><img src="{{ $app->dropping->non_apprehension }}" alt="" class="req-image"></div>
                </div>
                <div class="row">
                    <div class="col">If No Yellow Plate, Updated LTO Cert. of No Hire Plates Issued with Receipt</div>
                    <div class="col"><img src="{{ $app->dropping->lto_cert }}" alt="" class="req-image"></div>
                </div>
        
                <div class="row">
                    <div class="col">Updated LTO Authorization to use Improvised plate with Receipt</div>
                    <div class="col"><img src="{{ $app->dropping->lto_auth }}" alt="" class="req-image"></div>
                </div>
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>