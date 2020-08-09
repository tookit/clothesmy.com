<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//public route


Route::post('/auth/login',['uses'=>'Auth\LoginController@login','desc'=>'Login'])->name('login');

Route::post('/quote',['uses'=>'Mall\QuoteController@store','desc'=>'Create quote']);

Route::post('/search',['uses'=>'Mall\ProductController@search','desc'=>'Search product']);
Route::post('/trans',['uses'=>'I18n\TranslationController@index','desc'=>'Translation']);

// protected route
Route::middleware(['auth:api'])->group(function () {

    Route::prefix('auth')->group(function (){

        Route::post('logout',['uses'=>'Auth\LoginController@logout','desc'=>'Logout'])->name('logout');
        Route::post('refresh',['uses'=>'Auth\LoginController@refresh','desc'=>'Refresh token'])->name('token.refresh');

    });

    // Current Login user info
    Route::get('me',['uses'=>'Acl\UserController@me','desc'=>'View self'])->name('user.me');

    // Access control
    Route::prefix('acl')->group(function (){

        //User
        Route::get('users',['uses'=>'Acl\UserController@index','desc'=>'List user'])->name('user.index');
        Route::post('users',['uses'=>'Acl\UserController@store','desc'=>'Create user'])->name('user.create');
        Route::get('users/{id}',['uses'=>'Acl\UserController@show','desc'=>'View user detail'])->where('id', '[0-9]+')->name('user.view');
        Route::put('users/{id}',['uses'=>'Acl\UserController@update','desc'=>'Update user'])->where('id', '[0-9]+')->name('user.edit');
        Route::delete('users/{id}',['uses'=>'Acl\UserController@destroy','desc'=>'Delete User'])->where('id', '[0-9]+')->name('user.delete');

        //Role
        Route::get('roles',['uses'=>'Acl\RoleController@index','desc'=>'List role'])->name('role.index');
        Route::post('roles',['uses'=>'Acl\RoleController@store','desc'=>'Create role'])->name('role.create');
        Route::get('roles/{id}',['uses'=>'Acl\RoleController@show','desc'=>'View role detail'])->where('id', '[0-9]+')->name('role.view');
        Route::put('roles/{id}',['uses'=>'Acl\RoleController@update','desc'=>'Update role'])->where('id', '[0-9]+')->name('role.edit');
        Route::delete('roles/{id}',['uses'=>'Acl\RoleController@destroy','desc'=>'Delete role'])->where('id', '[0-9]+')->name('role.delete');

        //Permission
        Route::get('permissions',['uses'=>'Acl\PermissionController@index','desc'=>'List permission'])->name('permission.index');
        Route::post('permissions',['uses'=>'Acl\PermissionController@store','desc'=>'Create permission'])->name('permission.create');
        Route::get('permissions/{id}',['uses'=>'Acl\PermissionController@show','desc'=>'View permission detail'])->where('id', '[0-9]+')->name('permission.view');
        Route::put('permissions/{id}',['uses'=>'Acl\PermissionController@update','desc'=>'Update permission'])->where('id', '[0-9]+')->name('permission.edit');
        Route::delete('permissions/{id}',['uses'=>'Acl\PermissionController@destroy','desc'=>'Delete permission'])->where('id', '[0-9]+')->name('permission.delete');

    });

    // CMS
    Route::prefix('cms')->group(function (){

        //Menu
        Route::get('menu',['uses'=>'CMS\MenuController@index','desc'=>'List menu'])->name('menu.index');
        Route::post('menu',['uses'=>'CMS\MenuController@store','desc'=>'Create menu'])->name('menu.create');
        Route::get('menu/{id}',['uses'=>'CMS\MenuController@show','desc'=>'View menu detail'])->where('id', '[0-9]+')->name('menu.view');
        Route::put('menu/{id}',['uses'=>'CMS\MenuController@update','desc'=>'Update menu'])->where('id', '[0-9]+')->name('menu.edit');
        Route::delete('menu/{id}',['uses'=>'CMS\MenuController@destroy','desc'=>'Delete menu'])->where('id', '[0-9]+')->name('menu.delete');
        //category
        Route::get('category',['uses'=>'CMS\CategoryController@index','desc'=>'List category'])->name('category.index');
        Route::post('category',['uses'=>'CMS\CategoryController@store','desc'=>'Create category'])->name('category.create');
        Route::get('category/{id}',['uses'=>'CMS\CategoryController@show','desc'=>'View category detail'])->where('id', '[0-9]+')->name('category.view');
        Route::put('category/{id}',['uses'=>'CMS\CategoryController@update','desc'=>'Update category'])->where('id', '[0-9]+')->name('category.edit');
        Route::delete('category/{id}',['uses'=>'CMS\CategoryController@destroy','desc'=>'Delete category'])->where('id', '[0-9]+')->name('category.delete');

        //post
        Route::get('post',['uses'=>'CMS\PostController@index','desc'=>'List category'])->name('post.index');
        Route::post('post',['uses'=>'CMS\PostController@store','desc'=>'Create category'])->name('post.create');
        Route::get('post/{id}',['uses'=>'CMS\PostController@show','desc'=>'View category detail'])->where('id', '[0-9]+')->name('post.view');
        Route::put('post/{id}',['uses'=>'CMS\PostController@update','desc'=>'Update category'])->where('id', '[0-9]+')->name('post.edit');
        Route::delete('post/{id}',['uses'=>'CMS\PostController@destroy','desc'=>'Delete category'])->where('id', '[0-9]+')->name('post.delete');
        //tag
        Route::get('tag',['uses'=>'CMS\TagController@index','desc'=>'List tag'])->name('tag.index');
        Route::post('tag',['uses'=>'CMS\TagController@store','desc'=>'Create tag'])->name('tag.create');
        Route::get('tag/{id}',['uses'=>'CMS\TagController@show','desc'=>'View tag detail'])->where('id', '[0-9]+')->name('tag.view');
        Route::put('tag/{id}',['uses'=>'CMS\TagController@update','desc'=>'Update tag'])->where('id', '[0-9]+')->name('tag.edit');
        Route::delete('tag/{id}',['uses'=>'CMS\TagController@destroy','desc'=>'Delete tag'])->where('id', '[0-9]+')->name('tag.delete');
        //slider
        Route::get('slider',['uses'=>'CMS\SliderController@index','desc'=>'List slider'])->name('slider.index');
        Route::post('slider',['uses'=>'CMS\SliderController@store','desc'=>'Create slider'])->name('slider.create');
        Route::get('slider/{id}',['uses'=>'CMS\SliderController@show','desc'=>'View slider detail'])->where('id', '[0-9]+')->name('slider.view');
        Route::put('slider/{id}',['uses'=>'CMS\SliderController@update','desc'=>'Update slider'])->where('id', '[0-9]+')->name('slider.edit');
        Route::delete('slider/{id}',['uses'=>'CMS\SliderController@destroy','desc'=>'Delete slider'])->where('id', '[0-9]+')->name('slider.delete');
        Route::get('slider/{id}/image',['uses'=>'CMS\SliderController@listImage','desc'=>'List images for slider'])->where('id', '[0-9]+')->name('slider.image.list');
        Route::post('slider/{id}/image',['uses'=>'CMS\SliderController@attachImage','desc'=>'Attach image for slider'])->where('id', '[0-9]+')->name('slider.image.attach');

        //setting
        Route::get('setting',['uses'=>'CMS\SettingController@index','desc'=>'List setting'])->name('setting.index');
        Route::post('setting',['uses'=>'CMS\SettingController@store','desc'=>'Update setting'])->name('setting.update');

    });

    // Mall
    Route::prefix('mall')->group(function (){

        //quote
        Route::get('quote',['uses'=>'Mall\QuoteController@index','desc'=>'List quotes'])->name('quote.index');
        Route::post('quote',['uses'=>'Mall\QuoteController@store','desc'=>'Create quote'])->name('quote.create');
        Route::get('quote/{id}',['uses'=>'Mall\QuoteController@show','desc'=>'View quote detail'])->where('id', '[0-9]+')->name('quote.view');
        Route::put('quote/{id}',['uses'=>'Mall\QuoteController@update','desc'=>'Update quote'])->where('id', '[0-9]+')->name('quote.edit');
        Route::delete('quote/{id}',['uses'=>'Mall\QuoteController@destroy','desc'=>'Delete quote'])->where('id', '[0-9]+')->name('quote.delete');

        //category
        Route::get('category',['uses'=>'Mall\CategoryController@index','desc'=>'List category'])->name('category.index');
        Route::post('category',['uses'=>'Mall\CategoryController@store','desc'=>'Create category'])->name('category.create');
        Route::get('category/tree',['uses'=>'Mall\CategoryController@tree','desc'=>'List category'])->name('category.tree');
        Route::get('category/{id}',['uses'=>'Mall\CategoryController@show','desc'=>'View category detail'])->where('id', '[0-9]+')->name('category.view');
        Route::put('category/{id}',['uses'=>'Mall\CategoryController@update','desc'=>'Update category'])->where('id', '[0-9]+')->name('category.edit');
        Route::delete('category/{id}',['uses'=>'Mall\CategoryController@destroy','desc'=>'Delete category'])->where('id', '[0-9]+')->name('category.delete');
        Route::get('category/{id}/image',['uses'=>'Mall\CategoryController@listImage','desc'=>'List images for category'])->where('id', '[0-9]+')->name('category.image.list');
        Route::post('category/{id}/image',['uses'=>'Mall\CategoryController@attachImage','desc'=>'Attach image for category'])->where('id', '[0-9]+')->name('category.image.attach');
        //product
        Route::get('item',['uses'=>'Mall\ProductController@index','desc'=>'List product'])->name('product.index');
        Route::post('item',['uses'=>'Mall\ProductController@store','desc'=>'Create product'])->name('product.create');
        Route::get('item/{id}',['uses'=>'Mall\ProductController@show','desc'=>'View product detail'])->where('id', '[0-9]+')->name('product.view');
        Route::put('item/{id}',['uses'=>'Mall\ProductController@update','desc'=>'Update product'])->where('id', '[0-9]+')->name('product.edit');
        Route::delete('item/{id}',['uses'=>'Mall\ProductController@destroy','desc'=>'Delete product'])->where('id', '[0-9]+')->name('product.delete');
        Route::get('item/{id}/media',['uses'=>'Mall\ProductController@listMedia','desc'=>'List media for product'])->where('id', '[0-9]+')->name('product.media.list');
        Route::post('item/{id}/media',['uses'=>'Mall\ProductController@attachMedia','desc'=>'Attach media for product'])->where('id', '[0-9]+')->name('product.media.attach');
        Route::post('item/{id}/meta',['uses'=>'Mall\ProductController@attachMeta','desc'=>'Attach meta for product'])->where('id', '[0-9]+')->name('product.meta.attach');
        Route::post('item/{id}/property',['uses'=>'Mall\ProductController@attachProps','desc'=>'Attach props for product'])->where('id', '[0-9]+')->name('product.props.attach');
        Route::get('item/{id}/sku',['uses'=>'Mall\ProductController@listSku','desc'=>'List Sku for product'])->where('id', '[0-9]+')->name('product.sku.list');

        //property
        Route::get('property',['uses'=>'Mall\PropertyController@index','desc'=>'List property'])->name('property.index');
        Route::post('property',['uses'=>'Mall\PropertyController@store','desc'=>'Create property'])->name('property.create');
        Route::get('property/{id}',['uses'=>'Mall\PropertyController@show','desc'=>'View property detail'])->where('id', '[0-9]+')->name('property.view');
        Route::get('property/{id}/value',['uses'=>'Mall\PropertyController@listValues','desc'=>'View property values'])->where('id', '[0-9]+')->name('property.value.view');
        Route::put('property/{id}',['uses'=>'Mall\PropertyController@update','desc'=>'Update property'])->where('id', '[0-9]+')->name('property.edit');
        Route::put('property/{id}/value',['uses'=>'Mall\PropertyController@attachValue','desc'=>'Attach value for property'])->where('id', '[0-9]+')->name('property.value.attach');
        Route::delete('property/{id}',['uses'=>'Mall\PropertyController@destroy','desc'=>'Delete property'])->where('id', '[0-9]+')->name('property.delete');       //property
        //property value
        Route::get('property_value',['uses'=>'Mall\PropertyValueController@index','desc'=>'List property value'])->name('property_value.index');
        Route::post('property_value',['uses'=>'Mall\PropertyValueController@store','desc'=>'Create property value'])->name('property_value.create');
        Route::get('property_value/{id}',['uses'=>'Mall\PropertyValueController@show','desc'=>'View property value'])->where('id', '[0-9]+')->name('property_value.view');
        Route::put('property_value/{id}',['uses'=>'Mall\PropertyValueController@update','desc'=>'Update property value'])->where('id', '[0-9]+')->name('property_value.edit');
        Route::delete('property_value/{id}',['uses'=>'Mall\PropertyValueController@destroy','desc'=>'Delete property value'])->where('id', '[0-9]+')->name('property_value.delete');

    });

    // Media

    Route::prefix('media')->group(function (){

        Route::get('/',['uses'=>'Media\MediaController@index','desc'=>'List Media'])->name('media.list');
        Route::get('/file',['uses'=>'Media\MediaController@listFile','desc'=>'List Files'])->name('media.file.list');
        Route::get('/{id}',['uses'=>'Media\MediaController@show','desc'=>'View Media'])->where('id', '[0-9]+')->name('media.view');
        Route::put('/{id}',['uses'=>'Media\MediaController@update','desc'=>'Update Media'])->where('id', '[0-9]+')->name('media.update');
        Route::post('/',['uses'=>'Media\MediaController@store','desc'=>'Upload Media'])->name('media.upload');
        Route::delete('/{id}',['uses'=>'Media\MediaController@destroy','desc'=>'Delete Media'])->where('id', '[0-9]+')->name('media.delete');

    });



    // Tag

    Route::prefix('tag')->group(function (){

        Route::get('/',['uses'=>'Taggable\TagController@index','desc'=>'List Tag'])->name('tag.list');
        Route::get('/{id}',['uses'=>'Taggable\TagController@show','desc'=>'View Tag'])->where('id', '[0-9]+')->name('tag.view');
        Route::post('/',['uses'=>'Taggable\TagController@store','desc'=>'Create Tag'])->name('tag.create');
        Route::put('/{id}',['uses'=>'Taggable\TagController@update','desc'=>'Update Tag'])->where('id', '[0-9]+')->name('tag.update');
        Route::delete('/{id}',['uses'=>'Taggable\TagController@destroy','desc'=>'Delete Tag'])->where('id', '[0-9]+')->name('tag.delete');

    });

    // shop



});



