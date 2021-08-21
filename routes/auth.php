<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ListClassroomsController;
use App\Http\Controllers\ListNotificationsController;
use App\Http\Controllers\ListThemesController;
use App\Http\Controllers\ListUsersController;
use App\Http\Controllers\RegisteredClassroomController;
use App\Http\Controllers\RegisteredClassroomUserController;
use App\Http\Controllers\RegisteredThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/register', [RegisteredUserController::class, 'create'])
                ->middleware('auth')
                ->name('register-user');

Route::post('/dashboard/register', [RegisteredUserController::class, 'store'])
                ->middleware('auth')
                ->name('registerStore');

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

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');


Route::get('/dashboard/classroom', [RegisteredClassroomController::class, 'index'])
                ->middleware('auth')
                ->name('classroom');

Route::post('/dashboard/classroom/create', [RegisteredClassroomController::class, 'create'])
                ->middleware('auth')
                ->name('classroom.create');

Route::get('/dashboard/theme', [RegisteredThemeController::class, 'index'])
            ->middleware('auth')
            ->name('register-theme');

Route::post('/dashboard/theme', [RegisteredThemeController::class, 'create'])
            ->middleware('auth')
            ->name('register.store');

Route::get('/dashboard/list/users', [ListUsersController::class, 'index'])
            ->middleware('auth')
            ->name('list.users');

Route::get('/dashboard/list/themes', [ListThemesController::class, 'index'])
            ->middleware('auth')
            ->name('list.themes');

Route::get('/dashboard/list/classrooms', [ListClassroomsController::class, 'index'])
            ->middleware('auth')
            ->name('list.classrooms');

Route::get('/dashboard/participate/{id}', [RegisteredClassroomController::class, 'requestParticipation'])
            ->middleware('auth')
            ->name('request-classroom');

Route::get('/dashboard/list/notifications', [ListNotificationsController::class, 'index'])
            ->middleware('auth')
            ->name('list-notifications');

Route::get('/dashboard/list/notifications/student', [ListNotificationsController::class, 'indexStudent'])
            ->middleware('auth')
            ->name('list-notifications-student');

Route::get('/dashboard/list/notifications/markAsRead/{id}', [ListNotificationsController::class, 'markAsRead'])
            ->middleware('auth')
            ->name('markAsRead');

Route::get('/dashboard/accept/{id}{user_id}{classroom_id}', [RegisteredClassroomUserController::class, 'store'])
            ->middleware('auth')
            ->name('participate-classroom');

Route::get('/dashboard/deny/{id}{user_id}{classroom_id}', [RegisteredClassroomUserController::class, 'deny'])
            ->middleware('auth')
            ->name('deny-classroom');

