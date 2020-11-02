<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\SuperClientRequest;
use App\Models\SuperClient;
use App\Services\Auth\ClientService;

class SuperClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        $model = SuperClient::instance();

        return view('crm.super-client.index', compact('model'));
    }

    public function update(SuperClientRequest $request, SuperClient $superClient)
    {
        $validated = $request->validated();
        $this->clientService->editClientByAdminPanel($validated, $superClient);

        return redirect('super-client')->with('success', 'Изменения успешно применились!');;
    }
}
