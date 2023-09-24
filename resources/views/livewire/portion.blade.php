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
                        @elseif($report == "deployed")
                            @livewire('deployed-byname')
                        @endif
                    @else
                        <div>
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
                            <div style="display: flex; margin-top: 4%">
                                <div style="cursor: pointer;width: 30%; margin-left: 17%; height: 100px; background-color: #898550; padding-top: 25px; text-align: center;color: white;font-size: 25px" wire:click="clickReport('pmr-report')">
                                    PMR Report
                                </div>
                                <div style="cursor: pointer;width: 30%; margin-left: 5%; height: 100px; background-color: #808000; padding-top: 25px; text-align: center;color: white;font-size: 25px" wire:click="clickReport('pwmr-report')">
                                    PWMR Report
                                </div>
                            </div>
                            <div style="display: flex; margin-top: 4%">
                                <div style="cursor: pointer;width: 30%; margin-left: 17%; height: 100px; background-color: #1E7770; padding-top: 25px; text-align: center;color: white;font-size: 25px; margin-bottom: 2%;" wire:click="clickReport('deployed')">
                                    Deployed Item
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>

    </div>

</div>

