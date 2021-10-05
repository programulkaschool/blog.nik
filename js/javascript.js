jQuery(document).ready(function () {
    console.log("ready!123");
    //  jQuery(".new_post .article").append("<p>POST</p>");
    // jQuery(".new_post .article").fadeOut(3000).delay(5000).fadeIn(3000);
    //jQuery(".new_post .article").fadeOut(3000).fadeIn(3000);
    //jQuery(".new_post .article").slideUp(3000).slideDown(3000);
    //   jQuery(".comment_block .article").hide(2000).show(2000);

    //var txt = jQuery(".new_text h3").text();
    //jQuery(".new_text h3").text(txt + " 9");
    //jQuery.fx.off = true;
    //  jQuery('.new_post .article').each(function(i, val) {
    //    jQuery(this).addClass("my_class" + i);

    //     jQuery(this).find('.article__info').addClass("my__class_find_" + i);

    //     jQuery(this).find('.article__info__preview').append("<p>"+ (i+1)+"</p>");
    //    });
    // jQuery(".block.new_text").clone().after($(".block.new_text"));
    // jQuery (".block.new_text").after(jQuery(".block.new_text").clone());
    // jQuery (".content__left .block").each(function () {

    //   var number_posts = $(this).find("article").length;
    //   $(this).children("a").append(" " + number_posts);
    // });
    /*Click*/
    /*     var i = 1;

          jQuery("#submit_div").click(function () {
              console.log("click");
              jQuery(this).after('<div class="form__controlmy">MY BUTTOM ' + i + '</div>');
              i++;
          });
            jQuery(".form__controlmy").click(function () {
             var name=jQuery(this).text();
             console.log(name);
            });


          /* jQuery( ".form__controlmy" ).on( "click", function() {
               var name=jQuery(this).text();
               console.log(name);
           });*/

    /*   jQuery("body").on("click", ".form__controlmy", function () {
            var name = jQuery(this).text();
            console.log(name);
            jQuery("#position_button p").text(name);
        });
*/
    var my_input_object = {};
    var val_inp_my = "";
    var name_inp_my = "";
    var page_id = "";
    jQuery("body").on("click", ".form__controlmy", function () {
        jQuery('#form_comments input[type="text"], #form_comments textarea').each(function () {


            val_inp_my = jQuery(this).val();
            name_inp_my = jQuery(this).attr("name");
            my_input_object[name_inp_my] = val_inp_my;

        });

        page_id = jQuery('#form_comments').attr("id_page")

        console.log(my_input_object);

        jQuery.ajax({
            url: 'ajaxController.php',
            type: 'Post',
            data: {my_input_object: my_input_object, page_id: page_id},
            success: function (data, status, xhr) {
                jQuery('#position_button').html(data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                jQuery('#position_button').append('Error' + errorMessage);
            }
        });


    });


    ////////////////////////////////////tabs\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    jQuery(function () {
        var tab = $('#tabs .tabs-items > div');
        tab.hide().filter(':first').show();

        // Клики по вкладкам.
        jQuery('#tabs .tabs-nav a').click(function () {
            tab.hide();
            tab.filter(this.hash).show();
            $('#tabs .tabs-nav a').removeClass('active');
            $(this).addClass('active');
            return false;
        }).filter(':first').click();

        // Клики по якорным ссылкам.
        jQuery('.tabs-target').click(function () {
            $('#tabs .tabs-nav a[href=' + $(this).data('id') + ']').click();
        });
    });


    //////////////////////////////////// BUTTON DELETE\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    jQuery("body").on("click", ".delete_post", function () {
        var delete_post_id = jQuery(this).attr('id_delete');
        console.log(delete_post_id);
        jQuery.ajax({
            url: 'ajaxController.php',
            type: 'Post',
            data: {delete_post: delete_post_id},
            success: function (data, status, xhr) {
                alert('Post delete');
                location.reload();
            },
            error: function (jqXhr, textStatus, errorMessage) {
            }
        });


});
});


