import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

let myDropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: 'Sube tu imagen',
    acceptedFiles: '.jpg, .png, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false
});
myDropzone.on("sending", (file, xhr,formData) => {
  console.log(file);
});

myDropzone.on('success', function(file, response){
  console.log(response);
})
myDropzone.on('error', function(){
    
})