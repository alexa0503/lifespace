<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//首页跳转
Route::get('/', function () {
    $row = \App\Page::where('homepage', 1)->first();
    if (null != $row) {
        return redirect('page/'.$row->alias_name);
    }

});
//头部菜单
/*
Menu::make('headerNavbar', function ($menu) {
    $pages = \App\Page::where('menu_display', 1)->orderBy('sort_id', 'ASC')->get();
    foreach ($pages as $page) {
        if ($page->alias_name == 'items') {
            $item = $menu->add($page->title, ['url' => '#']);
            $rows = \App\Category::where('sort_id', 'ASC')->get();
            foreach ($rows as $row) {
                $item->add($row->title, '#');
            }
        } else {
            $menu->add($page->title, ['url' => url($page->alias_name)]);
        }
    }
});
*/
//页面
Route::get('page/{page}', function (\App\Page $page) {
    $categories = \App\Category::all();
    return view($page->alias_name, [
        'page' => $page,
        'categories' => $categories,
    ]);
});
Route::get('items/{category}/{id?}', function($category_id=null,$id=null){
    $categories = \App\Category::all();
    $page = \App\Category::find(2);
    if( null == $id){
        $category = \App\Category::find($category_id);
        return view('category', [
            'page' => $page,
            'categories' => $categories,
            'items' => $category->items,
        ]);
    }
    else{
        return view('item');
    }

});
//admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function ($router) {
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->get('logout', 'LoginController@logout');
    Route::group(['middleware' => ['auth.admin:admin', 'menu']], function () {
        Route::get('/', 'IndexController@index')->name('admin_dashboard');
        Route::post('file/delete', 'FileController@delete');
        Route::post('file/upload/{name?}', 'FileController@upload');
        Route::resource('page.block', 'BlockController');
        Route::resource('item', 'ItemController');
        Route::resource('type.item', 'ItemTypeController');

        Route::get('users', 'IndexController@users');
        Route::get('account', 'IndexController@account');
        Route::post('account', 'IndexController@accountPost');
    });
    //初始化后台帐号
    Route::get('install', function () {
        if (0 == \App\Admin::count()) {
            $user = new \App\Admin();
            $user->name = 'admin';
            $user->email = 'admin@admin.com';
            $user->password = bcrypt('admin@2017');
            $user->save();
        }
        return redirect('admin/login');
    });
});
