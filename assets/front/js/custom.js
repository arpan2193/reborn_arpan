
let originalurl = window.location.origin;

//////Reborn code start


//local
const main_url = window.location.origin +"/reborn";
//sis
//const main_url = window.location.origin +"/storage/dev/reborn";

// MODAL LOGIN FORM
      $(".mloginform").on('submit', function (e) {
      
      var $this = $(this).parent();
      e.preventDefault();
      $this.find('button.submit-btn').prop('disabled', true);
      $this.find('.alert-info').show();
      var authdata = $this.find('.mauthdata').val();
      $('.signin-form .alert-info p').html(authdata);
      $.ajax({
        method: "POST",
        url: $(this).prop('action'),
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          if ((data.errors)) {
            $this.find('.alert-success').hide();
            $this.find('.alert-info').hide();
            $this.find('.alert-danger').show();
            $this.find('.alert-danger ul').html('');
            for (var error in data.errors) {
              $('.signin-form .alert-danger p').html(data.errors[error]);
            }
          } else {
            $this.find('.alert-info').hide();
            $this.find('.alert-danger').hide();
            $this.find('.alert-success').show();
            $this.find('.alert-success p').html('Success !');
            if (data == 1) {
              location.reload();
            } else {
              window.location = data;
            }

          }
          $this.find('button.submit-btn').prop('disabled', false);
        }

      });

    });
    // MODAL LOGIN FORM ENDS
    


// MODAL REGISTER FORM (Arpan)
$(".mregisterform").on('submit', function (e) {
  e.preventDefault();
  // let mainurl = window.location.origin +"/reborn";
  var $this = $(this).parent();
  $this.find('button.submit-btn').prop('disabled', true);
  $this.find('.alert-info').show();
  var processdata = $this.find('.mprocessdata').val();
  $this.find('.alert-info p').html(processdata);
  $.ajax({
    method: "POST",
    url: $(this).prop('action'),
    data: new FormData(this),
    dataType: 'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == 1) {
        // console.log(mainurl);
        window.location = main_url + '/user/dashboard';
      }else if(data == 2){
        window.location = main_url + '/vendor/dashboard';
      }else {

        if ((data.errors)) {
          $this.find('.alert-success').hide();
          $this.find('.alert-info').hide();
          $this.find('.alert-danger').show();
          $this.find('.alert-danger ul').html('');
          for (var error in data.errors) {
            $this.find('.alert-danger p').html(data.errors[error]);
          }
          $this.find('button.submit-btn').prop('disabled', false);
        } else {
          $this.find('.alert-info').hide();
          $this.find('.alert-danger').hide();
          $this.find('.alert-success').show();
          $this.find('.alert-success p').html(data);
          $this.find('button.submit-btn').prop('disabled', false);
        }
      }

      $('.refresh_code').click();

    }
  });

});
// MODAL REGISTER FORM ENDS

// Nursery edit form submit (Arpan Ghosh\01.03.22\)

$(".meditform").on('submit', function (e) {
  e.preventDefault();
  // let mainurl = window.location.origin +"/reborn";
  var $this = $(this).parent();
  $this.find('button.submit-btn').prop('disabled', true);
  $this.find('.alert-info').show();
  var processdata = $this.find('.mprocessdata').val();
  $this.find('.alert-info p').html(processdata);
  $.ajax({
    method: "POST",
    url: $(this).prop('action'),
    data: new FormData(this),
    dataType: 'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == 1) {
        // console.log(mainurl);
        $(".show-modal").show().delay(1000).fadeOut(2000);
        setTimeout(function () {location.reload();},3500);
      }else {

        if ((data.errors)) {
          
          for (var error in data.errors) {
            $(".show-modal").show().find(".modal-body.pro-success h3").html(data.errors[error]);
            $(".show-modal").delay(1000).fadeOut(2000);
          }
        } else {
          $this.find('.alert-info').hide();
          $this.find('.alert-danger').hide();
          $this.find('.alert-success').show();
          $this.find('.alert-success p').html(data);
          $this.find('button.submit-btn').prop('disabled', false);
        }
      }

      $('.refresh_code').click();

    }
  });

});

/***
 * Arpan Ghosh
 * Date: 24/02/2022
 * Desc: captcha reload code
 * ****************** */
//**************************** GLOBAL CAPCHA****************************************

$('.refresh_code').on( "click", function() {
  $.get(main_url+'/contact/refresh_code', function(data, status){
      $('.codeimg1').attr("src",main_url+"/assets/images/capcha_code.png?time="+ Math.random());
  });
})

//**************************** GLOBAL CAPCHA ENDS****************************************

// ADD PRODUCT FORM (Arpan)
$(".addproductvendor").on('submit', function (e) {
  e.preventDefault();
  // let mainurl = window.location.origin +"/reborn";
  var $this = $(this).parent();
  $this.find('button.submit-btn').prop('disabled', true);
  $this.find('.alert-info').show();
  var processdata = $this.find('.mprocessdata').val();
  $this.find('.alert-info p').html(processdata);
  $.ajax({
    method: "POST",
    url: $(this).prop('action'),
    data: new FormData(this),
    dataType: 'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == 1) {
        alert("Your Product Succcesfully Added! Thank You.");
		    $('.selected-image .row').html('');
		    $('.addproductvendor').find('.removegal').val(0);
        location.reload();
        // console.log(mainurl);
        // window.location = mainurl + '/user/dashboard';
      }else if(data == 2){
        $(".show-modal").show().delay(1000).fadeOut(2000);
        setTimeout(()=>{window.location = main_url + '/vendor/edit-product';},3500);
      }else {

        if ((data.errors)) {
          $this.find('.alert-success').hide();
          $this.find('.alert-info').hide();
          $this.find('.alert-danger').show();
          $this.find('.alert-danger ul').html('');
          for (var error in data.errors) {
            $this.find('.alert-danger p').html(data.errors[error]);
          }
          $this.find('button.submit-btn').prop('disabled', false);
        } else {
          $this.find('.alert-info').hide();
          $this.find('.alert-danger').hide();
          $this.find('.alert-success').show();
          $this.find('.alert-success p').html(data);
          $this.find('button.submit-btn').prop('disabled', false);
        }
      }

      $('.refresh_code').click();

    }
  });

});

//ADD PRODUCT FORM END

//Changing sub-item-type toggle with item type (Arpan)
$("#itemtype1").on('change',function(){
  $(".hiderow1,.hiderow2,.hiderow3").hide();
  $(".hiderow4").show();
  $("input[name='sub_item_type']:checked").prop('checked',false);
  $("input[name='reborned']:checked").prop('checked',false);
});
$("#itemtype2").on('change',function(){
  // alert("ok");
  $(".hiderow1").show();
  $(".hiderow4").show();
  $(".hiderow2,.hiderow3").hide();
  $("input[name='sub_item_type']:checked").prop('checked',false);
  $("input[name='reborned']:checked").prop('checked',false);
});
$("#itemtype3").on('change',function(){
  $(".hiderow2").show();
  $(".hiderow1,.hiderow3").hide();
  $(".hiderow4").hide();
  $("input[name='sub_item_type']:checked").prop('checked',false);
  $("input[name='reborned']:checked").prop('checked',false);
});
$("#itemtype4").on('change',function(){
  $(".hiderow3").show();
  $(".hiderow2,.hiderow1").hide();
  $(".hiderow4").hide();
  $("input[name='sub_item_type']:checked").prop('checked',false);
  $("input[name='reborned']:checked").prop('checked',false);
});

//Changing sub-item-type toggle with item type end

//GALLERY PORTION OF ADD PRODUCT NURSERY (Arpan)
$("#uploadgallery").change(function (event) {
  var total_file = document.getElementById("uploadgallery").files.length;
  for (var i = 0; i < total_file; i++) {
    $('.selected-image .row').append('<div class="col-sm-3">' +
      '<div class="img gallery-img">' +
      '<span class="remove-img"><i class="fa fa-times"></i>' +
      '<input type="hidden" value="' + i + '">' +
      '</span>' +
      '<a href="' + URL.createObjectURL(event.target.files[i]) + '" target="_blank">' +
      '<img src="' + URL.createObjectURL(event.target.files[i]) + '" alt="gallery image" class="gallery_img">' +
      '</a>' +
      '</div>' +
      '</div> '
    );
    $('.addproductvendor').append('<input type="hidden" name="galval[]" id="galval' + i +
      '" class="removegal" value="' + i + '">')
  }

});

$('.remove-img').on('click', function () {
  var id = $(this).find('input[type=hidden]').val();
  $('#galval' + id).remove();
  $(this).parent().parent().remove();
});

// end of gallery option

//GALLERY PORTION OF ADD PRODUCT NURSERY end
$(".featrured-doll-btn").on('click',function(){
  var _totalCurrentResult=$(".featured-product-box").length;
 
    $.ajax({
      url:main_url+'/viewmore/featured-view-more',
      type:'get',
      dataType:'json',
      data:{
          skip:_totalCurrentResult
      },
      beforeSend:function(){
          $(".featrured-doll-btn").html('Loading...');
      },
      success:function(response){
        $(".featured-product").append(response);
        $(".featrured-doll-btn").html('<a href="javascript:void(0)">View More Featured Dolls</a>');
        var _totalCurrentResult=$(".featured-product-box").length;
        var _totalResult=parseInt($(".featrured-doll-btn").attr('featured-totalResult'));
        console.log(_totalCurrentResult);
        console.log(_totalResult);
        if(_totalCurrentResult==_totalResult){
            $(".featrured-doll-btn").remove();
        }
      }
  });
  
});

/***
 * Arpan Ghosh
 * Date: 24/02/2022
 * Desc: Remove image from gallery ajax
 * ****************** */

function delete_gallery_img(id,url,type){
  let token = $("input[name='_token']").val();
  if(id != 0 && id.length !=0){
    $.ajax({
      url : url,
      method : "POST",
      data : {
        _token : token,
        id : id,
        type: type
      },
      success: function(data){
        console.log(data);
      }
    })
  }
}

/****************
 * Name: Arpan Ghosh
 * Date:02/03/22
 * Description: Change password Ajax function 
 */
$('.chngpswrdform').on('submit',function(e){
  e.preventDefault();
  let route = $(this).prop('action');
  $.ajax({
    method : "POST",
    url:route,
    data: {
      _token : $(this).find('input[name="_token"]').val(),
      password : $(this).find('input[name="password"]').val(),
      password_confirmation : $(this).find('input[name="password_confirmation"]').val(),
    },
    dataType: 'JSON',
    beforeSend:()=>{
      $(this).find('button[type="submit"]').html('Processing..');
    },
    success:(data)=>{
      if(data == 1){
        $(this).find('.success-msg p').html("<i class='fa fa-check'></i> Password has been successfully updated!").delay(1000).fadeOut(2000);
        $(this).find('button[type="submit"]').html('Change');
        $(this).trigger('reset');
      }
    }
  });
});

 /**
 * Name:Neha Kumari
 * Date:20/01/2022
 * Description: View more Product Cateory
 */  
$(".category-doll-btns").on('click',function(){
  
  var slug = $(".category-doll-btns").attr('slugid');
  var _totalCurrentResult=$(".category-product-box").length;
    $.ajax({
      url:main_url+'/viewmore/categorydoll-view-more/'+slug,
      type:'get',
      dataType:'json',
      data:{
          skip:_totalCurrentResult
         },
      beforeSend:function(){
          $(".category-doll-btns").html('Loading...');
      },
      success:function(response){
        $(".category-product").append(response);
        $(".category-doll-btns").html('<a href="javascript:void(0)">View More Dolls</a>');
        var _totalCurrentResult=$(".category-product-box").length;
        var _totalResult=parseInt($(".category-doll-btns").attr('category-totalResult'));
        console.log(_totalCurrentResult);
        console.log(_totalResult);
        if(_totalCurrentResult==_totalResult){
            $(".category-doll-btns").remove();
        }
      }
  });  
});
/**
 * Name:Neha Kumari
 * Date:20/01/2022
 * Description: View more Product nurseries
 */ 
 $(".nursery-doll-btns").on('click',function(){
  
   var slugid = $(".nursery-doll-btns").attr('slugid');
  var _totalCurrentResult=$(".nursery-product-box").length;
    $.ajax({
      url:main_url+'/viewmore/nursery-view-more/',
      type:'get',
      dataType:'json',
      data:{
          skip:_totalCurrentResult,
          nid:slugid
         },
      beforeSend:function(){
          $(".nursery-doll-btns").html('Loading...');
      },
      success:function(response){
        $(".nursery-product").append(response);
        $(".nursery-doll-btns").html('<a href="javascript:void(0)">View More Dolls</a>');
        var _totalCurrentResult=$(".nursery-product-box").length;
        var _totalResult=parseInt($(".nursery-doll-btns").attr('nursery-totalResult'));
        console.log(_totalCurrentResult);
        console.log(_totalResult);
        if(_totalCurrentResult==_totalResult){
            $(".nursery-doll-btns").remove();
        }
      }
  });  
});
/**
 * Name:Neha Kumari
 * Date:20/01/2022
 * Description: View more Product Search
 */ 
 $(".search-doll-btns").on('click',function(){
  
   var inputsearch = $("#s").val();
  var _totalCurrentResult=$(".search-product-box").length;
    $.ajax({
      url:main_url+'/viewmore/search-view-more/'+inputsearch,
      type:'get',
      dataType:'json',
      data:{
          skip:_totalCurrentResult
         },
      beforeSend:function(){
          $(".search-doll-btns").html('Loading...');
      },
      success:function(response){
        $(".search-product").append(response);
        $(".search-doll-btns").html('<a href="javascript:void(0)">View More Dolls</a>');
        var _totalCurrentResult=$(".search-product-box").length;
        var _totalResult=parseInt($(".search-doll-btns").attr('search-totalResult'));
        console.log(_totalCurrentResult);
        console.log(_totalResult);
        if(_totalCurrentResult==_totalResult){
            $(".search-doll-btns").remove();
        }
      }
  });  
});

/**
 * Name:Neha Kumari
 * Date:20/01/2022
 * Description: User View more fevrt Product 
 *  */ 
 $(".fevrt-doll-btns").on('click',function(){
 var _totalCurrentResult=$(".fevrt-product-box").length;
   $.ajax({
     url:main_url+'/viewmore/fevrt-view-more/',
     type:'get',
     dataType:'json',
     data:{
         skip:_totalCurrentResult
        },
     beforeSend:function(){
         $(".fevrt-doll-btns").html('Loading...');
     },
     success:function(response){
       $(".fevrt-product").append(response);
       $(".fevrt-doll-btns").html('<a href="javascript:void(0)">View More Dolls</a>');
       var _totalCurrentResult=$(".fevrt-product-box").length;
       var _totalResult=parseInt($(".fevrt-doll-btns").attr('fevrt-totalResult'));
       console.log(_totalCurrentResult);
       console.log(_totalResult);
       if(_totalCurrentResult==_totalResult){
           $(".fevrt-doll-btns").remove();
       }
     }
 });  
});


/**
 * Name:Neha Kumari
 * Date:20/01/2022
 * Description: User View more Recent Product 
 *  */ 
 $(".recent-doll-btns").on('click',function(){
  var _totalCurrentResult=$(".recent-product-box").length;
    $.ajax({
      url:main_url+'/viewmore/recent-view-more/',
      type:'get',
      dataType:'json',
      data:{
          skip:_totalCurrentResult
         },
      beforeSend:function(){
          $(".recent-doll-btns").html('Loading...');
      },
      success:function(response){
        $(".recent-product").append(response);
        $(".recent-doll-btns").html('<a href="javascript:void(0)">View More Dolls</a>');
        var _totalCurrentResult=$(".recent-product-box").length;
        var _totalResult=parseInt($(".recent-doll-btns").attr('recent-totalResult'));
        console.log(_totalCurrentResult);
        console.log(_totalResult);
        if(_totalCurrentResult==_totalResult){
            $(".recent-doll-btns").remove();
        }
      }
  });  
 });

 /**
 * Name:Neha Kumari
 * Date:20/01/2022
 * Description: Add recent Product 
 */
  function addrecent(proid){
    $.ajax({   
      method: "get",
      url: main_url+'/recent/addrecent',
      data:{proid:proid},
      dataType: 'JSON',
      success: function (response) {
        $("#"+proid+"_recent_msg").html(response);
      }
     });
  }



/**
 * Name:Neha Kumari
 * Date:20/01/2022
 * Description: Add Fevret Product submit
 */
 function addfev(proid){
  $.ajax({   
    method: "get",
    url: main_url+'/favorite/addfavorite',
    data:{proid:proid},
    dataType: 'JSON',
    success: function (response) {
      $("#"+proid+"_favorite_msg").html(response);
    }
   });
}

/**
 * @developer:Neha Kumari
 * Date:27/01/2022
 * Description:user Follow vendor 
 */
 function followbtn(v_id){
  $.ajax({   
    method: "get",
    url: main_url+'/follow/user',
    data:{v_id:v_id},
    dataType: 'JSON',
    success: function (response) {
     $("#"+"follow_msg"+v_id).html(response);
    }
   });
  }

  /**
 * @developer:Neha Kumari
 * Date:27/01/2022
 * Description:user UnFollow vendor 
 */
 function unfollow(v_id){
  $.ajax({   
    method: "get",
    url: main_url+'/unfollow/vendor',
    data:{v_id:v_id},
    dataType: 'JSON',
    success: function (response) {
      alert(response);
      window.location.reload();
    }
   });
  }

  /**
 * @developer:Neha Kumari=========================================
 * Date:27/01/2022
 * Description:user Block Follow User 
 */
 function blockfollow(user_id){
  $.ajax({   
    method: "get",
    url: main_url+'/blockfollow/user',
    data:{user_id:user_id},
    dataType: 'JSON',
    success: function (response) {
      console.log(response);
      location.reload();
    }
   });
  }

  /**
 * Name:Neha Kumari
 * Date:20/01/2022
 * Description: User View more fevrt Product 
 *  */ 
 $(".followed-doll-btns").on('click',function(){
  var _totalCurrentResult=$(".followed-product-box").length;
    $.ajax({
      url:main_url+'/viewmore/followed-view-more',
      type:'get',
      dataType:'json',
      data:{
          skip:_totalCurrentResult
         },
      beforeSend:function(){
          $(".followed-doll-btns").html('Loading...');
      },
      success:function(response){
        $(".followed-product").append(response);
        $(".followed-doll-btns").html('<a href="javascript:void(0)">View More Dolls</a>');
        var _totalCurrentResult=$(".followed-product-box").length;
        var _totalResult=parseInt($(".followed-doll-btns").attr('followed-totalResult'));
        console.log(_totalCurrentResult);
        console.log(_totalResult);
        if(_totalCurrentResult==_totalResult){
            $(".followed-doll-btns").remove();
        }
      }
  });  
 });

 /**
  * ** Arpan
  * *** Change the order of products */
const changeorder = (newVal,prevVal,prodid) => {
  if(newVal.length != 0 || newVal != 0)
  {  
    $.ajax({
      url:$('#changeorderroute').val(),
      method: "POST",
      data:{
        _token:$("input[name='_token']").val(),
        newVal:newVal,
        prevVal:prevVal,
        prodid:prodid
      },
      success:function(data){
        if(data == 1){
          location.reload();
        }else{
          $(".show-modal").show().delay(3000).fadeOut(3000);
        }
      }
    });
  }else{
    alert("Please enter valid order no");
  }
}

//error message hide for order sequence
$(".show-modal button").on('click', function(){
  $(".show-modal").hide();
})


 /**
 * @developer:Neha Kumari=========================================
 * Date:16/02/2022
 * Description: Like vendor post
 */
  
  function bloglike(post_id) {
	$.ajax({   
	  method: "get",
	  url: main_url+'/bloglike/vendor',
	  data:{post_id:post_id},
	  dataType: 'JSON',
	  success: function (response) {
		console.log(response);
		location.reload();
	  }
	 });
	}

  function comentlike(comet_id) {
    $.ajax({   
      method: "get",
      url: main_url+'/commentlike/vendor',
      data:{comet_id:comet_id},
      dataType: 'JSON',
      success: function (response) {
      console.log(response);
      location.reload();
      }
     });
    }

  //neha-----Suscribe--
$(document).on('submit','#formSuscribe',function(e){
  e.preventDefault();
  var email = $('#emailid').val();
  $('button.news-btn').prop('disabled',true);
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
       type:"POST",
       url: $("#formSuscribe").attr('action'),
       data:{'email':email},       
       success:function(data)
       {
          if (data.error) {
                $('#errors').html(data.error);             
          }
          if (data.blankerror) {
            $('#errors').html(data.blankerror);       
          }
          if (data.success) {
            $('#msgs').html(data.success);  
            window.location.reload();      
          }
                    
          $('button.news-btn').prop('disabled',false);
         }
        });
    });

    // CONTACT US EMAIL SEND

     //neha-----Suscribe--
$(document).on('submit','#formcontactus',function(e){
  e.preventDefault();
  var name = $('#name').val();
  var email = $('#email').val();
  var country = $('#country').val();
  var phone = $('#phone').val();
  var msg = $('#contact_msg').val();
  alert("pls Add Email functionality");
  $('button.news-btn').prop('disabled',true);
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
       type:"POST",
       url: $("#formcontactus").attr('action'),
       data:{'name':name,'email':email,'country':country,'phone':phone,'msg':msg},       
       success:function(data)
       {
          if (data.error) {
                $('#error').html(data.error);             
          }
          if (data.blankerror) {
            $('#error').html(data.blankerror);       
          }
          if (data.success) {
            $('#msg').html(data.success);  
            window.location.reload();      
          }
                    
          $('button.news-btn').prop('disabled',false);
         }
        });
    });

    // NEHA VENDOR COMMENT DASHBOARD===========================================
    $(".post-view-btn").on('click',function(){
     var _totalCurrentResult=$(".forum-product-box").length;
    //  alert(_totalCurrentResult);
       $.ajax({
         url:main_url+'/viewmore/post-view-more',
         type:'get',
         dataType:'json',
         data:{
             skip:_totalCurrentResult
           
            },
         beforeSend:function(){
             $(".post-view-btn").html('Loading...');
         },
         success:function(response){
           $("#add_forum_ajax").append(response);
           $(".post-view-btn").html('View More Post');
           var totalCurrentResult=$(".forum-product-box").length;
           var totalResult=parseInt($(".post-view-btn").attr('forums-totalResult'));
           if(totalCurrentResult==totalResult){
               $(".post-view-btn").remove();
           }
         }
     });  
   });






