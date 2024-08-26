<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\EmployersController;
use App\Http\Controllers\sellingPointController;
use App\Http\Controllers\CategoryController;
use app\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\authentications\ForgotPasswordCzontroller;
use App\Http\Controllers\SearchController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

// Main Page Route
Route::get('/', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/dashboard/Analytics', [Analytics::class, 'index'])->name('dashboard-analytics');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::post('/register', [RegisterBasic::class, 'register'])->name('register');

// Authentication Routes
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::post('/auth/login-basic', [LoginBasic::class, 'login'])->name('auth-login-basic-post');

Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::post('/register', [RegisterBasic::class, 'register'])->name('register');

// Other Login Routes
Route::get('/login', [LoginBasic::class, 'index'])->name('login-get');
Route::post('/login', [LoginBasic::class, 'login'])->name('login-post');
Route::post('/login', [LoginBasic::class, 'login'])->name('login');

// Main Page Route
// Route::get('/', [LoginBasic::class, 'index'])->name('auth-login-basic');
// Route::get('/dashboard/Analytics', [Analytics::class, 'index'])->name('dashboard-analytics');

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
// Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
// Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
// Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
// Route::post('/auth/login-basic', [LoginBasic::class, 'index']);
// Route::get('/login', [LoginBasic::class, 'index']);
// Route::post('/login', [LoginBasic::class, 'login'])->name('auth-login-basic');


// //password
// Route::get('password/reset', [ForgotPasswordBasic::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordBasic::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ForgotPasswordBasic::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ForgotPasswordBasic::class, 'reset'])->name('password.update');


// Route::get('/auth/forgot-password-basic', [ForgotPasswordController::class, 'index'])->name('auth-reset-password-basic');
// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


// Routes for ForgotPasswordBasic
Route::get('password/reset', [ForgotPasswordBasic::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordBasic::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ForgotPasswordBasic::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordBasic::class, 'reset'])->name('password.update');

// Routes for ForgotPasswordController

Route::get('/authentications/forgot-password-basic', [ForgotPasswordController::class, 'index'])->name('auth-reset-password-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordController::class, 'index'])->name('auth-reset-password-basic');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


/////////////////////


// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

//proddd


// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

//employers
Route::get('/tables/Employers', [EmployersController::class, 'index'])->name('Employers.index');
Route::get('/Employers/add', [EmployersController::class, 'add'])->name('employers.add');
Route::post('/employers/store', [EmployersController::class, 'store'])->name('employers.store');
Route::post('/employers', [EmployersController::class, 'store'])->name('employers.store');
Route::get('/employers/{id}/edit', [EmployersController::class, 'edit'])->name('employers.edit');
Route::put('/employers/{id}', [EmployersController::class, 'update'])->name('employers.update');
Route::delete('/employers/{id}', [EmployersController::class, 'destroy'])->name('employers.destroy');


//selling point
Route::get('/tables/selling-point', [sellingPointController::class, 'index'])->name('selling-point.index');
Route::get('/selling-point/add', [sellingPointController::class, 'add'])->name('selling-point.add');
Route::post('/tables/selling-point/store', [sellingPointController::class, 'store'])->name('selling-point.store');
Route::post('/tables/selling-point', [sellingPointController::class, 'store'])->name('selling-point.store');
Route::get('/tables/selling-point/{id}', [sellingPointController::class, 'edit'])->name('selling-point.edit');
Route::put('/tables/selling-point/{id}', [sellingPointController::class, 'update'])->name('selling-point.update');
Route::delete('/tables/selling-point/{id}', [sellingPointController::class, 'destroy'])->name('selling-point.destroy');

//product
Route::get('/tables/basic', [ProductController::class, 'index'])->name('product.index');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('products/{id}/history', [ProductController::class, 'history'])->name('products.history');
Route::get('/product/imprime', [ProductController::class, 'imprime'])->name('product.imprime');
Route::get('/product/{id}/imprime_his', [ProductController::class, 'imprime_histo'])->name('product.imprime_his');

//inventoryyyyyy
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/tables/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'addInventory'])->name('product.inventory');
Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
Route::get('/inventory/report', [InventoryController::class, 'report'])->name('inventory.report');
Route::get('/inventory/report', [InventoryController::class, 'showReportForm'])->name('inventory.report.form');
Route::post('/inventory/report', [InventoryController::class, 'generateReport'])->name('inventory.report.generate');
Route::get('/inventory/print-report', [InventoryController::class, 'printReport'])->name('inventory.printReport');
Route::get('/inventory/newtab/{id}', [InventoryController::class, 'newTab'])->name('inventory.newtab');
Route::get('/inventory/newtab/{id}', [InventoryController::class, 'createNewTable'])->name('inventory.newtab');


////categoryy
Route::resource('category', CategoryController::class);
Route::get('/tables/Category', [CategoryController::class, 'index'])->name('category.index');



///////emai||||
Route::get('/email/verify', function () {

  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


///////profile

Route::middleware(['auth', 'verified'])->group(function () {
  route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  route::patch('/profile', [ProfileController::class, 'update'])->name('profile.edit');
  route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.edit');
});

Route::middleware('auth')->group(function () {
  Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

  Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

  Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');

  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
