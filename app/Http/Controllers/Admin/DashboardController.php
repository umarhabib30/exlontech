<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'title' => 'Admin Dashboard | Exlon Tech',
            'totalContacts' => ContactUs::count(),
            'totalJobs' => Job::count(),
            'activeJobs' => Job::where('is_active', true)->count(),
            'totalApplications' => JobApplication::count(),
            'recentContacts' => ContactUs::latest()->take(5)->get(),
            'recentApplications' => JobApplication::with('job')->latest()->take(5)->get(),
            'serviceBreakdown' => ContactUs::selectRaw("COALESCE(service, 'Not selected') as service_name, COUNT(*) as total")
                ->groupBy('service_name')
                ->orderByDesc('total')
                ->take(6)
                ->get(),
        ]);
    }
}
