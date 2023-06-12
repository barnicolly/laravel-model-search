<?php declare(strict_types=1);

namespace Barnicolly\ModelSearch\Contracts;

interface SearchContract
{
    public function getSearchIndex(): string;

    public function getKey(): mixed;

    public function toSearchArray(): array;
}
