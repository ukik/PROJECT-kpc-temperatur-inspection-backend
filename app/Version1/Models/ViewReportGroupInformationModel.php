<?php

use Illuminate\Database\Eloquent\Model;

class ViewReportGroupInformationModel extends Model
{
    use \ViewReportGroupInformationSchema;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        // $this->table = 'tb_mutation_inspection';
        date_default_timezone_set('Asia/Makassar');

        $year = request()->year;
        $month = request()->month;

        if(!$year && !$month) {

            $year = date('Y');
            $month = date('m');

            if (!ifTableExist("vw_report_group_information_{$year}_{$month}")) {
                // fresh create berdasarkan current Date
                if($year <= date('Y') && $month <= date('m')){
                    $this->createDynamicView("tb_mutation_inspection_information_{$year}_{$month}", "vw_report_group_information_{$year}_{$month}");
                }
            } 
            
            $this->table = "vw_report_group_information_{$year}_{$month}";
            return;
        }

        $month_validation = "01,02,03,04,05,06,07,08,09,10,11,12";

        $validator = \Validator::make([
            'year'      => $year,
            'month'     => $month,
        ], [
            "year"    => 'required|numeric|digits_between:4,4', 
            "month"   => 'required|digits_between:2,2|in:'.$month_validation, 
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }    

        if (!ifTableExist("vw_report_group_information_{$year}_{$month}")) {
            // batas terakhir adalah current Date
            if($year <= date('Y') && $month <= date('m')){
                $this->createDynamicView("tb_mutation_inspection_information_{$year}_{$month}", "vw_report_group_information_{$year}_{$month}");
            }            
        } 
        
        $this->table = "vw_report_group_information_{$year}_{$month}";
        return;
    }

    protected $guarded =  [
        'week',
        'year',
        'month',
        'month_name',
        'day',
        'day_name',
        'date',
        'time',
        'uuid',
        'uuid_tb_inspection',
        'label_inspection_information',
        'description_inspection_information',
        'created_at',
        'updated_at',
    ];
}
