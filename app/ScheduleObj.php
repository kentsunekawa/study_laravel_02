<?php
namespace App;

use App\Person;
use App\Jobs\Myjob;
use Illuminate\Support\Facades\Storage;

class ScheduleObj {
    private $person;

    public function __construct($id) {
        $this->person = Person::find($id);
    }

    public function __invoke()
    {
        Storage::append('person_access_log.txt',
            $this->person->all_data);
        MyJob::dispatch($this->person);
        return 'true';
    }
}
