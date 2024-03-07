<?php

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

Auth::routes(['register' => false]);

// Clear cashe route
Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

 });

Route::group(
    [
        // 'prefix' => LaravelLocalization::setLocale(),
        // 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', 'SiteController@home')->name('home');
        Route::get('/about', 'SiteController@about')->name('about');
        Route::get('/privacy', 'SiteController@privacy')->name('privacy');
        Route::get('/contact-us', 'SiteController@contact')->name('contact');
        Route::get('/services', 'SiteController@services')->name('services');
        Route::get('/services/{service:slug}', 'SiteController@service')->name('service');
        Route::get('/services/{service:slug}/order', 'SiteController@orderService')->name('service.order');
        Route::post('/services/{service:slug}/order', 'SiteController@storeOrderService')->name('service.order.store');

        Route::post('/contact-us', 'SiteController@postContact')->name('contact.post');

        Route::get('/works/{work:slug}', 'SiteController@work')->name('work');
        Route::get('/blogs', 'SiteController@blogs')->name('blogs');
        Route::get('/blogs/{blog:slug}', 'SiteController@blog')->name('blog');

        Route::get('/profile', 'SiteController@profile')->name('profile');

        Route::get('/vcard/{customer:slug}', 'CustomerController@show')->name('customer');
        Route::get('/vcard/{customer:slug}/vcf', 'CustomerController@vcf')->name('customer.vcf');
        Route::post('/vcard/{customer}/contact', 'CustomerController@contact')->name('customer.contact');
        Route::get('/vcard/{customer:slug}/blogs', 'CustomerController@blogs')->name('customer.blogs');
        Route::get('/vcard/{customer:slug}/blogs/{customerBlog}', 'CustomerController@blog')->name('customer.blog');
        Route::get('/vcard/download/blog/{blog:slug}', 'PDFController@downloadCustomerBlog')->name('customer.downloadBlog');

        Route::get('/eCard-off', 'CustomerController@eCardOff')->name('eCardOff');

        Route::get('/download/blog/{blog:slug}', 'PDFController@downloadBlog')->name('downloadBlog');
    }
);

Route::get('/sitemap.xml', 'SitemapXmlController@index')->name('sitemap');


Route::group(['prefix' => '/dashboard', 'middleware' => ['auth', 'setArLocale'], 'as' => 'dashboard.'], function () {
    Route::get('/home', 'Dashboard\DashboardController@home')->name('home');

    Route::resource('package_categories','Dashboard\PackageCategoryController');
    Route::resource('packages','Dashboard\PackageController');
    Route::resource('package_services','Dashboard\PackageServiceController')->except(['index', 'create', 'edit']);

    Route::get('/package_services/{service}', 'Dashboard\PackageServiceController@index')->name('package_services.index');
    Route::get('/package_services/{service}/create', 'Dashboard\PackageServiceController@create')->name('package_services.create');
    Route::get('/package_services/{service}/edit', 'Dashboard\PackageServiceController@edit')->name('package_services.edit');

    Route::get('/services/{service}/edit', 'Dashboard\ServiceController@edit')->name('services.edit');
    Route::get('/services', 'Dashboard\ServiceController@index')->name('services.index');
    Route::get('/services/create', 'Dashboard\ServiceController@create')->name('services.create');
    Route::post('/services', 'Dashboard\ServiceController@store')->name('services.store');
    Route::put('/services/{service}', 'Dashboard\ServiceController@update')->name('services.update');
    Route::delete('/services/{service}/index-image', 'Dashboard\ServiceController@destroyIndexImage')->name('services.indexImage.destroy');
    Route::delete('/services/{service}/index-image-2', 'Dashboard\ServiceController@destroyIndexImage2')->name('services.indexImage.destroy2');

    Route::get('/services/{service}/indexitems', 'Dashboard\ServiceIndexItemController@index')->name('services.indexitems.index');
    Route::get('/services/{service}/indexitems/create', 'Dashboard\ServiceIndexItemController@create')->name('services.indexitems.create');
    Route::post('/services/{service}/indexitems', 'Dashboard\ServiceIndexItemController@store')->name('services.indexitems.store');
    Route::get('/services/indexitems/{indexitem}/edit', 'Dashboard\ServiceIndexItemController@edit')->name('services.indexitems.edit');
    Route::put('/services/indexitems/{indexitem}', 'Dashboard\ServiceIndexItemController@update')->name('services.indexitems.update');
    Route::delete('/services/indexitems/{indexitem}', 'Dashboard\ServiceIndexItemController@destroy')->name('services.indexitems.destroy');

    Route::get('/services/{service}/sections', 'Dashboard\ServiceSectionController@index')->name('services.sections.index');
    Route::get('/services/{service}/sections/create', 'Dashboard\ServiceSectionController@create')->name('services.sections.create');
    Route::post('/services/{service}/sections', 'Dashboard\ServiceSectionController@store')->name('services.sections.store');
    Route::get('/services/sections/{section}/edit', 'Dashboard\ServiceSectionController@edit')->name('services.sections.edit');
    Route::put('/services/sections/{section}', 'Dashboard\ServiceSectionController@update')->name('services.sections.update');
    Route::delete('/services/sections/{section}', 'Dashboard\ServiceSectionController@destroy')->name('services.sections.destroy');

    Route::get('/services/sections/{section}/images', 'Dashboard\ServiceSectionImageController@index')->name('services.sections.images.index');
    Route::get('/services/sections/{section}/images/create', 'Dashboard\ServiceSectionImageController@create')->name('services.sections.images.create');
    Route::post('/services/sections/{section}/images', 'Dashboard\ServiceSectionImageController@store')->name('services.sections.images.store');
    Route::get('/services/sections/images/{image}/edit', 'Dashboard\ServiceSectionImageController@edit')->name('services.sections.images.edit');
    Route::put('/services/sections/images/{image}', 'Dashboard\ServiceSectionImageController@update')->name('services.sections.images.update');
    Route::delete('/services/sections/images/{image}', 'Dashboard\ServiceSectionImageController@destroy')->name('services.sections.images.destroy');


    Route::get('/services/{id}/sliderImages', 'Dashboard\ServiceSliderImageController@index')->name('services.sliderImages.index');
    Route::get('/services/{service}/sliderImages/create', 'Dashboard\ServiceSliderImageController@create')->name('services.sliderImages.create');
    Route::post('/services/{service}/sliderImages', 'Dashboard\ServiceSliderImageController@store')->name('services.sliderImages.store');
    Route::get('/services/sliderImages/{image}/edit', 'Dashboard\ServiceSliderImageController@edit')->name('services.sliderImages.edit');
    Route::put('/services/sliderImages/{image}', 'Dashboard\ServiceSliderImageController@update')->name('services.sliderImages.update');
    Route::delete('/services/sliderImages/{image}/delete', 'Dashboard\ServiceSliderImageController@destroy')->name('services.sliderImages.destroy');
    Route::get('/services/{service}/sliderImages/show', 'Dashboard\ServiceSliderImageController@show')->name('services.sliderImages.show');
    Route::get('/services/{service}/sliderImages/hide', 'Dashboard\ServiceSliderImageController@hide')->name('services.sliderImages.hide');
    Route::post('/services/{service}/sliderImages/slider', 'Dashboard\ServiceSliderImageController@slider')->name('services.sliderImages.slider');


    Route::get('/services/{service}/sliderHeaderImages', 'Dashboard\ServiceHeaderSliderImageController@index')->name('services.sliderHeaderImages.index');
    Route::get('/services/{service}/sliderHeaderImages/create', 'Dashboard\ServiceHeaderSliderImageController@create')->name('services.sliderHeaderImages.create');
    Route::post('/services/{service}/sliderHeaderImages', 'Dashboard\ServiceHeaderSliderImageController@store')->name('services.sliderHeaderImages.store');
    Route::get('/services/sliderHeaderImages/{image}/edit', 'Dashboard\ServiceHeaderSliderImageController@edit')->name('services.sliderHeaderImages.edit');
    Route::put('/services/sliderHeaderImages/{image}', 'Dashboard\ServiceHeaderSliderImageController@update')->name('services.sliderHeaderImages.update');
    Route::delete('/services/sliderHeaderImages/{image}/delete', 'Dashboard\ServiceHeaderSliderImageController@destroy')->name('services.sliderHeaderImages.destroy');
    Route::get('/services/{service}/sliderHeaderImages/show', 'Dashboard\ServiceHeaderSliderImageController@show')->name('services.sliderHeaderImages.show');
    Route::get('/services/{service}/sliderHeaderImages/hide', 'Dashboard\ServiceHeaderSliderImageController@hide')->name('services.sliderHeaderImages.hide');


    Route::get('/services/{service}/workways', 'Dashboard\ServiceWorkWayController@index')->name('services.workways.index');
    Route::get('/services/{service}/workways/create', 'Dashboard\ServiceWorkWayController@create')->name('services.workways.create');
    Route::post('/services/{service}/workways', 'Dashboard\ServiceWorkWayController@store')->name('services.workways.store');
    Route::get('/services/workways/{workway}/edit', 'Dashboard\ServiceWorkWayController@edit')->name('services.workways.edit');
    Route::put('/services/workways/{workway}', 'Dashboard\ServiceWorkWayController@update')->name('services.workways.update');
    Route::delete('/services/workways/{workway}', 'Dashboard\ServiceWorkWayController@destroy')->name('services.workways.destroy');

    Route::get('/services/{service}/questions', 'Dashboard\ServiceQuestionController@index')->name('services.questions.index');
    Route::get('/services/{service}/questions/create', 'Dashboard\ServiceQuestionController@create')->name('services.questions.create');
    Route::post('/services/{service}/questions', 'Dashboard\ServiceQuestionController@store')->name('services.questions.store');
    Route::get('/services/questions/{question}/edit', 'Dashboard\ServiceQuestionController@edit')->name('services.questions.edit');
    Route::put('/services/questions/{question}', 'Dashboard\ServiceQuestionController@update')->name('services.questions.update');
    Route::delete('/services/questions/{question}', 'Dashboard\ServiceQuestionController@destroy')->name('services.questions.destroy');

    Route::get('/orderservices', 'Dashboard\OrderServiceController@index')->name('orderservices.index');
    Route::delete('/orderservices/{orderservice}', 'Dashboard\OrderServiceController@destroy')->name('orderservices.destroy');
    Route::post('/orderservices/{orderservice}/status', 'Dashboard\OrderServiceController@changeStatus')->name('orderservices.status');
    Route::put('/orderservices/{orderservice}/note', 'Dashboard\OrderServiceController@note')->name('orderservices.note');

    Route::get('/contact-us', 'Dashboard\ContactUsController@index')->name('contact-us.index');
    Route::delete('/contact-us/{contactus}', 'Dashboard\ContactUsController@destroy')->name('contact-us.destroy');
    Route::post('/contact-us/{contactus}/status', 'Dashboard\ContactUsController@changeStatus')->name('contact-us.status');
    Route::put('/contact-us/{contactus}/note', 'Dashboard\ContactUsController@note')->name('contact-us.note');

    Route::get('/about', 'Dashboard\AboutController@create')->name('about.create');
    Route::post('/about', 'Dashboard\AboutController@store')->name('about.store');


    Route::get('/privacy', 'Dashboard\PrivacyController@create')->name('privacy.create');
    Route::post('/privacy', 'Dashboard\PrivacyController@store')->name('privacy.store');

    Route::get('/socialMedia', 'Dashboard\SocialMediaController@index')->name('socialmedia.index');
    Route::get('/socialMedia/{socialMedia}/edit', 'Dashboard\SocialMediaController@edit')->name('socialmedia.edit');
    Route::put('/socialMedia/{socialMedia}', 'Dashboard\SocialMediaController@update')->name('socialmedia.update');

    Route::get('/contactinfo', 'Dashboard\ContactInfoController@create')->name('contactinfo.create');
    Route::post('/contactinfo', 'Dashboard\ContactInfoController@store')->name('contactinfo.store');

    Route::get('/blocked_contact', 'Dashboard\BlockedContactController@index')->name('blocked_contact.index');
    Route::get('/blocked_contact/create', 'Dashboard\BlockedContactController@create')->name('blocked_contact.create');
    Route::post('/blocked_contact/store', 'Dashboard\BlockedContactController@store')->name('blocked_contact.store');
    Route::delete('/blocked_contact/{id}', 'Dashboard\BlockedContactController@destroy')->name('blocked_contact.destroy');

    Route::get('/homeinfo', 'Dashboard\HomeInfoController@create')->name('homeinfo.create');
    Route::post('/homeinfo', 'Dashboard\HomeInfoController@store')->name('homeinfo.store');
    Route::resource('homeinfoSliderImages', 'Dashboard\HomeSliderController');
    Route::resource('partnerSlider', 'Dashboard\PartnerController');
    Route::resource('experinceSlider', 'Dashboard\ExperinceController');
    Route::resource('team', 'Dashboard\TeamController');

    Route::get('/aboutfields', 'Dashboard\AboutFieldController@index')->name('aboutfields.index');
    Route::get('/aboutfields/create', 'Dashboard\AboutFieldController@create')->name('aboutfields.create');
    Route::post('/aboutfields', 'Dashboard\AboutFieldController@store')->name('aboutfields.store');
    Route::get('/aboutfields/{aboutfield}/edit', 'Dashboard\AboutFieldController@edit')->name('aboutfields.edit');
    Route::put('/aboutfields/{aboutfield}', 'Dashboard\AboutFieldController@update')->name('aboutfields.update');
    Route::delete('/aboutfields/{aboutfield}', 'Dashboard\AboutFieldController@destroy')->name('aboutfields.destroy');

    Route::get('/workcategories', 'Dashboard\WorkCategoryController@index')->name('workcategories.index');
    Route::get('/workcategories/create', 'Dashboard\WorkCategoryController@create')->name('workcategories.create');
    Route::post('/workcategories', 'Dashboard\WorkCategoryController@store')->name('workcategories.store');
    Route::get('/workcategories/{workcategory}/edit', 'Dashboard\WorkCategoryController@edit')->name('workcategories.edit');
    Route::put('/workcategories/{workcategory}', 'Dashboard\WorkCategoryController@update')->name('workcategories.update');
    Route::post('/workcategories/reorder', 'Dashboard\WorkCategoryController@reorder')->name('workcategories.reorder');

    Route::get('/works', 'Dashboard\WorkController@index')->name('works.index');
    Route::get('/works/create', 'Dashboard\WorkController@create')->name('works.create');
    Route::post('/works', 'Dashboard\WorkController@store')->name('works.store');
    Route::get('/works/{work}/edit', 'Dashboard\WorkController@edit')->name('works.edit');
    Route::put('/works/{work}', 'Dashboard\WorkController@update')->name('works.update');

    Route::get('/clients', 'Dashboard\ClientController@index')->name('clients.index');
    Route::get('/clients/create', 'Dashboard\ClientController@create')->name('clients.create');
    Route::post('/clients', 'Dashboard\ClientController@store')->name('clients.store');
    Route::get('/clients/{client}/edit', 'Dashboard\ClientController@edit')->name('clients.edit');
    Route::put('/clients/{client}', 'Dashboard\ClientController@update')->name('clients.update');

    Route::get('/blogcategories', 'Dashboard\BlogCategoryController@index')->name('blogcategories.index');
    Route::get('/blogcategories/create', 'Dashboard\BlogCategoryController@create')->name('blogcategories.create');
    Route::post('/blogcategories', 'Dashboard\BlogCategoryController@store')->name('blogcategories.store');
    Route::get('/blogcategories/{blogcategory}/edit', 'Dashboard\BlogCategoryController@edit')->name('blogcategories.edit');
    Route::put('/blogcategories/{blogcategory}', 'Dashboard\BlogCategoryController@update')->name('blogcategories.update');
    Route::post('/blogcategories/reorder', 'Dashboard\BlogCategoryController@reorder')->name('blogcategories.reorder');

    Route::get('/blogs', 'Dashboard\BlogController@index')->name('blogs.index');
    Route::get('/blogs/create', 'Dashboard\BlogController@create')->name('blogs.create');
    Route::post('/blogs', 'Dashboard\BlogController@store')->name('blogs.store');
    Route::get('/blogs/{blog}/edit', 'Dashboard\BlogController@edit')->name('blogs.edit');
    Route::put('/blogs/{blog}', 'Dashboard\BlogController@update')->name('blogs.update');

    Route::get('/customers', 'Dashboard\CustomerController@index')->name('customers.index');
    Route::get('/customers/{id}/clients', 'Dashboard\CustomerController@clients')->name('customers.clients');
    Route::get('/customers/create', 'Dashboard\CustomerController@create')->name('customers.create');
    Route::post('/customers', 'Dashboard\CustomerController@store')->name('customers.store');
    Route::get('/customers/{user}/edit', 'Dashboard\CustomerController@edit')->name('customers.edit');
    Route::put('/customers/{user}', 'Dashboard\CustomerController@update')->name('customers.update');
    Route::delete('/customers/{user}', 'Dashboard\CustomerController@destroy')->name('customers.destroy');

    Route::get('/imageGallery/browser', 'Dashboard\ImageGalleryController@browser')->name('imageGallery.browser');
    Route::post('/imageGallery/uploader', 'Dashboard\ImageGalleryController@uploader')->name('imageGallery.uploader');

    Route::get('/color', 'Dashboard\ColorController@create')->name('color.create');
    Route::post('/color', 'Dashboard\ColorController@store')->name('color.store');

    Route::get('/blogPDF', 'Dashboard\BlogPDFController@create')->name('blogPDF.create');
    Route::post('/blogPDF', 'Dashboard\BlogPDFController@store')->name('blogPDF.store');

    Route::get('/aboutimages', 'Dashboard\AboutImageController@index')->name('aboutimages.index');
    Route::get('/aboutimages/create', 'Dashboard\AboutImageController@create')->name('aboutimages.create');
    Route::post('/aboutimages', 'Dashboard\AboutImageController@store')->name('aboutimages.store');
    Route::get('/aboutimages/{aboutimage}/edit', 'Dashboard\AboutImageController@edit')->name('aboutimages.edit');
    Route::put('/aboutimages/{aboutimage}', 'Dashboard\AboutImageController@update')->name('aboutimages.update');

    Route::get('/customers/{customer}/vcardimages', 'Dashboard\VCardImageController@index')->name('customers.vcardimages.index');
    Route::get('/customers/{customer}/vcardimages/create', 'Dashboard\VCardImageController@create')->name('customers.vcardimages.create');
    Route::post('/customers/{customer}/vcardimages', 'Dashboard\VCardImageController@store')->name('customers.vcardimages.store');
    Route::get('/vcardimages/{vcardimage}/edit', 'Dashboard\VCardImageController@edit')->name('vcardimages.edit');
    Route::put('/vcardimages/{vcardimage}', 'Dashboard\VCardImageController@update')->name('vcardimages.update');
    Route::delete('/vcardimages/{vcardimage}', 'Dashboard\VCardImageController@destroy')->name('vcardimages.destroy');

    Route::get('/sms/contact-us', 'Dashboard\SMSController@createContact')->name('sms.contact.create');
    Route::post('/sms/contact-us', 'Dashboard\SMSController@storeContact')->name('sms.contact.store');

    Route::get('/sms/service', 'Dashboard\SMSController@createService')->name('sms.service.create');
    Route::post('/sms/service', 'Dashboard\SMSController@storeService')->name('sms.service.store');

    Route::get('/sms/larid', 'Dashboard\SMSController@createLarid')->name('sms.larid.create');
    Route::post('/sms/larid', 'Dashboard\SMSController@storeLarid')->name('sms.larid.store');

    Route::get('/password/edit', 'Dashboard\PasswordController@edit')->name('password.edit');
    Route::post('/password/edit', 'Dashboard\PasswordController@update')->name('password.update');
});


Route::group(['prefix' => '/customers/dashboard', 'middleware' => ['auth', 'setArLocale'], 'as' => 'customers.dashboard.'], function () {
    Route::get('/home', 'Customers\DashboardController@home')->name('home');

    Route::get('/basicinfo', 'Customers\BasicInfoController@create')->name('basicinfo.create');
    Route::post('/basicinfo', 'Customers\BasicInfoController@store')->name('basicinfo.store');

    Route::get('/socialMedia', 'Customers\SocialMediaController@index')->name('socialmedia.index');
    Route::get('/socialMedia/create', 'Customers\SocialMediaController@create')->name('socialmedia.create');
    Route::post('/socialMedia', 'Customers\SocialMediaController@store')->name('socialmedia.store');
    Route::get('/socialMedia/{socialMedia}/edit', 'Customers\SocialMediaController@edit')->name('socialmedia.edit');
    Route::put('/socialMedia/{socialMedia}', 'Customers\SocialMediaController@update')->name('socialmedia.update');

    Route::get('/gallery', 'Customers\GalleryController@index')->name('gallery.index');
    Route::get('/gallery/create', 'Customers\GalleryController@create')->name('gallery.create');
    Route::post('/gallery', 'Customers\GalleryController@store')->name('gallery.store');
    Route::get('/gallery/{image}/edit', 'Customers\GalleryController@edit')->name('gallery.edit');
    Route::put('/gallery/{image}', 'Customers\GalleryController@update')->name('gallery.update');
    Route::post('/gallery/{image}/status', 'Customers\GalleryController@changeStatus')->name('gallery.status');
    Route::delete('/gallery/{image}', 'Customers\GalleryController@destroy')->name('gallery.destroy');

    Route::get('/contact-us', 'Customers\ContactUsController@index')->name('contactUs.index');
    Route::delete('/contact-us/{contactus}', 'Customers\ContactUsController@destroy')->name('contactUs.destroy');
    Route::post('/contact-us/{contactus}/status', 'Customers\ContactUsController@changeStatus')->name('contactUs.status');

    Route::get('/blogcategories', 'Customers\BlogCategoryController@index')->name('blogcategories.index');
    Route::get('/blogcategories/create', 'Customers\BlogCategoryController@create')->name('blogcategories.create');
    Route::post('/blogcategories', 'Customers\BlogCategoryController@store')->name('blogcategories.store');
    Route::get('/blogcategories/{blogcategory}/edit', 'Customers\BlogCategoryController@edit')->name('blogcategories.edit');
    Route::put('/blogcategories/{blogcategory}', 'Customers\BlogCategoryController@update')->name('blogcategories.update');
    Route::post('/blogcategories/reorder', 'Customers\BlogCategoryController@reorder')->name('blogcategories.reorder');

    Route::get('/blogs', 'Customers\BlogController@index')->name('blogs.index');
    Route::get('/blogs/create', 'Customers\BlogController@create')->name('blogs.create');
    Route::post('/blogs', 'Customers\BlogController@store')->name('blogs.store');
    Route::get('/blogs/{blog}/edit', 'Customers\BlogController@edit')->name('blogs.edit');
    Route::put('/blogs/{blog}', 'Customers\BlogController@update')->name('blogs.update');

    Route::get('/imageGallery/browser', 'Customers\ImageGalleryController@browser')->name('imageGallery.browser');
    Route::post('/imageGallery/uploader', 'Customers\ImageGalleryController@uploader')->name('imageGallery.uploader');
});
