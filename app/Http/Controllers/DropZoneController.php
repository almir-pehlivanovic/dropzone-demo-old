<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DropZone;

class DropZoneController extends Controller
{
    protected $uploadPath, $paginationNum = 10;

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
        $dropzoneRecords = DropZone::orderBy('created_at', 'desc')->paginate($this->paginationNum);

        return view('dropdown-demo.index', compact('dropzoneRecords'));
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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $dropzone = DropZone::where('slug', $slug)->firstOrFail();

        return view('dropdown-demo.edit',compact('dropzone'));
    }

    //Display all images form database to dropzone container
    public function updateImage(Request $request)
    {
        $targetDir  = $this->uploadPath . '\\';
        $fileList   = [];
        $dropzoneId = $request->dropzoneId;
 
        $record = DropZone::where('id', $dropzoneId)->firstOrFail();

        //Check if there is a images for specific record
        if($record->images != null){
            foreach(json_decode($record->images) as $image)
            {
                $filePath = $targetDir . $image;
                $size = filesize($filePath);
                $fileList[] = ['name' => $image, 'size' => $size, 'path' => asset(imagePath($image)) ];
            }
        }

        return json_encode($fileList);
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
        $dropzone       = DropZone::where('id', $id)->firstOrFail();
        $imagesArray    = json_decode($request->images);
        $imageList      = [];

        if($request->images != null){
            foreach($imagesArray as $image){  
                array_push($imageList, $image);
            }
            $images = json_encode($imageList);
        }else{
            $images = null;
        }

        try {
            $dropzone->slug = null;
            $dropzone->update([
                'title'     => $request->title,
                'body'      => $request->body,
                'images'    => $images
            ]);    
        }
        catch (\Exception $e) {
			return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
		}

        return response()->json(['status' => "success", "slug" => $dropzone->slug, "method" => "edit"]);
    }

    public function storeUpdateImage(Request $request)
    {
        $dropzoneId = $request->dropzoneId;
        $records    = DropZone::where('id', $dropzoneId)->firstOrFail();
        $names      = [];

        //Push array withe existing images
        if($records->images)
        {
            foreach(json_decode($records->images, true) as $image)
            {
                array_push($names, $image);
            }
        }

        if($request->hasFile('file'))
        {
            foreach($request->file('file') as $img)
            {
                $fileName       = $img->getClientOriginalName();
                $destination    = $this->uploadPath;
                array_push($names, $fileName);

                $img->move($destination, $fileName);
            }

            $images     = json_encode($names);

            DropZone::where('id', $dropzoneId)->update(['images' => $images]);

            return response()->json(['status' => "success", "slug" => $dropzone->slug, "method" => "edit"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DropZone::findOrFail($id)->delete();

        return redirect('/dropzone')->with('message', "Record deleted succesfully!");
        
    }
}
