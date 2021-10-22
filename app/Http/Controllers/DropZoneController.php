<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DropZone;

class DropZoneController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = storage_path('app\public\uploads');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dropdown-demo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dropdown-demo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
			$dropzone           = new DropZone();
            $dropzone->title    = $request->title;
            $dropzone->body     = $request->body;
            $dropzone->save();

            $dropzoneId = $dropzone->id; // this give us the last inserted record id
		}
		catch (\Exception $e) {
			return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
		}
		return response()->json(['status'=>"success", 'dropzoneId'=>$dropzoneId]);
    }

    // We are submitting are image along with dropzoneId and with the help of dropzone id we are updateing our record
	public function storeImage(Request $request)
	{
        $dropzoneId = $request->dropzoneId;
        $names      = [];

        if($request->hasFile('file'))
        {
            foreach($request->file('file') as $img)
            {
                $fileName       = $img->getClientOriginalName();
                $destination    = $this->uploadPath;
                array_push($names, $fileName);

                $img->move($destination, $fileName);
            }

            $dropzone   = new DropZone();
            $images     = json_encode($names);

            $dropzone->where('id', $dropzoneId)->update(['images' => $images]);

            return response()->json(['status' => "success"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $dropzone = DropZone::where('slug', $slug)->firstOrFail();
        
        return view('dropdown-demo.show', compact('dropzone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dropdown-demo.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
