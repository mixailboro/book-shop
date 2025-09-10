<?php

namespace App\Http\Controllers;

use App\Models\Contact;


class ContactController extends Controller
{
    public function show()
    {
        $contact = Contact::query()->firstOrFail();

        return $contact;
    }
}
