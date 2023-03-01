<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/','IndexController@index')->name('index');
    Route::get('/about','IndexController@about')->name('about');
    Route::get('/portfolio','IndexController@portfolio')->name('portfolio');
    Route::get('/contact','IndexController@contact')->name('contact');
    Route::get('/blog','IndexController@blog')->name('blog');
    Route::get('/blog-details','IndexController@blogdetails')->name('blogdetails');
});



Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'],'/','AdminController@login')->name('admin.login');
    Route::match(['get','post'],'/forgot-password','AdminController@forgotpassword')->name('admin.forgotpassword');


    Route::group(['middleware' => ['auth']],function(){
        Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
        Route::get('/logout', 'AdminController@logout')->name('admin.logout');

        //skill
        Route::get('skill', 'SkillController@index')->name('skill.index');
        Route::post('skill', 'SkillController@store')->name('skill.store');
        Route::get('skill/{skill}', 'SkillController@show')->name('skill.show');
        Route::get('skill/{skill}/edit', 'SkillController@edit')->name('skill.edit');
        Route::post('skill/{skill}', 'SkillController@update')->name('skill.update');
        Route::get('skill/{skill}', 'SkillController@destroy')->name('skill.destroy');
        Route::post('update-skill-status', 'SkillController@updateSkillStatus')->name('skill.updateSkillStatus');

        //experience
        Route::get('experience', 'ExperienceController@index')->name('experience.index');
        Route::post('experience', 'ExperienceController@store')->name('experience.store');
        Route::get('experience/{experience}', 'ExperienceController@show')->name('experience.show');
        Route::get('experience/{experience}/edit', 'ExperienceController@edit')->name('experience.edit');
        Route::post('experience/{experience}', 'ExperienceController@update')->name('experience.update');
        Route::get('experience/{experience}', 'ExperienceController@destroy')->name('experience.destroy');
        Route::post('update-experience-status', 'ExperienceController@updateExperienceStatus')->name('experience.updateExperienceStatus');

        //education
        Route::get('education', 'EducationController@index')->name('education.index');
        Route::post('education', 'EducationController@store')->name('education.store');
        Route::get('education/{education}', 'EducationController@show')->name('education.show');
        Route::get('education/{education}/edit', 'EducationController@edit')->name('education.edit');
        Route::post('education/{education}', 'EducationController@update')->name('education.update');
        Route::get('education/{education}', 'EducationController@destroy')->name('education.destroy');
        Route::post('update-education-status', 'EducationController@updateEducationStatus')->name('education.updateEducationStatus');

        //portfolio
        Route::get('portfolio', 'PortfolioController@index')->name('portfolio.index');
        Route::post('portfolio', 'PortfolioController@store')->name('portfolio.store');
        Route::get('portfolio/{portfolio}', 'PortfolioController@show')->name('portfolio.show');
        Route::get('portfolio/{portfolio}/edit', 'PortfolioController@edit')->name('portfolio.edit');
        Route::post('portfolio/{portfolio}', 'PortfolioController@update')->name('portfolio.update');
        Route::get('portfolio/{portfolio}', 'PortfolioController@destroy')->name('portfolio.destroy');
        Route::post('update-portfolio-status', 'PortfolioController@updatePortfolioStatus')->name('portfolio.updatePortfolioStatus');

         //portfolio
         Route::get('blog', 'BlogController@index')->name('blog.index');
         Route::post('blog', 'BlogController@store')->name('blog.store');
         Route::get('blog/{blog}', 'BlogController@show')->name('blog.show');
         Route::get('blog/{blog}/edit', 'BlogController@edit')->name('blog.edit');
         Route::post('blog/{blog}', 'BlogController@update')->name('blog.update');
         Route::get('blog/{blog}', 'BlogController@destroy')->name('blog.destroy');
         Route::post('update-blog-status', 'BlogController@updateBlogStatus')->name('portfolio.updateBlogStatus');

    });
    
});