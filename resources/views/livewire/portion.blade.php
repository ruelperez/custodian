<div>
    @include('modal.changePassModal')
    <div style="display: flex; width: 100%;">

        <div style="width: 19%; background-color: #0077b6">
            <div style="position: relative;">
                <div style="text-align: center; margin-top: 10%; position: absolute; width: 100%;">
                    <div style="display: flex;">
                        <i onclick="clickEllipsis()" class="fa-solid fa-ellipsis-vertical" id="ellip" style="color: white; margin-left: 10%;font-size: 23px; cursor: pointer; margin-right: 22%;"></i>
                        <i class="fa-solid fa-user" style="font-size: 100px; color: #DCDCDC	"></i>
                    </div>
                    <h5 style="color: white; margin-top: 5%;">ADMIN</h5>
{{--                    <form action="/Dashboard/logout" method="POST" style="margin-top: 5%;">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" style="border: none;border-radius: 25px; width: 35%; background-color: white; color: blue; cursor: pointer;">Logout</button>--}}
{{--                    </form>--}}
                </div>
                <div class="div100" style="display: none; width: 70%; padding: 5px 12px; background-color: #0d1321;  border: solid black 3px;border-radius: 12px;  position: relative; margin-left: 10%; top: 52px;
                    z-index: 2; /* Make sure this is lower than the z-index of the covering div */
                  color: white;">
                    <div wire:click="clickPortion('logs')" wire:loading.attr="disabled"><i class="fa-solid fa-tent-arrow-left-right"></i> Logs</div>
                    <div wire:click="clickPortion('designation')" style=" margin-top: 5%;" wire:loading.attr="disabled"> <i class="fa-solid fa-marker"></i> Designator</div>
                    <div style=" margin-top: 5%;" data-bs-toggle="modal" data-bs-target="#changePassModal"><i class="fa-solid fa-pen-nib"></i> Change Password</div>
                    <div style="margin-top: 15%;">
                        <form action="/Dashboard/logout" method="POST">
                            @csrf
                            <button type="submit" style="background-color: #0d1321; border: none; width: 100%; text-align: right; color: white "><i class="fa-solid fa-right-from-bracket"></i>Log Out</button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="div101" style="width: 80%; height: 1px; background-color: white; margin-left: 10%; margin-top: 75%;"></div>
            <div style="margin-top: 3%;" class="navig">
                <div wire:click="clickPortion('graph')" wire:loading.attr="disabled" @if($option == "graph") style="background-color: #023e8a" @endif>
                    DASHBOARD
                </div>
                <div wire:click="clickPortion('purchase')" wire:loading.attr="disabled" @if($option == "purchase") style="background-color: #023e8a" @endif>
                    PURCHASE REQUEST
                </div>
                <div wire:click="clickPortion('inventory')" wire:loading.attr="disabled" @if($option == "inventory") style="background-color: #023e8a" @endif>
                    INVENTORY
                </div>
                <div wire:click="clickPortion('prepare')" wire:loading.attr="disabled" @if($option == "prepare") style="background-color: #023e8a" @endif>
                    PREPARE MATERIAL REQUEST
                </div>
                <div wire:click="clickPortion('waste')" wire:loading.attr="disabled" @if($option == "waste") style="background-color: #023e8a" @endif onclick="clickWaste()">
                    PREPARE WASTE MATERIAL REQUEST
                </div>
                <div wire:click="clickPortion('report')" wire:loading.attr="disabled" @if($option == "report") style="background-color: #023e8a" @endif>
                    REPORTS
                </div>
            </div>
        </div>
        {{--    @livewire('han')--}}
        <div style="width: 81%; margin-left: 3%; margin-right: 1%;">
            <div class="spinner-border spin" wire:loading wire:target="clickPortion('graph')" style="width: 70px; height: 70px; font-size: 30px; margin-left: 43%; margin-top: 20%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-border spin" wire:loading wire:target="clickPortion('designation')" style="width: 70px; height: 70px; font-size: 30px; margin-left: 43%; margin-top: 20%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-border spin" wire:loading wire:target="clickPortion('logs')" style="width: 70px; height: 70px; font-size: 30px; margin-left: 43%; margin-top: 20%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-border spin" wire:loading wire:target="clickPortion('purchase')" style="width: 70px; height: 70px; font-size: 30px; margin-left: 43%; margin-top: 20%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-border spin" wire:loading wire:target="clickPortion('waste')" style="width: 70px; height: 70px; font-size: 30px; margin-left: 43%; margin-top: 20%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-border spin" wire:loading wire:target="clickPortion('inventory')" style="width: 70px; height: 70px; font-size: 30px; margin-left: 43%; margin-top: 20%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-border spin" wire:loading wire:target="clickPortion('prepare')" style="width: 70px; height: 70px; font-size: 30px; margin-left: 43%; margin-top: 20%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-border spin" wire:loading wire:target="clickPortion('report')" style="width: 70px; height: 70px; font-size: 30px; margin-left: 43%; margin-top: 20%;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div style="@if($option != "logs") display: none; @endif" wire:loading.remove>
                @livewire('logs')
            </div>
            <div style="@if($option != "designation") display: none; @endif" wire:loading.remove>
                @livewire('designation')
            </div>
            <div style="@if($option != "graph") display: none; @endif" wire:loading.remove>
                @livewire('graph',['month' => $mos, 'mon' => $mons, 'item_type' => $item_type])
            </div>
            <div style="@if($option != "purchase") display: none; @endif" wire:loading.remove>
                @livewire('purchase-request')
            </div>
            <div style="@if($option != "inventory") display: none; @endif" wire:loading.remove>
                @livewire('inventory')
            </div>
            @if($option == "prepare")
                <div wire:loading.remove>
                    @livewire('prepare')
                </div>
            @endif
            @if($option == "waste")
                <div wire:loading.remove>
                    @livewire('waste')
                </div>
            @endif
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
                        @elseif($report == "par-report")
                            @livewire('par-bydate')
                        @elseif($report == "pwmr-report")
                            @livewire('pwmr-byname',['waste' => $option])
                        @elseif($report == "teacher")
                            @livewire('teacher-byname')
                        @endif
                    @else
                        <div style="width: 70%; margin-left: 15%; margin-top: 7%;">
                            <div onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" style="display: flex; cursor: pointer; background-color: #DCDCDC; padding-bottom: 1%; padding-top: 1%;" wire:click="clickReport('teacher')">
                                <div style="margin-left: 10%;">
                                    <img src="{{asset('image/teacher.png')}}" width="80">
                                </div>
                                <div style="margin-left: 16%; margin-top: 3%;">
                                    <h4><b>TEACHERS</b></h4>
                                </div>
                            </div>
                            <div style="display: flex; margin-top: 1%;">
                                <div onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" style=" cursor: pointer; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #AFEEEE;" wire:click="clickReport('stock-card')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/stock-card.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>STOCK CARD</b></h4>
                                    </div>
                                </div>
                                <div onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" style="cursor: pointer; margin-left: 1%; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #40E0D0;" wire:click="clickReport('property-card')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/Propertycard icon.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 5%;">
                                        <h4><b>Property Card</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; margin-top: 1%;">
                                <div onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" style="cursor: pointer; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #FFA500;" wire:click="clickReport('request-report')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/purchase-report.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>Purchase Requests</b></h4>
                                    </div>
                                </div>
                                <div onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" style="cursor: pointer;margin-left: 1%;  display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #32CD32;" wire:click="clickReport('purchase-report')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/Order report.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>Purchase Orders</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; margin-top: 1%;">
                                <div onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" style="cursor: pointer; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #FFE4E1;" wire:click="clickReport('pmr-report')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/ICS.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>ICS Report</b></h4>
                                    </div>
                                </div>
                                <div onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" style=" cursor: pointer; margin-left: 1%;  display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #DB7093				;" wire:click="clickReport('pwmr-report')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/waste icon.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>P.W.M.R Report</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; margin-top: 1%;">
                                <div onmouseover="hoverIn(this)" onmouseout="hoverOut(this)" style=" cursor: pointer; display: flex; width: 50%; height: 100px; padding-top: 1%; padding-bottom: 1%; background-color: #6B8E23; color: white; margin-left: 25%;" wire:click="clickReport('par-report')">
                                    <div style="margin-left: 5%;">
                                        <img src="{{asset('image/PAR.png')}}" width="80">
                                    </div>
                                    <div style="margin-left: 8%; margin-top: 7%;">
                                        <h4><b>P.A.R Report</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>

    </div>

</div>

