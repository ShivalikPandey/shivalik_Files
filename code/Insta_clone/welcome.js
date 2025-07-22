//code for create icon........
var run=true;
let text=document.getElementById("maindiv");
let vari=text.innerHTML;
let create=document.getElementById("create");
create.addEventListener('click',presscreate);
function presscreate(){
   
        if(run==true){
            lastportion.innerHTML="<div style='display:none;'></div>";

            text.innerHTML="<div class='custom'><p style='text-align:center; border-bottom:1px solid black; padding-left:10vw; padding-right:10vw; padding-top:1vw; padding-bottom:1vw;'>Create a new post</p><form action='welcome.php' method='post' enctype='multipart/form-data'><img src='upload.jpg' id='post'><div><label>Select an image<input type='file' onchange='handleFileSelection(event)' name='postimage'></label></div><input type='submit' value='Upload' id='submit'><p>currently this is designed to upload only image</p></form></div>";
            run=false;
    } 
    else if (run==false) {
        text.innerHTML=vari;
        run=true;
    }

}
function handleFileSelection(event) {
    var output=document.getElementById('post');
   output.src=URL.createObjectURL(event.target.files[0]);
}



//code for messages icon
document.getElementById('messagesicon').addEventListener('click',messagesiconclick);
let runformessages=true;
function messagesiconclick(){
    if(run==true){
        lastportion.innerHTML="<div style='display:none;'></div>";

        text.innerHTML="";
        run=false;
} 
else if (run==false) {
    text.innerHTML=vari;
    run=true;
}

}


//code for profile button.....

/*
<label>Select an image<input type='file' onchange='handleFileSelection(event)' name='postimage'></label>
<form action='welcome.php' method='post'><div id='custom'><div class='custom-file-input'><label>Story<input type='file' onchange='handleFileSelection(event)' name='storyimage'></label></div><div class='file-name' id='selectedFileName'></div><div></form>  <form><div class='custom-file-input'><label>Post<input type='file' onchange='handleFileSelection(event)' name='postimage'></label></div><div class='file-name' id='selectedFileName'></div></div></div><input type='submit' palceholder='Upload' id='uploadbut'></form>

label{
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    display: inline-block;
    transition: background 0.3s ease;
    margin-top: 5vh;
    margin-bottom: 5vh;

}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom File Input</title>

    <style>
      
        input[type="file"] {
            display: none;
        }

       
        .custom-file-input {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

  
        .custom-file-input label {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
            transition: background 0.3s ease;
        }

        .custom-file-input label:hover {
            background-color: #2980b9;
        }

     
        .custom-file-input input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        
        .file-name {
            margin-top: 10px;
        }
    </style>
</head>
<body>

  
    <div class="custom-file-input">
        <label>
            Choose a File
            <input type="file" onchange="handleFileSelection(event)">
        </label>
    </div>

    
    <div class="file-name" id="selectedFileName"></div>

    <script>
      
        function handleFileSelection(event) {
            var selectedFile = event.target.files[0];
            var fileNameDisplay = document.getElementById('selectedFileName');
            fileNameDisplay.textContent = selectedFile ? selectedFile.name : '';
        } 

/*

 var output=document.getElementById('selectimg');
   output.src=URL.createObjectURL(event.target.files[0]);


<div style='height:7vh; width:6vw; padding-left:2vw; border-radius:20%; font-size:1.4vw; border:0.1px solid black;color:grey;'><p>post</p></div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom File Input</title>

    <style>
      
        input[type="file"] {
            display: none;
        }

       
        .custom-file-input {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

  
        .custom-file-input label {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
            transition: background 0.3s ease;
        }

        .custom-file-input label:hover {
            background-color: #2980b9;
        }

     
        .custom-file-input input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        
        .file-name {
            margin-top: 10px;
        }
    </style>
</head>
<body>

  
    <div class="custom-file-input">
        <label>
            Choose a File
            <input type="file" onchange="handleFileSelection(event)">
        </label>
    </div>

    
    <div class="file-name" id="selectedFileName"></div>

    <script>
      
        function handleFileSelection(event) {
            var selectedFile = event.target.files[0];
            var fileNameDisplay = document.getElementById('selectedFileName');
            fileNameDisplay.textContent = selectedFile ? selectedFile.name : '';

            function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image-preview');

    const file = input.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        preview.src = ''; // Clear the preview if no file is selected
        }
    }
        }*/