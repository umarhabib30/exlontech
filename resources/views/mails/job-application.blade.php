<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Job Application</title>
</head>
<body style="margin: 0; padding: 0; background: #0f0715; color: #f7f3ff; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background: #0f0715; padding: 32px 14px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 700px; background: #140c1c; border: 1px solid rgba(135,80,247,0.32); border-radius: 18px; overflow: hidden;">
                    <tr>
                        <td style="background: linear-gradient(135deg, #8750f7, #361c69); padding: 28px 30px;">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Exlon Tech" width="150" style="display: block; margin-bottom: 22px;">
                            <p style="margin: 0 0 8px; color: #d8c9ff; font-size: 12px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase;">Careers</p>
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; line-height: 1.25;">New job application received</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 24px 26px;">
                            <div style="background: rgba(135,80,247,0.14); border: 1px solid rgba(181,125,255,0.28); border-radius: 14px; padding: 14px 16px; margin-bottom: 14px;">
                                <div style="color: #b57dff; font-size: 12px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 6px;">Applied For</div>
                                <div style="color: #ffffff; font-size: 18px; line-height: 1.3; font-weight: bold;">{{ $application->job->title }}</div>
                            </div>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="50%" style="padding: 0 7px 12px 0;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Candidate</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $application->name }}</div>
                                        </div>
                                    </td>
                                    <td width="50%" style="padding: 0 0 12px 7px;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Email</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $application->email }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding: 0 7px 12px 0;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Phone</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $application->phone ?: 'Not provided' }}</div>
                                        </div>
                                    </td>
                                    <td width="50%" style="padding: 0 0 12px 7px;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Experience</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $application->experience ?: 'Not provided' }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding: 0 7px 12px 0;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Current Company</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $application->current_company ?: 'Not provided' }}</div>
                                        </div>
                                    </td>
                                    <td width="50%" style="padding: 0 0 12px 7px;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Portfolio / LinkedIn</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $application->portfolio_url ?: 'Not provided' }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding: 0 0 12px;">
                                        <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 12px 14px;">
                                            <div style="color: #b57dff; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px;">Resume</div>
                                            <div style="color: #f7f3ff; font-size: 14px; line-height: 1.45;">{{ $application->resume_original_name }}</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            @if ($application->cover_letter)
                                <div style="background: #1b1026; border: 1px solid rgba(135,80,247,0.22); border-radius: 12px; padding: 14px 16px; margin-top: 2px;">
                                    <div style="color: #b57dff; font-size: 12px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;">Cover Letter</div>
                                    <div style="color: #d8c9ff; font-size: 14px; line-height: 1.65;">{{ $application->cover_letter }}</div>
                                </div>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 18px 30px 26px; border-top: 1px solid rgba(135,80,247,0.18); color: #9f8fba; font-size: 12px; line-height: 1.6;">
                            The candidate resume is attached when available. This message was generated from the Exlon Tech careers page.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
