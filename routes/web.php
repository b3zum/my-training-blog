<?php

use App\Http\Controllers\Admin\Category\CategoryCreateController;
use App\Http\Controllers\Admin\Category\CategoryDeleteController;
use App\Http\Controllers\Admin\Category\CategoryEditController;
use App\Http\Controllers\Admin\Category\CategoryIndexController;
use App\Http\Controllers\Admin\Category\CategoryShowController;
use App\Http\Controllers\Admin\Category\CategoryStoreController;
use App\Http\Controllers\Admin\Category\CategoryUpdateController;
use App\Http\Controllers\Admin\Main\AdminIndexController;
use App\Http\Controllers\Admin\Post\PostCreateController;
use App\Http\Controllers\Admin\Post\PostDeleteController;
use App\Http\Controllers\Admin\Post\PostEditController;
use App\Http\Controllers\Admin\Post\PostIndexController;
use App\Http\Controllers\Admin\Post\PostShowController;
use App\Http\Controllers\Admin\Post\PostStoreController;
use App\Http\Controllers\Admin\Post\PostUpdateController;
use App\Http\Controllers\Admin\Tag\TagCreateController;
use App\Http\Controllers\Admin\Tag\TagDeleteController;
use App\Http\Controllers\Admin\Tag\TagEditController;
use App\Http\Controllers\Admin\Tag\TagIndexController;
use App\Http\Controllers\Admin\Tag\TagShowController;
use App\Http\Controllers\Admin\Tag\TagStoreController;
use App\Http\Controllers\Admin\Tag\TagUpdateController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;


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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class);
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', AdminIndexController::class);
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/',  PostIndexController::class)->name('admin.post.index');
        Route::get('/create',  PostCreateController::class)->name('admin.post.create');
        Route::post('/',  PostStoreController::class)->name('admin.post.store');
        Route::get('/{post}',  PostShowController::class)->name('admin.post.show');
        Route::get('/edit/{post}',  PostEditController::class)->name('admin.post.edit');
        Route::put('/{post}',  PostUpdateController::class)->name('admin.post.update');
        Route::delete('/{post}',  PostDeleteController::class)->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/',  CategoryIndexController::class)->name('admin.category.index');
        Route::get('/create',  CategoryCreateController::class)->name('admin.category.create');
        Route::post('/',  CategoryStoreController::class)->name('admin.category.store');
        Route::get('/{category}',  CategoryShowController::class)->name('admin.category.show');
        Route::get('/edit/{category}',  CategoryEditController::class)->name('admin.category.edit');
        Route::put('/{category}',  CategoryUpdateController::class)->name('admin.category.update');
        Route::delete('/{category}',  CategoryDeleteController::class)->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/',  TagIndexController::class)->name('admin.tag.index');
        Route::get('/create',  TagCreateController::class)->name('admin.tag.create');
        Route::post('/',  TagStoreController::class)->name('admin.tag.store');
        Route::get('/{tag}',  TagShowController::class)->name('admin.tag.show');
        Route::get('/edit/{tag}',  TagEditController::class)->name('admin.tag.edit');
        Route::put('/{tag}',  TagUpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}',  TagDeleteController::class)->name('admin.tag.delete');
    });
});
Auth::routes();
