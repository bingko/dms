
$('input[name^=reel_weight]').on('input', function() {
  var total = 0;
    $('input[name^=reel_weight]').each(function() {
        total += (parseInt($(this).val()) || 0);
    });
    $('input[name=total_input]').val(total);
    var input=parseFloat($('input[name=total_input]').val())||0;
    var output=parseFloat($('input[name=output]').val())||0;
    $('input[name=total_reject]').val(input-output);
    setReject();
});

$('#sortdetail input').on('keyup',function(){
  var sum_s=0;
  var sum_ns=0;
  var sum_nc=0;
    $('#sortdetail input').each(function(){
       var sortType= $(this).closest('td').prev().find('select').val();
        if(sortType==1){
          sum_s+=parseInt($(this).val())||0;
        }
        else if(sortType==2){
          sum_ns+=parseInt($(this).val())||0;
        }
        else if(sortType==3){
          sum_nc+=parseInt($(this).val())||0;
        }
    });
    $('input[name=sort]').val(sum_s);
    $('input[name=nosort]').val(sum_ns);
    $('input[name=nc]').val(sum_nc);
  });

$('#sortdetail select').on('change',function(){
  var sum_s=0;
  var sum_ns=0;
  var sum_nc=0;
    $('#sortdetail input').each(function(){
       var sortType= $(this).closest('td').prev().find('select').val();
        if(sortType==1){
          sum_s+=parseInt($(this).val())||0;
        }
        else if(sortType==2){
          sum_ns+=parseInt($(this).val())||0;
        }
        else if(sortType==3){
          sum_nc+=parseInt($(this).val())||0;
        }
    });
    $('input[name=sort]').val(sum_s);
    $('input[name=nosort]').val(sum_ns);
    $('input[name=nc]').val(sum_nc);
  });

  var getPalletOut=function(){
    var shift_a=0;
    var shift_b=0;
    var shift_c=0;
    $('input[name^="roll_a[]"],input[name^="roll_b[]"],input[name^="roll_c[]"]').each(function(){
      if($(this).attr('name')=="roll_a[]" && $(this).val()!=""){
        shift_a=1
      }
      else if($(this).attr('name')=="roll_b[]" && $(this).val()!=""){
          shift_b=1
      }    
      else if($(this).attr('name')=="roll_c[]" && $(this).val()!=""){
          shift_c=1
      }
    });
    return shift_a+shift_b+shift_c;
  }

var setReject=function(){
  var total_reject=$('input[name=total_reject]').val();
  var trim_reject=$('input[name=trim_reject').val();
  $('input[name=reject]').val(total_reject-trim_reject);

}
var setTotalReject=function(){
    var input=parseFloat($('input[name=total_input]').val())||0;
    var output=parseFloat($('input[name=output]').val())||0;
    $('input[name=total_reject]').val(input-output);

}
var setOutput = function(){
  var unit = $('select[name=unit]').val();
  var gram=$('select[name=gram]').val()||0;
  var width=$('input[name=size_width]').val()||0;
  var height=$('input[name=size_height]').val()||0;
    if(unit==1){
       width=width/25.4;
      height = height/25.4;
    }
  var ream=((gram*width*height)/3100)*$('input[name=ream]').val();
  $('input[name=output]').val(ream);
}
var setTrimReject = function(){
    var roll_width= parseInt($('input[name=width]').val())||0;
    var roll_size_width= parseInt($('input[name=size_width]').val())||0;
    var roll_size_height = parseInt($('input[name=size_height]').val())||0;
      var input = parseInt($('input[name=total_input]').val())||0;
      var trim=parseInt((roll_width-(roll_width*getPalletOut())*input)/roll_width)||0;
      $('input[name=trim_reject]').val(trim);
}

$('input,select').bind('change keyup input',function(){
  setOutput();
  setTotalReject();
  setTrimReject();
  setReject();

})