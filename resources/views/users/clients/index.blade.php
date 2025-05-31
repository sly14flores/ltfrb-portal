@extends('layouts.app')

@section('title', 'Client')

@section('content')
<div class="row gx-0">
    <div class="col-2 admin-dashboard-list mh-100   ">
        <ul class="admin-list fs-5 list-group">
            <a href="{{ route('client.create') }}" class="text-decoration-none text-white mb-1">
                <li class="fw-bold">
                    <i class="fa-solid fa-chart-line"></i> File Application
                </li>
            </a>
            <a href="{{ route('client.show') }}" class="text-decoration-none text-white">
                <li class=" fw-bold text-white">
                    <i class="fa-regular fa-envelope"></i> View Applications
                </li>
            </a>
        </ul>
    </div> 

    <div class="col-10">
        <div class="row gx-0">
            <div class="col">
                <div class="card p-5 m-2 ms-4 card-background h-100">
                    <i class="fa-solid fa-car d-block fs-1 text-primary text-center"></i>
                    <h3 class="text-center h4 mb-1">
                        File Application
                    </h3>
                    <p class="text-dark text-center">Describe the item here. Include important features, pricing and relevant info.</p>
                </div>
            </div>
            <div class="col">
                <div class="card p-5 m-2 card-background h-100">
                    <i class="fa-solid fa-user d-block fs-1 text-primary text-center"></i>
                    <h3 class="text-center h4 mb-1">
                        Pending Application
                    </h3>
                    <p class="text-dark text-center">Describe the item here. Include important features, pricing and relevant info.</p>
                </div>
            </div>
            <div class="col">
                <div class="card p-5 m-2 card-background h-100">
                    <i class="fa-regular fa-folder d-block fs-1 text-primary text-center"></i>
                    <h3 class="text-center h4 mb-1">
                        Approved Application
                    </h3>
                    <p class="text-dark text-center">Describe the item here. Include important features, pricing and relevant info.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
