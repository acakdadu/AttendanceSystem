<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Your following language lines contain Your default error messages used by
    | Your validator class. Some of Your e rules have multiple versions such
    | as Your size rules. Feel free to tweak each of Your e messages here.
    |
    */

    'accepted' => 'Your :attribute must be accepted.',
    'active_url' => 'Your :attribute is not a valid URL.',
    'after' => 'Your :attribute must be a date after :date.',
    'after_or_equal' => 'Your :attribute must be a date after or equal to :date.',
    'alpha' => 'Your :attribute may only contain letters.',
    'alpha_dash' => 'Your :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'Your :attribute may only contain letters and numbers.',
    'array' => 'Your :attribute must be an array.',
    'before' => 'Your :attribute must be a date before :date.',
    'before_or_equal' => 'Your :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'Your :attribute must be between :min and :max.',
        'file' => 'Your :attribute must be between :min and :max kilobytes.',
        'string' => 'Your :attribute must be between :min and :max characters.',
        'array' => 'Your :attribute must have between :min and :max items.',
    ],
    'boolean' => 'Your :attribute field must be true or false.',
    'confirmed' => 'Your :attribute confirmation does not match.',
    'date' => 'Your :attribute is not a valid date.',
    'date_equals' => 'Your :attribute must be a date equal to :date.',
    'date_format' => 'Your :attribute does not match Your format :format.',
    'different' => 'Your :attribute and :oYour  must be different.',
    'digits' => 'Your :attribute must be :digits digits.',
    'digits_between' => 'Your :attribute must be between :min and :max digits.',
    'dimensions' => 'Your :attribute has invalid image dimensions.',
    'distinct' => 'Your :attribute field has a duplicate value.',
    'email' => 'Your :attribute must be a valid email address.',
    'ends_with' => 'Your :attribute must end with one of Your following: :values.',
    'exists' => 'Your selected :attribute is invalid.',
    'file' => 'Your :attribute must be a file.',
    'filled' => 'Your :attribute field must have a value.',
    'gt' => [
        'numeric' => 'Your :attribute must be greater than :value.',
        'file' => 'Your :attribute must be greater than :value kilobytes.',
        'string' => 'Your :attribute must be greater than :value characters.',
        'array' => 'Your :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'Your :attribute must be greater than or equal :value.',
        'file' => 'Your :attribute must be greater than or equal :value kilobytes.',
        'string' => 'Your :attribute must be greater than or equal :value characters.',
        'array' => 'Your :attribute must have :value items or more.',
    ],
    'image' => 'Your :attribute must be an image.',
    'in' => 'Your selected :attribute is invalid.',
    'in_array' => 'Your :attribute field does not exist in :oYour .',
    'integer' => 'Your :attribute must be an integer.',
    'ip' => 'Your :attribute must be a valid IP address.',
    'ipv4' => 'Your :attribute must be a valid IPv4 address.',
    'ipv6' => 'Your :attribute must be a valid IPv6 address.',
    'json' => 'Your :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'Your :attribute must be less than :value.',
        'file' => 'Your :attribute must be less than :value kilobytes.',
        'string' => 'Your :attribute must be less than :value characters.',
        'array' => 'Your :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'Your :attribute must be less than or equal :value.',
        'file' => 'Your :attribute must be less than or equal :value kilobytes.',
        'string' => 'Your :attribute must be less than or equal :value characters.',
        'array' => 'Your :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Your :attribute may not be greater than :max.',
        'file' => 'Your :attribute may not be greater than :max kilobytes.',
        'string' => 'Your :attribute may not be greater than :max characters.',
        'array' => 'Your :attribute may not have more than :max items.',
    ],
    'mimes' => 'Your :attribute must be a file of type: :values.',
    'mimetypes' => 'Your :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Your :attribute must be at least :min.',
        'file' => 'Your :attribute must be at least :min kilobytes.',
        'string' => 'Your :attribute must be at least :min characters.',
        'array' => 'Your :attribute must have at least :min items.',
    ],
    'not_in' => 'Your selected :attribute is invalid.',
    'not_regex' => 'Your :attribute format is invalid.',
    'numeric' => 'Your :attribute must be a number.',
    'password' => 'Your password is incorrect.',
    'present' => 'Your :attribute field must be present.',
    'regex' => 'Your :attribute format is invalid.',
    'required' => 'Your :attribute field is required.',
    'required_if' => 'Your :attribute field is required when :oYour  is :value.',
    'required_unless' => 'Your :attribute field is required unless :oYour  is in :values.',
    'required_with' => 'Your :attribute field is required when :values is present.',
    'required_with_all' => 'Your :attribute field is required when :values are present.',
    'required_without' => 'Your :attribute field is required when :values is not present.',
    'required_without_all' => 'Your :attribute field is required when none of :values are present.',
    'same' => 'Your :attribute and :oYour  must match.',
    'size' => [
        'numeric' => 'Your :attribute must be :size.',
        'file' => 'Your :attribute must be :size kilobytes.',
        'string' => 'Your :attribute must be :size characters.',
        'array' => 'Your :attribute must contain :size items.',
    ],
    'starts_with' => 'Your :attribute must start with one of Your following: :values.',
    'string' => 'Your :attribute must be a string.',
    'timezone' => 'Your :attribute must be a valid zone.',
    'unique' => 'Your :attribute has already been taken.',
    'uploaded' => 'Your :attribute failed to upload.',
    'url' => 'Your :attribute format is invalid.',
    'uuid' => 'Your :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Your     | convention "attribute.rule" to name Your lines. This makes it quick to
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
    | Your following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
