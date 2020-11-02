<?php


namespace App\Services\Webinar;


use App\Models\Webinar;

class WebinarRepository
{
    public function create(array $data)
    {
        $webinar = new Webinar($data);
        $webinar->save();

        return $webinar;
    }

    public function edit(array $data, Webinar $webinar)
    {
        $webinar->fill($data)->save();
        return $webinar;
    }

}
