
jQuery( document ).ready(function() {
    console.log( "ready!123" );
  //  jQuery(".new_post .article").append("<p>POST</p>");
   // jQuery(".new_post .article").fadeOut(3000).delay(5000).fadeIn(3000);
    //jQuery(".new_post .article").fadeOut(3000).fadeIn(3000);
    //jQuery(".new_post .article").slideUp(3000).slideDown(3000);
     //   jQuery(".comment_block .article").hide(2000).show(2000);

       //var txt = jQuery(".new_text h3").text();
        //jQuery(".new_text h3").text(txt + " 9");
        //jQuery.fx.off = true;
          jQuery('.new_post .article').each(function(i, val) {
              jQuery(this).addClass("my_class" + i);

              jQuery(this).find('.article__info').addClass("my__class_find_" + i);

              jQuery(this).find('.article__info__preview').append("<p>"+ (i+1)+"</p>");
          });
        // jQuery(".block.new_text").clone().after($(".block.new_text"));
    jQuery (".block.new_text").after(jQuery(".block.new_text").clone());
    jQuery (".content__left .block").each(function () {

        var number_posts=$(this).find("article").length;
        $(this).children("a").append(" "+number_posts);


    });


});
