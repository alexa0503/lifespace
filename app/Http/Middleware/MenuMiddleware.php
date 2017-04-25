<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Menu;
class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('adminNavbar', function($menu){
            $menu->add('控制面板',['route'=>'admin_dashboard']);
            //$page = $menu->add('页面管理','#');
            $pages = \App\Page::all();
            foreach($pages as $v){
                $t = $menu->add($v->title, ['url'=>route('page.block.index',['page'=>$v->id])]);
                $t->add('查看', ['url'=>route('page.block.index',['page'=>$v->id])]);
                $t->add('新增', ['url'=>route('page.block.create', ['page'=>$v->id])]);

            }

            $item = $menu->add('产品管理','#');
            $item->add('查看', ['url'=>route('item.index')]);
            $item->add('添加', ['url'=>route('item.create')]);
            //$page->add('查看', 'page/view')->divide();
            //$menu->add('账户',['route'=>'admin_account']);
        });
        return $next($request);
    }
}
