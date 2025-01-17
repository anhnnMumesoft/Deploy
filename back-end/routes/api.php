<?php


use App\Http\Controllers\AddressUserController;
use App\Http\Controllers\AllcodeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TypeShipController;
use App\Http\Controllers\UserControllers;
use App\Http\Controllers\VoucherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*use App\Http\Controllers;
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// User routes
Route::post('/create-new-user',[UserControllers::class, 'createNewUser']);
Route::put('/update-user', [UserControllers::class, 'updateUser'])->middleware('verify.user');
Route::delete('/delete-user',[UserControllers::class, 'deleteUser'])->middleware('verify.admin');
Route::post('/login',[UserControllers::class, 'login']);
Route::middleware(['verify.admin'])->group(function () {
    Route::get('/get-all-user',  [UserControllers::class, 'getAllUser']);
});

Route::post('/changepassword',[UserControllers::class, 'changePassword'])->middleware('verify.user');

Route::get('/get-detail-user-by-id',  [UserControllers::class, 'getDetailUserById']);
Route::post('/send-verify-email', [UserControllers::class, 'sendVerifyEmailUser'])->middleware('verify.user');
Route::post('/verify-email', [UserControllers::class, 'verifyEmailUser'])->middleware('verify.user');
Route::post('/send-forgotpassword-email', [UserControllers::class, 'sendEmailForgotPassword']);
Route::post('/forgotpassword-email', [UserControllers::class, 'forgotPassword']);
Route::get('/check-phonenumber-email', [UserControllers::class, 'checkPhonenumberEmail']);
//Route::get('/get-detail-user-by-email/{email}',  [UserControllers::class, 'getDetailUserByEmail']);


//ALL-code
Route::middleware('verify.admin')->group(function () {
    Route::post('/create-new-all-code', [AllcodeController::class, 'handleCreateNewAllCode'])->name('allcode.create');
    Route::put('/update-all-code', [AllcodeController::class, 'handleUpdateAllCode'])->name('allcode.update');
    Route::delete('/delete-all-code', [AllcodeController::class, 'handleDeleteAllCode'])->name('allcode.delete');

    Route::get('/get-list-allcode', [AllcodeController::class, 'getListAllCodeService'])->name('allcode.getList');
    Route::get('/get-detail-all-code-by-id', [AllcodeController::class, 'getDetailAllCodeById'])->name('allcode.getDetail');

    Route::post('/create-new-all-code', [AllcodeController::class, 'handleCreateNewAllCode']);
    Route::put('/update-all-code', [AllcodeController::class, 'handleUpdateAllCode']);
    Route::delete('/delete-all-code', [AllcodeController::class, 'handleDeleteAllCode']);
});
Route::get('/get-all-code', [AllcodeController::class, 'getAllCodeService'])->name('allcode.getAll');
Route::get('/get-all-category-blog', [AllcodeController::class, 'getAllCategoryBlog'])->name('allcode.getAllCategoryBlog');
// Product

// Group routes with admin middleware
Route::middleware('verify.admin')->group(function () {
    Route::post('/create-new-product', [ProductController::class, 'createNewProduct']);
    Route::put('/update-product', [ProductController::class, 'updateProduct']);
    Route::get('/get-all-product-admin', [ProductController::class, 'getAllProductAdmin']);
    Route::post('/unactive-product', [ProductController::class, 'unactiveProduct']);
    Route::post('/active-product', [ProductController::class, 'activeProduct']);
    Route::post('/create-new-product-detail', [ProductController::class, 'createNewProductDetail']);
    Route::put('/update-product-detail', [ProductController::class, 'updateProductDetail']);
    Route::post('/create-product-detail-image', [ProductController::class, 'createNewProductDetailImage']);
    Route::put('/update-product-detail-image', [ProductController::class, 'updateProductDetailImage']);
    Route::delete('/delete-product-detail-image', [ProductController::class, 'deleteProductDetailImage']);
    Route::delete('/delete-product-detail', [ProductController::class, 'deleteProductDetail']);
    Route::post('/create-product-detail-size', [ProductController::class, 'createNewProductDetailSize']);
    Route::put('/update-product-detail-size', [ProductController::class, 'updateProductDetailSize']);
    Route::delete('/delete-product-detail-size', [ProductController::class, 'deleteProductDetailSize']);
});

// Publicly accessible routes
Route::get('/get-all-product-user', [ProductController::class, 'getAllProductUser']);
Route::get('/get-detail-product-by-id', [ProductController::class, 'getDetailProductById']);
Route::get('/get-all-product-detail-by-id', [ProductController::class, 'getAllProductDetailById']);
Route::get('/get-all-product-detail-image-by-id', [ProductController::class, 'getAllProductDetailImageById']);
Route::get('/get-product-detail-by-id', [ProductController::class, 'getDetailProductDetailById']);
Route::get('/get-product-detail-image-by-id', [ProductController::class, 'getDetailProductImageById']);
Route::get('/get-all-product-detail-size-by-id', [ProductController::class, 'getAllProductDetailSizeById']);
Route::get('/get-detail-product-detail-size-by-id', [ProductController::class, 'getDetailProductDetailSizeById']);
Route::get('/get-product-feature', [ProductController::class, 'getProductFeature']);
Route::get('/get-product-new', [ProductController::class, 'getProductNew']);
Route::get('/get-product-shopcart', [ProductController::class, 'getProductShopCart']);
Route::get('/get-product-recommend', [ProductController::class, 'getProductRecommend']);

// API routes for Banners
Route::middleware('verify.admin')->group(function () {
        Route::post('/create-new-banner', [ BannerController::class, 'createNewBanner']);
        Route::put('/update-banner', [ BannerController::class, 'updateBanner']);
        Route::delete('/delete-banner', [ BannerController::class, 'deleteBanner']);
    Route::get('/get-detail-banner', [ BannerController::class, 'getDetailBanner']);

});
Route::get('/get-all-banner', [ BannerController::class, 'getAllBanner']);
//=================API BLOG===============================//
Route::middleware('verify.admin')->group(function () {
    Route::post('/create-new-blog', [BlogController::class, 'createNewBlog']);
    Route::put('/update-blog', [BlogController::class, 'updateBlog']);
    Route::delete('/delete-blog', [BlogController::class, 'deleteBlog']);
});

// Publicly accessible routes
Route::get('/get-detail-blog', [BlogController::class, 'getDetailBlogById']);
Route::get('/get-all-blog', [BlogController::class, 'getAllBlog']);
Route::get('/get-feature-blog', [BlogController::class, 'getFeatureBlog']);
Route::get('/get-new-blog', [BlogController::class, 'getNewBlog']);

//=================API TYPESHIP =======================//
Route::group(['verify.admin'], function () {
    Route::post('create-new-typeship', [TypeShipController::class, 'createNewTypeShip']);
    Route::put('update-typeship', [TypeShipController::class, 'updateTypeShip']);
    Route::delete('delete-typeship', [TypeShipController::class, 'deleteTypeShip']);
});

Route::get('get-detail-typeship', [TypeShipController::class, 'getDetailTypeShipById']);
Route::get('get-all-typeship', [TypeShipController::class, 'getAllTypeShip']);

//================API TYPEVOUCHER======================//
Route::group(['verify.admin'], function () {
    Route::post('create-new-typevoucher', [VoucherController::class, 'createNewTypeVoucher']);
    Route::put('update-typevoucher', [VoucherController::class, 'updateTypeVoucher']);
    Route::delete('delete-typevoucher', [VoucherController::class, 'deleteTypeVoucher']);
});

Route::get('get-detail-typevoucher', [VoucherController::class, 'getDetailTypeVoucherById']);
Route::get('get-all-typevoucher', [VoucherController::class, 'getAllTypeVoucher']);
Route::get('get-select-typevoucher', [VoucherController::class, 'getSelectTypeVoucher']);

//=================API VOUCHER==========================//
Route::group(['verify.admin'], function () {
    Route::post('create-new-voucher', [VoucherController::class, 'createNewVoucher']);
    Route::put('update-voucher', [VoucherController::class, 'updateVoucher']);
    Route::delete('delete-voucher', [VoucherController::class, 'deleteVoucher']);
});

Route::get('get-detail-voucher', [VoucherController::class, 'getDetailVoucherById']);
Route::get('get-all-voucher', [VoucherController::class, 'getAllVoucher']);

Route::group(['verify.user'], function () {
    Route::post('save-user-voucher', [VoucherController::class, 'saveUserVoucher']);
    Route::get('get-all-voucher-by-userid', [VoucherController::class, 'getAllVoucherByUserId']);
});

// Supplier routes
Route::group(['verify.admin'], function () {
    Route::post('create-new-supplier', [SupplierController::class, 'createNewSupplier']);
    Route::put('update-supplier', [SupplierController::class, 'updateSupplier']);
    Route::delete('delete-supplier', [SupplierController::class, 'deleteSupplier']);
});

Route::get('get-detail-supplier', [SupplierController::class, 'getDetailSupplierById']);
Route::get('get-all-supplier', [SupplierController::class, 'getAllSupplier']);

//=================API RECEIPT================================//
// API routes for Receipts
Route::middleware('verify.user')->group(function () {
    Route::post('/create-new-receipt', [ReceiptController::class, 'createNewReceipt'])->middleware('verify.admin');
    Route::get('/get-detail-receipt', [ReceiptController::class, 'getDetailReceiptById']);
    Route::get('/get-all-receipt', [ReceiptController::class, 'getAllReceipt']);
    Route::put('/update-receipt', [ReceiptController::class, 'updateReceipt'])->middleware('verify.admin');
    Route::delete('/delete-receipt', [ReceiptController::class, 'deleteReceipt'])->middleware('verify.admin');
    Route::post('/create-new-detail-receipt', [ReceiptController::class, 'createNewReceiptDetail'])->middleware('verify.admin');
});

//Order
Route::middleware('verify.user')->group(function () {
    Route::post('/create-new-order', [OrderController::class, 'createNewOrder']);
    Route::put('/update-status-order', [OrderController::class, 'updateStatusOrder']);
    Route::get('/get-all-order-by-user', [OrderController::class, 'getAllOrdersByUser']);
    Route::post('/payment-order', [OrderController::class, 'paymentOrder']);
    Route::post('/payment-order-success', [OrderController::class, 'paymentOrderSuccess']);
    Route::post('/payment-order-vnpay-success', [OrderController::class, 'paymentOrderVnpaySuccess']);
    Route::post('/payment-order-vnpay', [OrderController::class, 'paymentOrderVnpay']);
});

// Publicly accessible routes
Route::get('/get-all-order', [OrderController::class, 'getAllOrders']);
Route::get('/get-detail-order', [OrderController::class, 'getDetailOrderById']);
Route::put('/confirm-order', [OrderController::class, 'confirmOrder']);
Route::get('/get-all-order-by-shipper', [OrderController::class, 'getAllOrdersByShipper']);
Route::post('/vnpay_return', [OrderController::class, 'confirmOrderVnpay']);
Route::put('/update-image-order', [OrderController::class, 'updateImageOrder']);

Route::middleware(['verify.admin'])->group(function () {
    Route::get('/get-count-card-statistic', [StatisticController::class, 'getCountCardStatistic']);
    Route::get('/get-count-status-order', [StatisticController::class, 'getCountStatusOrder']);
    Route::get('/get-statistic-by-month', [StatisticController::class, 'getStatisticByMonth']);
    Route::get('/get-statistic-by-day', [StatisticController::class, 'getStatisticByDay']);
    Route::get('/get-statistic-overturn', [StatisticController::class, 'getStatisticOverturn']);
    Route::get('/get-statistic-profit', [StatisticController::class, 'getStatisticProfit']);
    Route::get('/get-statistic-stock-product', [StatisticController::class, 'getStatisticStockProduct']);
});

Route::middleware(['verify.user'])->group(function () {
    Route::post('/add-shopcart', [ShopCartController::class, 'addShopCart']);
    Route::get('/get-all-shopcart-by-userId', [ShopCartController::class, 'getAllShopCartByUserId']);
    Route::delete('/delete-item-shopcart', [ShopCartController::class, 'deleteItemShopCart']);
});

// Create a new comment
Route::post('/create-new-comment', [CommentController::class, 'createNewComment'])->middleware('verify.user');
// Reply to a comment
Route::post('/reply-comment', [CommentController::class, 'replyComment'])->middleware('verify.admin');
// Get all comments by blog ID
Route::get('/get-all-comment-by-blogId', [CommentController::class, 'getAllCommentByBlogId']);
// Delete a comment
Route::delete('/delete-comment/{commentId}', [CommentController::class, 'deleteComment'])->middleware('verify.user');


// Create a new review
Route::post('/create-new-review', [CommentController::class, 'createNewReview'])->middleware('verify.user');

// Reply to a review
Route::post('/reply-review', [CommentController::class, 'replyReview'])->middleware('verify.admin');

// Get all reviews by product ID
Route::get('/get-all-review-by-productId', [CommentController::class, 'getAllReviewByProductId']);

// Delete a review
Route::delete('/delete-review', [CommentController::class, 'deleteReview'])->middleware('verify.user');

//Address
Route::middleware(['verify.user'])->group(function () {
    Route::post('create-new-address-user', [AddressUserController::class, 'createNewAddressUser']);
    Route::get('get-all-address-user', [AddressUserController::class, 'getAllAddressUserByUserId']);
    Route::delete('delete-address-user', [AddressUserController::class, 'deleteAddressUser']);
    Route::put('edit-address-user', [AddressUserController::class, 'editAddressUser']);
    Route::get('get-detail-address-user-by-id', [AddressUserController::class, 'getDetailAddressUserById']);
});
