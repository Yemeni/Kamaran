@extends('adminlte::page')

@section('title', 'Inventory Report')

@section('content_header')
    <h1>Print Order</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="header-logo">
                <img src="{{ asset('resources/Report Page Header.jpg') }}">
            </div>
            <div class="box" style="padding-left:0.0pt;">
                <table style="width: 676px;">
                    <tbody style="font-size: 10pt;">
                        <tr>
                            <td style="width: 120px; padding: 0in 5.4pt 0in 5.4pt;" colspan="1">
                                To:
                            </td>
                            <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt;" colspan="5">
                                {{ $supplier['name'] }} / {{ $supplier['email'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px; padding: 0in 5.4pt 0in 5.4pt;" colspan="1">
                                From:
                            </td>
                            <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt;" colspan="5">
                                {{ $manager['name'] }} / {{ $manager['email'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px; padding: 0in 5.4pt 0in 5.4pt;" colspan="1">
                                Date:
                            </td>
                            <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt;" colspan="5">
                                2099 99 99
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100px; padding: 0in 5.4pt 0in 5.4pt;" colspan="1">
                                Serial Number:
                            </td>
                            <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt;" colspan="5">
                                {{ $order['id'] }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <p style="font-weight: 400; padding-left:5.4pt; text-align: center;" ><strong><u>Order Report</u></strong></p>
                <p style="font-weight: 400; padding-left:5.4pt;"><strong>Dear Sir/Madam</strong>:</p>
                <p style="font-weight: 400; padding-left:5.4pt;">Your quotation is requested for the following&nbsp;item :</p>
                <table style="width: 676px;">
                    <tbody>
                    <tr style="border: 1px solid;">
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="1">
                            <strong>Item</strong>
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="5">
                            <strong>Description</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style=" padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="1">
                            {{ $item['name'] }}
                        </td>
                        <td style=" padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="5">
                            {{ $item['description'] }}
                        </td>
                    </tr>

                    <tr>
                        {{--<td style="  border-bottom:solid gray 1.5pt;"> <br/></td>--}}
                        <td style="  border-bottom: gray 1.5pt;"> <br/></td>
                    </tr>

                    <tr style="border: 1px solid;">
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="6">
                            <strong>Comment</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="6">
                            {{ $order['comment'] }}
                        </td>
                    </tr>

                    <tr>
                        {{--<td style="  border-bottom:solid gray 1.5pt;"> <br/></td>--}}
                        <td style="  border-bottom: gray 1.5pt;"> <br/></td>
                    </tr>

                    <tr style="border: 1px solid;">
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="2">
                            <strong>Quantity</strong>
                        </td>
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="2">
                            <strong>Unit Price</strong>
                        </td>
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="2">
                            <strong>Total Price</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="2">
                            {{ $order['quantity'] }} {{ $item['unit'] }}
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="2">
                            {{ $order['cost'] }} $
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="2">
                            {{ $order['cost']*$order['quantity'] }} $
                        </td>
                    </tr>

                    <tr>
                        {{--<td style="  border-bottom:solid gray 1.5pt;"> <br/></td>--}}
                        <td style="  border-bottom: gray 1.5pt;"> <br/></td>
                    </tr>

                    <tr style="border: 1px solid;">
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="2">
                            <strong>Letter of Credit</strong>
                        </td>

                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="4">
                            {{ $order['letter_of_credit'] }}
                        </td>
                    </tr>

                    <tr>
                        {{--<td style="  border-bottom:solid gray 1.5pt;"> <br/></td>--}}
                        <td style="  border-bottom: gray 1.5pt;"> <br/></td>
                    </tr>

                    <tr style="border: 1px solid;">
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="6">
                            <strong>Specification</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="6">
                            {{ $item['specification'] }}
                        </td>
                    </tr>

                    <tr>
                        {{--<td style="  border-bottom:solid gray 1.5pt;"> <br/></td>--}}
                        <td style="  border-bottom: gray 1.5pt;"> <br/></td>
                    </tr>

                    <tr style="border: 1px solid;">
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="6">
                            <strong>Correspondence</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="6">
                            For further information you may contact {{ $headOfDepartment['name'] }}
                        </td>
                    </tr>

                    <tr>
                        {{--<td style="  border-bottom:solid gray 1.5pt;"> <br/></td>--}}
                        <td style="  border-bottom: gray 1.5pt;"> <br/></td>
                    </tr>

                    <tr style="border: 1px solid;">
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="1">
                            <strong>Email</strong>
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey;" colspan="1">
                            {{ $headOfDepartment['email'] }}
                        </td>
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="1">
                            <strong>Phone</strong>
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="1">
                            +967-{{ $headOfDepartment['phone'] }}
                        </td>
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="1">
                            <strong>Ext.</strong>
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="1">
                            WTF
                        </td>
                    </tr>



                    <tr>
                        <td style="width: 638px;" colspan="6">
                            <p><strong>We expect your reply within&nbsp;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>days from sending this letter.</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 207px;">&nbsp;</td>
                        <td style="width: 10px;">&nbsp;</td>
                        <td style="width: 193px;">&nbsp;</td>
                        <td style="width: 36px;">&nbsp;</td>
                        <td style="width: 19px;">&nbsp;</td>
                        <td style="width: 173px;">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
                <p style="font-weight: 400;">&nbsp;</p>
                <p style="font-weight: 400;">Best regards</p>
                <p style="font-weight: 400;">{{ $manager['name'] }}</p>
                <p style="font-weight: 400;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p>&nbsp;</p>
            </div>

        </div>
    </div>


@stop

@section('css')
    <style>


        @media print
        {
            table { page-break-after:auto }
            tr    { page-break-inside:avoid; page-break-after:auto }
            td    { page-break-inside:avoid; page-break-after:auto }
            thead { display:table-header-group }
            tfoot { display:table-footer-group }
            /*p{*/
                /*font-family:"Calibri",sans-serif;*/
            /*}*/
        }

        .sender-info > div > p{
            margin:0;
        }

        /*p{*/
            /*font-family:"Calibri",sans-serif;*/
        /*}*/

        /*@media screen {*/
            /*div.div-header {*/
                /*display: none;*/
            /*}*/
        /*}*/
        /*@media print {*/
            /*div.div-header {*/
                /*position: fixed;*/
                /*top: 0;*/
            /*}*/
        /*}*/

    </style>
@append

@section('js')
    <script>
        $( document ).ready(function() {
            setTimeout(
                function()
                {
                    function method1(){
                        $(document).ready(function (eve) {
                            window.print();
                        });
                    }

                    function method2(){
                        location.assign('/review_orders');
                    }

                    $.ajax({
                        url:method1(),
                        success:function(){
                            method2();
                        }
                    })

                }, 200);

        });


        $(document).ready(function(){$("table tbody th, table tbody td").wrapInner("<div></div>");});

    </script>
@append