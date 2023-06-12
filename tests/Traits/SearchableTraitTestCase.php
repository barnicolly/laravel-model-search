<?php

declare(strict_types=1);

namespace Barnicolly\ModelSearch\Tests\Traits;

use Barnicolly\ModelSearch\Tests\ApplicationTestCase;
use Barnicolly\ModelSearch\Tests\Fixtures\Models\TestingModel;

class SearchableTraitTestCase extends ApplicationTestCase
{
    /**
     * @dataProvider providerIndexNames
     */
    public function testSame(string $expected, string $indexName): void
    {
        config(['model_search.index_prefix' => $indexName]);
        $model = new TestingModel();
        self::assertSame($expected, $model->getSearchIndex());
    }

    /**
     * @return string[][]
     */
    public static function providerIndexNames(): array
    {
        $model = new TestingModel();
        return [
            'one_word' => [
                'name-' . $model->getTable(),
                'name',
            ],
            'special_symbol' => [
                'second-name-' . $model->getTable(),
                'second.name',
            ],
        ];
    }
}
