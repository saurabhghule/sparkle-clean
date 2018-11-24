<!DOCTYPE html>
<html>
<head>
    <title>SparkleCleanTech Enquiry Notification</title>
</head>
<body style="margin:0;padding:0;">

<table style="width:70%;margin:0 auto;">
    <thead>
    <tr>
        <th colspan="2" style="text-align: left;">
            <div style="padding-top:10px;padding-left : 10px;border-bottom:5px solid #666;">
                {{--<h1 style="margin:0;">Laundry Please <small style="font-size:14px;">Escape reality</small></h1>--}}
                <img src="{{env('WEBSITE_LINK')}}/img/sparkle-temp_logo.png" alt=""/>
            </div>
        </th>
    </tr>
    </thead>
    <tbody style="width:100%;">
    <tr>
        <td colspan="2" style="padding-top:30px;">
            <div>
                <h3>You have an new enquiry from <span style="color: #29cfbc;">
                                                {{ucfirst($array['name'])}}
                        ,</span></h3>
            </div>
            {{--<div>--}}
            {{--<h4 style="margin:0;">Thank You for placing an order with us !</h4>--}}
            {{--</div>--}}
        </td>
    </tr>
    <tr>
        <td>
            <table style="width : 50%;">
                <tbody>
                <tr>
                    <td>
                        Enquiry :
                    </td>
                    <td>
                        {{$array['enquiry']}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Contact :
                    </td>
                    <td>
                        {{$array['phone']}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Message :
                    </td>
                    <td>
                        {{$array['message']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>

    </tr>
    </tbody>
</table>
</body>
</html>