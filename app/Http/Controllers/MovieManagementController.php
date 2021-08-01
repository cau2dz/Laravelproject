<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Genre;
use App\Models\ViewMovie;
use App\Models\Writer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendmailSubscribe;
class MovieManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = ViewMovie::paginate(1);
        return view('admin.movies.index',compact('movies'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_movie = new Movie();
        $new_movie->name = $request->name;
        $file_name = $request->image;
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string','max:50'],
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been created fail!'
                    
                ));
            }
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName('image');
            $file->move(public_path('img/catalogs'), $file_name);
            Mail::send([], [], function ($message) {
                $UsersSubcribe = DB::table('users')->where('isSubcribe', '=', 1)->get();
                foreach ($UsersSubcribe as $user){
                    $message->to($user->email)
                    ->subject('FLEXGO')
                    ->setBody('<h1>Thanks for your subcribe!</h1><a href='."$new_movie->video_link".'> <img src="'
                        . $message->embed(public_path().'/img/catalogs/'.$file_name).'"></a> ', 'text/html');
                }
            });
        } else {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string','max:50', 'unique:movies'],
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been created fail!'
                    
                ));
            }
        }
        $new_movie->image = $file_name;
        $new_movie->genre_id = $request->genre_id;
        $new_movie->director_id = $request->director_id;
        $new_movie->writer_id = $request->writer_id;
        $new_movie->year = $request->year;
        $new_movie->desc = $request->desc;
        $new_movie->keyword = $request->keyword;
        $new_movie->video_link = $request->video_link;
        $new_movie->premiere = $request->premiere;
        $new_movie->quality = $request->quality;
        $new_movie->age_limit = $request->age_limit;
        $new_movie->country = $request->country;
        
        $new_movie->save();
       
        return response()->json(array(
            'success' => true,
            'message' => 'Record has been created successfully!'
            
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        if ($movie) {
            return response()->json(['data' => $movie, 200]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $file_name = $request->hidden_image;


        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been updated fail!'
                    
                ));
            }
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName('image');
            $file->move(public_path('img/catalogs'), $file_name);


        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been updated fail!'
                    
                ));
            }
        }

        $movie->name = $request->name;
        $movie->image = $file_name;
        $movie->genre_id = $request->genre_id;
        $movie->director_id = $request->director_id;
        $movie->writer_id = $request->writer_id;
        $movie->year = $request->year;
        $movie->desc = $request->desc;
        $movie->keyword = $request->keyword;
        $movie->video_link = $request->video_link;
        $movie->premiere = $request->premiere;
        $movie->quality = $request->quality;
        $movie->age_limit = $request->age_limit;
        $movie->country = $request->country;
        $movie->ishide = $request->onoffishide;
        $movie->updated_at = Date::now();
        $movie->update();
        return response()->json(array(
            'success' => true,
            'message' => 'Record has been updated successfully!'
            
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->delete();
            return response()->json(array(
                'success' => true,
                'message' => 'Record has been deleted successfully!'
                
            ));
        }
        else{
            return response()->json(array(
                'success' => false,
                'message' => 'Record has been deleted fail!'
                
            ));
        }
    }
}
