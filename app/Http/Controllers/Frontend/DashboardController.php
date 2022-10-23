<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Admin dashboard.
     *
     * @param $locale
     * @return Factory|View|Application
     */
    public function index($locale): Factory|View|Application
    {
        return view('admin.dashboard');
    }
}
