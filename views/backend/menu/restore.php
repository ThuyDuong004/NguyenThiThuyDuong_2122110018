<?php
use App\Models\Category;

use App\Models\Menu;
use App\Libaries\MyClass;

if(isset($_POST['ADDCATEGORY']))
{
    $list = $_POST['categoryId'];
    foreach($list as $id) 
    {
        $category= Category::find($id);
        $menu = new Menu;
        $menu->name = $category->name;
        $menu->link = 'index.php?option=product&cat=' .$category->slug;
        $menu->type = 'category';
        $menu->table_id = $category->id;
        $menu->sort_order=1;
        $menu->position= $_POST['position'];
        
    }
}