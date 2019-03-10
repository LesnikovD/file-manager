function createFolder(){
  var folderName = document.getElementById("folder-name").value;
  $.ajax({
   method: 'GET',
   url: 'createFolder.php',
   data: {
    "folderName":folderName
  },
  success: function() {
    location.reload();
  },
  error:function(){
   alert("Директория не создана");
   location.reload();
 } 
});
}

function deleteFolder(item){
  $.ajax({
   method:'GET',
   url:'deleteFolder.php',
   data:{
    "folder":item
  },
  success: function(msg){
    location.reload();
  }
});
}

function upload(){
  var file_data = $('#sortpicture').prop('files')[0];
  var form_data = new FormData();

  form_data.append('file', file_data);
  $.ajax({
    url: 'upload.php',
    dataType: 'text',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: 'post',
    success: function(php_script_response){
      location.reload();
    }
  });
}
