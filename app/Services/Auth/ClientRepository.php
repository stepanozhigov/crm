<?php


namespace App\Services\Auth;


use App\Models\Client;
use App\Models\Tag;
use Hash;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ClientRepository
{
    public function createByAdminPanel(array $data): Client
    {
        $client =  new Client($data);
        $client->password = Hash::make($data['password']);
        $client->save();

        return $client;
    }

    public function editByAdminPanel(array $data, Client $client): Client
    {
        $client->fill($data);
        if ($data['password']) {
            $client->password = Hash::make($data['password']);
        }
        $client->save();

        return $client;
    }

    public function getAllWithPaginate(int $count): LengthAwarePaginator
    {
        return Client::paginate($count);
    }

    public function getClientByEmail(string $email): ?Client
    {
        return Client::firstWhere('email', $email);
    }

    public function createInactive(array $data, string $tmpPassword): Client
    {
        $client = new Client($data);
        $client->status = Client::STATUS_WAIT;
        $client->password = Hash::make($tmpPassword); // tmp password
        $client->save();

        return $client;
    }

    public function giveAccess(Client $client): Client
    {
        $client->status = Client::STATUS_ACTIVE;
        $client->save();

        return $client;
    }
}
