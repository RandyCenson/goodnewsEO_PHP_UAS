<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{adminNoteController,DetailController,AuthController, HomeController,FormController, OrderController, galleryController, ReviewController, PaketController, ProfileController, RajaOngkirController, TransactionController};

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

// pre authenticate
Route::middleware(['alreadyLogin'])->group(function () {
    // landing
    Route::get('/', function () {
        return view('landing.index', [
            "title" => "Landing",
        ]);
    });

    // Login
    Route::get('/{url}', [AuthController::class, "loginGet"])->where(["url" => "auth|auth/login"])->name("auth");
    Route::post('/auth/login', [AuthController::class, "loginPost"]);

    // Register
    Route::get('/auth/register', [AuthController::class, "registrationGet"]);
    Route::post('/auth/register', [AuthController::class, "registrationPost"]);
});





// main
Route::middleware(['auth'])->group(function () {
    // Home
    Route::controller(HomeController::class)->group(function () {
        Route::get("/home", "index");
        Route::get("/home/customers", "customers");
    });
    Route::controller(adminNoteController::class)->group(function () {
        Route::get('/admin/notes', [adminNoteController::class, 'index'])->name('admin.notes.index');
        Route::post('/admin/notes', [adminNoteController::class, 'store'])->name('admin.notes.store');
        Route::delete('/admin/notes/{note}', [adminNoteController::class, 'destroy'])->name('admin.notes.destroy');
    
        
    });

    // profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get("/profile/my_profile", "myProfile");
        Route::get("/profile/edit_profile", "editProfileGet");
        Route::post("/profile/edit_profile/{user:id}", "editProfilePost");
        Route::get("/profile/change_password", "changePasswordGet");
        Route::post("/profile/change_password", "changePasswordPost");
    });

    // paket
    Route::controller(PaketController::class)->group(function () {
        Route::get("/paket", "index");
        Route::get("/paket/data/{id}", "getProductData");

        // admin only
        Route::get("/paket/add_product", "addProductGet")->can("add_product", App\Models\Product::class);
        Route::post("/paket/add_product", "addProductPost")->can("add_product", App\Models\Product::class);
        Route::get("/paket/edit_product/{product:id}", "editProductGet")->can("edit_product", App\Models\Product::class);
        Route::post("/paket/edit_product/{product:id}", "editProductPost")->can("edit_product", App\Models\Product::class);
    });

    // Order
    Route::controller(OrderController::class)->group(function () {
        Route::get("/order/order_data", "orderData");
        Route::get("/order/order_history", "orderHistory");
        Route::get("/order/order_data/{status_id}", "orderDataFilter");
        Route::get("/order/data/{order}", "getOrderData")->can("my_real_order", "order");
        Route::get("/order/getProof/{order}", "getProofOrder")->can("my_real_order", "order");


        // customer only
        Route::get("/order/make_order/{product:id}", "makeOrderGet")->can("create_order", App\Models\Order::class);
        Route::post("/order/make_order/{product:id}", "makeOrderPost")->can("create_order", App\Models\Order::class);
        Route::get("/order/edit_order/{order}", "editOrderGet")->can("edit_order", "order");
        Route::post("/order/edit_order/{order}", "editOrderPost")->can("edit_order", "order");
        Route::get("/order/delete_proof/{order}", "deleteProof")->can("delete_proof", "order");
        Route::post("/order/cancel_order/{order}", "cancelOrder")->can("cancel_order", "order");
        Route::post("/order/upload_proof/{order}", "uploadProof")->can("upload_proof", "order");
        

        // admin only
        Route::post("/order/reject_order/{order}/{product}", "rejectOrder")->can("reject_order", App\Models\Order::class);
        Route::post("/order/end_order/{order}/{product}", "endOrder")->can("end_order", App\Models\Order::class);
        Route::post("/order/approve_order/{order}/{product}", "approveOrder")->can("approve_order", App\Models\Order::class);
    });

    // form
        Route::get('/form', [FormController::class, 'create'])->name('Form.create');
        Route::post('/form', [FormController::class, 'store'])->name('Form.store');
        Route::get('/form/show', [FormController::class, 'showHistory'])->name('Form.showHistory');
        // Route::get('/form/{id}', [FormController::class, 'showForm'])->name('Form.showHistory');
        // Route::delete('/form/{id}', [FormController::class, 'deleteForm'])->name('Form.delete');


    // review
    Route::controller(ReviewController::class)->group(function () {
        Route::get("/review/paket/{product}", "productReview");
        Route::get("/review/data/{review}", "getDataReview");
        Route::post("/review/add_review/", "addReview");
        Route::post("/review/edit_review/{review}", "editReview")->can("edit_review", "review");
        Route::post("/review/delete_review/{review}", "deleteReview")->can("delete_review", "review");
    });
    Route::controller(DetailController::class)->group(function () {
        Route::get("/detail/paket/{product}", "productDetail");
        
    });





    // point

    // gallery page
    Route::get('/gallery', [galleryController::class, 'generate_gallery'])->name('gallery');




    // chart
    Route::middleware(['can:is_admin'])->group(function () {
        // sales chart
        Route::get("/chart/sales_chart", function () {
            $oneWeekAgo = DB::select(DB::raw('SELECT DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 6 DAY), "%Y-%m-%d") AS date'))[0]->date;

            $now = date('Y-m-d', time());

            $array_result = [
                "one_week_ago" => $oneWeekAgo,
                "now" => $now,
            ];

            //disable ONLY_FULL_GROUP_BY
            DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
            $array_result["data"] = DB::table("orders")
                ->selectSub("count(*)", "sales_total")
                ->selectSub("DATE_FORMAT(orders.updated_at, '%d')", "day")
                ->selectSub("DATE_FORMAT(orders.updated_at, '%Y-%m-%d')", "date")
                ->where("is_done", 1)
                ->whereBetween(DB::raw("DATE_FORMAT(orders.updated_at, '%Y-%m-%d')"), ["$oneWeekAgo", $now])
                ->groupByRaw("DATE_FORMAT(orders.updated_at, '%Y-%m-%d')")
                ->get();
            //re-enable ONLY_FULL_GROUP_BY
            DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");

            echo json_encode($array_result);
        });
        // profits chart
        Route::get("/chart/profits_chart", function () {
            $six_month_ago = DB::select(DB::raw('SELECT DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 5 MONTH), "%Y-%m") AS month'))[0]->month;
            $now = date('Y-m', time());
            $array_result = [
                "six_month_ago" => $six_month_ago,
                "now" => $now,
            ];

            //disable ONLY_FULL_GROUP_BY
            DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
            $array_result["data"] = DB::table("transactions")
                ->selectSub("SUM(income) - SUM(outcome)", "profits")
                ->selectSub("DATE_FORMAT(transactions.created_at, '%Y-%m')", "date")
                ->whereBetween(DB::raw("DATE_FORMAT(transactions.created_at, '%Y-%m')"), ["$six_month_ago", $now])
                ->groupByRaw("DATE_FORMAT(transactions.created_at, '%Y-%m')")
                ->get();
            //re-enable ONLY_FULL_GROUP_BY
            DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");

            echo json_encode($array_result);
        });
    });

    // Logout
    Route::post('/auth/logout', [AuthController::class, "logoutPost"]);
});
