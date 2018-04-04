[[open_php_tag]]

use Models\[[namespace]]\[[ModelName]];
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define([[ModelName]]::class, function (Faker\Generator $faker) use ($factory) {

    return [
<?php foreach ($columns as $column): ?>
<?php if (isset($column->faker_type)): ?>
        '<?=$column->Field?>' => $faker-><?=$column->faker_type?>,
<?php else: ?>
        // '<?=$column->Field?>' => $faker-><?=$column->Field?>,
<?php endif; ?>
<?php endforeach; ?>
    ];
});