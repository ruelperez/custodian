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
        <div style="@if($option != "purchase") display: none; @endif">
            @livewire('purchase-request')
        </div>
        <div style="@if($option != "inventory") display: none; @endif">
            @livewire('inventory')
        </div>
        <div style="@if($option != "prepare") display: none; @endif">
            @livewire('prepare')
        </div>
        <div style="@if($option != "waste") display: none; @endif">
            @livewire('waste')
        </div>
    </div>

</div>


@include('partial.footer')
