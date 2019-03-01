<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

      <meta name="viewport" content="width=device-width" />
     <style type="text/css">
          @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
              body[yahoo] .buttonwrapper { background-color: transparent !important; }
              body[yahoo] .button { padding: 0 !important; }
              body[yahoo] .button a { background-color: #0d3692; padding: 15px 25px !important; }
          }

          @media only screen and (min-device-width: 601px) {
              .content { width: 600px !important; }
              .col387 { width: 387px !important; }
          }
      </style>
  </head>
  <body style="margin: 0; padding: 0;" yahoo="fix">
    <!--[if (gte mso 9)|(IE)]>
    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td>
    <![endif]-->
      <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content">
        <tr>
            <td style="padding: 15px 10px 15px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" style="color: #aaaaaa; font-family: Arial, sans-serif; font-size: 12px;">
                            &nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#0e683f" style="padding: 50px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
                <img src="{{ asset('img/logo_branco.svg') }}" alt="App" height="40" style="display:block;" />
            </td>
        </tr>

        @yield('content')
        
        <tr>
          <td align="center" bgcolor="#dddddd" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
            <b>App</b><br/>0800 111 1111 | <a href="mailto:sac@sac.com.br" style="border:none;color:#0084b4;text-decoration:none" target="_blank">sac@sac.com.br </a>
          </td>
        </tr>
      </table>
    <!--[if (gte mso 9)|(IE)]>
            </td>
        </tr>
    </table>
    <![endif]-->
  </body>
</html>