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

    '😂' => '笑笑笑笑',

    /*
     * 'accepted' => 'The <x> must be accepted.',
     * 'accepted' => '<x> must be accepted first.',
     * 'accepted' => 'First, we need <x> to be received.',
     * 'accepted' => '<x> must be received.'
     *
     * 'accepted' => 'りょうしょうずみ',
     * 'accepted' => '了承済み',
     * 'accepted' => 'れっきとした',
     * 'accepted' => '歴とした',
     *
     * 'The <x> must be accepted.' => '<x>は必ず受け入れること。',
     * 'The <x> must be accepted.' => '<x>は必ず受け付けること。',
     * 'The <x> must be accepted.' => '<x>は必ず受け付けること。',
     * 'The <x> must be accepted.' => '<x>を受け付けること。',
     */
    'accepted' => '<x>は必ず受け入れること',


    /*
     * accepted_if => 'The <x> must be accepted when <y> is <z>.'
     * accepted_if => 'The <x> must be accepted when <y> is <z>.'
     */
    'accepted_if' => 'その他が値の場合、記入すること',
    'active_url' => 'これは有効なURLではありません。',
    'after' => '内容は、データの後に日付を指定する必要があります',
    'after_or_equal' => '日付は、同じ日、もしくはそれ以降でなければなりません。',
    'alpha' => '内容には文字のみ使用できます。',
    'alpha_dash' => ':内容には、文字、数字、ダッシュ、アンダースコアのみを指定することができます。',
    'alpha_num' => ':内容には文字と数字のみを指定します。',
    'array' => '内容は配列でなければなりません。',
    'before' => '内容は、データの日付より前の日付でなければならない',
    'before_or_equal' => '内容は、データより前の日付、または同じ日でなければなりません。',
    'between' => [//間
        'numeric' => '内容は、最小と最大の間になければなりません。',
        'file' => '内容は、最小から最大のKBの間でなければなりません。',
        'string' => '内容は、最小と最大のまでの文字列でなければなりません。',
        'array' => '内容は、最小と最大の間の項目を持つ必要があります。',
    ],
    'boolean' => '内容項目は、真、または偽でなければならない',
    'confirmed' => '内容が一致しません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => 'これは有効な日付はではありません。',
    'date_equals' => '内容は、データと同じ日でなければなりません。',
    'date_format' => '内容が、形式フォーマットと一致しません。',
    'different' => '内容とその他は、異なる値でなければなりません。',
    'digits' => '内容は必ず数字とする',
    'digits_between' => '内容は、最小と最大の間の桁数でなければなりません。',
    'dimensions' => '内容が無効な画像サイズです。',
    'distinct' => '項目に、重複した値があります。',
    'email' => '有効な電子メールアドレスを記入して下さい',
    'ends_with' => '内容の末尾には、値をつける必要があります。',
    'exists' => '選択された内容が無効です。',
    'file' => '内容はファイルでなければなりません。',
    'filled' => '項目には必ず値を指定すること。',
    'gt' => [
        'numeric' => '内容は値より大きい必要があります。',
        'file' => '内容は、値のKBより大きい必要があります。',
        'string' => '内容は、値の文字より大きい必要があります。',
        'array' => '内容は、値以上の項目を待つ必要があります。',
    ],
    'gte' => [
        'numeric' => '内容は、値より大きい必要がある',
        'file' => '内容は、値のKBより大きい必要があります。',
        'string' => '内容は、値の文字以上である必要があります。',
        'array' => '内容は、値以上の項目を持つこと',
    ],
    'image' => '内容は画像である必要があります。',
    'in' => '選択された内容は無効です。',
    'in_array' => '内容の項目が、その他に存在しません。',
    'integer' => '内容は整数である必要があります。',
    'ip' => '内容は、有効なIPアドレスである必要があります。',
    'ipv4' => '内容は、有効なIPv4アドレスでなければならない。',
    'ipv6' => '内容は、有効なIPv6アドレスでなければならない。',
    'json' => '内容は有効なJSON文字列である必要があります。',
    'lt' => [
        'numeric' => '内容は、値より小さい必要があります。',
        'file' => '内容は、KB以下でなければなりません',
        'string' => '内容は、値の文字以下出なければなりません。',
        'array' => '内容は、値より少ない項目でなければならない。',
    ],
    'lte' => [
        'numeric' => '内容は、値以下の必要があります。',
        'file' => '内容は、値のKB以下でなければならない',
        'string' => '内容は、値文字以下である必要があります。',
        'array' => '内容は、値より多い項目を持つことは出来ません。',
    ],
    'max' => [//最大
        'numeric' => '内容は、最大より大きくなくてはならない',
        'file' => '内容は、最大KBより大きくてはならない。',
        'string' => '内容は、最大文字より大きくてはならない。',
        'array' => '内容は、最大以上の項目を持つことは出来ません。',
    ],
    'mimes' => '内容は、値のファイルである必要があります。',
    'mimetypes' => '内容は、値のファイルである必要があります。',
    'min' => [
        'numeric' => '内容は最低でも最小でなければならない',
        'file' => '内容は最低でも最小KBでなければならない。',
        'string' => '内容は、最低でも最小文字でなければならない。',
        'array' => '内容には少なくとも、最小の項目が必要です。',
    ],
    'multiple_of' => '内容は、値の倍数でなければならない。',
    'not_in' => '選択された内容が無効です。',
    'not_regex' => '内容の形式が無効です。',
    'numeric' => '内容は数字でなければならない。',
    'password' => 'パスワードが正しくありません。',
    'present' => '内容のフィールドが必要です。',
    'regex' => '内容の形式が無効です。',
    'required' => '名前の記入は必ずして下さい。',
    'required_if' => 'その他が値の場合、内容は必須です。',
    'required_unless' => '内容のフィールドは、値に「その他」が含まれない限り必須です。',
    'required_with' => '値が存在する場合、内容のフィールドは必須である。',
    'required_with_all' => '値が存在する場合、内容の項目は必須である。',
    'required_without' => '値が存在しない場合、内容の項目は必須です。',
    'required_without_all' => '内容の項目は、値のいずれもが存在しない場合に必要がである。',
    'prohibited' => '内容の項目は使用禁止',
    'prohibited_if' => 'その他が値の場合、内容の項目は禁止されます。',
    'prohibited_unless' => '内容の項目は、値にその他が含まれない限り禁止されます。',
    'prohibits' => '内容の項目は、その他の存在を禁止します。',
    'same' => '内容とその他は一致させる必要があります。',
    'size' => [//サイズ
        'numeric' => '内容は必ずサイズとする。',
        'file' => '内容は、KBサイズでなければならない。',
        'string' => '内容は、サイズ文字でなければならない。',
        'array' => '内容には、サイズの項目が必要です。',
    ],
    'starts_with' => '内容の先頭は値でなければならない。',
    'string' => '内容は文字列である必要があります。',
    'timezone' => '内容には、有効なタイムゾーンを指定する必要があります。',
    'unique' => '内容はすでに取得しています。',
    'uploaded' => '内容のアップロードに失敗しました。',
    'url' => '内容は有効なURLである必要があります。',
    'uuid' => '内容は、有効なUUIDでなければならない。',

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

    'custom' => [//カスタム
        'attribute-name' => [//タイトル
            'rule-name' => 'カスタムメッセージ',
        ],
        'g-recaptcha-response' => [
            'required' => 'ロボットではない事を証明して下さい。',
            'captcha' => 'キャプチャーエラー、後ほど再度試すか、サイト管理者に連絡して下さい。',
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

    'attributes' => [//内容

    ],

];
