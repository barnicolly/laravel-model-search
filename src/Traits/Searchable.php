<?php

declare(strict_types=1);

namespace Barnicolly\ModelSearch\Traits;

use Illuminate\Support\Str;

trait Searchable
{
    public function getSearchIndex(): string
    {
        $projectIndex = config('model_search.index_prefix') . '.' . $this->getTable();
        return Str::lower(Str::replace('.', '-', $projectIndex));
    }

    public function toSearchArray(): array
    {
        // Наличие пользовательского метода
        // преобразования модели в поисковый массив
        // позволит нам настраивать данные
        // которые будут доступны для поиска
        // по каждой модели.
        return $this->toArray();
    }
}
