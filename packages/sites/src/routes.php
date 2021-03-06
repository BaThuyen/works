<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT

  Route::get('site', [
  'as' => 'site',
  'uses' => 'Sites\Controllers\Front\SampleFrontController@index'
  ]); */
/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/site', [
            'as' => 'admin_site',
            'uses' => 'Sites\Controllers\Admin\SiteController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/site/edit', [
            'as' => 'admin_site.edit',
            'uses' => 'Sites\Controllers\Admin\SiteController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/site/edit', [
            'as' => 'admin_site.post',
            'uses' => 'Sites\Controllers\Admin\SiteController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/site/delete', [
            'as' => 'admin_site.delete',
            'uses' => 'Sites\Controllers\Admin\SiteController@delete'
        ]);

        Route::get('admin/site/categories', [
            'as' => 'admin_site.categories',
            'uses' => 'Sites\Controllers\Admin\SiteCategoryController@index'
        ]);
        
        Route::post('admin/site/categories', [
            'as' => 'admin_site.categories.post',
            'uses' => 'Sites\Controllers\Admin\SiteCategoryController@post'
        ]);

        Route::get('admin/site/categories/crawler', [
            'as' => 'crawler',
            'uses' => 'Sites\Controllers\Admin\SiteCategoryController@categoriesCrawler'
        ]);
    });
});
