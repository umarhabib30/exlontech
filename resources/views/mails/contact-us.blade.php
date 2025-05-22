<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2d3748;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 0 0 5px 5px;
        }
        .info-row {
            margin-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 10px;
        }
        .label {
            font-weight: bold;
            color: #4a5568;
        }
        .message-box {
            background-color: #f7fafc;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
    </div>

    <div class="content">
        <div class="info-row">
            <span class="label">Name:</span>
            {{ $data['first_name'] }} {{ $data['last_name'] }}
        </div>

        <div class="info-row">
            <span class="label">Email:</span>
            {{ $data['email'] }}
        </div>

        <div class="info-row">
            <span class="label">Phone:</span>
            {{ $data['phone'] }}
        </div>

        <div class="info-row">
            <span class="label">Service Requested:</span>
            {{ $data['service'] }}
        </div>

        <div class="message-box">
            <span class="label">Message:</span><br>
            {{ $data['message'] }}
        </div>
    </div>
</body>
</html>
