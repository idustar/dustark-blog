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

    'accepted'             => ':attribute 必须被勾选。',
    'active_url'           => ':attribute 不是有效的url。',
    'after'                => ':attribute 必须是 :date 之后的日期。',
    'after_or_equal'       => ':attribute 必须是 :date 或之后的日期。',
    'alpha'                => ':attribute 只能包含字母。',
    'alpha_dash'           => ':attribute 只能包含字母、数字和下划线。',
    'alpha_num'            => ':attribute 只能包含字母、数字。',
    'array'                => ':attribute 必须是数组',
    'before'               => ':attribute 必须是 :date 之前的日期。',
    'before_or_equal'      => ':attribute 必须是 :date 或之前的日期。',
    'between'              => [
        'numeric' => ':attribute 的值要位于 :min 和 :max 之间。',
        'file'    => ':attribute 的大小应为 :min ~ :max 字节。',
        'string'  => ':attribute 只能包含 :min ~ :max 个字符。',
        'array'   => ':attribute 只能包含 :min ~ :max 项。',
    ],
    'boolean'              => ':attribute 只能为[是]或[否]。',
    'confirmed'            => ':attribute 两次输入不一致。',
    'date'                 => ':attribute 不是一个合法的日期。',
    'date_format'          => ':attribute 不满足格式 :format。',
    'different'            => ':attribute 不能与 :other 完全相同。',
    'digits'               => ':attribute 必须为 :digits 个数字。',
    'digits_between'       => ':attribute 必须为 :min ~ :max 个数字。',
    'dimensions'           => ':attribute 的图像尺寸不满足要求。',
    'distinct'             => ':attribute 字段含有重复的值。',
    'email'                => ':attribute 不是一个合法的电子邮箱。',
    'exists'               => '您选择的 :attribute 是不合法的。',
    'file'                 => ':attribute 必须是一个合法的文件。',
    'filled'               => ':attribute 是必填的。',
    'image'                => ':attribute 必须是一个图像。',
    'in'                   => '您选择的 :attribute 是不合法的。',
    'in_array'             => ':attribute 在 :other 中不存在。',
    'integer'              => ':attribute 必须是一个整数。',
    'ip'                   => ':attribute 必须是一个合法的IP地址。',
    'json'                 => ':attribute 必须是一个合法的JSON串。',
    'max'                  => [
        'numeric' => ':attribute 不能大于 :max。',
        'file'    => ':attribute 不能大于 :max 字节。',
        'string'  => ':attribute 不能超过 :max 个字符。',
        'array'   => ':attribute 不能含有超过 :max 项。',
    ],
    'mimes'                => ':attribute 必须是以下类型的文件: :values。',
    'mimetypes'            => ':attribute 必须是以下类型的文件: :values。',
    'min'                  => [
        'numeric' => ':attribute 至少为 :min.',
        'file'    => ':attribute 至少为 :min 字节。',
        'string'  => ':attribute 至少由 :min 个字符组成。',
        'array'   => ':attribute 至少有 :min 项。',
    ],
    'not_in'               => '您选择的 :attribute 是无效的。',
    'numeric'              => ':attribute 必须是个整数。',
    'present'              => ':attribute 必须显示。',
    'regex'                => ':attribute 格式是不合法的。',
    'required'             => ':attribute 是必填的。',
    'required_if'          => ':attribute 是必填的，因为 :other 的值为 :value。',
    'required_unless'      => ':attribute 是必填的，因为 :other 的值不为 :values。',
    'required_with'        => ':attribute 是必填的，因为 :values 是显示的。',
    'required_with_all'    => ':attribute field 字段是必填的， 因为 :values 是显示的。',
    'required_without'     => ':attribute field 字段是必填的， 因为 :values 未显示。',
    'required_without_all' => ':attribute field 字段是必填的， 因为 :values 均未显示。',
    'same'                 => ':attribute 必须和 :other 匹配。',
    'size'                 => [
        'numeric' => ':attribute 必须为 :size。',
        'file'    => ':attribute 必须为 :size 字节。',
        'string'  => ':attribute 必须含有 :size 个字符。',
        'array'   => ':attribute 必须包含 :size 项。',
    ],
    'string'               => ':attribute 必须为字符串。',
    'timezone'             => ':attribute 必须在合理区间内。',
    'unique'               => ':attribute 已经被占用了。',
    'uploaded'             => ':attribute 上传失败。',
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
