<?php
namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Run;
class MainLayoutViewComposer{
    public function compose(View $view){
        $categories = Category::all();
        $sel = request()->query('category');
        $view->with(['category_options'=>$categories,'selected'=>$sel]);
    }
}