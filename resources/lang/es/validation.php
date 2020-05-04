<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es un valido URL.',
    'after' => 'El :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El :attribute puede contener solo letras.',
    'alpha_dash' => 'El :attribute puede contener solo letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute puede contener solo letras y números.',
    'array' => 'El :attribute debe ser una matriz.',
    'before' => 'El :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El :attribute debe tener una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe estar entre :min y :max caracteres.',
        'array' => 'El :attribute debe tener entre :min y :max artículos.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'El :attribute confirmation no coincide.',
    'date' => 'El :attribute no es a valido date.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide el formato :format.',
    'different' => 'El :attribute y :other deben ser diferentes.',
    'digits' => 'El :attribute debe tener :digits digitos.',
    'digits_between' => 'El :attribute debe estar entre :min y :max digitos.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El :attribute debe tener un valido email address.',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes: :values',
    'exists' => 'El :attribute seleccionado es invalido.',
    'file' => 'El :attribute debe tener un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe tener más de :value.',
        'file' => 'El :attribute debe tener más de :value kilobytes.',
        'string' => 'El :attribute debe tener más de :value caracteres.',
        'array' => 'El :attribute debe tener más de :value artículos.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe tener más o igual :value.',
        'file' => 'El :attribute debe tener más o igual :value kilobytes.',
        'string' => 'El :attribute debe tener más o igual :value caracteres.',
        'array' => 'El :attribute debe tener :value artículos o más.',
    ],
    'image' => 'El :attribute debe ser ana imagen.',
    'in' => 'El :attribute seleccionado es invalido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El :attribute debe ser an integer.',
    'ip' => 'El :attribute debe tener una dirección IP válida.',
    'ipv4' => 'El :attribute debe tener una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe tener una dirección IPv6 válida.',
    'json' => 'El :attribute debe tener una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :value.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'string' => 'El :attribute debe ser menor que :value caracteres.',
        'array' => 'El :attribute debe tener menos que :value artículos.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor que o igual a :value.',
        'file' => 'El :attribute debe ser menor que o igual a :value kilobytes.',
        'string' => 'El :attribute debe ser menor que o igual a :value caracteres.',
        'array' => 'El :attribute no debe tener más de :value artículos.',
    ],
    'max' => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file' => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string' => 'El :attribute no puede ser mayor que :max caracteres.',
        'array' => 'El :attribute podría no tener más de :max artículos.',
    ],
    'mimes' => 'El :attribute debe tener un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute debe tener un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El :attribute debe ser al menos :min.',
        'file' => 'El :attribute debe ser al menos :min kilobytes.',
        'string' => 'El :attribute debe ser al menos :min caracteres.',
        'array' => 'El :attribute debe tener al menos :min artículos.',
    ],
    'not_in' => 'El :attribute seleccionado es invalido.',
    'not_regex' => 'El :attribute formato es invalido.',
    'numeric' => 'El :attribute debe tener un number.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El :attribute formato es invalido.',
    'required' => 'El campo :attribute es requerido.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido unless :other está en :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values están presente.',
    'required_without' => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de :values están presentes.',
    'same' => 'El :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe ser :size.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'string' => 'El :attribute debe ser :size caracteres.',
        'array' => 'El :attribute debe contener :size artículos.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes: :values',
    'string' => 'El :attribute debe tener una cadena.',
    'timezone' => 'El :attribute debe ser una zona valida.',
    'unique' => 'El :attribute ya se ha tomado.',
    'uploaded' => 'El :attribute no se pudo cargar.',
    'url' => 'El :attribute formato es invalido.',
    'uuid' => 'El :attribute debe tener un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
