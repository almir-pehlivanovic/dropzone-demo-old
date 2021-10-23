@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row m-0 justify-content-center">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">Add Content</div>
                    <div class="card-body">
                        <form action="{{ route('dropzone.store') }}" name="demoform" id="demoform" method="POST" class="dropzone" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="dropzoneId" name="dropzoneId" id="dropzoneId" value="">
                            <label for="imagesContainer">Drag and drop images</label>
                            <div class="form-group bg-color" id="imagesContainer">
                                <div id="dropzoneDragArea" class="m-0 dz-message dropzoneDragArea">
                                    <div class="dropzone-previews"></div>
                                </div>
                                <p class="dropzone-inner-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span>Drop files here</span>
                                    <small>Max 10 files</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" aria-describedby="titleError" required>
                                <small id="titleError" class="validation-message d-none form-text text-danger">Enter required field.</small>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea class="form-control" name="body" id="body" rows="3" aria-describedby="bodyError" required></textarea>
                                <small id="bodyError" class="validation-message d-none form-text text-danger">Enter required field.</small>
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
// Dropzone.options.demoform = false;	
let token = $('input[name="_token"]').val();

$(function() {
    var myDropzone = new Dropzone("div#dropzoneDragArea", { 
        paramName: "file",
        url: "{{ url('/storeimgae') }}",
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
            var myDropzone = this;
            // form submission
            $("form[name='demoform']").submit(function(event) {
                event.preventDefault();

                URL = $("#demoform").attr('action');
                formData = $('#demoform').serialize();
                $.ajax({
                    type: 'POST',
                    url: URL,
                    data: formData,
                    success: function(result){
                        if(result.status == "success"){
                            // fetch the useid 
                            var dropzoneId = result.dropzoneId;
                            $("#dropzoneId").val(dropzoneId); // inseting userid into hidden input field

                            //process the queue
                            myDropzone.processQueue();

                            sessionStorage.setItem("message", "New item added Successfully! ");
                            window.location.href = "{{ route('dropzone.index') }}";
                        }else if(result.status =="fail"){
                            let requiredField = document.querySelectorAll('.validation-message');
                            requiredField.forEach(function(item){
                                item.classList.remove('d-none')
                            });
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
                //reset the form
                 $('#demoform')[0].reset();
                 //reset dropzone
                $('.dropzone-previews').empty();
                if(response.status == 'success'){
                    sessionStorage.setItem("message", "New item added Successfully! ");
                    window.location.href = "{{ route('dropzone.index') }}";
                }
            });
            
            this.on("errormultiple", function(files, response) {
            // Gets triggered when there was an error sending the files.
            // Maybe show form again, and notify user of error
            });
        }
	});
});
        
</script>
@endsection