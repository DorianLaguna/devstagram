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

myDropzone.on('success', function(file, response){
  document.querySelector('[name="imagen"]').value = response.imagen;
})
myDropzone.on('removeedFile', function(){
    
})