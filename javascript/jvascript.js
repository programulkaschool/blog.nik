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































});