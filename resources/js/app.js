require('./bootstrap');

$('#image').on('change', function(){
    var files = $(this)[0].files; 
    name = '';
    for(var i = 0; i < files.length; i++){
        name += '\"' + files[i].name + '\"' + (i != files.length-1 ? ", " : ""); 
    }
    $(".custom-file-label").html(name);
})
$('#image-reset').on('click', function(){
    var elem = document.getElementById('image');
    elem.value = '';
    elem.dispatchEvent(new Event('change'));
})