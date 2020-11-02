<?php

namespace App\Http\Controllers\Crm;

use App\Models\Email;

/**
 * Контроллер отправленных писем
 */
class EmailsController extends Controller
{
    public function index()
    {
        return view('crm.emails.index');
    }

    public function show(Email $email)
    {
        return view('crm.emails.show')->with('model', $email);
    }
}
