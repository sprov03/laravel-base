[[open_php_tag]]

use Illuminate\Database\Seeder;
use [[namespace]]\[[model]];

class [[model]]Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $[[model_name_camel_case_singular]] = factory([[model]]::class)->create([
<?php foreach ($columns as $column): ?>
<?php if (isset($column->faker_type)): ?>
        '<?=$column->Field?>' => $faker-><?=$column->faker_type?>,
<?php else: ?>
        // '<?=$column->Field?>' => $faker-><?=$column->Field?>,
<?php endif; ?>
<?php endforeach; ?>
        ]);
    }
}
