<?php

use Illuminate\Support\Facades\Route;
use App\Story;
use App\Category;
use Spatie\Sitemap\SitemapGenerator;
/*
 * Authentication routes
 */


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

/*
 * Facebook auth
 */

Route::get('/login/facebook','Auth\LoginController@facebook')->name('facebook.login');
Route::get('/login/facebook/redirect','Auth\LoginController@facebookRedirect');

/*
 * GitHub auth
 */
Route::get('/login/github','Auth\LoginController@github')->name('github.login');
Route::get('/login/github/redirect','Auth\LoginController@githubRedirect');


/*
 * Google auth
 */
Route::get('/login/google','Auth\LoginController@google')->name('google.login');
Route::get('/login/google/redirect','Auth\LoginController@googleRedirect');





Route::post('/subscribe','SubscriberController@storeEmail')->name('store.email');

Route::get('/search','IndexController@search')->name('story.search');
Route::get('/tag/{tags}','IndexController@searchByTags')->name('story.searchByTags');


Route::get('/create','IndexController@createStoryRules')->name('story.create.rules');

//Auth::routes(); // must be bellow of login and register route
Auth::routes(['verify' => true]);


/*
 * Story and state routes
 */

Route::resource('story','StoryController')->middleware('verified'); // story create/read/update/delete/states route
Route::get('/stories','StoryController@stories')
    ->name('author.stories')->middleware('verified'); // for author published stories route


Route::get('/s/{slug}','ShowStoryController@fetchSingleStory')
    ->name('single.story'); // for index single item view
Route::get('/author/{slug}','ShowStoryController@authorStories')
    ->name('author.profile'); // for author view with his published stories
Route::get('/author/{aslug}/{sslug}','ShowStoryController@authorStory')
    ->name('author.single.story'); // for single story



/*
 * User Profile routes
 */

Route::get('/profile','UserController@userProfile')
    ->name('user.profile')->middleware('verified');
Route::post('/user/profile/photoUpload','UserController@profilePhotoUpload')
    ->name('user.profile.photoUpload')->middleware('verified');
Route::post('/user/profile/update','UserController@updateUserProfile')
    ->name('user.profile.update')->middleware('verified');



/*
 *  Index routes
 */

Route::get('/', 'IndexController@index');
Route::get('/c/{slug}', 'IndexController@storiesByCategory')->name('category.story');

/*
 *  Pages
 */
Route::get('/about','IndexController@about')->name('about');
Route::get('/privacy-policy','IndexController@priacy_policy')->name('privacy-policy');
Route::get('/contact','IndexController@contact')->name('contact');
Route::post('/contact/store','IndexController@contactFormStore')->name('contact-form-submit');



/*
 * admin routes
 */

//Route::get('/xyz/login','LoginController@showLoginForm')->name('login');
//Route::get('admin/', 'IndexController@admin')->middleware('admin');
//Route::get('admin/category/','CategoryController@categoryIndex')->middleware('admin');

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){

        //Login Routes

        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');

        //Forgot Password Routes
        //Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        //Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        //Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        //Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
//        Route::get('email/verify','VerificationController@show')->name('verification.notice');
//        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
//        Route::get('email/resend','VerificationController@resend')->name('verification.resend');





    });



    /*
     * Categories all route
     */

    Route::get('/category','CategoryController@showCategoryIndex'); // all categories
    Route::get('/category/create','CategoryController@createCategory'); // add category
    Route::post('/category/create','CategoryController@storeCategory'); // store category

    Route::get('/category/update/{id}','CategoryController@viewUpdateCategory'); // update category
    Route::post('/category/update/{id}','CategoryController@updateCategory'); // store category

    Route::post('/category/delete/{id}','CategoryController@deleteCategory');// delete category

    Route::get('/subscribers','SubscriberController@fetchAllSubscriber');// all subscriber
    Route::post('/subscribers/remove/{id}','SubscriberController@removeSubscriber');// remove subscriber


    /*
     * Users all route
     */


    Route::get('/users','HomeController@findAllUsers');// all users
    Route::get('/user/profile/{id}','HomeController@userProfile'); // single user
    Route::post('/user/delete/{id}','HomeController@deleteUser');// delete user by id


    /*
     *  all stories
     */

    Route::get('/stories','HomeController@allStories');
    Route::get('/story/review/{id}','HomeController@reviewStory');


    //Route::get('/stories/publish','HomeController@storyPublishedAction');
    //Route::get('/stories/publish/{id}','HomeController@storyPublishedAction');
    Route::post('/stories/publish','HomeController@storyPublishedAction');


    Route::get('/contact-list','HomeController@contactList');
    Route::post('/contact-remove/{id}','HomeController@contactRemove');
    Route::get('/contact/view/{id}','HomeController@contactView');
    Route::get('/contact/reply/{id}','HomeController@contactReply');
    Route::post('/contact/reply','HomeController@contactReplyAction');


    Route::get('/dashboard','HomeController@index')->name('home');//->middleware('guard.verified:admin,admin.verification.notice');
   // Route::get('/dashboard','HomeController@getNotificationCount')->name('home');//->middleware('guard.verified:admin,admin.verification.notice');


    Route::get('/get/notification','HomeController@getNotifications');
    //Route::get('/get-notification','HomeController@getNotifications');

});


Route::get('sitemap',function (){
    SitemapGenerator::create('http://localhost/easylearnbd.com/public/')->writeToFile('sitemap.xml');
    return "done";
});
