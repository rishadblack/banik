<html>
<head>
    <meta charset="UTF-8">
    <meta name=Invoice content="">
    <title> Money Receipt  </title>

<style>

        @font-face {
            font-family:"Cambria Math";
            panose-1:2 4 5 3 5 4 6 3 2 4;
        }

        @font-face {
            font-family:Calibri;
            panose-1:2 15 5 2 2 2 4 3 2 4;
        }

        /* Style Definitions */
        p.MsoNormal,
        li.MsoNormal,
        div.MsoNormal {
            margin-top:0in;
            margin-right:0in;
            margin-bottom:8.0pt;
            margin-left:0in;
            line-height:107%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;
        }

        .MsoChpDefault {
            font-family:"Calibri",sans-serif;
        }

        .MsoPapDefault {
            margin-bottom:8.0pt;
            line-height:107%;
        }

        @page WordSection1 {
            size:595.45pt 841.7pt;
            margin:.5in .5in .5in .5in;
        }

        div.WordSection1 {
            page:WordSection1;
        }
    </style>

</head>

<body lang=EN-US style='word-wrap:break-word'>

    <div class=WordSection1>

        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><b><span style='font-size:14.0pt;font-family:"Arial",sans-serif'>M/s Banik Store</span></b></p>
        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>D-56, Savar Bazar, Savar, Dhaka</span></p>
        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Contact: +88 01727 333106, +88 01779 205238</span></p>
        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

    <div align=center>

    <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=696 style='border-collapse:collapse;border:none'>

        <tr style='height:17.05pt'>
            <td width=696 colspan=5 style='width:522.35pt;border:solid windowtext 1.0pt; background:#D9D9D9;padding:0in 5.4pt 0in 5.4pt;height:17.05pt'>

                <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><b><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>Money Receipt</span></b></p>

            </td>
        </tr>

        <tr style='height:14.15pt'>
            <td width=116 style='width:86.95pt;border:solid windowtext 1.0pt;border-top: none;padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Receive From</span></p>

            </td>
            <td width=232 colspan=2 style='width:174.15pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->contactinfo->name }}</span></p>

            </td>
            <td width=116 style='width:87.05pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Receipt Number</span></p>

            </td>
            <td width=232 style='width:174.2pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>[Receipt_No.]</span></p>

            </td>
        </tr>
        <tr style='height:14.15pt'>

            <td width=116 style='width:86.95pt;border:solid windowtext 1.0pt;border-top: none;padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Customer Address</span></p>

            </td>
            <td width=232 colspan=2 style='width:174.15pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->contact->address }}</span></p>

            </td>
            <td width=116 style='width:87.05pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Receipt Date</span></p>

            </td>
            <td width=232 style='width:174.2pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>[Date]</span></p>

            </td>
        </tr>

        <tr style='height:14.15pt'>
            <td width=116 style='width:86.95pt;border:solid windowtext 1.0pt;border-top: none;padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Contact Number</span></p>

            </td>
            <td width=232 colspan=2 style='width:174.15pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ $order->contact->mobile }}</span></p>

            </td>
            <td width=116 style='width:87.05pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Received By</span></p>

            </td>
            <td width=232 style='width:174.2pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>[Stuff_Name]</span></p>

            </td>
        </tr>
        <tr style='height:14.15pt'>

            <td width=116 style='width:86.95pt;border:solid windowtext 1.0pt;border-top: none;padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Reference</span></p>

            </td>
            <td width=232 colspan=2 style='width:174.15pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>[Refernce]</span></p>

            </td>
            <td width=116 style='width:87.05pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Payment Method</span></p>

            </td>
            <td width=232 style='width:174.2pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>[Payment_Method]</span></p>

            </td>
        </tr>

        <tr style='height:14.15pt'>
            <td width=116 style='width:86.95pt;border:solid windowtext 1.0pt;border-top: none;padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Previous Due</span></p>

            </td>
            <td width=116 style='width:87.05pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>This Receipt</span></p>

            </td>
            <td width=116 style='width:87.1pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Current Due</span></p>

            </td>
            <td width=116 rowspan=2 style='width:87.05pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Amount Received</span></p>

            </td>
            <td width=232 rowspan=2 style='width:174.2pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-family:"Arial",sans-serif'>{{ numberFormat($order->paid_amount) }}</span></p>

            </td>
        </tr>

        <tr style='height:14.15pt'>
            <td width=116 style='width:86.95pt;border:solid windowtext 1.0pt;border-top: none;padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>[prev_due]</span></p>

            </td>
            <td width=116 style='width:87.05pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{numberFormat($order->net_amount)}}</span></p>

            </td>
            <td width=116 style='width:87.1pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.15pt'>

                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ numberFormat($order->due_amount )}}</span></p>

            </td>
        </tr>

        <tr style='height:13.55pt'>
            <td width=696 colspan=5 style='width:522.35pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.55pt'>
                <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Amount in word : {{numberToWord($order->net_amount)}}</span></p>

            </td>
        </tr>

        <tr style='height:13.55pt'>
            <td width=696 colspan=5 style='width:522.35pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.55pt'>

                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Narration : [Narration]</span></p>

            </td>
        </tr>

    </table>

</div>

<p class=MsoNormal>&nbsp;</p>

<div align=center>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none'>

        <tr style='height:13.05pt'>

            <td width=108 style='width:80.9pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

            </td>

            <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=108 style='width:81.15pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>{{ auth()->user()->name }}</span></p>

                </td>

                <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=107 style='width:80.05pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=36 style='width:26.95pt;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=110 style='width:82.35pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=120 style='width:90.2pt;border:none;border-bottom:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

            </tr>

            <tr style='height:12.5pt'>

                <td width=108 style='width:80.9pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Payment By</span></p>

                </td>

                <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=108 style='width:81.15pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Prepared By</span></p>

                </td>

                <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=107 style='width:80.05pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Received By</span></p>

                </td>

                <td width=36 style='width:26.95pt;padding:0in 5.4pt 0in 5.4pt;height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=110 style='width:82.35pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Accounts</span></p>

                </td>

                <td width=36 style='width:27.05pt;padding:0in 5.4pt 0in 5.4pt;height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=120 style='width:90.2pt;border:none;padding:0in 5.4pt 0in 5.4pt; height:12.5pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Authority</span></p>

                </td>

            </tr>

            <tr style='height:17.05pt'>

                <td width=288 colspan=4 valign=bottom style='width:216.15pt;padding:0in 5.4pt 0in 5.4pt; height:17.05pt'>
                    <p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span style='font-size:7.0pt;font-family:"Arial",sans-serif'>Print Date &amp; Time : [Date] [Now]</span></p>

                </td>

                <td width=107 valign=bottom style='width:80.05pt;padding:0in 5.4pt 0in 5.4pt; height:17.05pt'>
                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center; line-height:normal'><span style='font-size:7.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                </td>

                <td width=302 colspan=4 valign=bottom style='width:226.55pt;padding:0in 5.4pt 0in 5.4pt; height:17.05pt'>
                    <p class=MsoNormal align=right style='margin-bottom:0in;text-align:right; line-height:normal'>
                        <span style='font-size:7.0pt;font-family:"Arial",sans-serif'>Powered by : Nexus Corporation | 01711-928044</span></p>

                    </td>

                </tr>

            </table>

        </div>

        <p class=MsoNormal style='margin-bottom:0in'><span style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
        <p class=MsoNormal style='margin-bottom:0in'><span style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
    </div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
        window.print();
    </script>

</body>
</html>
