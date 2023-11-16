<?php
use App\Models\Category;

use App\Models\Menu;
use App\Libraries\MyClass;

if(isset($_POST['ADDCATEGORY']))
{
    $listid = $_POST['categoryId'];
    foreach($listid as $id) 
    {
        $category= Category::find($id);
        $menu = new Menu;
        $menu->name = $category->name;
        $menu->link = 'index.php?option=product&cat=' .$category->slug;
        $menu->type = 'category';
        $menu->table_id = $category->id;
        $menu->sort_order=1;
        $menu->position= $_POST['position'];
        $menu->sort_order=1;
        $menu->parent_id=0;
        $menu->level=0;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by=1;
        $menu->save();
       
    }
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header("location:index.php?option=menu");
}