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
                <div wire:click="clickPortion('graph')" @if($option == "graph") style="background-color: #00BFFF" @endif>
                    GRAPH
                </div>
                <div wire:click="clickPortion('purchase')" @if($option == "purchase") style="background-color: #00BFFF" @endif>
                    PURCHASE REQUEST
                </div>
                <div wire:click="clickPortion('inventory')" @if($option == "inventory") style="background-color: #00BFFF" @endif>
                    INVENTORY
                </div>
                <div wire:click="clickPortion('prepare')" @if($option == "prepare") style="background-color: #00BFFF" @endif>
                    PREPARE MATERIAL REQUEST
                </div>
                <div wire:click="clickPortion('waste')" @if($option == "waste") style="background-color: #00BFFF" @endif>
                    PREPARE WASTE MATERIAL REQUEST
                </div>
                <div wire:click="clickPortion('report')" @if($option == "report") style="background-color: #00BFFF" @endif>
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
            <div style="@if($option != "waste") display: none; @endif">
                @livewire('waste')
            </div>
            @if($option == "report")
                <div>
                    @if($report != 0)
                        @if($df == 0)
                            <i class="fa-solid fa-backward" style="font-size: 20px; cursor: pointer; margin-top: 3%; margin-bottom: 2%;" wire:click="clickBack"></i>
                        @endif
                        @if($report == "stock-card")
                            @livewire('stockcard-by-item')
                        @elseif($report == "property-card")
                            @livewire('property-by-item')
                        @elseif($report == "request-report")
                            @livewire('request-bydate')
                        @elseif($report == "purchase-report")
                            @livewire('purchase-bydate')
                        @elseif($report == "pmr-report")
                            @livewire('pmr-bydate')
                        @elseif($report == "pwmr-report")
                            @livewire('pwmr-byname')
                        @endif
                    @else
                        <div style="width: 70%; margin-left: 15%; margin-top: 7%;">
                            <div style="display: flex; background-color: #DCDCDC; padding-bottom: 1%; padding-top: 1%;">
                                <div style="margin-left: 10%;">
                                    <img src="{{asset('image/teacher.png')}}" width="80">
                                </div>
                                <div style="margin-left: 16%; margin-top: 3%;">
                                    <h4><b>TEACHERS</b></h4>
                                </div>
                            </div>
                            <div style="display: flex; ">
                                <div style=" cursor: pointer; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #AFEEEE;" wire:click="clickReport('stock-card')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/stock-card.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>STOCK CARD</b></h4>
                                    </div>
                                </div>
                                <div style=" cursor: pointer; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #40E0D0;" wire:click="clickReport('property-card')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/property.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 5%;">
                                        <h5><b>Property Card/Property Acknowledge Receipt</b></h5>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex;">
                                <div style=" cursor: pointer; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #FFA500;" wire:click="clickReport('request-report')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/purchase-report.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>Purchase Report</b></h4>
                                    </div>
                                </div>
                                <div style=" cursor: pointer; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #32CD32;" wire:click="clickReport('purchase-report')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/order-report.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>Order Report</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex;">
                                <div style="cursor: pointer;width: 50%; height: 100px; background-color: #898550; padding-top: 25px; text-align: center;color: white;font-size: 25px" wire:click="clickReport('pmr-report')">
                                    PMR Report
                                </div>
                                <div style="cursor: pointer;width: 50%; height: 100px; background-color: #808000; padding-top: 25px; text-align: center;color: white;font-size: 25px" wire:click="clickReport('pwmr-report')">
                                    PWMR Report
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>

    </div>

</div>

