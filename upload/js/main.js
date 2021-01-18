$("#triggerVideoUp").click(() => $("#videoUp").trigger("click"));
$("#videoUp").change(() => {
  let value = $('#videoUp').val();
  if(value != ""){
    $("#uploadText").html(value.replace(/C:\\fakepath\\/i, ''));
  }else{
    $("#uploadText").html('<span class="uploadLabel mr-2">Upload Video</span><i class="fas fa-upload"></i>');
  }
});
