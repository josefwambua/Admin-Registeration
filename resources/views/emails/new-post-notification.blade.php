<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post Submitted</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Georgia', serif;
            background: #F5F2EE;
            padding: 40px 16px;
            color: #2C2C2C;
        }

        .wrapper {
            max-width: 580px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            background: #2C2C2C;
            border-radius: 12px 12px 0 0;
            padding: 32px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, #C49A5A, #DEB887, #F0D9B5);
        }

        .header-label {
            font-family: Arial, sans-serif;
            font-size: 10px;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: #DEB887;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 22px;
            font-weight: normal;
            color: #FFFFFF;
            line-height: 1.3;
        }

        .header h1 span {
            color: #DEB887;
        }

        /* Body card */
        .card {
            background: #FFFFFF;
            padding: 40px;
            border-left: 1px solid #E8DDD0;
            border-right: 1px solid #E8DDD0;
        }

        .intro {
            font-size: 14px;
            color: #6B6B6B;
            line-height: 1.7;
            margin-bottom: 28px;
            font-family: Arial, sans-serif;
        }

        /* Meta row */
        .meta-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 28px;
        }

        .meta-row {
            display: table-row;
        }

        .meta-label {
            display: table-cell;
            font-family: Arial, sans-serif;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #DEB887;
            padding: 10px 16px 10px 0;
            white-space: nowrap;
            vertical-align: top;
            border-bottom: 1px solid #F0EBE3;
        }

        .meta-value {
            display: table-cell;
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #2C2C2C;
            padding: 10px 0;
            line-height: 1.5;
            border-bottom: 1px solid #F0EBE3;
        }

        /* Post content block */
        .post-block {
            background: #FAFAF8;
            border: 1px solid #E8DDD0;
            border-left: 3px solid #DEB887;
            border-radius: 0 8px 8px 0;
            padding: 20px 24px;
            margin-bottom: 28px;
        }

        .post-block h2 {
            font-size: 17px;
            font-weight: normal;
            color: #2C2C2C;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .post-block p {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #4A4A4A;
            line-height: 1.7;
        }

        /* CTA Button */
        .cta-wrap {
            text-align: center;
            margin-bottom: 8px;
        }

        .cta-btn {
            display: inline-block;
            background: #2C2C2C;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            text-decoration: none;
            padding: 14px 36px;
            border-radius: 8px;
        }

        .cta-sub {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #6B6B6B;
            text-align: center;
            margin-top: 8px;
        }

        .cta-sub a {
            color: #C49A5A;
            word-break: break-all;
        }

        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid #E8DDD0;
            margin: 28px 0;
        }

        /* Footer */
        .footer {
            background: #F5F2EE;
            border: 1px solid #E8DDD0;
            border-top: none;
            border-radius: 0 0 12px 12px;
            padding: 24px 40px;
            text-align: center;
        }

        .footer p {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #6B6B6B;
            line-height: 1.7;
        }

        .footer .brand {
            font-size: 12px;
            color: #DEB887;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin-bottom: 6px;
            font-family: Georgia, serif;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        <!-- Header -->
        <div class="header">
            <p class="header-label">Admin Notification</p>
            <h1>New Post <span>Submitted</span></h1>
        </div>

        <!-- Body -->
        <div class="card">

            <p class="intro">
                A new post has been submitted and is awaiting your review.
                Please find the details below.
            </p>

            <!-- Meta info -->
            <div class="meta-grid">
                <div class="meta-row">
                    <div class="meta-label">Submitted By</div>
                    <div class="meta-value">{{ $submitted_by }}</div>
                </div>
                <div class="meta-row">
                    <div class="meta-label">Date &amp; Time</div>
                    <div class="meta-value">{{ $submitted_at }}</div>
                </div>
            </div>

            <!-- Post content -->
            <div class="post-block">
                <h2>{{ $title }}</h2>
                <p>{{ $description }}</p>
            </div>

            <!-- CTA -->
            <div class="cta-wrap">
                <a href="{{ $view_url }}" class="cta-btn">View &amp; Approve Post</a>
            </div>
            <p class="cta-sub">
                Or copy this link: <a href="{{ $view_url }}">{{ $view_url }}</a>
            </p>

            <hr class="divider">

            <p style="font-family:Arial,sans-serif;font-size:12px;color:#6B6B6B;line-height:1.6;">
                This is an automated notification. Do not reply to this email directly.
                Manage all submissions from your admin dashboard.
            </p>

        </div>

        <!-- Footer -->
        <div class="footer">
            <p class="brand">Content Studio</p>
            <p>
                You are receiving this because you are registered as an admin.<br>
                &copy; {{ date('Y') }} Content Studio. All rights reserved.
            </p>
        </div>

    </div>
</body>
</html>