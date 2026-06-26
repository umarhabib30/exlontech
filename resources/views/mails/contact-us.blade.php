<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 0; background: #0f0715; color: #f7f3ff; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background: #0f0715; padding: 32px 14px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 680px; background: #140c1c; border: 1px solid rgba(135,80,247,0.32); border-radius: 18px; overflow: hidden;">
                    <tr>
                        <td style="background: linear-gradient(135deg, #8750f7, #361c69); padding: 28px 30px;">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Exlon Tech" width="150" style="display: block; margin-bottom: 22px;">
                            <p style="margin: 0 0 8px; color: #d8c9ff; font-size: 12px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase;">Website Lead</p>
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; line-height: 1.25;">New contact form submission</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 24px 26px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="50%" style="padding: 0 7px 12px 0;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Name</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? '')) ?: 'Not provided' }}</div>
                                        </div>
                                    </td>
                                    <td width="50%" style="padding: 0 0 12px 7px;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Email</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $data['email'] ?? 'Not provided' }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding: 0 7px 12px 0;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Phone</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $data['phone'] ?? 'Not provided' }}</div>
                                        </div>
                                    </td>
                                    <td width="50%" style="padding: 0 0 12px 7px;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Service</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $data['service'] ?? 'Not selected' }}</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 14px 16px; margin-top: 2px;">
                                <div style="color: #b57dff; font-size: 12px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;">Message</div>
                                <div style="color: #d8c9ff; font-size: 14px; line-height: 1.65;">{{ $data['message'] ?? 'No message provided' }}</div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 18px 30px 26px; border-top: 1px solid rgba(135,80,247,0.18); color: #9f8fba; font-size: 12px; line-height: 1.6;">
                            This message was generated from the Exlon Tech website contact form.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
