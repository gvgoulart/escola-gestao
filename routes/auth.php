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
            //Requisição do aluno para participar de uma aula
    Route::get('/dashboard/participate/{id}', [RegisteredClassroomController::class, 'requestParticipation'])
            ->name('request-classroom');
        //listar notificações de um aluno
    Route::get('/dashboard/list/notifications/student', [ListNotificationsController::class, 'indexStudent'])
            ->name('list-notifications-student');
        //exclui as notificações do aluno
    Route::get('/dashboard/list/notifications/markAsRead/{id}', [ListNotificationsController::class, 'markAsRead'])
            ->name('markAsRead');
        //lista as aulas que o aluno esta participando
        Route::get('/dashboard/list/studentsClassrooms', [ListClassroomsController::class, 'studentsClassrooms'])
        ->name('list-studentsClassrooms');
 });

 Route::group(['middleware' => ['auth', 'role:admin|professor']], function() {
        //------------------------------- CRUD Users   
        //registra usuário
    Route::get('/dashboard/register/user', [RegisteredUserController::class, 'create'])
                ->name('register-user');

    Route::post('/dashboard/register', [RegisteredUserController::class, 'store'])
                ->name('registerStore');

    Route::post('/dashboard/theme', [RegisteredThemeController::class, 'create'])
            ->name('register.store');
        //lista usuários
    Route::get('/dashboard/list/users', [ListUsersController::class, 'index'])
            ->name('list.users');
        //deleta usuários
    Route::get('/dashboard/list/users/delete/{id}', [ListUsersController::class, 'delete'])
            ->name('delete-user');
        //edita usuários
    Route::get('/dashboard/list/users/edit/{id}', [ListUsersController::class, 'edit'])
            ->name('edit-user');
       
    Route::post('/dashboard/list/users/edit/{id}', [ListUsersController::class, 'editAction'])
            ->name('edit-userAction');
        //---------------------------------- /CRUD Users       
        //------------------------------- CRUD Matérias    
        //registra matéria
    Route::get('/dashboard/theme', [RegisteredThemeController::class, 'index'])
        ->name('register-theme');
        //lista matérias
    Route::get('/dashboard/list/themes', [ListThemesController::class, 'index'])
            ->name('list.themes');
        //deleta matérias
    Route::get('/dashboard/list/themes/delete/{id}', [ListThemesController::class, 'delete'])
            ->name('delete-theme');
        //edita matérias
    Route::get('/dashboard/list/themes/edit/{id}', [ListThemesController::class, 'edit'])
            ->name('edit-theme');

    Route::post('/dashboard/list/themes/delete/{id}', [ListThemesController::class, 'editAction'])
            ->name('edit-themeAction');
        //------------------------------- /CRUD Matérias    
        //-------------------------------------- CRUD Aulas
        //registra aula
    Route::get('/dashboard/classroom', [RegisteredClassroomController::class, 'index'])
        ->name('classroom');

        Route::post('/dashboard/classroom/create', [RegisteredClassroomController::class, 'create'])
                ->name('classroom.create');
            //lista aulas
    Route::get('/dashboard/list/classrooms', [ListClassroomsController::class, 'index'])
            ->name('list.classrooms');
        //deleta aulas
    Route::get('/dashboard/list/classrooms/delete/{id}', [ListClassroomsController::class, 'delete'])
            ->name('delete-classroom');
        //edita aulas
    Route::get('/dashboard/list/classrooms/edit/{id}', [ListClassroomsController::class, 'edit'])
            ->name('edit-classroom');

    Route::post('/dashboard/list/classrooms/edit/{id}', [ListClassroomsController::class, 'editAction'])
            ->name('edit-classroomAction');
        //------------------------------- /CRUD Aulas

        //lista notificações
        Route::get('/dashboard/list/notifications', [ListNotificationsController::class, 'index'])
            ->name('list-notifications');
        //rota para o professor aceitar o aluno na aula dele
        Route::get('/dashboard/accept/{id}/{user_id}/{classroom_id}', [RegisteredClassroomUserController::class, 'store'])
            ->name('participate-classroom');
        //rota para o professor negar o aluno na aula dele
        Route::get('/dashboard/deny/{id}/{user_id}/{classroom_id}', [RegisteredClassroomUserController::class, 'deny'])
            ->name('deny-classroom');

 });


Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');



