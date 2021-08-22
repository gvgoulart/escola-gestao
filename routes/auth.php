<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ListControllers\ListClassroomsController;
use App\Http\Controllers\ListControllers\ListNotificationsController;
use App\Http\Controllers\ListControllers\ListThemesController;
use App\Http\Controllers\ListControllers\ListUsersController;
use App\Http\Controllers\RegisteredControllers\RegisteredClassroomController;
use App\Http\Controllers\RegisteredControllers\RegisteredClassroomUserController;
use App\Http\Controllers\RegisteredControllers\RegisteredThemeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:admin|aluno|professor']], function() {
    
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
            
    Route::get('/dashboard/participate/{id}', [RegisteredClassroomController::class, 'requestParticipation'])
            ->name('request-classroom');

    Route::get('/dashboard/list/notifications/student', [ListNotificationsController::class, 'indexStudent'])
            ->name('list-notifications-student');

    Route::get('/dashboard/list/notifications/markAsRead/{id}', [ListNotificationsController::class, 'markAsRead'])
            ->name('markAsRead');
 });

 Route::group(['middleware' => ['auth', 'role:admin|professor']], function() {

    Route::get('/dashboard/register/user', [RegisteredUserController::class, 'create'])
                ->name('register-user');

    Route::post('/dashboard/register', [RegisteredUserController::class, 'store'])
                ->name('registerStore');

    Route::get('/dashboard/classroom', [RegisteredClassroomController::class, 'index'])
                ->name('classroom');

    Route::post('/dashboard/classroom/create', [RegisteredClassroomController::class, 'create'])
                ->name('classroom.create');

    Route::get('/dashboard/theme', [RegisteredThemeController::class, 'index'])
            ->name('register-theme');

    Route::post('/dashboard/theme', [RegisteredThemeController::class, 'create'])
            ->name('register.store');

    Route::get('/dashboard/list/users', [ListUsersController::class, 'index'])
            ->name('list.users');

    Route::get('/dashboard/list/users/delete/{id}', [ListUsersController::class, 'delete'])
            ->name('delete-user');

    Route::get('/dashboard/list/users/edit/{id}', [ListUsersController::class, 'edit'])
            ->name('edit-user');

    Route::post('/dashboard/list/users/edit/{id}', [ListUsersController::class, 'editAction'])
            ->name('edit-userAction');

    Route::get('/dashboard/list/themes', [ListThemesController::class, 'index'])
            ->name('list.themes');

    Route::get('/dashboard/list/themes/delete/{id}', [ListThemesController::class, 'delete'])
            ->name('delete-theme');

    Route::get('/dashboard/list/themes/edit/{id}', [ListThemesController::class, 'edit'])
            ->name('edit-theme');

    Route::post('/dashboard/list/themes/delete/{id}', [ListThemesController::class, 'editAction'])
            ->name('edit-themeAction');

    Route::get('/dashboard/list/classrooms', [ListClassroomsController::class, 'index'])
            ->name('list.classrooms');

    Route::get('/dashboard/list/classrooms/delete/{id}', [ListClassroomsController::class, 'delete'])
            ->name('delete-classroom');

    Route::get('/dashboard/list/classrooms/edit/{id}', [ListClassroomsController::class, 'edit'])
            ->name('edit-classroom');

    Route::post('/dashboard/list/classrooms/edit/{id}', [ListClassroomsController::class, 'editAction'])
            ->name('edit-classroomAction');

        Route::get('/dashboard/list/notifications', [ListNotificationsController::class, 'index'])
            ->name('list-notifications');

        Route::get('/dashboard/accept/{id}/{user_id}/{classroom_id}', [RegisteredClassroomUserController::class, 'store'])
            ->name('participate-classroom');

        Route::get('/dashboard/deny/{id}/{user_id}/{classroom_id}', [RegisteredClassroomUserController::class, 'deny'])
            ->name('deny-classroom');

 });

Route::get('/dashboard/list/studentsClassrooms', [ListClassroomsController::class, 'studentsClassrooms'])
        ->name('list-studentsClassrooms');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');



