<?php

declare(strict_types=1);

namespace Barnicolly\ModelSearch\Tests\Fixtures\Models;

use Barnicolly\ModelSearch\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

final class TestingModel extends Model
{
    use Searchable;

    protected $table = 'testing';
}
