@include('partial.header')

<div style="display: flex">

    <div style="width: 19%;">
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
    <div style="width: 81%; margin-left: 3%;">
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
        <div style="@if($option != "report") display: none; @endif">
            @if(isset($reports))
                @if($reports == "stock-card")
                    @livewire('stock-card')
                @elseif($reports == "property-card")
                    @livewire('property-card')
                @elseif($reports == "waste-material")
                    @livewire('waste-report')
                @elseif($reports == "purchase-report")
                    @livewire('purchase-report')
                @endif
            @else
                <div>
                    <h4 style="text-align: center; margin-top: 3%;">Report</h4>
                    <div style="display: flex; margin-top: 6%;">
                        <div style="cursor: pointer; width: 30%; margin-left: 17%; height: 100px; padding-top: 25px; background-color: #FF8C00; text-align: center;color: white; font-size: 25px" onclick="location.href = '/Dashboard/report/stock-card';">
                            Stock Card
                        </div>
                        <div style="cursor: pointer;width: 30%; margin-left: 5%; height: 100px; background-color: #483D8B; padding-top: 10px; text-align: center;color: white; font-size: 25px" onclick="location.href = '/Dashboard/report/property-card';">
                            Property Card/Property Acknowledge Receipt
                        </div>
                    </div>
                    <div style="display: flex; margin-top: 4%">
                        <div style="cursor: pointer;width: 30%; margin-left: 17%; height: 100px; background-color: #008000; padding-top: 25px; text-align: center;color: white;font-size: 25px" onclick="location.href = '/Dashboard/report/waste-material';">
                            Purchase Request
                        </div>
                        <div style="cursor: pointer;width: 30%; margin-left: 5%; height: 100px; background-color: #800000; padding-top: 25px; text-align: center;color: white;font-size: 25px" onclick="location.href = '/Dashboard/report/purchase-report';">
                            Purchase Order
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

</div>


@include('partial.footer')
