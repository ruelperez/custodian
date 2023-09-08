@include('partial.header')

<div style="display: flex">

    <div style="width: 19%; background-color: #4682B4">
        <div style="text-align: center; margin-top: 5%;">
{{--            <img src="{{ asset('image/profile.jpg') }}" width="50%">--}}
            <i class="fa-solid fa-user" style="font-size: 100px; color: #DCDCDC	"></i>
            <h5 style="color: white; margin-top: 5%;">ADMIN</h5>
            <form action="/Dashboard/logout" method="POST" style="margin-top: 5%;">
                @csrf
                <button type="submit" style="border: none;border-radius: 25px; width: 35%; background-color: white; color: blue; cursor: pointer;">Logout</button>
            </form>

        </div>
        <div style="width: 80%; height: 1px; background-color: white; margin-left: 10%; margin-top: 8%;"></div>
        <div style="margin-top: 3%;" class="navig">
            <div onclick="location.href = '/Dashboard/graph/';">
                GRAPH
            </div>
            <div onclick="location.href = '/Dashboard/purchase/';">
                PURCHASE REQUEST
            </div>
            <div onclick="location.href = '/Dashboard/inventory/';">
                INVENTORY
            </div>
            <div onclick="location.href = '/Dashboard/prepare/';" >
                PREPARE MATERIAL REQUEST
            </div>
            <div onclick="location.href = '/Dashboard/waste/';">
                PREPARE WASTE MATERIAL REQUEST
            </div>
            <div onclick="location.href = '/Dashboard/deployed/';">
                DEPLOYED ITEM
            </div>
            <div onclick="location.href = '/Dashboard/report/';">
                REPORTS
            </div>
        </div>
    </div>
{{--    @livewire('han')--}}
    <div style="width: 81%; margin-left: 3%;">
        <div style="@if($option != "graph") display: none; @endif">
            @livewire('graph')
        </div>
        <div style="@if($option != "purchase") display: none; @endif">
            @livewire('purchase-request')
        </div>
        <div style="@if($option != "inventory") display: none; @endif">
            @livewire('inventory')
        </div>
        <div style="@if($option != "prepare") display: none; @endif">
            @livewire('prepare')
        </div>
        @if(isset($reports))
            @if($option == "waste" and $reports == "view")
            <div>
                @livewire('waste-item',['teacher_id' => $teacher_id])
            </div>
            @endif
        @elseif($option == "waste")
            @livewire('waste')
        @endif
        <div style="@if($option != "deployed") display: none; @endif">
            @livewire('deployed')
        </div>
        @if($option == "report")
            <div>
                @if(isset($reports))
                    @if($reports == "stock-card")
                        @livewire('stock-card')
                    @elseif($reports == "property-card")
                        @livewire('property-card')
                    @elseif($reports == "waste-material")
                        @livewire('request-report')
                    @elseif($reports == "purchase-report")
                        @livewire('purchase-report')
                    @endif
                @else
                    <div>
                        <h4 style="text-align: center; margin-top: 3%;">Report</h4>
                        <div style="display: flex; margin-top: 6%;">
                            <div style="cursor: pointer; width: 30%; margin-left: 17%; height: 100px; padding-top: 25px; background-color: #FF8C00; text-align: center;color: white; font-size: 25px" onclick="location.href = '/Dashboard/data/report/stock-card';">
                                Stock Card
                            </div>
                            <div style="cursor: pointer;width: 30%; margin-left: 5%; height: 100px; background-color: #483D8B; padding-top: 10px; text-align: center;color: white; font-size: 25px" onclick="location.href = '/Dashboard/data/report/property-card';">
                                Property Card/Property Acknowledge Receipt
                            </div>
                        </div>
                        <div style="display: flex; margin-top: 4%">
                            <div style="cursor: pointer;width: 30%; margin-left: 17%; height: 100px; background-color: #008000; padding-top: 25px; text-align: center;color: white;font-size: 25px" onclick="location.href = '/Dashboard/data/report/waste-material';">
                                Request Report
                            </div>
                            <div style="cursor: pointer;width: 30%; margin-left: 5%; height: 100px; background-color: #800000; padding-top: 25px; text-align: center;color: white;font-size: 25px" onclick="location.href = '/Dashboard/data/report/purchase-report';">
                                Purchase Report
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>

</div>


@include('partial.footer')
