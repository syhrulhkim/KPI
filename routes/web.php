<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\DashboardManager;
use App\Http\Livewire\Firstpage;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
// use App\Http\Livewire\EditProfile;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\TahapKepuasanPelanggan;
use App\Http\Livewire\OfiNcr;

use App\Http\Livewire\KPI;
use App\Http\Livewire\Displaykpi;
// use App\Http\Livewire\Createkpi;
// use App\Http\Livewire\KadSkorKorporat;

use App\Http\Livewire\Kecekapan;
use App\Http\Livewire\KecekapanManager;
use App\Http\Livewire\Nilai;
use App\Http\Livewire\NilaiManager;
// use App\Http\Livewire\LaravelExamples\ManagerKPI;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\LaravelExamples\UserManagementAdmin;

use App\Http\Controllers\ManagerKPI;
use App\Http\Controllers\HRKPI;

use Illuminate\Http\Request;

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

// Route::get('/employee/master',[KPI::class, 'kpi'])->name('employee_master');
// Route::get('/employee/master',[KPI::class, 'kpi'])->name('kpi');

// Route::get('/employee/bukti/edit/kpi/{id}',[KPI::class, 'bukti_main']);
// Route::post('/employee/bukti/save/kpi',[KPI::class, 'bukti_save'])->name('bukti_save');
// Route::post('/employee/bukti/update/kpi/{id}',[KPI::class, 'bukti_update']);

Route::post('/employee/save/kpi',[KPI::class, 'kpi_save'])->name('kpi_save');

Route::post('/employee/save/kpimaster1',[KPI::class, 'kpi_master_save1'])->name('kpi_master_save1');
Route::post('/employee/save/kpimaster2',[KPI::class, 'kpi_master_save2'])->name('kpi_master_save2');
Route::post('/employee/save/kpimaster3',[KPI::class, 'kpi_master_save3'])->name('kpi_master_save3');
Route::post('/employee/save/kpimaster4',[KPI::class, 'kpi_master_save4'])->name('kpi_master_save4');
Route::post('/employee/save/kpimaster5',[KPI::class, 'kpi_master_save5'])->name('kpi_master_save5');
Route::post('/employee/save/kpimaster6',[KPI::class, 'kpi_master_save6'])->name('kpi_master_save6');
Route::post('/employee/save/kpimaster7',[KPI::class, 'kpi_master_save7'])->name('kpi_master_save7');
Route::post('/employee/save/kpimaster8',[KPI::class, 'kpi_master_save8'])->name('kpi_master_save8');

Route::get('/employee/edit/kpimaster1/{id}', [KPI::class, 'kpi_master_edit1']);
Route::get('/employee/edit/kpimaster2/{id}', [KPI::class, 'kpi_master_edit2']);
Route::get('/employee/edit/kpimaster3/{id}', [KPI::class, 'kpi_master_edit3']);
Route::get('/employee/edit/kpimaster4/{id}', [KPI::class, 'kpi_master_edit4']);
Route::get('/employee/edit/kpimaster5/{id}', [KPI::class, 'kpi_master_edit5']);
Route::get('/employee/edit/kpimaster6/{id}', [KPI::class, 'kpi_master_edit6']);
Route::get('/employee/edit/kpimaster7/{id}', [KPI::class, 'kpi_master_edit7']);
Route::get('/employee/edit/kpimaster8/{id}', [KPI::class, 'kpi_master_edit8']);

Route::post('/employee/update/kpimaster/{id}', [KPI::class, 'kpi_master_update']);
// Route::post('/employee/update/kpimaster2/{id}', [KPI::class, 'kpi_master_update2']);
// Route::post('/employee/update/kpimaster3/{id}', [KPI::class, 'kpi_master_update3']);
// Route::post('/employee/update/kpimaster4/{id}', [KPI::class, 'kpi_master_update4']);
// Route::post('/employee/update/kpimaster5/{id}', [KPI::class, 'kpi_master_update5']);
// Route::post('/employee/update/kpimaster6/{id}', [KPI::class, 'kpi_master_update6']);
// Route::post('/employee/update/kpimaster7/{id}', [KPI::class, 'kpi_master_update7']);
// Route::post('/employee/update/kpimaster8/{id}', [KPI::class, 'kpi_master_update8']);

Route::post('/employee/save/kecekapan',[Kecekapan::class, 'kecekapan_save'])->name('kecekapan_save');
Route::post('/employee/save/nilai',[Nilai::class, 'nilai_save'])->name('nilai_save');

Route::get('/employee/edit/kpi/{id}', [KPI::class, 'kpi_edit']);
Route::post('/employee/update/kpi/{id}', [KPI::class, 'kpi_update']);
Route::get('/employee/delete/kpi/{id}', [KPI::class, 'kpi_delete']);


Route::get('/employee/save/kpimaster/{id}', [KPI::class, 'kpi_master_save1']);

Route::get('/employee/edit/kecekapan/{id}', [Kecekapan::class, 'kecekapan_edit']);
Route::post('/employee/update/kecekapan/{id}', [Kecekapan::class, 'kecekapan_update']);
Route::get('/employee/delete/kecekapan/{id}', [Kecekapan::class, 'kecekapan_delete']);

Route::get('/manager/edit/kecekapan/{id_user}/{id}', [KecekapanManager::class, 'kecekapan_edit']);
Route::post('/manager/update/kecekapan/{id_user}/{id}', [KecekapanManager::class, 'kecekapan_update']);

Route::get('/manager/edit/nilai/{id_user}/{id}', [NilaiManager::class, 'nilai_edit']);
Route::post('/manager/update/nilai/{id_user}/{id}', [NilaiManager::class, 'nilai_update']);
// Route::get('/manager/delete/kecekapan/{id}', [KecekapanManager::class, 'kecekapan_delete']);

Route::get('/manager/changeup/kpi/{id}', [\App\Http\Controllers\ManagerKPI::class, 'changeup']);
Route::get('/manager/changedown/kpi/{id}', [\App\Http\Controllers\ManagerKPI::class, 'changedown']);

Route::get('/hr/changeup/kpi/{id}', [\App\Http\Controllers\HRKPI::class, 'changeup']);
Route::get('/hr/changedown/kpi/{id}', [\App\Http\Controllers\HRKPI::class, 'changedown']);

// Route::get('/employee/changeup/kpi/{id}', [\App\Http\Controllers\Displaykpi::class, 'changeup']);
// Route::get('/employee/changedown/kpi/{id}', [\App\Http\Controllers\Displaykpi::class, 'changedown']);

Route::get('/employee/changeup/kpi/{id}', [Displaykpi::class, 'changeup']);
Route::get('/employee/changedown/kpi/{id}', [Displaykpi::class, 'changedown']);

Route::get('/employee/edit/nilai/{id}', [Nilai::class, 'nilai_edit']);
Route::post('/employee/update/nilai/{id}', [Nilai::class, 'nilai_update']);
Route::get('/employee/delete/nilai/{id}', [Nilai::class, 'nilai_delete']);

// Route::get('/manager/view/kpi/{id}', ManagerKPI::class);
// Route::get('/manager/view/kpi/{id}', ManagerKPI::class)->name('view-kpi');
// Route::get('/manager/view/kpi', ManagerKPI::class);
// Route::get('/manager/view/kpi', function() {
//     echo 'john';
// });
Route::get('/manager/view/kpi/{id}', [\App\Http\Controllers\ManagerKPI::class, 'index']);
Route::get('/hr/view/kpi/{id}', [\App\Http\Controllers\HRKPI::class, 'index']);
// Route::get('/manager/view/kpi/{id}', [\App\Http\Controllers\ManagerKPI::class, 'index'])->name('kecekapan-manager');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard-manager', DashboardManager::class)->name('dashboard-manager');
    Route::get('/firstpage', Firstpage::class)->name('firstpage');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');

    Route::get('/create-kpi', KPI::class)->name('create-kpi');
    Route::get('/create-kecekapan', Kecekapan::class)->name('create-kecekapan');
    Route::get('/display-kpi', Displaykpi::class)->name('display-kpi');
    // Route::get('/kadskorkorporat', KadSkorKorporat::class)->name('kadskorkorporat');

    // Route::get('/kecekapan', Kecekapan::class)->name('kecekapan');
    Route::get('/create-nilai', Nilai::class)->name('create-nilai');

    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/tahap-kepuasan-pelanggan', TahapKepuasanPelanggan::class)->name('tahap-kepuasan-pelanggan');
    Route::get('/ofi-ncr', OfiNcr::class)->name('ofi-ncr');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
    Route::get('/laravel-user-management-admin', UserManagementAdmin::class)->name('user-management-admin');
});
