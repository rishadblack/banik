<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Invoice</title>
    @push('css')
        <style>

        </style>
    @endpush
</head>

<body>
    <div>
        <div class=WordSection1>
            <div align=center>
                <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
                    style='border-collapse:collapse;border:none'>
                    <tr>
                        <td width=144 colspan=3 style='width:107.75pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
                        </td>

                        <td width=396 colspan=2 rowspan=2 style='width:297.0pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Sree Sree Hari
                                    Shohay</span>
                            </p>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'>
                                <b><span style='font-size:15s.0pt;font-family:"Arial",sans-serif'>M/s Banik
                                        Store</span></b>
                            </p>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Proprietor : Shyam Sundar
                                    Banik</span>
                            </p>
                            <p class=MsoNormal align=center
                                style='margin-bottom:.2in;text-align:center; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>D-56, Savar Bazar, Savar,
                                    Dhaka. Contact : 01727-333106, 01779-205238</span>
                            </p>

                        </td>

                        <td width=156 colspan=3 style='width:117.0pt;padding:0in 5.4pt 0in 5.4pt'>

                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:1px'>
                                <b><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>Sales
                                        Invoice</span></b>
                            </p>
                        </td>
                        <td style='border:none;padding:0in 0in 0in 0in' width=2>
                            <p class='MsoNormal'>&nbsp;
                        </td>
                    </tr>

                    <tr>
                        <td width=144 colspan=3 style='width:107.75pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
                        </td>

                        <td width=156 colspan=3 style='width:117.0pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>[Barcode]</span>
                            </p>

                        </td>

                        <td style='border:none;padding:0in 0in 0in 0in' width=2>
                            <p class='MsoNormal'>&nbsp;
                        </td>
                    </tr>

                    <tr style='height:.05in'>
                        <td width=96 style='width:71.75pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Customer ID</span></p>

                        </td>
                        <td width=18 style='width:13.5pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span>
                            </p>

                        </td>

                        <td width=348 colspan=2 style='width:261.0pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->contact_id }}</span>
                            </p>

                        </td>
                        <td width=96 colspan=2 style='width:1.0in;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Date</span></p>

                        </td>
                        <td width=18 style='width:13.6pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span>
                            </p>

                        </td>

                        <td width=121 colspan=2 style='width:91.1pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->order_date }}</span>
                            </p>

                        </td>
                    </tr>

                    <tr style='height:.05in'>

                        <td width=96 style='width:71.75pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal
                                style='margin-bottom:0in;line-height:normal;margin-top:1px;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Customer Name</span></p>

                        </td>
                        <td width=18 style='width:13.5pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span>
                            </p>

                        </td>
                        <td width=348 colspan=2 style='width:261.0pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>

                            <p class=MsoNormal
                                style='margin-bottom:0in;line-height:normal;margin-top:1px;margin-top:1px'><b><span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->contactinfo->name }}</span></b>
                            </p>

                        </td>

                        <td width=96 colspan=2 style='width:1.0in;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal
                                style='margin-bottom:0in;line-height:normal;margin-top:1px;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Invoice ID</span></p>

                        </td>
                        <td width=18 style='width:13.6pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span>
                            </p>

                        </td>

                        <td width=121 colspan=2 style='width:91.1pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal
                                style='margin-bottom:0in;line-height:normal;margin-top:1px;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->code }}</span>
                            </p>

                        </td>
                    </tr>

                    <tr style='height:.05in'>

                        <td width=96 style='width:71.75pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal
                                style='margin-bottom:0in;line-height:normal;margin-top:1px;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Business Name</span></p>

                        </td>

                        <td width=18 style='width:13.5pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span>
                            </p>

                        </td>

                        <td width=348 colspan=2 style='width:261.0pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal
                                style='margin-bottom:0in;line-height:normal;margin-top:1px;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->contact->company_name }}</span>
                            </p>

                        </td>
                        <td width=96 colspan=2 style='width:1.0in;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Sold By</span></p>

                        </td>

                        <td width=18 style='width:13.6pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span>
                            </p>

                        </td>

                        <td width=121 colspan=2 style='width:91.1pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ auth()->user()->name }}</span>
                            </p>

                        </td>

                    </tr>
                    <tr style='height:.05in'>

                        <td width=96 style='width:71.75pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Address</span></p>

                        </td>

                        <td width=18 style='width:13.5pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span>
                            </p>

                        </td>

                        <td width=348 colspan=2 style='width:261.0pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->contact->address }}</span>
                            </p>

                        </td>

                        <td width=96 colspan=2 style='width:1.0in;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Warehouse</span></p>

                        </td>

                        <td width=18 style='width:13.6pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span>
                            </p>

                        </td>

                        <td width=121 colspan=2 style='width:91.1pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->Warehouse->name }}</span>
                            </p>

                        </td>

                    </tr>

                    <tr style='height:.05in'>

                        <td width=96 style='width:71.75pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Contact No.</span></p>

                        </td>
                        <td width=18 style='width:13.5pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span></p>

                        </td>

                        <td width=348 colspan=2 style='width:261.0pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->contactinfo->mobile }}</span>
                            </p>

                        </td>
                        <td width=96 colspan=2 style='width:1.0in;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Delivery Status</span></p>

                        </td>

                        <td width=18 style='width:13.6pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span></p>

                        </td>

                        <td width=121 colspan=2 style='width:91.1pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                                    @if ($order->payment_status == 1)
                                        <span>Paid</span>
                                    @elseif ($order->payment_status == 2)
                                        <span>Due</span>
                                    @elseif ($order->payment_status == 3)
                                        <span>Cancel</span>
                                    @endif
                                </span>
                            </p>
                        </td>
                    </tr>
                    <tr style='height:.05in'>
                        <td width=96 style='width:71.75pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Reference</span></p>

                        </td>

                        <td width=18 style='width:13.5pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span></p>

                        </td>

                        <td width=348 colspan=2 style='width:261.0pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->ref }}</span>
                            </p>

                        </td>

                        <td width=96 colspan=2 style='width:1.0in;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Payment Status</span></p>

                        </td>

                        <td width=18 style='width:13.6pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>:</span></p>

                        </td>

                        <td width=121 colspan=2 style='width:91.1pt;padding:0in 5.4pt 0in 5.4pt; height:.15in'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                                    @if ($order->payment_status == 1)
                                        <span>Receipt</span>
                                    @elseif ($order->payment_status == 2)
                                        <span>Pending</span>
                                    @elseif ($order->payment_status == 3)
                                        <span> Hold</span>
                                    @elseif ($order->payment_status == 4)
                                        <span>Cancel</span>
                                    @endif

                                </span></p>

                        </td>

                    </tr>

                    <tr height=0>
                        <td width=96 style='border:none'></td>
                        <td width=18 style='border:none'></td>
                        <td width=30 style='border:none'></td>
                        <td width=318 style='border:none'></td>
                        <td width=78 style='border:none'></td>
                        <td width=18 style='border:none'></td>
                        <td width=18 style='border:none'></td>
                        <td width=120 style='border:none'></td>
                        <td width=2 style='border:none'></td>
                    </tr>

                </table>

            </div>

            <p class=MsoNormal style='margin-bottom:0in;margin-top:0.5px;'><span
                    style='font-size:5.0pt; line-height:107%;font-family:"Arial",sans-serif'>&nbsp;</span></p>

            <div align=center>


                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
                    style='border-collapse:collapse;border:none'>

                    <tr style='height:12.25pt'>

                        <td width=36
                            style='width:26.8pt;border:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt; height:12.25pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                <b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Sl</span></b>
                            </p>

                        </td>
                        <td width=385 colspan=3
                            style='width:288.6pt;border:solid windowtext 1.0pt; border-left:none;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                <b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Product
                                        Description/
                                        SKU</span></b>
                            </p>

                        </td>
                        <td width=96
                            style='width:72.15pt;border:solid windowtext 1.0pt;border-left: none;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Unit
                                        Price</span></b>
                            </p>

                        </td>

                        <td width=84
                            style='width:63.1pt;border:solid windowtext 1.0pt;border-left: none;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                <b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Quantity</span></b>
                            </p>

                        </td>

                        <td width=96
                            style='width:72.15pt;border:solid windowtext 1.0pt;border-left: none;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Amount</span></b>
                            </p>

                        </td>

                    </tr>
                    @foreach ($order->OrderItem as $OrderItem)
                        <tr style='height:12.25pt'>

                            <td width=36
                                style='width:26.8pt;border:solid windowtext 1.0pt;border-top: none;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                                <p class=MsoNormal align=center
                                    style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                    <span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $OrderItem->id }}</span>
                                </p>

                            </td>
                            <td width=385 colspan=3
                                style='width:288.6pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                                <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:0px'>
                                    <span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $OrderItem->name }}</span>
                                </p>

                            </td>
                            <td width=96
                                style='width:72.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                                <p class=MsoNormal align=right
                                    style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                    <span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ numberFormat($OrderItem->amount) }}</span>
                                </p>

                            </td>
                            <td width=84
                                style='width:63.1pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt; height:12.25pt'>
                                <p class=MsoNormal align=center
                                    style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                    <span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $OrderItem->quantity }}</span>
                                </p>

                            </td>

                            <td width=96
                                style='width:72.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                                <p class=MsoNormal align=right
                                    style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                    <span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ numberFormat($OrderItem->subtotal) }}</span>
                                </p>

                            </td>
                        </tr>
                    @endforeach
                    <tr style='height:12.25pt'>

                        <td width=421 colspan=4
                            style='width:315.4pt;border-top:none;border-left: solid windowtext 1.0pt;border-bottom:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Purchase Note :
                                    {{ $order->ref }}</span>
                            </p>

                        </td>

                        <td width=180 colspan=2
                            style='width:135.25pt;border:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Subtotal</span>
                            </p>

                        </td>

                        <td width=96
                            style='width:72.15pt;border:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ numberFormat($order->subtotal) }}</span>
                            </p>

                        </td>
                    </tr>

                    <tr style='height:12.25pt'>

                        <td width=167 colspan=2
                            style='width:125.0pt;border:none;border-left:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span>
                            </p>

                        </td>
                        <td width=157 style='width:117.75pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.25pt'>
                            {{-- <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:0px'><span
                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>Previous Due</span></p> --}}

                        </td>

                        <td width=97
                            style='width:72.65pt;border:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            {{-- <p class=MsoNormal align=right
                    style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                    <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>[Prev_Due]</span>
                </p> --}}

                        </td>

                        <td width=180 colspan=2
                            style='width:135.25pt;border:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>(-) Discount/
                                    Rounding</span>
                            </p>

                        </td>

                        <td width=96
                            style='width:72.15pt;border:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->discount }}</span>
                            </p>

                        </td>
                    </tr>

                    <tr style='height:12.25pt'>

                        <td width=167 colspan=2
                            style='width:125.0pt;border:none;border-left:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span>
                            </p>

                        </td>
                        <td width=157
                            style='width:117.75pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            {{-- <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:0px'><span
                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>This Bill</span></p> --}}

                        </td>

                        <td width=97
                            style='width:72.65pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            {{-- <p class=MsoNormal align=right
                    style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                    <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{numberFormat($order->amount)}}</span>
                </p> --}}

                        </td>

                        <td width=180 colspan=2
                            style='width:135.25pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>(+) Other
                                    Charge</span>
                            </p>

                        </td>

                        <td width=96
                            style='width:72.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ numberFormat($order->additional_charge) }}</span>
                            </p>

                        </td>
                    </tr>

                    <tr style='height:12.25pt'>

                        <td width=167 colspan=2
                            style='width:125.0pt;border:none;border-left:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span>
                            </p>

                        </td>

                        <td width=157 style='width:117.75pt;border:none;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            {{-- <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:0px'><span
                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>Current Due Amount</span>
                </p> --}}

                        </td>

                        <td width=97
                            style='width:72.65pt;border:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            {{-- <p class=MsoNormal align=right
                    style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                    <b><span
                            style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{numberFormat($order->due_amount)}}</span></b>
                </p> --}}

                        </td>

                        <td width=180 colspan=2
                            style='width:135.25pt;border:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <b><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Total
                                        Amount</span></b>
                            </p>

                        </td>

                        <td width=96
                            style='width:72.15pt;border:none;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <b><span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ numberFormat($order->net_amount) }}</span></b>
                            </p>

                        </td>
                    </tr>

                    <tr style='height:12.25pt'>
                        <td width=167 colspan=2
                            style='width:125.0pt;border-top:none;border-left: solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right: none;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span>
                            </p>

                        </td>

                        <td width=157
                            style='width:117.75pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span>
                            </p>

                        </td>

                        <td width=97
                            style='width:72.65pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span>
                            </p>

                        </td>

                        <td width=180 colspan=2
                            style='width:135.25pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Paid Amount</span>
                            </p>

                        </td>

                        <td width=96
                            style='width:72.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ numberFormat($order->paid_amount) }}</span>
                            </p>

                        </td>
                    </tr>

                    <tr style='height:12.25pt'>

                        <td width=421 colspan=4
                            style='width:315.4pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Amount in Word :
                                    {{ numberToWord($order->net_amount) }}</span>
                            </p>

                        </td>
                        <td width=180 colspan=2
                            style='width:135.25pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Net Payable</span>
                            </p>

                        </td>

                        <td width=96
                            style='width:72.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:12.25pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:0px'>
                                <b><span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ numberFormat($order->due_amount) }}</span></b>
                            </p>

                        </td>
                    </tr>

                    <tr height=0>
                        <td width=36 style='border:none'></td>
                        <td width=131 style='border:none'></td>
                        <td width=157 style='border:none'></td>
                        <td width=97 style='border:none'></td>
                        <td width=96 style='border:none'></td>
                        <td width=84 style='border:none'></td>
                        <td width=96 style='border:none'></td>
                    </tr>
                </table>


            </div>
            <p class=MsoNormal style='margin-bottom:0in'><span style='font-family:"Arial",sans-serif'>&nbsp;</span>
            </p>
            <p class=MsoNormal style='margin-bottom:0in'><span style='font-family:"Arial",sans-serif'>&nbsp;</span>
            </p>

            <div align=center>

                <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
                    style='border-collapse:collapse;border:none'>

                    <tr style='height:13.05pt'>

                        <td width=108
                            style='width:80.9pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=108
                            style='width:81.15pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ auth()->user()->name }}</span>
                            </p>

                        </td>

                        <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=107
                            style='width:80.05pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=36 style='width:26.95pt;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=110
                            style='width:82.35pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=120
                            style='width:90.2pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                    </tr>

                    <tr style='height:12.5pt'>

                        <td width=108 style='width:80.9pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Received By</span></p>

                        </td>

                        <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=108 style='width:81.15pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Prepared By</span></p>

                        </td>

                        <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=107 style='width:80.05pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Accounts</span></p>

                        </td>

                        <td width=36 style='width:26.95pt;padding:0in 5.4pt 0in 5.4pt;height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=110 style='width:82.35pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Store-In-Charge</span></p>

                        </td>

                        <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=120 style='width:90.2pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:8.0pt;font-family:"Arial",sans-serif'>Authority</span></p>

                        </td>

                    </tr>

                    <tr style='height:17.05pt'>

                        <td width=288 colspan=4 valign=bottom
                            style='width:216.15pt;padding:0in 5.4pt 0in 5.4pt; height:17.05pt'>
                            <p class=MsoNormal style='margin-bottom:0in;line-height:normal;margin-top:1px'><span
                                    style='font-size:7.0pt;font-family:"Arial",sans-serif'>Print Date &amp; Time :
                                    [Date]
                                    [Now]</span></p>

                        </td>

                        <td width=107 valign=bottom style='width:80.05pt;padding:0in 5.4pt 0in 5.4pt; height:17.05pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0in;text-align:center; line-height:normal;margin-top:1px'><span
                                    style='font-size:7.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                        </td>

                        <td width=302 colspan=4 valign=bottom
                            style='width:226.55pt;padding:0in 5.4pt 0in 5.4pt; height:17.05pt'>
                            <p class=MsoNormal align=right
                                style='margin-bottom:0in;text-align:right; line-height:normal;margin-top:1px'>
                                <span style='font-size:7.0pt;font-family:"Arial",sans-serif'>Software by : Nexus
                                    Corporation | 01711-928044</span>
                            </p>

                        </td>

                    </tr>

                </table>

            </div>

            <p class=MsoNormal style='margin-bottom:0in'><span style='font-family:"Arial",sans-serif'>&nbsp;</span>
            </p>
            <p class=MsoNormal style='margin-bottom:0in'><span style='font-family:"Arial",sans-serif'>&nbsp;</span>
            </p>
        </div>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>
