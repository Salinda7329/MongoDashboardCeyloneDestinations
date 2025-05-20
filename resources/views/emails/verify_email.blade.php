<!DOCTYPE html>
<html>
<head>
    <title>{{ __('Verify Email Address') }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .logo { max-height: 70px; }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4f46e5;
            color: white !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer { margin-top: 30px; font-size: 12px; text-align: center; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="logo">
            <h1>{{ __('Verify Your Email Address') }}</h1>
        </div>

        <p>{{ __('Hello!') }}</p>

        <p>{{ __('Please click the button below to verify your email address and activate your account.') }}</p>

        <div style="text-align: center; margin: 25px 0;">
            <a href="{{ $verificationUrl }}" class="button">
                {{ __('Verify Email Address') }}
            </a>
        </div>

        <p>{{ __('If you did not create an account, no further action is required.') }}</p>

        <div class="footer">
            <p>{{ __('If you\'re having trouble clicking the button, copy and paste this URL into your browser:') }}</p>
            <p><a href="{{ $verificationUrl }}">{{ $verificationUrl }}</a></p>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
