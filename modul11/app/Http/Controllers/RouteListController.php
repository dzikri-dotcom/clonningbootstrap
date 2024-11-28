<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

class RouteListController extends Controller
{
    public function index()
    {
        // Ambil semua route
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return [
                'method' => implode('|', $route->methods()),
                'uri' => $route->uri(),
                'name' => $route->getName(),
                'action' => $route->getActionName(),
                'middleware' => implode(', ', $route->middleware()),
            ];
        });

        // Kirim data ke view
        return view('route-list', ['routes' => $routes]);
    }
}
