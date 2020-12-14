@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Merhaba!')
@endif
@endif

{{-- Intro Lines --}}
Bu e-postayı, hesabınız için bir şifre sıfırlama isteği aldığımız için alıyorsunuz.

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
Bu şifre sıfırlama bağlantısının süresi 60 dakika içinde sona erecek.

Parola sıfırlama talebinde bulunmadıysanız, başka bir işlem yapmanız gerekmez.


{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Saygılarımızla'),<br>
@lang('Toti Web Yazılım Şirketi')
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang('"Şifreyi Sıfırla" düğmesini tıklamayla ilgili sorun yaşıyorsanız, aşağıdaki URL yi kopyalayıp web tarayıcınıza yapıştırın.',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
