<?php

namespace App\Exports;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


class StudentsExport implements FromCollection, WithHeadings
{

    protected $from;

    function __construct($amount,$from) {

        $this->amount = $amount;
        $this->from = $from;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->from == 'latest'){

            $students = Student::latest()->limit($this->amount)->get();
            return StudentResource::collection($students);

        }else{

            $students = Student::oldest()->limit($this->amount)->get();
            return StudentResource::collection($students);
        }

    }
     public function headings(): array
    {
        return [

            'SL','Name','Email','Joining-Date'
        ];
    }
}
