[[open_php_tag]]

namespace Tests\[[namespace]];

use Tests\TestCase;
use [[namespace]]\[[model]];

class [[model]]Test extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $[[model_name_camel_case_singular]] = [[model]]::first();
<?php foreach ($columns as $column): ?>
<?php if (str_contains($column->Field, '_id')): ?>
<?php $relationship = str_replace('_id', '', $column->Field); ?>

        $this->assertInstanceOf(<?=studly_case(str_singular($relationship))?>::class, $[[model_name_camel_case_singular]]-><?=camel_case(str_singular($relationship))?>);
        $this->assertCollectionOf(<?=studly_case(str_singular($relationship))?>::class, $[[model_name_camel_case_singular]]-><?=camel_case(str_plural($relationship))?>);
<?php endif; ?>
<?php endforeach; ?>
    }
}
