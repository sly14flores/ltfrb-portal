<div class="modal fade" id="app-{{ $app->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: black;">Application Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body" style="color: black;">
                <div class="row mb-1">
                    <div class="col-6">
                        Application Type:
                    </div>
                    <div class="col-6">
                        {{ $app->type->name }}
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

                <!-- Progress Bar -->
                <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: 25%">25%</div>
                </div>
                <p> Checking </p>
                <hr>
                <p><strong>Note:</strong> There is no note!</p>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <!-- Close button that dismisses the modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <!-- OK button that also dismisses the modal -->
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
