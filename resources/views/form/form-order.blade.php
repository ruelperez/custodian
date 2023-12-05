
<table style="text-align: center; width: 100%;">
    <tr>
        <td>
            <h4>PURCHASE ORDER</h4>
        </td>
    </tr>
</table>
<table style="width: 100%; border-collapse: collapse; border: 1px solid;">
    <tr>
        <td colspan="4" style=" border: 1px solid; padding-left: 2%;">
            <h5 style="margin-top: 10px;">Supplier: {{ucwords($additional->supplier)}}</h5>
            <h5>Address: {{ucwords($additional->address)}}</h5>
            <h5>TIN: {{$additional->tin}}</h5>
        </td>
        <td colspan="3" style="padding-left: 2%; width: 20%;">
            <h5 style="margin-top: 10px;">P.O No: {{$additional->po_num}}</h5>
            <h5>Date: {{$date}}</h5>
            <h5>Mode of Procurement: {{ucwords($additional->mode)}}</h5>
        </td>
    </tr>
    <tr>
        <td colspan="7" style="border: solid black 1px; font-size: 14px; padding-left: 1%;">
            <p>Gentlemen</p>
            <p style="margin-left: 10%;">Please furnish this office the following articles subject to the terms and conditions contained herein:</p>
        </td>
    </tr>
    <tr>
        <td colspan="4" style=" border: 1px solid; text-align: left; padding-left: 2%; padding-top: 0.5%;">
            <h5 style="margin-top: 1px;">Place of Delivery:</h5>
            <h5>Date of Delivery:</h5>
        </td>
        <td colspan="3" style="text-align: left; padding-left: 2%;">
            <h5 style="margin-top: 1px;">Delivery Term:</h5>
            <h5>Payment Term:</h5>
        </td>
    </tr>
    <tr style="text-align: center">
        <td style="border: 1px solid;">
            <h5>Stock/ <br> Property No.</h5>
        </td>
        <td style="border: 1px solid;">
            <h5>Unit</h5>
        </td>
        <td colspan="2" style="border: 1px solid;">
            <h5>Description</h5>
        </td>
        <td style="border: 1px solid;">
            <h5>Qunatity</h5>
        </td>
        <td style="border: 1px solid;">
            <h5>Unit Card</h5>
        </td>
        <td style="border: 1px solid;">
            <h5>Amount</h5>
        </td>
    </tr>
    @php $n=1; $tot=0; @endphp
    @foreach($request_data as $data)
        <tr style="text-align: center">
            <td style="border: 1px solid;">
                <p>{{$n}}</p>
            </td>
            <td style="border: 1px solid;">
                <p>{{$data->unit}}</p>
            </td>
            <td colspan="2" style="border: 1px solid;">
                <p>{{ucwords($data->item_name)}}</p>
            </td>
            <td style="border: 1px solid;">
                <p>{{$data->quantity}}</p>
            </td>
            <td style="border: 1px solid;">
                <p>{{$data->unit_cost}}</p>
            </td>
            <td style="border: 1px solid;">
                <p>{{$data->total_cost}}</p>
            </td>
        </tr>
        @php $n++; $tot += $data->total_cost; @endphp
    @endforeach
    <tr style="text-align: center">
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid;">

        </td>
        <td colspan="2" style="border: 1px solid;">

        </td>
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid; text-align: right">
            <p>TOTAL</p>
        </td>
        <td style="border: 1px solid;">
            {{$tot}}
        </td>
    </tr>
    <tr>
        <td colspan="7" style="border: 1px solid; padding-left: 1%; font-size: 14px;">
            <p>{{ucwords($totalInWords)}}</p>
        </td>
    </tr>
    <tr>
        <td colspan="7" style="padding-left: 1%; font-size: 14px;">
            In case of failure to make the full delivery within the time specified above, a penalty of one-tenth (1/10) of one percent for every day of delay shall be imposed on the undelivered items.
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <p style="margin-left: 6%;">Conforme:</p>
            <p style="margin-left: 25%; font-size: 14px;">_________________________________
            <br> Signature Over Printed Name of Supplier</p>
            <p style="margin-left: 38%; font-size: 14px;">____________________ <br> <i style="margin-left: 23%;">Date</i></p>
        </td>
        <td colspan="3" style="padding-left: 5%; text-align: center;font-size: 14px;">
            <p style="text-align: left">Very truly yours,</p>
            <b><u>NELSON E. BELANO</u></b><br>
            <p>Signature over Printed Name of Authorized Official <br> Secondary School Principal <br> Designation</p>
        </td>
    </tr>
    <tr>
        <td colspan="4" style=" border: 1px solid; text-align: left; padding-left: 2%; padding-top: 0.5%;">
            <p style="margin-top: 1px;font-size: 14px;"> <b>Fund Cluster: _____________________ <br>Funds Available: _____________________</b></p>
            <p style="text-align: center;font-size: 14px;">________________________________________<br> Signature Over Printed Name of Chief Accountant Head/Head of Accounting Division/Unit</p>

        </td>
        <td colspan="3" style="text-align: left; padding-left: 2%; border: 1px solid;">
            <p style="margin-top: 1px;font-size: 14px;"> <b>ORS/BURS No.: _____________________ <br>Date of the ORS/BURS: _____________________<br>Amount: _____________________</b></p>
        </td>
    </tr>
</table>





