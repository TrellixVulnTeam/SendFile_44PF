<?php

use App\Http\Controllers\Admin\AlertController;
use App\Http\Controllers\Admin\BreakoutController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DarkpoolController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\ExpensecategoryController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\GodaddyController;
use App\Http\Controllers\Admin\LongtermController;
use App\Http\Controllers\Admin\MembercategoryController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\SendmailController;
use App\Http\Controllers\Admin\TickerController;
use App\Http\Controllers\Admin\VolumnController;
use App\Http\Controllers\AdminMembershipController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AdminTradesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\User\ContactusController;
use App\Http\Controllers\User\ContinuemembershipController;
use App\Http\Controllers\User\ManageController;
use App\Http\Controllers\VolunteerController;
use App\Models\Breakoutstock;
use App\Models\Darkpool;
use App\Models\Optionalert;
use App\Models\User;
use App\Models\Volume;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserTradesController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserUserController;

Route::get('change-value', function(){
    $user = User::find(77);
    $user->membership_id = 6;
    $user->save();
});

// urls
Route::get('/', [PagesController::class, 'index'])->name("main");
Route::get('/forget-password', [PagesController::class, 'forgetPassword'])->name("forget.password");
Route::post('forget-pwd', [PagesController::class, 'forgetPwd'])->name("forget-pwd");
Route::post('reset-pwd', [PagesController::class, 'resetPwd'])->name("reset-pwd");
Route::get('reset-pwd', [PagesController::class, 'resetPassword'])->name("resetPassword");
Route::get('/login', [PagesController::class, 'login'])->name("login");
Route::get('/subscribe', [PagesController::class, 'subscribe'])->name("subscribe");
Route::post('/subscribe', [PagesController::class, 'subscribeAction'])->name("subscribe.action1");
Route::get('/register', [PagesController::class, 'register'])->name("register");
Route::get('/contact-us', [ContactusController::class, 'contactUs'])->name("contact.us");
Route::post('/contact-us', [ContactusController::class, 'contactUsAction'])->name("contact.us.action");
Route::get('/terms-conditions', [PagesController::class, 'termsCondations']);
Route::post('add-coupon', [PagesController::class, 'addCoupon'])->name('add-coupon');

// User controller

// Route::resource('users', UsersController::class);
Route::get("users/create", [UsersController::class, 'create'])->name("users.create");
Route::post("users", [UsersController::class, 'store'])->name("users.store");
// Route::post("signup-1", [PagesController::class, 'signupStep1'])->name("signup.step1");
Route::match(['post', 'get'], "signup-2", [PagesController::class, 'signupStep2'])->name("signup.step2");
Route::match(["post", "get"], "signup-3", [PagesController::class, 'signupStep3'])->name("signup.step3");
//Route with membership registration
Route::get('cancel-membership', [PagesController::class, 'cancelMembership'])->name('cancel.membership');
Route::get('success-membership', [PagesController::class, 'successMembership'])->name('success.membership');
Route::post('subscribe-me', [SubscriptionsController::class, 'subscribeMe'])->name("subscribe.me");
Route::match(['get'], 'subscribe-price', [SubscriptionsController::class, 'subscribePrice'])->name("subscribe.price");
Route::post('subscribe-payment', [SubscriptionsController::class, 'subscribePayment'])->name("subscribe.payment");

Route::get('payment-with/stripe', [PagesController::class, 'stripeView'])->name("go-stripe");
Route::post('stripe-charge', [PagesController::class, 'stripe'])->name("stripe.charge");


// attempt to login
Route::post('access', [UsersController::class, 'access'])->name("access");
Route::get('hi', function () {
    return session("loggedIn");
});

Route::get("logout", [UsersController::class, 'logout'])->name("logout");
Route::get('admin/login', [UsersController::class, 'loginForm'])->name("login.form");
Route::get('pricing', [PagesController::class, 'subscriptionForm'])->name("subscribe.form");
Route::post('pricing', [PagesController::class, 'subscription'])->name("subscribe.action");
Route::get('register_temp', [PagesController::class, 'registerTemp'])->name("register_temp");
Route::post('signup-training', [PagesController::class, 'signupForTraining'])->name("signup.for_training");

//When paid date is expired, require pay to continue work for membership
Route::get('continue-index', [ContinuemembershipController::class, 'index'])->name('continue.index');
Route::get('continue-payment', [ContinuemembershipController::class, 'payment'])->name('continue.payment');
Route::post('continue-dopay', [ContinuemembershipController::class, 'dopay'])->name('continue.dopay');
Route::post('continue-stripe', [ContinuemembershipController::class, 'stripe'])->name('continue.stripe');
Route::post('continue/success-paypal', [ContinuemembershipController::class, 'successPaypal'])->name('continue.success-paypal');
Route::post('continue/cancel-paypal', [ContinuemembershipController::class, 'cancelPaypal'])->name('continue.cancel-paypal');
Route::get('continue/cancel_stripe', [ContinuemembershipController::class, 'canceledStripe']);
Route::get('membership/cancel_stripe', [PagesController::class, 'canceledStripe']);

//Pages for volunteer
Route::prefix('volunteer')->group(function () {
    Route::get('register', [VolunteerController::class, 'register'])->name('volunteer.register');
    Route::post('store', [VolunteerController::class, 'store'])->name('volunteer.store');
});


//User panel
Route::prefix("user_dashboard")->middleware('user')->group(function () {
    Route::get("/", [UserUserController::class, 'dashboard'])->name("profile.user");
    Route::resource("user_trades", UserTradesController::class);
    Route::resource('user_users', UserUserController::class);
    Route::get('profile', [UserUserController::class, 'profile'])->name("profile.user");
    Route::get('testimonial', [TestimonialController::class, 'index'])->name('user.testimonial');
    Route::post('testimonial', [TestimonialController::class, 'testimonial'])->name('user.sendMsg');

    Route::get('breakout', [ManageController::class, 'breakout'])->name('breakout.index');
    Route::get('breakout/search', [ManageController::class, 'breakoutSearch'])->name('breakout.search');
    Route::get('darkpool', [ManageController::class, 'darkpool'])->name('darkpool.index');
    Route::get('darkpool/search', [ManageController::class, 'darkpoolSearch'])->name('darkpool.search');
    Route::get('volume', [ManageController::class, 'volume'])->name('volume.index');
    Route::get('volume/search', [ManageController::class, 'volumeSearch'])->name('volume.search');
    Route::get('expense', [ManageController::class, 'expense'])->name('expense.index');
    Route::get('longterm', [ManageController::class, 'longterm'])->name('longterm.index');
    Route::get('option', [ManageController::class, 'option'])->name('option.index');
    Route::get('option/search', [ManageController::class, 'optionSearch'])->name('option.search');
    Route::get('documents', [ManageController::class, 'documents'])->name('documents.index');
});

Route::prefix("admin")->middleware('admin')->group(function () {
    //Users
    Route::get("/", [DashboardController::class, "index"])->name("admin");
    Route::get("users", [AdminUsersController::class, "index"])->name("admin.users.index");
    Route::post("users", [AdminUsersController::class, "store"])->name("admin.users.store");
    Route::get("users/create", [AdminUsersController::class, "create"])->name("admin.users.create");
    Route::match(["put", "patch"], "users/{id}", [AdminUsersController::class, "update"])->name("admin.users.update");
    Route::delete("users/{id}", [AdminUsersController::class, "destroy"])->name("admin.users.destroy");
    Route::match(["get", "head"], "users/{id}", [AdminUsersController::class, "show"])->name("admin.users.show");
    Route::match(["get", "head"], "users/{id}/edit", [AdminUsersController::class, "edit"])->name("admin.users.edit");
    Route::get('profile', [AdminUsersController::class, 'profile'])->name("profile");
    Route::post('user-activate', [AdminUsersController::class, 'activate'])->name('admin.users.activate');

    // Trades
    Route::resource("trades", AdminTradesController::class);
    Route::post('trade/update-item', [AdminTradesController::class, 'updateItem'])->name('trade.update-item');
    Route::post('trade/all-activate', [AdminTradesController::class, 'allActivate'])->name('trade.all-activate');
    Route::post("trades/update-trade", [AdminTradesController::class, 'update'])->name('trades.update-trade');
    Route::post('file-import', [AdminTradesController::class, 'fileImport'])->name('file-import');
    Route::get('testimonial', [AdminsController::class, 'index'])->name('testimonial');
    Route::post('testimonial', [AdminsController::class, 'testimonial'])->name('sendMsg');
    Route::resource('membership', AdminMembershipController::class);
    Route::post('membership/delete-membership', [AdminMembershipController::class, 'deleteMembership'])->name('membership.destroy');
    Route::post('store', [AdminMembershipController::class, 'addMembership'])->name('add.membership');

    //Option Alerts
    Route::prefix('option')->group(function () {
        Route::get('/', [AlertController::class, 'index'])->name('option.index');
        Route::get('create', [AlertController::class, 'create'])->name('option.create');
        Route::get('show', [AlertController::class, 'show'])->name('option.show');
        Route::post('store', [AlertController::class, 'store'])->name('option.store');
        Route::post('update', [AlertController::class, 'update'])->name('option.update');
        Route::post('delete', [AlertController::class, 'delete'])->name('option.delete');
        Route::post('update-item', [AlertController::class, 'updateItem'])->name('option.update-item');
        Route::post('file-import', [AlertController::class, 'fileImport'])->name('option.file-import');
        Route::post('all-activate', [AlertController::class, 'allActivate'])->name('option.all-activate');
        Route::post('filter-date', [AlertController::class, 'filterByDate'])->name('option.filter-date');
        Route::post('search', [AlertController::class, 'search'])->name('option.search');
    });

    //Breakout Stock
    Route::prefix('breakout')->group(function () {
        Route::get('/', [BreakoutController::class, 'index'])->name('breakout.index');
        Route::get('create', [BreakoutController::class, 'create'])->name('breakout.create');
        Route::get('show', [BreakoutController::class, 'show'])->name('breakout.show');
        Route::post('store', [BreakoutController::class, 'store'])->name('breakout.store');
        Route::post('update', [BreakoutController::class, 'update'])->name('breakout.update');
        Route::post('delete', [BreakoutController::class, 'delete'])->name('breakout.delete');
        Route::post('update-item', [BreakoutController::class, 'updateItem'])->name('breakout.update-item');
        Route::post('file-import', [BreakoutController::class, 'fileImport'])->name('breakout.file-import');
        Route::post('all-activate', [BreakoutController::class, 'allActivate'])->name('breakout.all-activate');
        Route::post('filter-date', [BreakoutController::class, 'filterByDate'])->name('breakout.filter-date');
        Route::post('search', [BreakoutController::class, 'search'])->name('breakout.search');
    });

    //Breakout Stock
    Route::prefix('longterm')->group(function () {
        Route::get('/', [LongtermController::class, 'index'])->name('longterm.index');
        Route::get('create', [LongtermController::class, 'create'])->name('longterm.create');
        Route::get('show', [LongtermController::class, 'show'])->name('longterm.show');
        Route::post('store', [LongtermController::class, 'store'])->name('longterm.store');
        Route::post('update', [LongtermController::class, 'update'])->name('longterm.update');
        Route::post('delete', [LongtermController::class, 'delete'])->name('longterm.delete');
        Route::post('update-item', [LongtermController::class, 'updateItem'])->name('longterm.update-item');
        Route::post('all-activate', [LongtermController::class, 'allActivate'])->name('longterm.all-activate');
    });

    //Breakout Stock
    Route::prefix('darkpool')->group(function () {
        Route::get('/', [DarkpoolController::class, 'index'])->name('darkpool.index');
        Route::get('create', [DarkpoolController::class, 'create'])->name('darkpool.create');
        Route::get('show', [DarkpoolController::class, 'show'])->name('darkpool.show');
        Route::post('store', [DarkpoolController::class, 'store'])->name('darkpool.store');
        Route::post('update', [DarkpoolController::class, 'update'])->name('darkpool.update');
        Route::post('delete', [DarkpoolController::class, 'delete'])->name('darkpool.delete');
        Route::post('update-item', [DarkpoolController::class, 'updateItem'])->name('darkpool.update-item');
        Route::post('file-import', [DarkpoolController::class, 'fileImport'])->name('darkpool.file-import');
        Route::post('all-activate', [DarkpoolController::class, 'allActivate'])->name('darkpool.all-activate');
        Route::post('filter-date', [DarkpoolController::class, 'filterByDate'])->name('darkpool.filter-date');
        Route::post('search', [DarkpoolController::class, 'search'])->name('darkpool.search');
    });

    //Breakout Stock
    Route::prefix('document')->group(function () {
        Route::get('/', [DocumentController::class, 'index'])->name('document.index');
        Route::get('create', [DocumentController::class, 'create'])->name('document.create');
        Route::get('show', [DocumentController::class, 'show'])->name('document.show');
        Route::post('store', [DocumentController::class, 'store'])->name('document.store');
        Route::post('update', [DocumentController::class, 'update'])->name('document.update');
        Route::post('delete', [DocumentController::class, 'delete'])->name('document.delete');
        Route::post('update-item', [DocumentController::class, 'updateItem'])->name('document.update-item');
        Route::post('all-activate', [DocumentController::class, 'allActivate'])->name('document.all-activate');
    });

    //Breakout Stock
    Route::prefix('volume')->group(function () {
        Route::get('/', [VolumnController::class, 'index'])->name('volume.index');
        Route::get('create', [VolumnController::class, 'create'])->name('volume.create');
        Route::get('show', [VolumnController::class, 'show'])->name('volume.show');
        Route::post('store', [VolumnController::class, 'store'])->name('volume.store');
        Route::post('update', [VolumnController::class, 'update'])->name('volume.update');
        Route::post('delete', [VolumnController::class, 'delete'])->name('volume.delete');
        Route::post('update-item', [VolumnController::class, 'updateItem'])->name('volume.update-item');
        Route::post('file-import', [VolumnController::class, 'fileImport'])->name('volume.file-import');
        Route::post('all-activate', [VolumnController::class, 'allActivate'])->name('volume.all-activate');
        Route::post('filter-date', [VolumnController::class, 'filterByDate'])->name('volume.filter-date');
        Route::post('search', [VolumnController::class, 'search'])->name('volume.search');
    });

    //Expenses
    Route::prefix('expense')->group(function () {
        Route::get('/', [ExpenseController::class, 'index'])->name('expense.index');
        Route::get('create', [ExpenseController::class, 'create'])->name('expense.create');
        Route::get('get-category', [ExpenseController::class, 'getCategories'])->name('expense.get-category');
        Route::get('show', [ExpenseController::class, 'show'])->name('expense.show');
        Route::post('store', [ExpenseController::class, 'store'])->name('expense.store');
        Route::post('bulk-upload', [ExpenseController::class, 'bulkUpload'])->name('expense.bulk-upload');
        Route::post('update', [ExpenseController::class, 'update'])->name('expense.update');
        Route::post('delete', [ExpenseController::class, 'delete'])->name('expense.delete');
        Route::post('update-item', [ExpenseController::class, 'updateItem'])->name('expense.update-item');
        Route::post('all-activate', [ExpenseController::class, 'allActivate'])->name('expense.all-activate');
    });


    //Expense Category
    Route::prefix('expensecategory')->group(function () {
        Route::get('/', [ExpensecategoryController::class, 'index'])->name('expensecategory.index');
        Route::get('show-category', [ExpensecategoryController::class, 'showCategory'])->name('expensecategory.show');
        Route::post('store', [ExpensecategoryController::class, 'storeCategory'])->name('expensecategory.store');
        Route::post('update', [ExpensecategoryController::class, 'updateCategory'])->name('expensecategory.update');
        Route::post('delete', [ExpensecategoryController::class, 'deleteCategory'])->name('expensecategory.delete');
    });

    //Coupon
    Route::prefix('coupon')->group(function () {
        Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
        Route::get('create', [CouponController::class, 'create'])->name('coupon.create');
        Route::post('store', [CouponController::class, 'store'])->name('coupon.store');
        Route::get('show', [CouponController::class, 'show'])->name('coupon.show');
        Route::post('update', [CouponController::class, 'update'])->name('coupon.update');
        Route::post('delete', [CouponController::class, 'delete'])->name('coupon.delete');
    });

    //Get Data from Godaddy
    Route::post('get-godaddy', [GodaddyController::class, 'dumpSql'])->name('getdata-godaddy');
    Route::post('godaddy-handle', [GodaddyController::class, 'godaddyHandle'])->name('godaddy-handle');

    Route::prefix('ticker')->group(function () {
        Route::get('/', [TickerController::class, 'index'])->name('ticker.index');
        Route::get('create', [TickerController::class, 'create'])->name('ticker.create');
        Route::post('store', [TickerController::class, 'store'])->name('ticker.store');
        Route::get('show', [TickerController::class, 'show'])->name('ticker.show');
        Route::post('update', [TickerController::class, 'update'])->name('ticker.update');
        Route::post('delete', [TickerController::class, 'delete'])->name('ticker.delete');
    });

    Route::prefix('option-display')->group(function () {
        Route::get('/', [OptionController::class, 'index'])->name('option-display.index');
        Route::get('create', [OptionController::class, 'create'])->name('option-display.create');
        Route::post('store', [OptionController::class, 'store'])->name('option-display.store');
        Route::get('show', [OptionController::class, 'show'])->name('option-display.show');
        Route::post('update', [OptionController::class, 'update'])->name('option-display.update');
        Route::post('delete', [OptionController::class, 'delete'])->name('option-display.delete');
    });

    //Expense Category
    Route::prefix('membercategory')->group(function () {
        Route::get('/', [MembercategoryController::class, 'index'])->name('membercategory.index');
        Route::get('show-category', [MembercategoryController::class, 'show'])->name('membercategory.show');
        Route::post('store', [MembercategoryController::class, 'store'])->name('membercategory.store');
        Route::post('update', [MembercategoryController::class, 'update'])->name('membercategory.update');
        Route::post('delete', [MembercategoryController::class, 'delete'])->name('membercategory.delete');
    });

    Route::prefix('mailinfo')->group(function () {
        Route::get('/', [SendmailController::class, 'index'])->name('mailinfo.index');
        Route::get('create-mailer', [SendmailController::class, 'createMailer'])->name('mailinfo.create-mailer');
        Route::post('store-mailer', [SendmailController::class, 'storeMailer'])->name('mailinfo.store-mailer');
        Route::post('bulk-mailer', [SendmailController::class, 'bulkMailer'])->name('mailinfo.bulk-mailer');
        Route::get('get-mailer', [SendmailController::class, 'getMailer'])->name('mailinfo.get-mailer');
        Route::post('update-mailer', [SendmailController::class, 'updateMailer'])->name('mailinfo.update-mailer');
        Route::post('delete-mailer', [SendmailController::class, 'deleteMailer'])->name('mailinfo.delete-mailer');
        Route::get('send-message', [SendmailController::class, 'sendMessage'])->name('mailinfo.send-message');
        Route::post('store-message', [SendmailController::class, 'storeMessage'])->name('mailinfo.store-message');
        Route::get('show-message', [SendmailController::class, 'getMessage'])->name('mailinfo.get-message');
    });
});

//test paypal payment integration
Route::get('go-payment', [PaymentsController::class, 'index'])->name('go.payment');
Route::post('handle-payment', [PaymentsController::class, 'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [PaymentsController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [PaymentsController::class, 'paymentSuccess'])->name('success.payment');