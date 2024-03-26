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

    'accepted' => 'Questo campo deve essere accettato.',
    'accepted_if' => 'Questo campo deve essere accettato quando :other è :value.',
    'active_url' => 'Questo non è un URL valido.',
    'after' => 'Questo campo deve essere una data successiva a :date.',
    'after_or_equal' => 'Questo campo deve essere una data successiva o uguale a :date.',
    'alpha' => 'Questo campo deve contenere solo lettere.',
    'alpha_dash' => 'Questo campo deve contenere solo lettere, numeri, trattini e trattini bassi.',
    'alpha_num' => 'Questo campo deve contenere solo lettere e numeri.',
    'array' => 'Questo campo deve essere un array.',
    'before' => 'Questo campo deve essere una data antecedente a :date.',
    'before_or_equal' => 'Questo campo deve essere una data precedente o uguale a :date.',
    'between' => [
        'array' => 'Questo campo deve contenere elementi compresi tra :min e :max.',
        'file' => 'Questo campo deve essere compreso tra :min e :max kilobyte.',
        'numeric' => 'Questo campo deve essere compreso tra :min e :max.',
        'string' => 'Questo campo deve essere compreso :min e :max.',
    ],
    'boolean' => 'Il campo :attribute deve essere true o false.',
    'confirmed' => 'La :attribute non è corretta.',
    'current_password' => 'La password non è corretta.',
    'date' => 'Non è una data valida',
    'date_equals' => 'Questo campo deve essere una data uguale a :date.',
    'date_format' => 'Questo campo non corrisponde al formato :format.',
    'declined' => 'Questo campo va rifiutato.',
    'declined_if' => 'Questo campo deve essere rifiutato quando :other è :value.',
    'different' => 'I campi devono essere diversi.',
    'digits' => 'Questo campo deve essere :digits cifre.',
    'digits_between' => 'Questo campo deve essere compreso tra :min e :max cifre.',
    'dimensions' => 'Questo campo ha dimensioni dell\'immagine non valide.',
    'distinct' => 'Il campo ha un valore duplicato.',
    'doesnt_start_with' => 'Questo campo non può iniziare con: :values.',
    'email' => 'Questo campo deve essere un indirizzo email.',
    'ends_with' => 'Questo campo deve terminare con uno dei seguenti: :values.',
    'enum' => 'L\'elemento selezionato non è valido.',
    'exists' => 'L\'elemento selezionato non è valido.',
    'file' => 'Questo campo deve essere un file.',
    'filled' => 'Questo campo deve avere un valore.',
    'gt' => [
        'array' => 'Questo campo deve avere più di :value elementi.',
        'file' => 'Questo campo deve essere maggiore di :value kilobyte.',
        'numeric' => 'Questo campo deve essere maggiore di :value.',
        'string' => 'Questo campo deve essere maggiore di :value caratteri.',
    ],
    'gte' => [
        'array' => 'Questo campo deve avere :value elementi o più.',
        'file' => 'Questo campo deve essere massimo :value kilobytes.',
        'numeric' => 'Questo campo deve essere maggiore o uguale :value.',
        'string' => 'Questo campo deve essere maggiore o uguale a :value caratteri.',
    ],
    'image' => 'Questo campo deve essere un immagine.',
    'in' => 'L\'elemento selezionato non è valido.',
    'in_array' => 'Questo campo non esiste in :other.',
    'integer' => 'Questo campo deve essere un numero intero.',
    'ip' => 'Questo campo deve essere un indirizzo IP valido.',
    'ipv4' => 'Questo campo deve essere un indirizzo ipv4 valido.',
    'ipv6' => 'Questo campo deve essere un indirizzo ipv6 valido.',
    'json' => 'Questo campo deve essere una stringa JSON valida.',
    'lt' => [
        'array' => 'Questo campo deve avere meno di :value elementi.',
        'file' => 'Questo campo deve essere inferiore a: valore kilobyte.',
        'numeric' => 'Questo campo deve essere inferiore a :value.',
        'string' => 'Questo campo deve essere inferiore a :value caratteri.',
    ],
    'lte' => [
        'array' => 'Questo campo non deve avere più di :value elementi.',
        'file' => 'Questo campo deve essere minore o uguale a :value kilobytes.',
        'numeric' => 'Questo campo deve essere minore o uguale a :value.',
        'string' => 'Questo campo deve essere minore o uguale a :value characters.',
    ],
    'mac_address' => 'Questo campo deve essere un indirizzo MAC valido.',
    'max' => [
        'array' => 'Questo campo non deve avere più di :max elementi.',
        'file' => 'Questo campo deve essere grande al massimo :max kilobytes.',
        'numeric' => 'Questo campo deve essere grande al massimo :max.',
        'string' => 'Questo campo deve contenere al massimo :max caratteri.',
    ],
    'mimes' => 'Questo campo deve essere un file  di tipo: :values.',
    'mimetypes' => 'Questo campo deve essere un file di tipo: :values.',
    'min' => [
        'array' => 'Questo campo deve contenere almeno :min elementi.',
        'file' => 'Questo campo deve essere almeno di :min kilobytes.',
        'numeric' => 'Questo campo deve essere almeno :min.',
        'string' => 'Questo campo deve contenere almeno :min caratteri.',
    ],
    'multiple_of' => 'Questo campo deve essere un multiplo di :value.',
    'not_in' => 'L\'elemento selezionato non è valido.',
    'not_regex' => 'Il formato di questo elemento non è valido.',
    'numeric' => 'Questo campo deve essere un numero.',
    'password' => [
        'letters' => 'Questo campo deve contenere almeno una lettera.',
        'mixed' => 'Questo campo deve contenere almeno una lettera maiuscola e una minuscola.',
        'numbers' => 'Questo campo deve contenere almeno un numero.',
        'symbols' => 'Questo campo deve contenere almeno un simbolo.',
        'uncompromised' => 'Questo dato è apparso in una fuga di dati. Scegline uno diverso.',
    ],
    'present' => 'Il campo deve essere presente.',
    'prohibited' => 'Questo campo è vietato.',
    'prohibited_if' => 'Questo campo è vietato quando :other è :value.',
    'prohibited_unless' => 'Questo campo è vietato a meno che :other non sia in :values.',
    'prohibits' => 'Questo campo impedisce a :other di essere presente.',
    'regex' => 'Il formato di questo campo non è valido.',
    'required' => 'Questo campo è obbligatorio.',
    'required_array_keys' => 'Questo campo deve contenere voci per: :values.',
    'required_if' => 'Questo campo è obbligatorio quando :other è :value.',
    'required_unless' => 'Questo campo è obbligatorio a meno che :other non sia in :values.',
    'required_with' => 'Questo campo è obbligatorio quando è presente :values.',
    'required_with_all' => 'Questo campo è obbligatorio quando sono presenti :values.',
    'required_without' => 'Questo campo è obbligatorio quando :values ​​non è presente.',
    'required_without_all' => 'Questo campo è obbligatorio quando nessuno dei :value è presente.',
    'same' => 'Entrambi i campi devono corrispondere.',
    'size' => [
        'array' => 'Questo campo deve contenere :size elementi.',
        'file' => 'Questo campo deve essere :size kilobytes.',
        'numeric' => 'Questo campo deve essere :size.',
        'string' => 'Questo campo deve essere :size characters.',
    ],
    'starts_with' => 'Questo campo deve iniziare con: :values.',
    'string' => 'Questo campo deve essere una stringa.',
    'timezone' => 'Questo campo deve essere un fuso orario valido.',
    'unique' => 'Questo campo è già stato preso.',
    'uploaded' => 'Impossibile caricare questo elemento.',
    'url' => 'Questo campo deve essere un URL valido.',
    'uuid' => 'Questo campo deve essere un UUID valido.',

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
