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

    'accepted'             => ':attribute 必須被勾選。',
    'active_url'           => ':attribute 不是有效的url。',
    'after'                => ':attribute 必須是 :date 之後的日期。',
    'after_or_equal'       => ':attribute 必須是 :date 或之後的日期。',
    'alpha'                => ':attribute 只能包含字母。',
    'alpha_dash'           => ':attribute 只能包含字母、數字和下劃線。',
    'alpha_num'            => ':attribute 只能包含字母、數字。',
    'array'                => ':attribute 必須是數組',
    'before'               => ':attribute 必須是 :date 之前的日期。',
    'before_or_equal'      => ':attribute 必須是 :date 或之前的日期。',
    'between'              => [
        'numeric' => ':attribute 的值要位於 :min 和 :max 之間。',
        'file'    => ':attribute 的大小應為 :min ~ :max 字節。',
        'string'  => ':attribute 只能包含 :min ~ :max 個字符。',
        'array'   => ':attribute 只能包含 :min ~ :max 項。',
    ],
    'boolean'              => ':attribute 只能為[是]或[否]。',
    'confirmed'            => ':attribute 兩次輸入不壹致。',
    'date'                 => ':attribute 不是壹個合法的日期。',
    'date_format'          => ':attribute 不滿足格式 :format。',
    'different'            => ':attribute 不能與 :other 完全相同。',
    'digits'               => ':attribute 必須為 :digits 個數字。',
    'digits_between'       => ':attribute 必須為 :min ~ :max 個數字。',
    'dimensions'           => ':attribute 的圖像尺寸不滿足要求。',
    'distinct'             => ':attribute 字段含有重復的值。',
    'email'                => ':attribute 不是壹個合法的電子郵箱。',
    'exists'               => '您選擇的 :attribute 是不合法的。',
    'file'                 => ':attribute 必須是壹個合法的文件。',
    'filled'               => ':attribute 是必填的。',
    'image'                => ':attribute 必須是壹個圖像。',
    'in'                   => '您選擇的 :attribute 是不合法的。',
    'in_array'             => ':attribute 在 :other 中不存在。',
    'integer'              => ':attribute 必須是壹個整數。',
    'ip'                   => ':attribute 必須是壹個合法的IP地址。',
    'json'                 => ':attribute 必須是壹個合法的JSON串。',
    'max'                  => [
        'numeric' => ':attribute 不能大於 :max。',
        'file'    => ':attribute 不能大於 :max 字節。',
        'string'  => ':attribute 不能超過 :max 個字符。',
        'array'   => ':attribute 不能含有超過 :max 項。',
    ],
    'mimes'                => ':attribute 必須是以下類型的文件: :values。',
    'mimetypes'            => ':attribute 必須是以下類型的文件: :values。',
    'min'                  => [
        'numeric' => ':attribute 至少為 :min.',
        'file'    => ':attribute 至少為 :min 字節。',
        'string'  => ':attribute 至少由 :min 個字符組成。',
        'array'   => ':attribute 至少有 :min 項。',
    ],
    'not_in'               => '您選擇的 :attribute 是無效的。',
    'numeric'              => ':attribute 必須是個整數。',
    'present'              => ':attribute 必須顯示。',
    'regex'                => ':attribute 格式是不合法的。',
    'required'             => ':attribute 是必填的。',
    'required_if'          => ':attribute 是必填的，因為 :other 的值為 :value。',
    'required_unless'      => ':attribute 是必填的，因為 :other 的值不為 :values。',
    'required_with'        => ':attribute 是必填的，因為 :values 是顯示的。',
    'required_with_all'    => ':attribute field 字段是必填的， 因為 :values 是顯示的。',
    'required_without'     => ':attribute field 字段是必填的， 因為 :values 未顯示。',
    'required_without_all' => ':attribute field 字段是必填的， 因為 :values 均未顯示。',
    'same'                 => ':attribute 必須和 :other 匹配。',
    'size'                 => [
        'numeric' => ':attribute 必須為 :size。',
        'file'    => ':attribute 必須為 :size 字節。',
        'string'  => ':attribute 必須含有 :size 個字符。',
        'array'   => ':attribute 必須包含 :size 項。',
    ],
    'string'               => ':attribute 必須為字符串。',
    'timezone'             => ':attribute 必須在合理區間內。',
    'unique'               => ':attribute 已經被占用了。',
    'uploaded'             => ':attribute 上傳失敗。',
    'url'                  => ':attribute 格式是不合法的。',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];