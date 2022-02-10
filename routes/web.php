<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\DashboardManager;
use App\Http\Livewire\Firstpage;
use App\Http\Livewire\KPI;
use App\Http\Livewire\Date;
use App\Http\Livewire\Displaykpi;
use App\Http\Livewire\Kecekapan;
use App\Http\Livewire\KecekapanManager;
use App\Http\Livewire\Nilai;
use App\Http\Livewire\NilaiManager;
use App\Http\Livewire\ManagerKPI;
use App\Http\Livewire\Memo;
use App\Http\Livewire\LaravelExamples\ViewProfile;
use App\Http\Livewire\LaravelExamples\EditProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\LaravelExamples\UserManagementAdmin;
// use App\Http\Controllers\ManagerKPI;
use App\Http\Controllers\HRKPI;

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

Route::get('/', Login::class)->name('login');
Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');
Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

//Employee Route
// Route::post('/employee/save/kpi/{year}/{month}',[KPI::class, 'kpi_save']);
Route::post('/employee/save/kpi/{date_id}/{user_id}/{year}/{month}',[KPI::class, 'kpi_save']);
Route::get('/employee/edit/kpimaster1/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_edit1']);
Route::get('/employee/edit/kpimaster2/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_edit2']);
Route::get('/employee/edit/kpimaster3/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_edit3']);
Route::get('/employee/edit/kpimaster4/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_edit4']);
Route::get('/employee/edit/kpimaster5/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_edit5']);
Route::get('/employee/edit/kpimaster6/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_edit6']);
Route::get('/employee/edit/kpimaster7/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_edit7']);
Route::get('/employee/edit/kpimaster8/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_edit8']);
Route::post('/employee/update/kpimaster/{id}/{fungsi}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_master_update']);
// Route::post('/employee/save/kecekapan/{year}/{month}',[Kecekapan::class, 'kecekapan_save']);
Route::post('/employee/save/kecekapan/{date_id}/{user_id}/{year}/{month}',[Kecekapan::class, 'kecekapan_save']);
// Route::post('/employee/save/nilai/{year}/{month}',[Nilai::class, 'nilai_save']);
Route::post('/employee/save/nilai/{date_id}/{user_id}/{year}/{month}',[Nilai::class, 'nilai_save']);
Route::get('/employee/edit/kpi/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_edit']);
Route::post('/employee/update/kpi/{id}/{date_id}/{user_id}/{year}/{month}', [KPI::class, 'kpi_update']);
Route::get('/employee/edit/kecekapan/{id}/{date_id}/{user_id}/{year}/{month}', [Kecekapan::class, 'kecekapan_edit']);
Route::post('/employee/update/kecekapan/{id}/{date_id}/{user_id}/{year}/{month}', [Kecekapan::class, 'kecekapan_update']);
Route::get('/employee/edit/nilai/{id}/{date_id}/{user_id}/{year}/{month}', [Nilai::class, 'nilai_edit']);
Route::post('/employee/update/nilai/{id}/{date_id}/{user_id}/{year}/{month}', [Nilai::class, 'nilai_update']);
Route::get('/employee/changeup/kpi/{date_id}', [Displaykpi::class, 'changeup']);
Route::get('/employee/changedown/kpi/{date_id}', [Displaykpi::class, 'changedown']);
Route::get('/employee/kpi/{date_id}/{user_id}/{year}/{month}', KPI::class)->name('Kpi');
Route::get('/employee/kecekapan/{date_id}/{user_id}/{year}/{month}', Kecekapan::class)->name('Kecekapan');
Route::get('/employee/nilai/{date_id}/{user_id}/{year}/{month}', Nilai::class)->name('Nilai');
Route::get('/employee/displaykpi/{date_id}/{user_id}/{year}/{month}', [Displaykpi::class, 'view_all'])->name('Display-KPI');
Route::get('/employee/edit/date/{date_id}/{user_id}/{year}/{month}', [Date::class, 'date_edit'])->name('Edit');
Route::post('/employee/update/date/{date_id}/{user_id}/{year}/{month}', [Date::class, 'date_update']);

//Manager Route
Route::get('/manager/edit/kecekapan/{id_user}/{id}/{date_id}/{user_id}/{year}/{month}', [KecekapanManager::class, 'kecekapan_edit']);
Route::post('/manager/update/kecekapan/{id_user}/{id}/{date_id}/{user_id}/{year}/{month}', [KecekapanManager::class, 'kecekapan_update']);
Route::get('/manager/edit/nilai/{id_user}/{id}/{date_id}/{user_id}/{year}/{month}', [NilaiManager::class, 'nilai_edit']);
Route::post('/manager/update/nilai/{id_user}/{id}/{date_id}/{user_id}/{year}/{month}', [NilaiManager::class, 'nilai_update']);

// Route::get('/manager/changeup/kpi/{date_id}', [\App\Http\Controllers\ManagerKPI::class, 'changeupmanager']);
// Route::get('/manager/changedown/kpi/{date_id}', [\App\Http\Controllers\ManagerKPI::class, 'changedownmanager']);
// Route::post('/manager/messageup/kpi/{date_id}', [\App\Http\Controllers\ManagerKPI::class, 'messageupmanager']);
// Route::get('/manager/messagedown/kpi/{date_id}', [\App\Http\Controllers\ManagerKPI::class, 'messagedownmanager']);
Route::get('/manager/changeup/kpi/{date_id}', [ManagerKPI::class, 'changeupmanager']);
Route::get('/manager/changedown/kpi/{date_id}', [ManagerKPI::class, 'changedownmanager']);
Route::post('/manager/messageup/kpi/{date_id}', [ManagerKPI::class, 'messageupmanager']);

// Route::get('/manager-hr/view/kpi/{id}/{date_id}/{user_id}/{year}/{month}', [\App\Http\Controllers\ManagerKPI::class, 'index']);
Route::get('/manager-hr/view/kpi/{id}/{date_id}/{user_id}/{year}/{month}', ManagerKPI::class);

//HR Route
// Route::get('/hr/changeup/kpi/{date_id}', [\App\Http\Controllers\ManagerKPI::class, 'changeuphr']);
// Route::get('/hr/changedown/kpi/{date_id}', [\App\Http\Controllers\ManagerKPI::class, 'changedownhr']);
// Route::post('/hr/messageup/kpi/{date_id}', [\App\Http\Controllers\ManagerKPI::class, 'messageuphr']);
Route::get('/hr/changeup/kpi/{date_id}', [ManagerKPI::class, 'changeuphr']);
Route::get('/hr/changedown/kpi/{date_id}', [ManagerKPI::class, 'changedownhr']);
Route::post('/hr/messageup/kpi/{date_id}', [ManagerKPI::class, 'messageuphr']);
// Route::get('/hr/messagedown/kpi/{date_id}', [\App\Http\Controllers\ManagerKPI::class, 'messagedownhr']);



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard-manager', DashboardManager::class)->name('dashboard-manager');
    Route::get('/firstpage', Firstpage::class)->name('firstpage');
    Route::post('/employee/profile/update/{id}',[EditProfile::class, 'profile_update']);
    Route::get('/add-date', Date::class)->name('add-date');
    Route::get('/memo', Memo::class)->name('memo');
    Route::get('/add-date/{user_id}', [Date::class, 'create_date']);
    Route::post('/date/save',[Date::class, 'date_save'])->name('date_save');
    Route::get('/laravel-view-profile', ViewProfile::class)->name('view-profile');
    Route::get('/laravel-edit-profile', EditProfile::class)->name('edit-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
    Route::get('/laravel-user-management-admin', UserManagementAdmin::class)->name('user-management-admin');

});
