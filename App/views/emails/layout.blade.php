<!DOCTYPE html>
<html lang="en-US" style="min-height:100%;">
	<head>
		<meta charset="utf-8">
        <style>
            body p, body div{
               text-align:left;font-family:Arial, Helvetica, sans-serif;line-height:20px;font-size:14px;
                color:#111;
            }
        </style>
	</head>
	<body style="background:#FCFCFC;min-height:100%;">
        <div style="background:#FCFCFC;padding:20px;min-height:100%;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
                        <div style="max-width:800px;margin:20px auto;background:#FFF;position: relative;border:1px solid #DDD;padding: 1em;border-radius: 5px;">
                            <h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif;margin:10px 0px 20px 0px;">@yield('title')</h1>
                            <p style="text-align:left;font-family:Arial, Helvetica, sans-serif;line-height:20px;font-size:14px;">
                                @yield('body')
                            </p>
                            <p style="text-align:left;font-family:Arial, Helvetica, sans-serif;margin-top:30px;color:#888;margin-bottom:0px;font-size:10px;">This is an automated email message from <a href="http://connectnow.today">ConnectNow</a>. If you have received this email by accident, please disregard it. If you continue to receive messages from us by accident, please contact our staff via our website <a href="http://connectnow.today">http://connectnow.today</a> and we'll remove you from our mailing list.</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
	</body>
</html>