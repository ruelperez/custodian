<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            font-size: 14px;
            padding: 5px;
        }
    </style>
</head>
<body>

<table style="text-align: center; width: 100%;">
    <tr>
        <td>
            <img src="{{public_path('image/header.png')}}" width="700">
        </td>
    </tr>
</table>
<table style="text-align: center; width: 100%;">
    <tr>
        <td>
            <h3>PURCHASE ORDER</h3>
        </td>
    </tr>
</table>
<table style="width: 100%; border-collapse: collapse; border: 1px solid;">
    <tr>
        <td colspan="4" style=" border: 1px solid; padding-left: 2%;">
            <b style="margin-top: 10px;">Supplier: @if($additional != "") {{ucwords($additional->supplier)}} @endif </b><br>
            <b>Address: @if($additional != "") {{ucwords($additional->address)}} @endif</b><br>
            <b>TIN: @if($additional != "") {{$additional->tin}} @endif</b>
        </td>
        <td colspan="3" style="padding-left: 2%; width: 20%;">
            <b style="margin-top: 10px;">P.O No:  @if($additional != "") {{$additional->po_num}} @endif </b><br>
            <b>Date: {{$date}}</b><br>
            <b>Mode of Procurement: @if($additional != "") {{ucwords($additional->mode)}} @endif</b>
        </td>
    </tr>
    <tr>
        <td colspan="7" style="border: solid black 1px; font-size: 14px; padding-left: 1%;">
            Gentlemen
            <p style="margin-left: 10%;">Please furnish this office the following articles subject to the terms and conditions contained herein:
        </td>
    </tr>
    <tr>
        <td colspan="4" style=" border: 1px solid; text-align: left; padding-left: 2%; padding-top: 0.5%;">
            <b style="margin-top: 1px;">Place of Delivery: @if($additional != "") {{ucwords($additional->place_delivery)}} @endif </b><br>
            <b>Date of Delivery: @if($additional != "") {{ucwords($additional->date_delivery)}} @endif </b>
        </td>
        <td colspan="3" style="text-align: left; padding-left: 2%;">
            <b style="margin-top: 1px;">Delivery Term: @if($additional != "") {{ucwords($additional->delivery_term)}} @endif </b><br>
            <b>Payment Term: @if($additional != "") {{ucwords($additional->payment_term)}} @endif </b>
        </td>
    </tr>
    <tr style="text-align: center">
        <td style="border: 1px solid;">
            <b>Stock/ <br> Property No.</b>
        </td>
        <td style="border: 1px solid;">
            <b>Unit</b>
        </td>
        <td colspan="2" style="border: 1px solid;">
            <b>Description</b>
        </td>
        <td style="border: 1px solid;">
            <b>Qunatity</b>
        </td>
        <td style="border: 1px solid;">
            <b>Unit Card</b>
        </td>
        <td style="border: 1px solid;">
            <b>Amount</b>
        </td>
    </tr>
    @php $n=1; $tot=0; @endphp
    @foreach($request_data as $data)
        <tr style="text-align: center">
            <td style="border: 1px solid;">
                {{$n}}
            </td>
            <td style="border: 1px solid;">
                {{$data->unit}}
            </td>
            <td colspan="2" style="border: 1px solid;">
                {{ucwords($data->item_name)}}
            </td>
            <td style="border: 1px solid;">
                {{$data->quantity}}
            </td>
            <td style="border: 1px solid;">
                {{$data->unit_cost}}
            </td>
            <td style="border: 1px solid;">
                {{$data->total_cost}}
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
            TOTAL
        </td>
        <td style="border: 1px solid;">
            {{$tot}}
        </td>
    </tr>
    <tr>
        <td colspan="7" style="border: 1px solid; padding-left: 1%; font-size: 14px;">
            <b>{{ucwords($totalInWords)}}</b>
        </td>
    </tr>
    <tr>
        <td colspan="7" style="padding-left: 1%; font-size: 14px;">
            In case of failure to make the full delivery within the time specified above, a penalty of one-tenth (1/10) of one percent for every day of delay shall be imposed on the undelivered items.
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <p style="margin-left: 6%;">Conforme:
            <p style="text-align: center; font-size: 14px;"><b>@if($additional != "") {{strtoupper($additional->supplier)}} @endif</b>
            <br> Signature Over Printed Name of Supplier
            <p style="text-align: center; font-size: 14px;">____________________ <br> <i style="text-align: center;">Date</i>
        </td>
        <td colspan="3" style="padding-left: 5%; text-align: center;font-size: 14px;">
            <p style="text-align: left">Very truly yours,</p>
            <b>{{strtoupper($principal)}}</b><br>
            Signature over Printed Name of Authorized<br> Secondary School Principal <br> Designation
        </td>
    </tr>
    <tr>
        <td colspan="4" style=" border: 1px solid; text-align: left; padding-left: 2%; padding-top: 0.5%;">
            <p style="margin-top: 1px;font-size: 14px;"> <b>Fund Cluster: _____________________ <br>Funds Available: _____________________</b>
            <p style="text-align: center;font-size: 14px;"><b> @if($additional != "") {{strtoupper($additional->chief)}} @endif</b><br> Signature Over Printed Name of Chief Accountant Head/Head of Accounting Division/Unit</p>
        </td>
        <td colspan="3" style=" border: 1px solid;">
            <p style="font-size: 14px;"> <b>ORS/BURS No.: _____________________ <br>Date of the ORS/BURS: _____________________<br>Amount: _____________________</b></p><p style="color: white"><br>Date of the ORS/BURS: _____________________</p>
        </td>
    </tr>
</table>


</body>
</html>


