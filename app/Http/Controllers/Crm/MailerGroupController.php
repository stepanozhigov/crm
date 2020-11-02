<?php

namespace App\Http\Controllers\Crm;

use App\Http\Livewire\Tables\MailerGroupTable;
use App\Http\Requests\MailerGroupRequest;
use App\Models\MailerliteGroup;
use App\Services\MailerGroup\MailerGroupService;

class MailerGroupController extends Controller
{
    protected $mailerGroupService;

    public function __construct(MailerGroupService $mailerGroupService)
    {
        $this->mailerGroupService = $mailerGroupService;
    }

    public function index()
    {
        return view('crm.mailer-groups.index');
    }

    public function create()
    {
        return view('crm.mailer-groups.create');
    }

    public function store(MailerGroupRequest $request)
    {
        $validated = $request->validated();
        $mailerGroup = $this->mailerGroupService->createByAdminPanel($validated);

        if (!$mailerGroup) {
            return redirect('mailer-groups')->with('error', 'Произошла ошибка!');
        }

        return redirect('mailer-groups')->with('success', 'Группа успешно добавлена!');
    }

    public function edit(MailerliteGroup $mailerGroup)
    {
        return view('crm.mailer-groups.edit', compact('mailerGroup'));
    }

    public function update(MailerGroupRequest $request, MailerliteGroup $mailerGroup)
    {
        $validated = $request->validated();
        $this->mailerGroupService->editByAdminPanel($validated, $mailerGroup);

        if (!$mailerGroup) {
            return redirect('mailer-groups')->with('error', 'Произошла ошибка!');
        }

        return redirect('mailer-groups')->with('success', 'Группа успешно обновленна!');
    }

}
