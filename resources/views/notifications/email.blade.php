@component('mail::message')
    @if (! empty($greeting))
        # {{ $greeting }}
    @else
        @if ($level == 'error')
            # Whoops!
        @else
            # Good morning requested a password reset!
        @endif
    @endif

    You are receiving this email because we received a request to reset your account password.

    @if (isset($actionText))
        <?php
        switch ($level) {
            case 'success':
                $color = 'green';
                break;
            case 'error':
                $color = 'red';
                break;
            default:
                $color = 'blue';
        }
        ?>
        @component('mail::button', ['url' => $actionUrl, 'color' => $color])
            {{ $actionText }}
        @endcomponent
    @endif

    Greetings from, {{config('app.name')}}
@endcomponent