<?php


namespace App\Services\Webinar;


use App\Models\Webinar;

class WebinarService
{
    private $webinarRepository;

    public function __construct(WebinarRepository $webinarRepository)
    {
        $this->webinarRepository = $webinarRepository;
    }

    public function createByAdminPanel(array $data): Webinar
    {
        return $this->webinarRepository->create($data);
    }

    public function editByAdminPanel(array $data, Webinar $webinar): Webinar
    {
        $webinar = $this->webinarRepository->edit($data, $webinar);

        return $webinar;
    }
}
