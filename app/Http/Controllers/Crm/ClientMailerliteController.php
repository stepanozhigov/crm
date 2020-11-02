<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\ClientMailerRequest;
use App\Services\MailerSubscriber\MailerSubscriberService;
use MailerLiteApi\Exceptions\MailerLiteSdkException;

class ClientMailerliteController extends Controller
{
    protected $mailerSubscriberService;

    public function __construct(MailerSubscriberService $mailerSubscriberService)
    {
        $this->mailerSubscriberService = $mailerSubscriberService;
    }

    public function index()
    {
        return view('crm.mailer-subscribers.index');
    }

    public function create()
    {
        return view('crm.mailer-subscribers.create');
    }

    public function store(ClientMailerRequest $request)
    {
        $validated = $request->validated();
        $this->mailerSubscriberService->addSubscriberToGroupByAdminPanel($validated);

        return redirect('mailer-subscribers')->with('success', 'Подписчик успешно добавлен!');
    }

}
