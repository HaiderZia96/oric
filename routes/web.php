<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\ResearchPublicationController;
use App\Http\Controllers\Admin\LinkTypeController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PermissionGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SuccessStoryController;
use App\Http\Controllers\front\LinkFrontController;
use App\Http\Controllers\front\SuccessStoryFrontController;
use App\Http\Controllers\front\NewsEventsDetailController;
use App\Http\Controllers\front\NewsEventsFrontController;
use App\Http\Controllers\front\ResearchPublicationFrontController;
use App\Http\Controllers\front\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('main');
Route::get('industry_linkages', [HomeController::class,'industry'])->name('industry-linkages');
Route::get('academic_linkages', [HomeController::class,'academics'])->name('academic-linkages');
Route::get('important_links', [LinkFrontController::class,'importantLink'])->name('important-links');
Route::get('management_structure', [HomeController::class,'structure'])->name('management-structure');
Route::get('contact_us', [HomeController::class,'contact'])->name('contact-us');
Route::get('resource', [LinkFrontController::class,'resourceLink'])->name('resource');
Route::get('success-story', [SuccessStoryFrontController::class,'successStory'])->name('success-story');
Route::get('news-and-events', [NewsEventsFrontController::class,'index'])->name('news-and-events');
Route::get('news-letters', [HomeController::class,'newsLetter'])->name('news-letters');

//Route to filter news and events using Apply Filter
// Route::get('get/search-news-events', [NewsEventsFrontController::class,'indexNewsAndEventSearch'])->name('search-news-events');

Route::get('get/news-events-search', [NewsEventsFrontController::class,'postSearch'])->name('news-events-search');
Route::get('get/news-events-detail/{slug}', [NewsEventsFrontController::class,'newsEventDetails'])->name('news-events-detail');
// Route::get('get/news-events-searches', [NewsEventsFrontController::class,'getNewsEventWithSearchFilter'])->name('getNewsEventWithSearchFilter');

Route::get('research-publication', [ResearchPublicationFrontController::class,'index'])->name('research-publication');
Route::get('get/research-publication',[ResearchPublicationFrontController::class,'getResearchIndexFront'])->name('getResearchIndexFront');

// Route::get('news-events/news-events-detail',[NewsEventsDetailController::class,'index'])->name('news-events-detail');
Route::get('activities', [HomeController::class,'activity'])->name('activities');

Route::group(['middleware' => ['auth','verified','IsActive','xss'],'prefix'=>'admin'], function() {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('permission_group',PermissionGroupController::class);
    Route::resource('permission',PermissionController::class);
    Route::resource('role',RoleController::class);
    Route::get('get/roles',[RoleController::class,'getRoles'])->name('getRoles');
    Route::resource('user',UserController::class);
    Route::get('get/users',[UserController::class,'getUsers'])->name('getUsers');
    Route::resource('news-event',NewsEventController::class)->withoutMiddleware('xss');
    Route::get('news-event-restore/{id}', [NewsEventController::class,'restore'])->name('news-event.restore');
    Route::delete('news-event-delete/{id}', [NewsEventController::class,'delete'])->name('news-event.delete');
    Route::get('get/index',[NewsEventController::class,'getIndex'])->name('getIndex');
    Route::post('news-event-upload',[NewsEventController::class,'upload'])->name('news-event.upload');

    Route::resource('research-publication',ResearchPublicationController::class)->withoutMiddleware('xss');
    Route::get('research-publication-restore/{id}', [ResearchPublicationController::class,'restore'])->name('research-publication.restore');
    Route::delete('research-publication-delete/{id}', [ResearchPublicationController::class,'delete'])->name('research-publication.delete');
    Route::get('get/research-publication',[ResearchPublicationController::class,'getResearchIndex'])->name('getResearchIndex');
    // Route::post('research-publication-upload',[NewsEventController::class,'upload'])->name('research-publication.upload');

     // Link Type admin
    Route::resource('link_type',LinkTypeController::class);
    Route::get('get/link_type',[LinkTypeController::class,'getLinkTypes'])->name('getLinkTypes');
    Route::get('link_type-restore/{id}', [LinkTypeController::class,'restore'])->name('link_type.restore');
    Route::delete('link_type-delete/{id}', [LinkTypeController::class,'delete'])->name('link_type.delete');

    // Link admin
    Route::resource('link',LinkController::class);
    Route::get('get/link',[LinkController::class,'getLinks'])->name('getLinks');
    Route::get('link-restore/{id}', [LinkController::class,'restore'])->name('link.restore');
    Route::delete('link-delete/{id}', [LinkController::class,'delete'])->name('link.delete');

    // Success Stories admin
    Route::resource('success_story',SuccessStoryController::class);
    Route::get('get/success_story',[SuccessStoryController::class,'getSuccessStories'])->name('getSuccessStories');
    Route::get('success_story-restore/{id}', [SuccessStoryController::class,'restore'])->name('success_story.restore');
    Route::delete('success_story-delete/{id}', [SuccessStoryController::class,'delete'])->name('success_story.delete');

});
Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
});
Auth::routes();

