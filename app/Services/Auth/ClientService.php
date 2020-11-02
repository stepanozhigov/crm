<?php


namespace App\Services\Auth;


use App\Models\Bill;
use App\Models\Client;
use App\Models\Project;
use App\Models\SuperClient;
use App\Services\Tag\TagRepository;
use Illuminate\Database\Eloquent\Collection;

class ClientService
{
    protected $clientRepository;
    protected $tagRepository;

    public function __construct(ClientRepository $clientRepository, TagRepository $tagRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param array $data
     * @return Client
     */
    public function createClientByAdminPanel(array $data): Client
    {
        $client = $this->clientRepository->createByAdminPanel($data);

        if(isset($data['projects'])) {
            $client->projects()->attach($data['projects']);
        }

        if (isset($data['products'])) {
            $client->products()->attach(array_keys($data['products']));
        }

        /*
         send mail with register data
         */

        return $client;
    }

    /**
     * @param array $data
     * @param Client $client
     * @return Client
     */
    public function editClientByAdminPanel(array $data, Client $client): Client
    {
        $client = $this->clientRepository->editByAdminPanel($data, $client);

        if ($client instanceof SuperClient) {
            return $client;
        }

        if(isset($data['projects'])) {
            $client->projects()->sync($data['projects']);
        } else {
            $client->projects()->detach();
        }

        if (isset($data['products'])) {
            $client->products()->sync(array_keys($data['products']));
        } else {
            $client->products()->detach();
        }

        return $client;
    }


    /**
     * @param array $data
     * @return Client
     */
    public function getClientForBill(array $data): Client
    {
        $client = $this->clientRepository->getClientByEmail($data['email']);

        if (!$client) {
            if (isset($data['tag'])) {
                $tag = $this->tagRepository->getTagByName($data['tag']);
                $data['tag_id'] = $tag
                    ? $tag->id
                    : $this->tagRepository->create($data['tag'], true)->id;
            }
            $tmpPassword = $this->getTmpPassword($data['email']);
            $client = $this->clientRepository->createInactive($data, $tmpPassword);
        }

        return $client;
    }

    /**
     * @param Client $client
     * @param Project $project
     * @return string
     */
    public function giveAccess(Client $client, Project $project): string
    {
        $this->clientRepository->giveAccess($client);
        $client->projects()->syncWithoutDetaching($project);

        return $this->getTmpPassword($client->email);
    }

    /**
     * @param Client $client
     * @param Bill $bill
     * @return Collection
     */
    public function openProductsAfterPayed(Client $client, Bill $bill): Collection
    {
        /** @var Collection $products */
        $products = $bill->products->push($bill->product);
        $productModels = array_fill_keys($products->pluck('id')->toArray(), ['bill_id' => $bill->id]);
        $client->products()->syncWithoutDetaching($productModels);

        return $products;
    }

    private function getTmpPassword(string $email): string
    {
        return substr(md5($email), 0, 8);
    }

}
