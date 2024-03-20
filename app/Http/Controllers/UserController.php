<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper\LoggerController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        (new LoggerController)->accessing_warning('get User List');

        $users = User::where('type', 0)->get();
        $message = $users->count() > 0 ? 'Users found' : 'No user found';

        $categories = Category::where('id', '<=', 4)->pluck('id')->toArray();

        # manipulate each user
        # adding the filled_ia & quest completeness
        foreach ($users as $user) {

            # query to get the information about 
            # is the user has filled in the initial assessment form?
            $filled = User::where('id', $user->id);
            
            $i = 1;
            while ($i <= count($categories)) {

                $filled = $filled->whereHas('answers.question', function ($query) use ($i) {

                    $query->where('category_id', $i);

                });

            $i++;
            }

            $filled = $filled->exists();
            
            $user['filled_ia'] = $filled ? 1 : 0;

            
            # query to get quest completeness status
            //! using the functions that made by fauzan


        }

        # check if the user has filled the initial assessment
        $filled_ia = '';

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $users
        ]);
    }
}
