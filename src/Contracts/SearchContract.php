<?php

declare(strict_types=1);

namespace Barnicolly\ModelSearch\Contracts;

interface SearchContract
{
    public function getSearchIndex(): string;

    /** @return mixed */
    public function getKey();

    public function toSearchArray(): array;
}
