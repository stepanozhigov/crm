<?php


namespace App\Services\SendMail;


use App\Models\Email;

class EmailRepository
{
    public function create(array $data): Email
    {
        $email = new Email($data);
        $email->save();

        return $email;
    }

}
