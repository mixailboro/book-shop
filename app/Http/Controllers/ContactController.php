<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


class ContactController extends Controller
{
    public function show(): Factory|Application|View
    {
        $contact = Contact::query()->firstOrFail();

        return view('contacts', compact('contact'));
    }
}
