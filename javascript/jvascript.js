jQuery(document).ready(function () {
    console.log("ready");

   /* jQuery(".new_post .article").each(function (i, val) {

        $(this).addClass("my_class" + i);
        $(this).find(".article__info").addClass("my_class_find"+i);
        $(this).find (".article__info__preview").append("<p>"+(i+1)+"</p>");
        });




    jQuery(".block.new_text").after( $(".block.new_text").clone());


    jQuery(".content__left .block").each(function(){


      var number =  $(this).find("article").length;
      console.log(number);
        $(this).children("a").append(" " +number);

    });*/


    /*click*/
  /*  var j = 1;
    jQuery("#submit_div").click(function(){
        console.log("click");
        $(this).after('<div class="form__control_my">button'+j+'</div>');
        j++;
    });

   /* jQuery(".form__control_my").click(function(){
        var name = $(this).text();
        console.log(name);*/




  /* jQuery("body").on( "click", ".form__control_my",function(){
        var name =  jQuery(this).text();
        console.log(name);
        jQuery("#text_div p").text(name);
    });*/


    var object_input = {};
    var val_input = "";
    var name_inp = "";
    var page_id = "";



    jQuery("body").on( "click", ".form__control_my",function(){

        console.log('click1');
        jQuery('#comment input[type="text"], #comment textarea').each(function () {
            val_input = jQuery(this).val();
            name_inp = jQuery(this).attr("name");
            object_input[name_inp] = val_input;

        });

        page_id = jQuery('#comment').attr('id_page');

        console.log(page_id);
        console.log( object_input);



        jQuery.ajax({
            url : '/include/ajaxcontrol.php',
            type : 'POST',
            data : {object_input_aj: object_input,  page_id_aj: page_id },

            success: function(data, status, xhr){
                jQuery('#submit_div p').html(data);
            },
            error: function (jqXhr, textStatus, errorMessage){
                jQuery('#submit_div p').append('Error' + errorMessage);
            }
        });



    });





    var tab = $('#tabs .tabs-items > div');
    tab.hide().filter(':first').show();

    // Клики по вкладкам.
    $('#tabs .tabs-nav a').click(function(){
        tab.hide();
        tab.filter(this.hash).show();
        $('#tabs .tabs-nav a').removeClass('active');
        $(this).addClass('active');
        return false;
    }).filter(':first').click();

    // Клики по якорным ссылкам.
    $('.tabs-target').click(function(){
        $('#tabs .tabs-nav a[href=' + $(this).data('id')+ ']').click();
    });






    var id_del = " ";

    jQuery("body").on( "click", ".post_delete",function(){
       id_del = jQuery(this).attr('id_delete');

        console.log(id_del);


        var del=confirm("Видалити пост?");
        if (del==true){

            jQuery.ajax({
                url : '/include/ajaxcontrol.php',
                type : 'POST',
                data : {id_del_ajax: id_del },

                success: function(data, status, xhr){
                    // jQuery('#submit_div p').html(data);
                   // alert("post delete");
                    location.reload();
                },
                error: function (jqXhr, textStatus, errorMessage){
                    //   jQuery('#submit_div p').append('Error' + errorMessage);
                }
            });



        } else {
            alert("Пост НЕ видалено");
        }




    });




    jQuery("body").on( "click", ".checks",function(){
        //console.log("chek");
        var  chek = 0;
        //console.log(chek);
        if($(this).is(":checked")){
            chek = 1;
           //console.log("on");
        }
        //console.log(chek);

       var id_on = jQuery(this).attr('id_on_off');
        console.log(id_on);


        jQuery.ajax({
            url : '/include/ajaxcontrol.php',
            type : 'POST',
            data : {chek_ajax: chek,  id_on_ajax: id_on },

            success: function(data, status, xhr){
               // jQuery('#submit_div p').html(data);
            },
            error: function (jqXhr, textStatus, errorMessage){
                //jQuery('#submit_div p').append('Error' + errorMessage);
            }
        });


    });




    jQuery("body").on( "click", ".my_add",function(){
      //console.log("klik");
       var tt = (jQuery('.txt').val());
        //console.log(tt);

        jQuery.ajax({
            url : '/include/ajaxcontrol.php',
            type : 'POST',
            data : {tt_ajax: tt},

            success: function(data, status, xhr){
               // jQuery('#my_add p').html(data);
                location.reload();
            },
            error: function (jqXhr, textStatus, errorMessage){
                //jQuery('#submit_div p').append('Error' + errorMessage);
            }
        });





    });


    jQuery("body").on( "click", ".my_update",function(){
        //console.log("klik");

       //var upd = jQuery(this).closest(".wrap").find("input.my_upd").val();

        //var upd = jQuery(this).prevAll("input.my_upd").val();
       //var upd = jQuery(this).prev(".my_upd").val();
        var upd = jQuery(this).siblings("input.my_upd").val();
      //  var upd = jQuery(this).find(".my_upd").val();

        var id_upd = jQuery(this).attr('id_update');
        console.log(upd);
        console.log(id_upd);
        jQuery.ajax({
            url : '/include/ajaxcontrol.php',
            type : 'POST',
            data : {upd: upd, id_upd: id_upd},

            success: function(data, status, xhr){
                // jQuery('#my_add p').html(data);
               // location.reload();
            },
            error: function (jqXhr, textStatus, errorMessage){
                //jQuery('#submit_div p').append('Error' + errorMessage);
            }
        });



    });




    jQuery("body").on( "click", ".my_delete",function(){
        //console.log("klik");
        var id_delete = jQuery(this).attr("id_delete");

        //console.log(id_delete);

        jQuery.ajax({
            url : '/include/ajaxcontrol.php',
            type : 'POST',
            data : {id_delete: id_delete },

            success: function(data, status, xhr){
                // jQuery('#submit_div p').html(data);
                // alert("post delete");
                location.reload();
            },
            error: function (jqXhr, textStatus, errorMessage){
                //   jQuery('#submit_div p').append('Error' + errorMessage);
            }
        });

    });




    jQuery("body").on( "click", ".my_add_post",function(){
        //console.log("klik");

        var add_titl = jQuery('.my_title_post').val();
        console.log(add_titl);

        var add_text = jQuery('textarea.my_text_post').val();
        console.log(add_text);

        var add_id = jQuery('option.my_categ').val();
        console.log(add_id);





        jQuery.ajax({
            url : '/include/ajaxcontrol.php',
            type : 'POST',
            data : {add_titl: add_titl, add_text: add_text, add_id: add_id},

            success: function(data, status, xhr){
                // jQuery('#my_add p').html(data);
                // location.reload();
            },
            error: function (jqXhr, textStatus, errorMessage){
                //jQuery('#submit_div p').append('Error' + errorMessage);
            }
        });









    });





























});