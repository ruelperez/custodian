<div>
    <div style="display: flex; width: 100%;">

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
                <div wire:click="clickPortion('graph')">
                    GRAPH
                </div>
                <div wire:click="clickPortion('purchase')">
                    PURCHASE REQUEST
                </div>
                <div wire:click="clickPortion('inventory')">
                    INVENTORY
                </div>
                <div wire:click="clickPortion('prepare')">
                    PREPARE MATERIAL REQUEST
                </div>
                <div wire:click="clickPortion('waste')">
                    PREPARE WASTE MATERIAL REQUEST
                </div>
                <div wire:click="clickPortion('report')">
                    REPORTS
                </div>
            </div>
        </div>
        {{--    @livewire('han')--}}
        <div style="width: 81%; margin-left: 3%; margin-right: 3%;">
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
{{--            @if(isset($reports))--}}
{{--                @if($option == "waste" and $reports == "view")--}}
{{--                    <div>--}}
{{--                        @livewire('waste-item',['teacher_id' => $teacher_id])--}}
{{--                    </div>--}}
{{--                @endif--}}
            <div style="@if($option != "waste") display: none; @endif">
                @livewire('waste')
            </div>
            @if($option == "report")
                <div>
                    @if($report != 0)
                        @if($df == 0)
                            <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%;" wire:click="clickBack"></i>
                        @endif
                        @if($report == "stock-card")
                            @livewire('stock-card')
                        @elseif($report == "property-card")
                            @livewire('property-card')
                        @elseif($report == "request-report")
                            @livewire('request-bydate')
                        @elseif($report == "purchase-report")
                            @livewire('purchase-report')
                        @endif
                    @else
                        <div>
                            <h5 style="margin-left: 1%; margin-top: 3%;">Report</h5>
                            <div style="display: flex; margin-top: 6%;">
                                <div style="cursor: pointer; width: 30%; margin-left: 17%; height: 100px; padding-top: 25px; background-color: #FF8C00; text-align: center;color: white; font-size: 25px" wire:click="clickReport('stock-card')">
                                    Stock Card
                                </div>
                                <div style="cursor: pointer;width: 30%; margin-left: 5%; height: 100px; background-color: #483D8B; padding-top: 10px; text-align: center;color: white; font-size: 25px" wire:click="clickReport('property-card')">
                                    Property Card/Property Acknowledge Receipt
                                </div>
                            </div>
                            <div style="display: flex; margin-top: 4%">
                                <div style="cursor: pointer;width: 30%; margin-left: 17%; height: 100px; background-color: #008000; padding-top: 25px; text-align: center;color: white;font-size: 25px" wire:click="clickReport('request-report')">
                                    Request Report
                                </div>
                                <div style="cursor: pointer;width: 30%; margin-left: 5%; height: 100px; background-color: #800000; padding-top: 25px; text-align: center;color: white;font-size: 25px" wire:click="clickReport('purchase-report')">
                                    Purchase Report
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>

    </div>

</div>
<script>
    function clickBack(){
        window.livewire.emit('clickBack1');
    }

    function clickBk(){
        window.livewire.emit('clickBack2')
    }

    function moveBup(){
        if(confirm('Are you sure to move all item to backup folder?')){
            window.livewire.emit('movetoBup');
        }
    }

    function moveInv(){
        if(confirm('Are you sure to move all item to backup folder?')){
            window.livewire.emit('moveToInv');
        }
    }

</script>
