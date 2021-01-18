$("#PBTrigger").click(() => $("#PBUp").trigger("click"));
$("#PBUp").change(() => {
  let value = $('#PBUp').val();
  if(value != ""){
    $("#PBSubmit").removeClass("d-none").addClass("d-block");
  }else{
    $("#PBSubmit").removeClass("d-block").addClass("d-none");
  }
});
