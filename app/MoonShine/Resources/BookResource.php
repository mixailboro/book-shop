<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

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
 * @extends ModelResource<Book>
 */
class BookResource extends ModelResource
{
    protected string $model = Book::class;

    protected string $title = 'Books';

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Название','title')->sortable(),
            Text::make('Год издания','publication_year' )->sortable(),
            BelongsTo::make('Автор', 'author')->sortable(),
            BelongsTo::make('Жанр', 'genre')->sortable(),
            Number::make('Цена', 'price')->sortable(),
            Number::make('Количество','count')->sortable(),
        ];
    }

    public function formFields(): array
    {
        return [
            Text::make('Название','title'),
            Image::make('Обложка','cover')
                ->dir('cover')
                ->allowedExtensions(['jpg', 'jpeg', 'png', 'webp'])
                ->removable()
                ->nullable(),
            CKEditor::make('Описание','description')->nullable(),
            Text::make('Год издания','publication_year' ),
            BelongsTo::make('Автор', 'author'),
            BelongsTo::make('Жанр', 'genre'),
            Number::make('Цена', 'price'),
            Number::make('Количество','count'),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),
            Text::make('Название','title'),
            Image::make('Обложка','cover'),
            CKEditor::make('Описание','description'),
            Text::make('Год издания','publication_year' ),
            BelongsTo::make('Автор', 'author'),
            BelongsTo::make('Жанр', 'genre'),
            Number::make('Цена', 'price'),
            Number::make('Количество','count'),
        ];
    }


    public function search(): array
    {
        return ['title', 'description', 'publication_year', 'genre', 'author'];
    }

    /**
     * @param Book $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
