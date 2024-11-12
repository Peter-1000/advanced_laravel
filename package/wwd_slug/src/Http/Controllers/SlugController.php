<?php


namespace wwd\slug\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SlugController extends Controller
{

    public function index()
    {
        $slug = Str::slug('web developer diaries');

        return view('wwd/slug::slug', compact('slug'));
    }

}
