<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <title></title>
</head>

<body style="background-color: rgb(224, 224, 224);-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;height:100%;">
<img style="display:block;height:0px;width:0px;max-width:0px;max-height:0px;overflow:hidden;" alt="" src="https://magazin.delichev.com/open-api/open-mail?id={idBill}" width="1" height="1" border="0">
<table class="body-wrap" style="width:100%;">
    <tr>
        <td class="container" style="background: rgb(255, 255, 255);display:block!important;max-width:600px!important;margin:0 auto!important;clear:both!important;padding: 0;">


            <table style="background:#0055A6;width:100%;padding: 10px;">
                <tr>
                    <td>
                        <div class="body_mail_text" style="font-size: 23px; line-height:150%; font-weight: normal;font-family: Arial,Helvetica,sans-serif;color:#FFF;text-align: center;">
                            {{__('Данил Деличев')}}
                        </div>
                        @if(App::isLocale('ru'))
                            <div class="body_mail_text" style="font-size: 22px; line-height:150%; font-weight: normal;font-family: Arial,Helvetica,sans-serif;color:#FFF;padding-top: 5px;text-align: center;">
                                <a href="tel:+7(495)120-80-31" style="-webkit-appearance: none; pointer-events: none;text-decoration:none;color:#fff;">+7(495)120-80-31</a>
                            </div>
                        @endif
                    </td>
                </tr>
            </table>

            <div class="content" style="padding:15px;max-width:600px;margin:0 auto;display:block;">
                <table style="width:100%;">
                    <tr>
                        <td>


                            <table class="tizer_mail" style="padding:5px 0 5px 0;width: 100%;">
                                <tr>
                                    <td>
                                        <div class="body_mail_text" style="font-size: 11px; line-height:150%; font-weight: normal;font-family: Arial,Helvetica,sans-serif;color:#666;">
                                            <p style="text-align: right;"></p>
                                        </div>
                                    </td>
                                </tr>
                            </table>


                            <table class="main_mail" style="padding:0 0 20px 0;">
                                <tr>
                                    <td>
                                        <div class="body_mail_text" style="font-size: 16px; line-height:150%; font-weight: normal;font-family: Arial,Helvetica,sans-serif; ">
                                            <p>{{__('Здравствуйте')}}, {{ $client->name }}.
                                                <br><br>
                                                {{__('Ваша ссылка для оплаты курса:')}} "{{ $productName }}"
                                                <br><br>
                                                {{ $link }}
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>


                            <table class="footer_mail">
                                <tr>
                                    <td>
                                        <div class="body_mail_text" style="font-size: 16px; line-height:150%; font-weight: normal;font-family: Arial,Helvetica,sans-serif;">
                                            ---
                                            <br><br>
                                            {{__('Данил Деличев.')}}
                                            <br><br>

                                            <p>&nbsp;</p>

                                            <p>&nbsp;</p>

                                            <p>&nbsp;</p>

                                            <p>&nbsp;</p>

                                            <p>&nbsp;</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>


                        </td>
                    </tr>
                </table>
            </div>

        </td>
    </tr>
</table>
</body>
</html>
