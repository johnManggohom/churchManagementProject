<?php

use App\Http\Controllers\Admin\Activities\activitiesController;
use App\Http\Controllers\Admin\Admin_attendance_view\adminAttendanceViewController;
use App\Http\Controllers\Admin\Appointment\appointmentController;
use App\Http\Controllers\Admin\Appointment\followUpappointmentController;
use App\Http\Controllers\Admin\Attendance\attendanceController;
use App\Http\Controllers\Admin\Charts\chartsController;
use App\Http\Controllers\Admin\Events\adminEventController;
use App\Http\Controllers\Admin\eventsController;
use App\Http\Controllers\Admin\members\membersController;
use App\Http\Controllers\Admin\OrganizationLeader\leaderScheduleController;
use App\Http\Controllers\Admin\Organizations\organizationController;
use App\Http\Controllers\Admin\pagesController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\Roles\roleController;
use App\Http\Controllers\Admin\Schedule\scheduleController;
use App\Http\Controllers\Admin\Schedule\viewScheduleController;
use App\Http\Controllers\Admin\Services\servicesController;
use App\Http\Controllers\Admin\User\membersController as UserMembersController;
use App\Http\Controllers\Admin\User\userController;
use App\Http\Controllers\Client\clientAppointmentController;
use App\Http\Controllers\Client\clientController;
use App\Http\Controllers\Client\schedule\clientScheduleController;
use App\Http\Controllers\Client\user_profile\userProfile;
use App\Http\Controllers\Home\Events\eventsPageController;
use App\Http\Controllers\Home\homeController;
use App\Http\Controllers\OrganizationLeader\Appointment\leaderAppointmentController;
use App\Http\Controllers\OrganizationLeader\Home\organizationLeaderIndexController;
// use App\Http\Controllers\Admin\sidebarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\roleRouter;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [homeController::class, 'index'])->name('home.landing');
Route::get('/events', [eventsPageController::class, 'index'])->name('home.index');
Route::get('/events/show/{id}', [eventsPageController::class, 'show'])->name('home.show');
Route::get('/events/showActivity/{id}', [eventsPageController::class, 'showActivity'])->name('home.showActivity');



Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/dashboard', [roleRouter::class, 'index'])->name('dashboard');
});


Route::middleware(['auth', 'verified', 'role:admin|staff'])->name('admin.')->prefix('admin')->group(
    function(){
      
  Route::resource('/blog', PostController::class);

  // /////////////////////////////dashboard/////////////////////////////////////////
  Route::resource('/dashboard', chartsController::class);
// Route::get('/dashboard', [eventsController::class, 'index'] )->name('dashboard');
// Route::delete('/dashboard/{slug}',[pagesController::class,'destroy'])->name('dashboard.delete');
// Route::get('/events', [eventsController::class, 'index'] )->name('events');
// Route::get('/dashboard/create', [pagesController::class, 'create'] )->name('dashboard.create');
// Route::post('/dashboard/store', [pagesController::class, 'store'] )->name('dashboard.store');
// Route::get('/dashboard/{slug}', [pagesController::class, 'show'])->name('dashboard.show');
// Route::get('/dashboard/{slug}/edit', [pagesController::class, 'edit'])->name('dashboard.edit');
//  Route::post('/dashboard/updates/{slug}' , [pagesController::class, 'update'])->name('dashboard.updates.update');


Route::get('/adminEvents', [adminEventController::class, 'index'] )->name('adminEvents');
Route::get('/adminEvents/create', [adminEventController::class, 'create'] )->name('adminEvents.create');
Route::get('/adminEvents/edit/{id}', [adminEventController::class, 'edit'] )->name('adminEvents.edit');
Route::post('/adminEvents/update/{id}', [adminEventController::class, 'update'] )->name('adminEvents.update');
Route::post('/adminEvents/store', [adminEventController::class, 'store'] )->name('adminEvents.store');
  Route::delete('/adminEvents/delete/{event}',[adminEventController::class, 'destroy'])->name('adminEvents.delete');



////////////////////////////appointment//////////////////////////////////////////
Route::get('/appointment', [appointmentController::class, 'index'] )->name('appointment');
Route::get('/appointment/appointmentCalendar', [appointmentController::class, 'appointmentCalendar'] )->name('appointment.appointmentCalendar');
Route::get('/appointment/edit/{id}', [appointmentController::class, 'edit'] )->name('appointment.edit');

Route::post('appointments_ajax_update', 
        ['uses' => 'Admin\appointmentController@ajaxUpdate', 'as' => 'appointments.ajax_update']);

        ////////////////////////////appointment follow up//////////////////////////////////////////
        Route::get('/appointmentfollow/followup/{id}', [appointmentController::class, 'followup'] )->name('appointmentfollow.followup');
         Route::post('/appointmentfollow/store/{id}', [appointmentController::class, 'followStore'] )->name('appointmentfollow.store');

 Route::post('/appointment/{id}' , [appointmentController::class, 'update'])->name('appointment.update');
  Route::delete('/appointment/{appointment}',[appointmentController::class, 'destroy'])->name('appointment.delete');


        //////////////////////////////schedule//////////////////////////////////////////////
        Route::get('/schedule/{id}', [scheduleController::class, 'index'] )->name('schedule.index');
               Route::post('/schedule/store/{id}', [scheduleController::class, 'store'] )->name('schedule.store');


       ////////////////////////////// view schedule//////////////////////////////////////////////
      Route::get('/schedule-view/view', [viewScheduleController::class, 'index'] )->name('schedule-view.index');
      Route::get('/shedule-view/edit/{id}', [viewScheduleController::class, 'edit'] )->name('shedule-view.edit');
       Route::post('/schedule-view/{id}' , [viewScheduleController::class, 'update'])->name('schedule-view.update');
      Route::get('/shedule-view/appointmentCalendar', [viewScheduleController::class, 'appointmentCalendar'] )->name('schedule-view.appointmentCalendar');


//////////////////////// services ///////////////////////////////////////
Route::get('/services', [servicesController::class, 'index'] )->name('services');
Route::post('/services/store', [servicesController::class, 'store'] )->name('services.store');
Route::delete('/services/{service}',[servicesController::class, 'destroy'])->name('services.delete');

//////////////////////////////organization//////////////////////////////////////////////
Route::get('/organizations', [organizationController::class, 'index'] )->name('organizations');
Route::post('/organizations/store', [organizationController::class, 'store'] )->name('organizations.store');
Route::delete('/organizations/{organization}',[organizationController::class, 'destroy'])->name('organizations.delete');


//////////////////////////////activities//////////////////////////////////////////////
Route::get('/activities', [activitiesController::class, 'index'] )->name('activities');
Route::get('activities/attendance/{attendance}', [attendanceController::class, 'index'] )->name('activities.attendance');
Route::get('/activities/create', [activitiesController::class, 'create'] )->name('activities.create');
Route::post('/activities/store', [activitiesController::class, 'store'] )->name('activities.store');
Route::get('/activities/edit/{activity}', [activitiesController::class, 'edit'] )->name('activities.edit');
Route::post('/activities/update/{activity}', [activitiesController::class, 'update'] )->name('activities.update');
Route::delete('/activities/update/{activity}', [activitiesController::class, 'destroy'] )->name('activities.delete');


//////////////////////////////attendance//////////////////////////////////////////////

Route::post('/attendance/store', [attendanceController::class, 'store'] )->name('attendance.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//////////////////////////////view attendance//////////////////////////////////////////////

    Route::resource('/view_attendance', adminAttendanceViewController::class);

//////////////////////////////view members//////////////////////////////////////////////
Route::resource('/members', membersController::class);
            Route::post('/members/updateBlock/{user}',[membersController::class, 'updateBlock'])->name('members.updateBlock');
route::get('/members/{member}',[membersController::class, 'getDetails'])->name('members.getDetails');


//////////////////////////////organization leader//////////////////////////////////////////////
Route::resource('/organizationLeader', UserMembersController::class);
   Route::get('/organizationLeader/{user}', [UserMembersController::class, 'show'])->name('organizationLeader.show');
               Route::post('/organizationLeader/updateBlock/{user}',[userController::class, 'updateBlock'])->name('organizationLeader.updateBlock');
  Route::post('/organizationLeader/remove/{user}', [UserMembersController::class, 'removeLeader'])->name('organizationLeader.remove');
    Route::post('/organizationLeader/accept/{user}', [UserMembersController::class, 'acceptLeader'])->name('organizationLeader.accept');




//////////////////////////////roles//////////////////////////////////////////////
Route::resource('/roles', roleController::class);


//////////////////////////////user//////////////////////////////////////////////
Route::resource('/users', userController::class);
   Route::get('/users/{user}', [userController::class, 'show'])->name('user.show');
      Route::delete('/users/{user}',[userController::class, 'destroy'])->name('user.destroy');
            Route::post('/users/updateBlock/{user}',[userController::class, 'updateBlock'])->name('user.updateBlock');
         Route::post('/users/{user}/roles' , [userController::class, 'assignRole'])->name('user.roles');
           Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('user.roles.remove');

 

    }
               
            
);

Route::middleware(['auth', 'verified', 'role:user'])->name('client.')->prefix('client')->group(
    function(){
      

      Route::get('/dashboard', [clientController::class, 'index'] )->name('dashboard');
      //////////////////////////////user profile//////////////////////////////////////////////
Route::get('/user-profile', [userProfile::class, 'index'] )->name('user-profile');
Route::post('/user-profile/store', [userProfile::class, 'store'] )->name('user-profile.store');

      //////////////////////////////user profile//////////////////////////////////////////////
Route::get('/appointment', [clientAppointmentController::class, 'index'] )->name('appointment');
   Route::post('/appointment',[clientAppointmentController:: class, 'store'])->name('appointment.store');
      Route::post('/appointmentHome',[clientAppointmentController:: class, 'storeHome'])->name('appointment.storeHome');
   Route::get('/appointment/history', [clientAppointmentController::class, 'clientHistory'] )->name('appointment.history');
      Route::post('/appointment/update/{id}',[clientAppointmentController:: class, 'update'])->name('appointment.update');

                 Route::resource('/schedule', clientScheduleController::class );
                  Route::post('/schedule/update/{id}',[clientScheduleController:: class, 'update'])->name('schedule.update');
    }
               
            
);

Route::middleware(['auth', 'verified', 'role:organization leader'])->name('leader.')->prefix('leader')->group(
    function(){


      Route::resource('/dashboard', organizationLeaderIndexController::class);
      Route::get('/dashboard/show/pending', [organizationLeaderIndexController::class, 'pending'])->name('dashboard.show.pending');
      Route::get('/dashboard/show/accepted', [organizationLeaderIndexController::class, 'accepted'])->name('dashboard.show.accepted');
       Route::post('/dashboard/show/pendingAccept/{id}', [organizationLeaderIndexController::class, 'pendingAccept'])->name('dashboard.show.pendingAccept');
          Route::post('/dashboard/show/pendingRemove/{id}', [organizationLeaderIndexController::class, 'pendingRemove'])->name('dashboard.show.pendingRemove');
          Route::get('/appointment', [leaderAppointmentController::class, 'index'] )->name('appointment');
             Route::post('/appointment',[leaderAppointmentController:: class, 'store'])->name('appointment.store');
                   Route::post('/appointmentHome',[leaderAppointmentController:: class, 'storeHome'])->name('appointment.storeHome');
                      Route::get('/appointment/history', [leaderAppointmentController::class, 'clientHistory'] )->name('appointment.history');
             Route::resource('/schedule', leaderScheduleController::class );
                Route::post('/schedule/update/{id}',[leaderScheduleController:: class, 'update'])->name('schedule.update');
             

    }
               
            
);
require __DIR__.'/auth.php';
