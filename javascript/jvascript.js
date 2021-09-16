jQuery(document).ready(function () {
    console.log("ready");

    jQuery(".new_post .article").each(function (i, val) {

        $(this).addClass("my_class" + i);
        $(this).find(".article__info").addClass("my_class_find"+i);
        $(this).find (".article__info__preview").append("<p>"+(i+1)+"</p>");
        });




    jQuery(".block.new_text").after( $(".block.new_text").clone());


    jQuery(".content__left .block").each(function(){


      var number =  $(this).find("article").length;
      console.log(number);
        $(this).children("a").append(" " +number);

    });


























});