<?php
	use App\Http\Controllers\UserController;

	Route::resource("users",UserController::class);
