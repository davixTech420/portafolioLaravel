<?php

use App\Http\Controllers\JobController; 
use App\Http\Controllers\WorkingSkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LenguageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;

use App\Models\User;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

$user = User::where('id',11)->first();
    return view('welcome',compact('user'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
route::get('/users', UserController::class.'@index')->name('users');
route::get('/term',ViewController::class.'@term')->name('term');
route::get('/resume',ViewController::class.'@resume')->name('resume');
route::get('/projects',ViewController::class.'@projects')->name('projects');
route::get('/contact',ViewController::class.'@contact')->name('contact');
route::get('/privacy',ViewController::class.'@privacy')->name('privacy');

/**
 * CRUD
 */


 /**
  * RUTAS DE USUARIOS O ADMINISTRADORES
  * @return \Illuminate\Http\Response   
  */
route::get('/users/create', UserController::class.'@create')->name('users.create');
route::post('users/store', UserController::class.'@store')->name('users.store');
route::delete('users/destroy/{id}', UserController::class.'@destroy')->name('users.destroy');
route::get('users/edit/{id}', UserController::class.'@edit')->name('users.edit');
route::get('users/index', UserController::class.'@index')->name('users.index');
route::match(['post','patch'],'users/update/{id}', UserController::class.'@update')->name('users.update');
/**
 * FINISH
 */



/**
 * 
 * RUTAS DE LENGUAJES DE PROGRAMACION VISTA Y FUNCIONALIDAD
 * 
 */
route::get('lenguages',LenguageController::class.'@index')->name('lenguages' | 'lenguages.index');

route::get('lenguages/create',LenguageController::class.'@create')->name('lenguages.create');
route::post('lenguages/store',LenguageController::class.'@store')->name('lenguages.store');
route::delete('lenguages/destroy/{id}',LenguageController::class.'@destroy')->name('lenguages.destroy');
route::get('lenguages/edit/{id}',LenguageController::class.'@edit')->name('lenguages.edit');
route::match(['post','patch'],'lenguages/update/{id}',LenguageController::class.'@update')->name('lenguages.update');
/**
 * FINISH
 */


 /***
  * RUTAS DE EXPERIENCIA LABORAL
  *
  */
route::get('experience',ExperienceController::class.'@index')->name('experience' | 'experiences.index');
route::get('experiences/create',ExperienceController::class.'@create')->name('experiences.create');
route::post('experiences/store',ExperienceController::class.'@store')->name('experiences.store');
route::delete('experiences/destroy/{id}',ExperienceController::class.'@destroy')->name('experiences.destroy');
route::get('experiences/edit/{id}',ExperienceController::class.'@edit')->name('experiences.edit');
route::match(['post','patch'],'experiences/update/{id}',ExperienceController::class.'@update')->name('experiences.update');

  /**
   * FINISH
   */

   /***
    * 
    * RUTAS DE EDUCACION
    *
    */

    route::get('education',EducationController::class.'@index')->name('education' | 'education.index');
    route::get('education/create',EducationController::class.'@create')->name('education.create');
    route::post('education/store',EducationController::class.'@store')->name('education.store');
    route::delete('education/destroy/{id}',EducationController::class.'@destroy')->name('education.destroy');
    route::get('education/edit/{id}',EducationController::class.'@edit')->name('education.edit');
    route::match(['post','patch'],'education/update/{id}',EducationController::class.'@update')->name('education.update');
    /**
     * FINISH
     */


     /*
     *
     * *RUTAS DE WORKING SKILLS
     * *
    *
      */
    
route::get('workingSkills',WorkingSkillController::class.'@index')->name('working-skills.index');
route::get('working-skills/create',WorkingSkillController::class.'@create')->name('working-skills.create');
route::post('working-skills/store',WorkingSkillController::class.'@store')->name('working-skills.store');
route::delete('working-skills/destroy/{id}',WorkingSkillController::class.'@destroy')->name('working-skills.destroy');
route::get('working-skills/edit/{id}',WorkingSkillController::class.'@edit')->name('working-skills.edit');
route::match(['post','patch'],'working-skills/update/{id}',WorkingSkillController::class.'@update')->name('working-skills.update');
      /**
       * FINISH
       */

       /**
        * HOJA DE VIDA
        */
      
        /**
       * FINISH
       */







       /***
        * RUTAS DE LOS PROYECTOS

***
        **
        */
 route::get('jobs', JobController::class.'@index')->name('jobs' | 'jobs.index');  

 route::get('jobs.create', JobController::class.'@create')->name('jobs.create');
 route::delete('jobs.destroy/{id}', JobController::class.'@destroy')->name('jobs.destroy');
 route::get('jobs.edit/{id}', JobController::class.'@edit')->name('jobs.edit');
 
 route::post('jobs.store', JobController::class.'@store')->name('jobs.store');
 route::match(['post','patch'],'jobs.udate/{id}', JobController::class.'@update')->name('jobs.update');
        /***
         * FINISH
         */


/***
 * 
 * 
 * 
 * RUTAS DE LOS MENSAJES
 * 
 */
route::get('messages', MessageController::class.'@index')->name('messages' | 'messages.index');
route::post('messages.store', MessageController::class.'@store')->name('messages.store');
route::get('messages.create', MessageController::class.'@create')->name('messages.create');
route::delete('messages.destroy/{id}', MessageController::class.'@destroy')->name('messages.destroy');
route::get('messages.edit', MessageController::class.'@edit')->name('messages.edit');
route::match(['post','patch'],'messages.update/{id}', MessageController::class.'@update')->name('messages.update');
route::post('/sendMessa', MessageController::class.'@send')->name('sendMessa');
 /**
  * FINISH
  */
 Route::fallback(function () {
    return redirect('/');
});