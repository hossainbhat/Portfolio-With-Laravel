<?php

use Illuminate\Support\Facades\Route;




Route::namespace('App\Http\Controllers')->group(function(){

    Route::get('/','IndexController@index')->name('index');
    Route::post('index/send','IndexController@indexContact')->name('index.send');

});

Route::prefix('/admin')->namespace('App\Http\Controllers')->group(function(){
    Route::match(['get','post'],'/','UserController@login')->name('admin.login');
    Route::get('/forgot-password','UserController@forgotPassword')->name('admin.forgot-password');
    Route::get('/reset-password','UserController@resetPassword')->name('admin.reset-password');
   
    Route::group(['middleware' => ['auth']],function(){
        Route::get('/dashboard','UserController@dashboard')->name('admin.dashboard');
        Route::get('/profile','UserController@profile')->name('admin.profile');
        Route::match(['get','post'],'/profile/edit','UserController@updateProfile')->name('admin.profile.update');
        Route::post('/check-pwd','UserController@chkPassword')->name('admin.check-password');
        Route::post('/update-pwd','UserController@updatePassword')->name('admin.update-password');
        Route::get('/logout','UserController@logout')->name('admin.logout');
        //skill
        Route::get('/skills','SkillController@skills')->name('admin.skill');
        Route::match(['get','post'],'/add-edit-skill/{id?}','SkillController@addEditSkill')->name('admin.addEdit.skill');
        Route::get('/delete-skill/{id}','SkillController@deleteSkill')->name('admin.skill.delete');
        Route::post('update-skill-status','SkillController@updateSkillStatus')->name('admin.skill.status');
        //portfolio
        Route::get('/portfolios','PortfolioController@portfolios')->name('admin.portfolios');
        Route::match(['get','post'],'/add-edit-portfolio/{id?}','PortfolioController@addEditPortfolio')->name('admin.addEdit.portfolio');
        Route::get('/delete-portfolio/{id}','PortfolioController@deletePortfolio')->name('admin.portfolio.delete');
        Route::get('/delete-porfolioImage/{id}','PortfolioController@deletePortfolioImage')->name('admin.porfolioImage.delete');
        Route::post('update-portfolio-status','PortfolioController@updatePorfolioStatus')->name('admin.portfolio.status');
        //service
        Route::get('/services','ServiceController@services')->name('admin.services');
        Route::match(['get','post'],'/add-edit-service/{id?}','ServiceController@addEditService')->name('admin.addEdit.service');
        Route::get('/delete-service/{id}','ServiceController@deleteService')->name('admin.service.delete');
        Route::post('update-service-status','ServiceController@updateServiceStatus')->name('admin.service.status');
        //testmonial
        Route::get('testmonials','TestmonialController@testmonials')->name('admin.testmonials');
        Route::match(['get','post'],'/add-edit-testmonial/{id?}','TestmonialController@addEditTestminial')->name('admin.addEdit.testmonial');
        Route::get('/delete-testmonial/{id}','TestmonialController@deleteTestmonial')->name('admin.testmonial.delete');
        Route::get('/delete-testmonialImage/{id}','TestmonialController@deleteTestmonialImage')->name('admin.testmonialImage.delete');
        Route::post('update-testmonial-status','TestmonialController@updateTestmonialStatus')->name('admin.testmonial.status');
        //logo
        Route::get('/logos','LogoController@logos')->name('admin.logos');
        Route::match(['get','post'],'/add-edit-logo/{id?}','LogoController@addEditLogo')->name('admin.addEdit.logo');
        Route::get('/delete-logo/{id}','LogoController@deleteLogo')->name('admin.logo.delete');
        Route::get('/delete-logoImage/{id}','LogoController@deleteLogoImage')->name('admin.logoImage.delete');
        Route::post('update-logo-status','LogoController@updateLogoStatus')->name('admin.logo.status');
        //contact
        Route::get('contacts','ContactController@contacts')->name('admin.contacts');
        Route::get('contact/view/{id}','ContactController@viewContact')->name('admin.contact.view');
        Route::get('delete-contact/{id}','ContactController@deleteContact')->name('admin.contact.delete');
        Route::post('update-contact-status','ContactController@updateContactStatus')->name('admin.contact.status');
    });
});

