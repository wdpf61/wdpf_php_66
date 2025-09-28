<?php
	use App\Http\Controllers\ProductController;

	Route::resource("products",ProductController::class);
