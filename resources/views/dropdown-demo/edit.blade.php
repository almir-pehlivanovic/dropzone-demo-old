@extends('layouts.app')
@section('style')
<style>
    .dz-image img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
  
</style>
@endsection
@section('content')
    <div class="container'fluid">
        <div class="row m-0 d-none" id="session-message">
            <div class="col-12 p-0 mt-3">
                <div class="alert alert-info d-flex justify-content-between">
                    <p class="mb-0" id="sesion-text"></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row m-0 justify-content-center">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">Edit Content</div>
                    <div class="card-body">
                    <form action="{{ route('dropzone.update', $dropzone->id ) }}" name="demoform" id="demoform" method="PUT" class="dropzone" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="dropzoneId" name="dropzoneId" id="dropzoneId" value="{{ $dropzone->id }}">
                            <label for="imagesContainer">Drag and drop images</label>
                            <div class="form-group bg-color" id="imagesContainer">
                                <div id="dropzoneDragArea" class="dz-message m-0 dropzoneDragArea">
                                    <div class="dropzone-previews"></div>
                                </div>
                                <p class="dropzone-inner-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span>Drop files here</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $dropzone->title }}" aria-describedby="titleError">
                                <small id="titleError" class="form-text text-danger">Enter valid title.</small>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea class="form-control" name="body" id="body" rows="3" aria-describedby="bodyError">{{ $dropzone->body }}</textarea>
                                <small id="bodyError" class="form-text text-danger">Enter valid body.</small>
                            </div>
                            <a href="#" onclick="history.back()" type="button" class="btn btn-primary d-inline">Back</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('js/dropzone.js') }}"></script>

<script>
    Dropzone.autoDiscover = false;

    let token = $('input[name="_token"]').val();
    let imagesArray = [];

    $("div#dropzoneDragArea").dropzone({
        paramName: "file",
        url: "{{ url('/storeupdatedimage') }}",
        previewsContainer: 'div.dropzone-previews',
        addRemoveLinks: true,
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 10,
        maxFiles: 3,
        params: {
            _token: token
        },

        init: function() { 
            myDropzone  = this;
            URL         = "{{ route('updateimage') }}";
            formData    = $('#demoform').serialize();

            //Get specific images request and append thumbnails in dropzone
            $.ajax({
                type: 'POST',
                url: URL,
                data: formData,
                success: function(response){
                    $.each(JSON.parse(response), function(key,value) {
                        var mockFile = { name: value.name, size: value.size};
                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, value.path);
                        myDropzone.emit("complete", mockFile);
            
                    });
                }
            });

            //Submitt update form 
            $("form[name='demoform']").submit(function(event) {
                event.preventDefault();
                URL      = $("#demoform").attr('action');
                formData = $('#demoform').serializeArray();
                
                // Get all images from dropzone
                let dropZoneImages  = document.querySelectorAll('.dz-preview.dz-complete .dz-image img');
                let singleImage     = null;
                
                //check if there is a images
                if(dropZoneImages.length > 0){
                    dropZoneImages.forEach(function(item){
                        imagesArray.push(item.getAttribute("alt"));
                    });

                    imagesArray = JSON.stringify(imagesArray);
                    formData.push({ name: "images", value: imagesArray });

                }else{
                    formData.push({ name: "images", value: null });
                }

                $.param(formData);
                //sed request for updating fields in database
                $.ajax({
                    type: 'PUT',
                    url: URL,
                    data: formData,
                    success: function(result){
                        console.log(result);
                        if(result.status == "success"){
                            //process the queue
                            myDropzone.processQueue();

                            sessionStorage.setItem("message", "Record updated Successfully! ");
                            window.location.href = "/dropzone/" + result.slug + "/" + result.method;
                        }else{
                            console.log("error");
                        }
                    }
                });
            });

              // Gets triggered when we submit the image.
              this.on('sending', function(file, xhr, formData){
                // fetch the user id from hidden input field and send that userid with our image
                
            });
            
            this.on("success", function (file, response) {
               
            });
            this.on("queuecomplete", function () {
            
            });
            
            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function(files, xhr, formData) {
            // Gets triggered when the form is actually being sent.
            // Hide the success button or the complete form.
            let dropzoneId = document.getElementById('dropzoneId').value;
            formData.append('dropzoneId', dropzoneId);
               
            });
            
            this.on("successmultiple", function(files, response) {
            // Gets triggered when the files have successfully been sent.
            // Redirect user or notify of success.
                console.log('After image upload', response);
                if(response.status == 'success'){
                    sessionStorage.setItem("message", "Record updated Successfully! ");
                    window.location.href = "/dropzone/" + result.slug + "/" + result.method;
                }
            });
            
            this.on("errormultiple", function(files, response) {
            // Gets triggered when there was an error sending the files.
            // Maybe show form again, and notify user of error
            });

        }
  });

</script>
@endsection