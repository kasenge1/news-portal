<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Frontend\indexController;
use App\Http\Controllers\Frontend\reviewController;
use App\Http\Controllers\Backend\categoryController;
use App\Http\Controllers\Backend\subcategoryController;
use App\Http\Controllers\Backend\newsPostcontroller;
use App\Http\Controllers\userController;
use App\Http\Controllers\Backend\bannercontroller;
use App\Http\Controllers\Backend\photoGalleryController;
use App\Http\Controllers\Backend\videoGalleryController;
use App\Http\Controllers\Backend\seoController;
use App\Http\Controllers\Backend\roleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/',[indexController::class,'Index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//user toute
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[userController::class,'userDashboard'])->name('dashboard');
    Route::post('/update/profile',[userController::class,'updateProfile'])->name('update.user.profile');
    Route::get('user/logout',[userController::class,'userLogout'])->name('user.logout');
    Route::get('user/change-password',[userController::class,'userChangePassword'])->name('user.change.password');
    Route::post('user/update-password',[userController::class,'userUpdatePassword'])->name('user.update.password');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
});

//admin route
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('admin/dashboard',[adminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[adminController::class,'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[adminController::class,'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store',[adminController::class,'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change-password',[adminController::class,'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password',[adminController::class,'adminUpdatePassword'])->name('admin.update.password');
});

Route::get('admin/login',[adminController::class,'adminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
Route::get('admin/logout/page',[adminController::class,'adminLogoutPage'])->name('admin.logout.page');

//category route
Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(categoryController::class)->group(function(){
        Route::get('all/category','allCategory')->name('all.category');
        Route::get('add/category','addCategory')->name('add.category');
        Route::post('store/category','storeCategory')->name('category.store');
        Route::get('edit/category/{id}','editCategory')->name('edit.category');
        Route::post('update/category','updateCategory')->name('update.category');
        Route::get('delete/category/{id}','deleteCategory')->name('delete.category');
        Route::get('/subcategory/ajax/{category_id}','getSubcategory');
    });
});
Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(subcategoryController::class)->group(function(){
        Route::get('all/subcategories','allSubcategories')->name('all.subcategories');
        Route::get('add/subcategories','addSubcategories')->name('add.subcategories');
        Route::post('store/subcategories','storeSubcategories')->name('store.subcategory');
        Route::get('edit/subcategories/{id}','editSubcategories')->name('edit.subcategories');
        Route::post('update/subcategory','updateSubcategory')->name('update.subcategory');
        Route::get('delete/subcategories/{id}','deleteSubcategories')->name('delete.subcategory');

    });
});
//admin settings
Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(adminController::class)->group(function(){
        Route::get('all/admins','allAdmin')->name('all.admin');
        Route::get('add/admins','addAdmin')->name('add.admin');
        Route::post('store/admin','storeadmin')->name('store.admin');
        Route::get('edit/admin/{id}','editAdmin')->name('edit.admin');
        Route::post('update/admin','updateAdmin')->name('update.admin');
        Route::get('delete/admin/{id}','deleteAdmin')->name('delete.admin');
        Route::get('deactivate/admin/{id}','deactivateAdmin')->name('deactivate.admin');
        Route::get('activate/admin/{id}','activateAdmin')->name('activate.admin');
    });

    //news post controller
Route::controller(newsPostcontroller::class)->group(function(){
    Route::get('all/news','allNews')->name('all.news');
    Route::get('add/news','addNews')->name('add.newspost');
    Route::post('store/news/post','storeNews')->name('store.newspost');
    Route::get('edit/news-post/{id}','editNews')->name('edit.news.post');
    Route::post('updat/news/post','updateNews')->name('update.newspost');
    Route::get('delete/news-post/{id}','deleteNews')->name('delete.news.post');
    Route::get('deactivate/news-post/{id}','deactivateNews')->name('deactivate.post');
    Route::get('activate/news-post/{id}','activateNews')->name('activate.post');
});
//banner controller
Route::controller(bannerController::class)->group(function(){
    Route::get('banner','allBanner')->name('all.banner');
    Route::post('update/banner','updateBanner')->name('update.banner');
});
//photo gallery controller
Route::controller(photoGalleryController::class)->group(function(){
    Route::get('photo/gallery','photoGallery')->name('photo.gallary');
    Route::get('add/photo/gallery','addGallery')->name('add.gallery');
    Route::post('store/photo/gallery','storeGallery')->name('store.gallery');
    Route::get('edit/photo/gallery/{id}','editGallery')->name('edit.photo');
    Route::post('update/photo/gallery','updateGallery')->name('update.photo');
    Route::get('delete/photo/gallery/{id}','deleteGallery')->name('delete.photo');
    
});
//video gallery controller
Route::controller(videoGalleryController::class)->group(function(){
    Route::get('video/gallery','videoGallery')->name('video.gallary');
    Route::get('add/video/gallery','addVideo')->name('add.video');
    Route::post('store/video/gallery','storeVideo')->name('store.video');
    Route::get('edit/video/gallery/{id}','editVideo')->name('edit.video');
    Route::post('update/video/gallery','updateVideo')->name('update.video');
    Route::get('delete/video/gallery/{id}','deleteVideo')->name('delete.video');

    //live tv
    Route::get('update/Live/tv','updateLiveTv')->name('update.live.tv');
    Route::post('store/live/tv','storeliveTv')->name('store.live.tv');
});

Route::controller(reviewController::class)->group(function(){
    Route::get('/pending/review','pendingReview')->name('pending.review');
    Route::get('/approved/review','approvedReview')->name('approved.review');
    Route::get('/activate/review/{id}','activateReview')->name('activate.review');
    Route::get('/delete/review/{id}','deactivateReview')->name('delete.review');
});

Route::controller(seoController::class)->group(function(){
    Route::get('/seo/setting','seoSetting')->name('seo.setting');
    Route::post('/update/seo','updateSeo')->name('update.seo');
    
});

Route::controller(roleController::class)->group(function(){
    //permissions
    Route::get('/all/permission','allPermission')->name('all.permission');
    Route::get('/add/permission','addPermission')->name('add.permission');
    Route::post('/store/permission','storePermission')->name('store.permission');
    Route::get('/edit/permission/{id}','editPermission')->name('edit.permission');
    Route::post('/update/permission','updatePermission')->name('update.permission');
    Route::get('/delete/permission/{id}','deletePermission')->name('delete.permission');
    //roles
    Route::get('/all/roles','allRoles')->name('all.roles');
    Route::get('/add/roles','addRoles')->name('add.roles');
    Route::post('/store/roles','storeRoles')->name('store.roles');
    Route::get('/edit/roles/{id}','editRoles')->name('edit.roles');
    Route::post('/update/roles','updateRoles')->name('update.roles');
    Route::get('/delete/roles/{id}','deleteRoles')->name('delete.roles');
    //roles and permissions 
    Route::get('/add/roles/permission','addRolesPermission')->name('add.roles.permission');
    Route::post('/store/roles/permission','storeRolesPermission')->name('store.roles.permission');
    Route::get('/all/roles/permission','allRolesPermission')->name('all.roles.permission');
    Route::get('/edit/roles/permission/{id}','eiditRolesPermission')->name('edit.role.permission');
    Route::post('/update/roles/permission','updateRolesPermission')->name('update.roles.permission');
    Route::get('/delete/roles/permission/{id}','deleteRolesPermission')->name('delete.role.permission');
    
});

});

require __DIR__.'/auth.php';

//access to all
Route::get('news/details/{id}/{slug}',[indexController::class,'newsDetails']);
Route::get('news/category/{id}/{slug}',[indexController::class,'catWiseNews']);
Route::get('news/subcategory/{id}/{slug}',[indexController::class,'catWiseSubcategory']);

//change language
Route::get('/lang/change',[indexController::class,'change'])->name('changeLang');

//search by date
Route::post('/search',[indexController::class,'SearchByDate'])->name('search-by-date');

//search news
Route::post('/news',[indexController::class,'newsSearch'])->name('news.search');

//reporter news
Route::get('/reporter/news/{id}',[indexController::class,'reporterNews'])->name('reporter.all.news');

//review controller
Route::post('store/review',[reviewController::class, 'storeReview'])->name('store.review');


///end of access controller