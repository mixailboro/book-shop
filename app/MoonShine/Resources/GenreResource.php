<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

use MoonShine\CKEditor\Fields\CKEditor;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Genre>
 */
class GenreResource extends ModelResource
{
    protected string $model = Genre::class;

    protected string $title = 'Genres';

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Имя','name')->sortable(),
        ];
    }

    public function formFields(): array
    {
        return [
            ID::make(),
            Text::make('Имя','name')
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),
            Text::make('Имя','name')
        ];
    }

    /**
     * @param Genre $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
