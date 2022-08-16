<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MarksheetController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


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

Route::group(['middleware' => 'api'], function ($router) {
    Route::get('menu', 'MenuController@index');

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('register', 'AuthController@register');


    Route::prefix('assignment')->group(function () {
        Route::get('all',[AssignmentController::class,'all']);
        Route::post('create',[AssignmentController::class,'create']);
        Route::get('view/{id}',[AssignmentController::class,'view']);
        Route::post('update',[AssignmentController::class,'update']);
        Route::get('delete/{id}',[AssignmentController::class,'delete']);
    });

    Route::prefix('presentation')->group(function () {
        Route::get('all',[PresentationController::class,'all']);
        Route::post('create',[PresentationController::class,'create']);
        Route::get('view/{id}',[PresentationController::class,'view']);
        Route::post('update',[PresentationController::class,'update']);
        Route::get('delete/{id}',[PresentationController::class,'delete']);
    });

    Route::prefix('student')->group(function () {
        Route::post('all',[StudentController::class,'all']);
        Route::post('create',[StudentController::class,'create']);
        Route::get('view/{id}',[StudentController::class,'view']);
        Route::post('update',[StudentController::class,'update']);
        Route::get('delete/{id}',[StudentController::class,'delete']);
        Route::get('all-batch',[StudentController::class,'allBatch']);
    });

    Route::prefix('teacher')->group(function () {
        Route::get('all',[TeacherController::class,'all']);
        Route::post('create',[TeacherController::class,'create']);
        Route::get('view/{id}',[TeacherController::class,'view']);
        Route::post('update',[TeacherController::class,'update']);
        Route::get('delete/{id}',[TeacherController::class,'delete']);
    });

    Route::prefix('course')->group(function () {
        Route::get('all',[CourseController::class,'all']);
        Route::post('create',[CourseController::class,'create']);
        Route::get('view/{id}',[CourseController::class,'view']);
        Route::post('update',[CourseController::class,'update']);
        Route::get('delete/{id}',[CourseController::class,'delete']);
        Route::post('batch-wise',[CourseController::class,'courseBatchWise']);
    });

    /**attendance api*/
    Route::prefix('attendance')->group(function () {
        Route::post('create',[AttendanceController::class,'create']);
        Route::post('view',[AttendanceController::class,'view']);
        Route::post('update',[AttendanceController::class,'update']);
        Route::post('delete',[AttendanceController::class,'delete']);
    });


    /**marksheet api*/
    Route::prefix('marksheet')->group(function () {
        Route::post('create',[MarksheetController::class,'create']);
        Route::post('view',[MarksheetController::class,'view']);
        Route::post('update',[MarksheetController::class,'update']);
        Route::post('delete',[MarksheetController::class,'delete']);
        Route::post('teacher-wise',[MarksheetController::class,'teacherWise']);
    });


    Route::resource('notes', 'NotesController');

    Route::resource('resource/{table}/resource', 'ResourceController');

    Route::group(['middleware' => 'admin'], function ($router) {

        Route::resource('mail',        'MailController');
        Route::get('prepareSend/{id}', 'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',   'MailController@send')->name('mailSend');

        Route::resource('bread',  'BreadController');   //create BREAD (resource)

        Route::resource('users', 'UsersController')->except( ['create', 'store'] );

        Route::prefix('menu/menu')->group(function () {
            Route::get('/',         'MenuEditController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuEditController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuEditController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuEditController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuEditController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuEditController@delete')->name('menu.menu.delete');
        });
        Route::prefix('menu/element')->group(function () {
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('media')->group(function ($router) {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');

            Route::get('/file/download',    'MediaController@fileDownload');
        });

        Route::resource('roles',        'RolesController');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');



    });
});

