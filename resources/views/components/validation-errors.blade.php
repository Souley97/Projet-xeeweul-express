@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __("Oups ! Quelque chose s'est mal passé. Nous ne trouvons pas d'utilisateur avec cette adresse e-mail.") }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
