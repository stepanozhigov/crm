<?php


namespace App\Services\Page\ConsultPage;


use App\Models\Page;
use App\Models\Project;

class ConsultPageService
{
    private $consultPageRepository;

    public function __construct(ConsultPageRepository $consultPageRepository)
    {
        $this->consultPageRepository = $consultPageRepository;
    }

    public function createByAdminPanel(array $data): Page
    {
        $data['type'] = Page::TYPE_CONSULT;
        return $this->consultPageRepository->create($data);
    }

    public function editByAdminPanel(array $data, Page $consultPage): Page
    {
        $data['type'] = Page::TYPE_CONSULT;
        return $this->consultPageRepository->edit($data, $consultPage);
    }

    public function getSettingForProject(Project $project): ?array
    {
        $consultPageSettings = $this->consultPageRepository->getAll();

        foreach ($consultPageSettings as $consultPageSetting) {
            if ($consultPageSetting->settings['project'] == $project->id) {
                return $consultPageSetting->settings;
            }
        }

        return null;
    }

    public function getVipConsultForProject(Project $project): array
    {
        //@ToDo - add the potential to edit from admin panel
        $consult = [];
        switch ($project->id) {
            case 4:
                $consult['man'] = 154;
                $consult['woman'] = 155;
                $consult['video'] = 'lDDUX6dZKcI';
                break;
        }

        return $consult;
    }
}
