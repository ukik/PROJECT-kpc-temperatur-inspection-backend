<?php

/**
 * consist array of eloquent relationship name as key and real table as value
 * digunakan untuk mengubah nama relasi yang akan di model menjadi tabel yang ada di mysql
 */
trait RelationNameStatic
{
    // eloquent reationship as table name
    public $relation_name = [
        'belong_employee'                     => 'tb_employee',
        'belong_employees'                    => 'tb_employee',
        'belong_library_location'             => 'tb_library_location',
        'belong_library_equipment'            => 'tb_library_equipment',
        'one_mutation_inspection_information' => 'tb_mutation_inspection_information',
        'many_mutation_inspection'            => 'tb_mutation_inspection',
    ];
}
