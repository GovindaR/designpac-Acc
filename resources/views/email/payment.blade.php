<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<TABLE style="width:600px;margin:0 auto;">
 <tr>
                                                        <td style="font-family: helvetica, arial, &quot;open sans&quot;, sans-serif; word-break: normal;">
                                                            <a href="http://www.designpac.net/" style="color: rgb(141 , 194 , 62)"><img src="http://www.designpac.net/wp-content/uploads/2018/02/NOTIFICATION.jpg" width="580" alt="DesignPac thank you banner" align="none" title="http://www.designpac.net/" style="float: none ; display: block ; border: 0px none ; max-width: 100%"></a>
                                                        </td>
     </tr>
    <TR>
        <TD style="border-bottom: 5px solid black;"><B style="font-size:36px;font-weight:bold;">Cash Receipt</B></TD>
    </TR>
    <TR>
        <TD>Receipt No:{{$data1['invoiceNo']}}</TD>
    </TR>
    <TR>
        <TD>&nbsp;</TD>
    </TR>
    <TR>
        <TD>DesignPac Pvt. Ltd.</TD>
        <TD>{{$data1['dateTime']}}</TD>
    </TR>
    <TR>
        <TD>Sankhamul Chowk, New Baneshwor, Kathmandu, Nepal.</TD>
    </TR>

    <TR>
        <TD>&nbsp;</TD>
    </TR>
    <TR>
        <TD><P>Dear {{$data1['name']}},</P><P>You have successfully renewed your current Plan. Your transaction Referrenc Id is {{$data1['tranRef']}}. Thanks for doing business with us.</P></TD>
    </TR>
</TABLE>
<TABLE style="width:600px;margin:0 auto;">

    <TR style="border-bottom: 1px solid #000000;">
        <TD>Item Name</TD>
        <TD>Qty.</TD>
        <TD>Price</TD>
    </TR>
    <TR>
        <TD>-----------------------------------------------</TD>
    </TR>
    <TR>
        <TD>{{$data1['userDefined1']}}</TD>
        <TD>1</TD>
        <TD>${{$data1['amount']}}</TD>
    </TR>
    <TR>
        <TD>-----------------------------------------------</TD>
    </TR>
    <TR style="border-top: 1px solid #000000;">
        <TD colspan="2">Total</TD>
        <TD>${{$data1['amount']}}</TD>
    </TR>
</TABLE>
<TABLE style="width:600px;margin:0 auto;">
    <TR>
        <TD>Thanks!</TD>
    </TR>
</TABLE>

</body>
</html>
