<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

use Illuminate\Notifications\Action;
use MoonShine\Fields\Email;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Contact>
 */
class ContactResource extends ModelResource
{
    protected string $model = Contact::class;

    protected string $title = 'Contacts';

    public function getActiveActions(): array
    {
        if (Contact::query()->first()) {
            return ['view', 'update'];
        }else {
            return ['create'];
        }

    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Address'),
                Phone::make('Phone'),
                Email::make('Email'),
            ]),
        ];
    }



    /**
     * @param Contact $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
