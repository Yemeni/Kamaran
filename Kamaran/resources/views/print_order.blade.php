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
                                {{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}
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
                <p style="font-weight: 400; padding-left:5.4pt; text-align: center;" ><strong><u>Purchase Order</u></strong></p>
                <p style="font-weight: 400; padding-left:5.4pt;"><strong>Please supply us with the following item:</strong></p>
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
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="1">
                            <strong>Unit Price</strong>
                        </td>
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="3">
                            <strong>Total Price</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="2">
                            {{ (string) number_format($order['quantity']), 2 }} {{ $item['unit'] }}
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="1">
                            {{ (string) number_format($order['cost'], 2) }} $
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="3">
                            {{ (string) number_format($order['cost']*$order['quantity']), 2 }} $
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
                            For further information you may contact
                            @if($headOfDepartment['gender'])
                                Mr.
                               @else
                                Mrs.
                               @endif
                                {{ $headOfDepartment['name'] }}
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
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey;" colspan="2">
                            {{ $headOfDepartment['email'] }}
                        </td>
                        <td style="width: 217px; padding: 0in 5.4pt 0in 5.4pt; border: solid gray 1.5pt" colspan="1">
                            <strong>Phone</strong>
                        </td>
                        <td style="width: 421px; padding: 0in 5.4pt 0in 5.4pt; border: 1px solid grey" colspan="2">
                            +967-{{ $headOfDepartment['phone'] }}
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

        @  @media print {
            html, body {
                border: 1px solid white;
                height: 99%;
                page-break-after: avoid;
                page-break-before: avoid;
            }
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
//            $("footer").hide();

            $("footer").html("<div class='pull-right'>Printed by {{ auth()->user()->name }} || {{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}</div>");
            $( "footer" ).removeClass( "main-footer" );


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