<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\Auth\ClientRepository;
use App\Services\Auth\ClientService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        return view('crm.clients.index');
    }

    public function create()
    {
        return view('crm.clients.create');
    }

    public function store(ClientRequest $request)
    {
        $validated = $request->validated();
        $this->clientService->createClientByAdminPanel($validated);

        return redirect('clients')->with('success', 'Запись успешно создана!');
    }


    public function edit(Client $client)
    {
        return view('crm.clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        $validated = $request->validated();
        $this->clientService->editClientByAdminPanel($validated, $client);

        return redirect('clients')->with('success', 'Изменения успешно применились!');;
    }

}
