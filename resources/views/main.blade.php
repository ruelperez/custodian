@include('partial.header')

<div style="display: flex">

    <div style="border: solid black 1px; width: 19%;">
        <div style="text-align: center; margin-top: 5%;">
            <img src="{{ asset('image/profile.jpg') }}" width="50%">
            <h5>ADMIN</h5>
            <form action="/Dashboard/logout" method="POST">
                @csrf
                <button type="submit" style="border: none; background-color: white; color: blue; cursor: pointer;">Logout</button>
            </form>

        </div>
        <div>
            <ul class="list-group" style="width: 100%; margin-top: 40px; padding-left: 0px; text-align: center;" >
                <li class="list-group-item btn" style="@if($option == "graph") background-color: aquamarine; @endif padding-bottom: 5px; padding-top: 5px; cursor: pointer; "  onclick="location.href = '/Dashboard/graph/';">
                    GRAPH
                </li>
                <li class="list-group-item btn" style="@if($option == "purchase") background-color: aquamarine; @endif padding-bottom: 5px; padding-top: 5px;cursor: pointer;"  onclick="location.href = '/Dashboard/purchase/';">
                    PURCHASE REQUEST
                </li>
                <li class="list-group-item btn" style="@if($option == "inventory") background-color: aquamarine; @endif padding-bottom: 5px; padding-top: 5px;cursor: pointer;"  onclick="location.href = '/Dashboard/inventory/';">
                    INVENTORY
                </li>
                <li class="list-group-item btn" style="@if($option == "prepare") background-color: aquamarine; @endif padding-bottom: 5px; padding-top: 5px;cursor: pointer;"  onclick="location.href = '/Dashboard/prepare/';">
                    PREPARE MATERIAL REQUEST
                </li>
                <li class="list-group-item btn" style="@if($option == "waste") background-color: aquamarine; @endif padding-bottom: 5px; padding-top: 5px;cursor: pointer;"  onclick="location.href = '/Dashboard/waste/';">
                    PREPARE WASTE MATERIAL REQUEST
                </li>
                <li class="list-group-item btn" style="@if($option == "report") background-color: aquamarine; @endif padding-bottom: 5px; padding-top: 5px;cursor: pointer;"  onclick="location.href = '/Dashboard/report/';">
                    REPORTS
                </li>
            </ul>
        </div>
    </div>
    <div style="border: solid black 1px; width: 81%;">
        <h5 style="margin-top: 3%; margin-left: 15%;">Purchase Request</h5>
        <div style="background-color: #F5F5F5; margin-left: 2%;margin-top: 2%; width: 40%; border: solid lightslategray 1px">
            <span data-bs-toggle="modal" data-bs-target="#add_request_modal" class="bi bi-plus-circle-fill" style="font-size: 30px; color: rgb(165, 42, 42);margin-left: 45%; cursor: pointer;">+</span>
            @livewire('purchase-request')
        </div>

    </div>

</div>


@include('partial.footer')
