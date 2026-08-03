<x-app-layout>
    @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="quicktask-dashboard">
        <div class="app-content-header bg-white">
            <div class="container-fluid py-3">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h3 class="mb-0">QuickTask Overview</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box text-bg-primary">
                            <div class="inner">
                                <h3>24</h3>
                                <p>Open Tasks</p>
                            </div>
                            <i class="small-box-icon bi bi-list-check"></i>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box text-bg-success">
                            <div class="inner">
                                <h3>12</h3>
                                <p>Completed</p>
                            </div>
                            <i class="small-box-icon bi bi-check2-circle"></i>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box text-bg-warning">
                            <div class="inner">
                                <h3>5</h3>
                                <p>Due Soon</p>
                            </div>
                            <i class="small-box-icon bi bi-clock-history"></i>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box text-bg-danger">
                            <div class="inner">
                                <h3>3</h3>
                                <p>Blocked</p>
                            </div>
                            <i class="small-box-icon bi bi-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recent Task Activity</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Prepare authentication screens</td>
                                            <td><span class="quicktask-status-dot bg-success"></span>Completed</td>
                                            <td>Today</td>
                                        </tr>
                                        <tr>
                                            <td>Review localization copy</td>
                                            <td><span class="quicktask-status-dot bg-warning"></span>In Progress</td>
                                            <td>Tomorrow</td>
                                        </tr>
                                        <tr>
                                            <td>Build dashboard template</td>
                                            <td><span class="quicktask-status-dot bg-primary"></span>Open</td>
                                            <td>This week</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Team Progress</h3>
                            </div>
                            <div class="card-body">
                                <p class="mb-2">Completed tasks</p>
                                <div class="progress mb-3" role="progressbar" aria-label="Completed tasks" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: 68%">68%</div>
                                </div>

                                <p class="mb-2">Tasks reviewed</p>
                                <div class="progress mb-3" role="progressbar" aria-label="Tasks reviewed" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-info" style="width: 42%">42%</div>
                                </div>

                                <p class="mb-2">Blocked tasks</p>
                                <div class="progress" role="progressbar" aria-label="Blocked tasks" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-danger" style="width: 12%">12%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
