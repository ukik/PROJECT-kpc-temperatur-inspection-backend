<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute harus diterima.',
    'active_url'           => ':attribute bukan URL yang valid.',
    'after'                => ':attribute harus menjadi tanggal sesudahnya :date.',
    'after_or_equal'       => ':attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha'                => ':attribute hanya boleh mengandung huruf.',
    'alpha_dash'           => ':attribute mungkin hanya berisi huruf, angka, dan garis putus-putus.',
    'alpha_num'            => ':attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':attribute harus berupa array.',
    'before'               => ':attribute harus tanggal sebelum :date.',
    'before_or_equal'      => ':attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file'    => ':attribute harus antara :min dan :max kilobyte.',
        'string'  => ':attribute harus antara :min dan :max karakter.',
        'array'   => ':attribute harus ada di antara :min dan :max item.',
    ],
    'boolean'              => ':attribute bidang harus benar atau salah.',
    'confirmed'            => ':attribute konfirmasi tidak cocok.',
    'date'                 => ':attribute bukan tanggal yang valid.',
    'date_format'          => ':attribute tidak cocok dengan format :format.',
    'different'            => ':attribute dan :other harus berbeda.',
    'digits'               => ':attribute harus :digits digit.',
    'digits_between'       => ':attribute harus antara :min dan :max digit.',
    'dimensions'           => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => ':attribute bidang memiliki nilai duplikat.',
    'email'                => ':attribute harus alamat e-mail yang valid.',
    'exists'               => 'yang dipilih :attribute tidak valid.',
    'file'                 => ':attribute harus berupa file.',
    'filled'               => ':attribute bidang harus memiliki nilai.',
    'image'                => ':attribute harus berupa gambar.',
    'in'                   => 'yang dipilih :attribute tidak valid.',
    'in_array'             => ':attribute bidang tidak ada di :other.',
    'integer'              => ':attribute harus berupa bilangan bulat.',
    'ip'                   => ':attribute harus alamat IP yang valid.',
    'ipv4'                 => ':attribute harus alamat IPv4 yang valid.',
    'ipv6'                 => ':attribute harus alamat IPv6 yang valid.',
    'json'                 => ':attribute harus berupa string JSON yang valid.',
    'max'                  => [
        'numeric' => ':attribute tidak boleh lebih besar dari :max.',
        'file'    => ':attribute tidak boleh lebih besar dari :max kilobyte.',
        'string'  => ':attribute tidak boleh lebih besar dari :max karakter.',
        'array'   => ':attribute tidak boleh lebih besar dari :max item.',
    ],
    'mimes'                => ':attribute harus berupa file type: :values.',
    'mimetypes'            => ':attribute harus berupa file type: :values.',
    'min'                  => [
        'numeric' => ':attribute paling tidak harus :min.',
        'file'    => ':attribute paling tidak harus :min kilobyte.',
        'string'  => ':attribute paling tidak harus :min karakter.',
        'array'   => ':attribute paling tidak harus :min item.',
    ],
    'not_in'               => 'yang dipilih :attribute tidak valid.',
    'numeric'              => ':attribute harus berupa angka.',
    'present'              => ':attribute bidang harus ada.',
    'regex'                => ':attribute format tidak valid.',
    'required'             => ':attribute bidang wajib diisi.',
    'required_if'          => ':attribute bidang wajib diisi saat :other berupa :value.',
    'required_unless'      => ':attribute bidang wajib diisi kecuali :other ada di :values.',
    'required_with'        => ':attribute bidang wajib diisi saat :values tersedia.',
    'required_with_all'    => ':attribute bidang wajib diisi saat :values tersedia.',
    'required_without'     => ':attribute bidang wajib diisi saat :values tidak tersedia.',
    'required_without_all' => ':attribute bidang wajib diisi saat tidak ada :values tersedia.',
    'same'                 => ':attribute dan :other harus cocok.',
    'size'                 => [
        'numeric' => ':attribute harus :size.',
        'file'    => ':attribute harus :size kilobyte.',
        'string'  => ':attribute harus :size karakter.',
        'array'   => ':attribute harus mengandung :size item.',
    ],
    'string'               => ':attribute harus berupa string.',
    'timezone'             => ':attribute harus merupakan zona yang valid.',
    'unique'               => ':attribute sudah diambil.',
    'uploaded'             => ':attribute gagal mengunggah.',
    'url'                  => ':attribute format tidak valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
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
    | following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
