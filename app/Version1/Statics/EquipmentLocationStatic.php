<?php

/**
 * cara kerjanya jika dropdown select pada laporan diklik, akan request ke server, data equipment yang diminta sekaligus melampirkan data location sesuai dengan masing-masing kebutuhan.
 * misalnya equipment E00 pasti diikuti dengan location tertentu, begitu juga E01 dst
 * lihat variable $equipment sudah memetakan antara equipment dan location
 * jadi model equipment akan $append atribut bernama "location" yang isinya adalah turunan dari equipment sesuai dengan map dibawah ini
 * model location juga memakai ini untuk memfilter mana-mana location yang memiliki place (kanan/kiri) dan mana-mana location yang tidak memiliki place
 */
trait EquipmentLocationStatic
{
    public $equipment = [
        // 'E00' => 'CV.101',
        'E00' => [
            // place = 1
            'L37'   =>  ['Tail Pulley', 1],
            'L10'   =>  ['Bend pulley Bawah 1', 1],
            'L11'   =>  ['Bend pulley Bawah 2', 1],
            'L07'   =>  ['Bend pulley Atas 1 ', 1],
            'L08'   =>  ['Bend pulley Atas 2', 1],
            'L12'   =>  ['Break Pulley ', 1],
            // no place = 0
            'L39'   =>  ['Takeup Pulley', 0],
            'L36'   =>  ['Snub Pulley', 0],
            'L26'   =>  ['Head Pulley 1', 0],
            'L27'   =>  ['Head Pulley 2', 0],
            // place = 1
            'L28'   =>  ['Head Pulley 3', 1],
            'L31'   =>  ['Live Shaft Pulley', 1],
            'L20'   =>  ['G/Box 1', 1],
            // no place = 0
            'L14'   =>  ['Coller 1', 0],
            // place = 1
            'L33'   =>  ['Pedestal bearing 1', 1],
            'L21'   =>  ['G/Box 2', 1],
            // no place = 0
            'L15'   =>  ['Coller 2', 0],
            // place = 1
            'L34'   =>  ['Pedestal bearing 2', 1],
            'L22'   =>  ['G/Box 3', 1],
            // no place = 0
            'L16'   =>  ['Coller 3', 0],
            // place = 1
            'L35'   =>  ['Pedestal bearing 3', 1],
        ],

        // 'E01' => 'CV.111',
        'E01' => [
            // place = 1
            'L37'   =>  ['Tail Pulley', 1],
            'L09'   =>  ['Bend pulley Bawah', 1],
            'L06'   =>  ['Bend pulley Atas', 1],
            'L39'   =>  ['Takeup Pulley', 1],
            'L36'   =>  ['Snub Pulley', 1],
            'L25'   =>  ['Head Pulley', 1],
            // no place = 0
            'L19'   =>  ['G/Box', 0],
            'L13'   =>  ['Coller', 0],
            'L18'   =>  ['F/Coupling', 0],
        ],

        // 'E02' => 'CV.112',
        'E02' => [
            // place = 1
            'L37'   =>  ['Tail Pulley', 1],
            'L09'   =>  ['Bend pulley Bawah', 1],
            'L06'   =>  ['Bend pulley Atas', 1],
            'L39'   =>  ['Takeup Pulley', 1],
            'L36'   =>  ['Snub Pulley', 1],
            'L25'   =>  ['Head Pulley', 1],
            // no place = 0
            'L19'   =>  ['G/Box', 0],
            'L13'   =>  ['Coller', 0],
            'L18'   =>  ['F/Coupling', 0],
        ],

        // 'E03' => 'CV.113',
        'E03' => [
            // place = 1
            'L37'   =>  ['Tail Pulley', 1],
            'L09'   =>  ['Bend pulley Bawah', 1],
            'L06'   =>  ['Bend pulley Atas', 1],
            'L39'   =>  ['Takeup Pulley', 1],
            'L36'   =>  ['Snub Pulley', 1],
            'L25'   =>  ['Head Pulley', 1],
            // no place = 0
            'L19'   =>  ['G/Box', 0],
            'L13'   =>  ['Coller', 0],
            'L18'   =>  ['F/Coupling', 0],
        ],

        // 'E04' => 'CV.114',
        'E04' => [
            // place = 1
            'L37'   =>  ['Tail Pulley', 1],
            'L09'   =>  ['Bend pulley Bawah', 1],
            'L06'   =>  ['Bend pulley Atas', 1],
            'L39'   =>  ['Takeup Pulley', 1],
            'L36'   =>  ['Snub Pulley', 1],
            'L25'   =>  ['Head Pulley', 1],
            // no place = 0
            'L19'   =>  ['G/Box', 0],
            'L13'   =>  ['Coller', 0],
            'L18'   =>  ['F/Coupling', 0],
        ],

        // 'E05' => 'CV.115',
        'E05' => [
            // place = 1
            'L37'   =>  ['Tail Pulley', 1],
            'L25'   =>  ['Head Pulley', 1],
            // no place = 0
            'L19'   =>  ['G/Box', 0],
            'L13'   =>  ['Coller', 0],
            'L18'   =>  ['F/Coupling', 0],
        ],

        // 'E06' => 'CV.116',
        'E06' => [
            // place = 1
            'L37'   =>  ['Tail Pulley', 1],
            'L09'   =>  ['Bend pulley Bawah', 1],
            'L06'   =>  ['Bend pulley Atas', 1],
            'L39'   =>  ['Takeup Pulley', 1],
            'L36'   =>  ['Snub Pulley', 1],
            'L25'   =>  ['Head Pulley', 1],
            // no place = 0
            'L19'   =>  ['G/Box', 0],
            'L13'   =>  ['Coller', 0],
            'L18'   =>  ['F/Coupling', 0],
        ],

        // 'E07' => 'FB 7',
        'E07' => [
            // place = 1
            'L32'   => ['Motor Feeder', 1],
            'L23'   => ['G/Box Breaker', 1],
            'L30'   => ['HPP Pump', 1],
            'L01'   => ['Bearing Breaker', 1],
            'L29'   => ['Head Shaft', 1],
            'L38'   => ['Tail Shaft', 1],
            // no place = 0
            'L24'   => ['G/Box Sizer', 0],
            'L13'   => ['Coller', 0],
            'L00'   => ['Auto Grease', 0],
        ],

        // 'E08' => 'FB 8',
        'E08' => [
            // place = 1
            'L32'   => ['Motor Feeder', 1],
            'L23'   => ['G/Box Breaker', 1],
            'L30'   => ['HPP Pump', 1],
            'L01'   => ['Bearing Breaker', 1],
            'L29'   => ['Head Shaft', 1],
            'L38'   => ['Tail Shaft', 1],
            // no place = 0
            'L24'   => ['G/Box Sizer', 0],
            'L13'   => ['Coller', 0],
            'L00'   => ['Auto Grease', 0],
        ],

        // 'E09' => 'Sizer 7',
        'E09'  => [
            'L24'   => ['G/Box Sizer', 1],
            'L02'   => ['Bearing Drive End', 1],
            'L03'   => ['Bearing Non Drive End', 1],
            'L05'   => ['Bearing Timming Gear Non Drive End', 1],
            'L04'   => ['Bearing Timming Gear Drive End', 1],
            // no place = 0
            'L17'   => ['Coller Gear Box', 0]
        ],

        // 'E10' => 'Sizer 8',
        'E10' => [
            'L24'   => ['G/Box Sizer', 1],
            'L02'   => ['Bearing Drive End', 1],
            'L03'   => ['Bearing Non Drive End', 1],
            'L05'   => ['Bearing Timming Gear Non Drive End', 1],
            'L04'   => ['Bearing Timming Gear Drive End', 1],
            // no place = 0
            'L17'   => ['Coller Gear Box', 0]
        ],
    ];
}
