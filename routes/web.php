<?php

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->middleware('verified');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::resource('profile', 'ProfileController');
    Route::resource('company', 'CompanyController');
    Route::resource('companyTypes', 'CompanyTypeController');
    Route::resource('equipment', 'EquipmentController');
    Route::resource('equipmentTypes', 'EquipmentTypeController');
    Route::resource('equipmentModels', 'EquipmentModelController');
    Route::resource('equipmentBrands', 'EquipmentBrandController');
    Route::resource('equipmentParameters', 'EquipmentParameterController');
});


Route::group(['middleware' => ['auth']], function () {
    Route::resource('serviceOrders', 'ServiceOrderController');

    Route::get('serviceOrders/{serviceOrder}/formClose', 'ServiceOrderController@formClose')->name('serviceOrders.formClose');
    Route::get('serviceOrders/{serviceOrder}/formOpen', 'ServiceOrderController@formOpen')->name('serviceOrders.formOpen');
    Route::post('serviceOrders/{serviceOrder}/statusUpdate', 'ServiceOrderController@statusUpdate')->name('serviceOrders.statusUpdate');

    Route::resource('serviceOrders.serviceOrderDetails', 'ServiceOrderDetailController')->shallow();
    Route::resource('serviceOrderFiles', 'ServiceOrderFileController');
    Route::resource('taskGroups', 'TaskGroupController');
    Route::resource('typeServices', 'TypeServiceController');

    Route::get('serviceOrderDetail/{service_order_id}', 'ServiceOrderDetailController@getData')->name('data.serviceOrderDetail');
    Route::get('typeService', 'TypeServiceController@getData')->name('data.typeService');
    Route::get('technicalOperator', 'UserController@getTechnicalOperator')->name('data.technicalOperator');
});



Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');


