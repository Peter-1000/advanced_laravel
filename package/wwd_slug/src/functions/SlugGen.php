<?php


namespace wwd\slug\functions;

use Illuminate\Support\Str;
use wwd\slug\Http\Models\Slug;

class SlugGen
{

    public static function generate(string $title, $model)
    {
        $slug = Str::slug($title) . rand(10000000, 99999999);

        Slug::query()->create([
            'slug'  => $slug,
            'model' => $model
        ]);

        return $slug;
    }

}
