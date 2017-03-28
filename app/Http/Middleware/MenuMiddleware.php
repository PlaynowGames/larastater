<?php

namespace App\Http\Middleware;

use Closure;
use Menu;
use Caffeinated\Menus\Builder;

class MenuMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('example', function(Builder $menu) {
			$menu->add('Relatorios', 'relatorios');
			$menu->add('Macula', 'macula');
			$menu->add('Lancamentos', 'lancamentos');
			$menu->add('Financas', 'financas');
			$menu->add('Blog', 'blog');
		});
        return $next($request);
    }
}
