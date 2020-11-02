<?php


namespace App\Services\Page\BillPage;


use App\Helpers\BillHelper;
use App\Models\Bill;
use App\Models\Page;

class BillPageService
{

    private $billPageRepository;

    public function __construct(BillPageRepository $billPageRepository)
    {
        $this->billPageRepository = $billPageRepository;
    }

    public function create(array $data): Page
    {
        $settings = $this->setSettings($data);
        return $this->billPageRepository->create($data, $settings);
    }

    public function edit(array $data, Page $billPage): Page
    {
        $settings = $this->setSettings($data);
        return $this->billPageRepository->edit($data, $billPage, $settings);
    }

    public function setBillPageSettings(Bill $bill)
    {
        $billPageSettings = $this->billPageRepository->getBillPagesSettingsToArray();
        $this->sortSettingsByPriority($billPageSettings);

        return $this->collectSettingsForBillPage($billPageSettings, $bill);
    }

    protected function setSettings(array $data): array
    {
        $settings = [];
        $settings['guaranty'] = $data['guaranty'] ?? [];
        $settings['additionalText'] = $data['additionalText'] ?? [];

        return $settings;
    }

    private function sortSettingsByPriority(array &$settings)
    {
        $sortedSettings = [];
        foreach ($settings as $setting) {
            $sortedSettings[$setting['priority']][] = $setting['settings'];
        }
        ksort($sortedSettings);
        $settings = $sortedSettings;
    }

    /* collect settings depending on priority */
    private function collectSettingsForBillPage(array $billPageSettings, Bill $bill)
    {
        $settings = [];
        foreach ($billPageSettings as $priorities) {
            foreach ($priorities as $priority) {
                foreach ($priority as $block => $blockSetting) {
                    if (BillHelper::checkBillPageSetting($blockSetting, $bill)) {
                        if (isset($blockSetting['override'])) {
                            if (isset($blockSetting['check'])) {
                                $settings[$block] = $blockSetting;
                            } else {
                                unset($settings[$block]);
                            }
                        }
                    }
                }
            }
        }
        return $settings;
    }
}
