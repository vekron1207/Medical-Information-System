$.fn.fragmentLoader=function(){
    var elem=this;
    $(elem).find('ul').children('li').on('click',function(){
        var url=$(this).find('a').attr('href');
        window.history.pushState('module', 'Title', url);
        return false;

    });
    $(elem).find('ul').children('li').on('click',function(){
        $(elem).find('ul').children('li').removeClass('active');
        $(this).addClass('active');
        var requester=$(this).closest('ul').data('requester');
        var fragment=$(this).closest('ul').data('fragment');
        var module=fragment+'='+$(this).data(fragment);
        $('#'+fragment).ajaxReload("get",requester,module);
    });
  }
$.fn.ajaxReload= function(urltype,url,data){
    var elem=this;
    $.ajax({
        url: "php-back/"+urltype+url+".php",
        type: "POST",
        data: data,
        success: function(response){ 
            $(elem).html(response);
            //handle returned arrayList
        },
        error: function(e){  
            alert("Server error");
            //handle error
        } 
    });
}
$.fn.zform=function(){
    $(this).validator();
    $(this).on('submit',function(e) {
        var formid=$(this).attr('id');//get this form's id
        e.preventDefault(); // avoid to execute the actual submit of the form.
	    setTimeout(function(){ //wait 50ms to allow validator to execute
            // var data1=$("#"+formid).serialize()+"&flag"+formid+"=Y";
	        // alert($("#"+formid).find('.has-error').length);//No of errors in the form
            if($("#"+formid).find('.has-error').length==0) 
            {
                var data= $("#"+formid).serialize();
                $('#response').ajaxReload("submit",formid,data);
            }
        }, 50);
    });
}
$.fn.zoption= function(){
    var elem=this;
    $(elem).on('click',function(){
        var target=$(elem).data('target');
        $(target).toggle();
        
        // var fragment=$(this).closest('ul').data('fragment');
        // var module=fragment+'='+$(this).data(fragment);
        // $('#'+fragment).ajaxReload("get",fragment,module);
    });
}
$(window).on('click',function(event){
    if($(event.target).closest(".z-optionbtn").length==0)
    {
      $(".z-optionbox").hide();
    }
  });