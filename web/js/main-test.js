//getting browser window
let url_string = window.location.href;
//building the url of current window
let url = new URL(url_string);
//getting only string before second slash /
let locale = url.pathname.split("/")[1];

$(document).ready(function () {
   let product_title = "";

   $(document).on("click",".buy-btn",function () {
      product_title = $(this).attr("product_title");
      $(".buy-product").text(product_title);
   })

   $(document).on("click", ".send-form", function () {

      let phone = $("#clients-phone").val();
      let name = $("#clients-name").val();
      let surname = $("#clients-surname").val();
      let address = $("#clients-address").val();
      let location = $("#clients-location").val();
      let region = $("#clients-region").val();
      let post = $("#clients-post").val();
      let email = $("#clients-email").val();


      email = (email!=='') ? email : 'email not provided';

      if(phone==='' || name==='' || surname==='' || address===''  || location===''  || region===''  || post==='' || product_title==='')
      {
          return false;
      }

      $.ajax({
         method: "POST",                                            //request method
         url: locale ? "/"+locale+"/site/bot" : "/site/bot",        //url to action
         type: "html",                                              //data type
         data: {                                                    //data that we need to send to server
             phone: phone,
             name: name,
             surname: surname,
             address: address,
             location: location,
             region: region,
             post: post,
             email: email,
             product: product_title,
         },
      }).done(function (data) {
          $("#clients-phone").val('');
          $("#clients-name").val('');
          $("#clients-surname").val('');
          $("#clients-address").val('');
          $("#clients-location").val('');
          $("#clients-region").val('');
          $("#clients-post").val('');
          $("#clients-email").val('');
          $("#clients-product").val('');

          let response = (locale === 'ru') ? 'Ваш запрос принят. Вам перезвонят в ближайшее время' : 'Запит прийнято. Вам зателефонують найближчим часом.';
          $(".form-aftersent").text(response);
          $(".form-aftersent").css("display", "block");
          $(".form-aftersent").css("color", "#74b973");
      }).fail(function (jqXHR, textStatus) {
          let response = (locale === 'ru') ? 'Ошибка при отправке формы.' : 'Поилка при відправлені форми.';
          $(".form-aftersent").text(response);
          $(".form-aftersent").css("display", "block");
          $(".form-aftersent").css("color", "#f44336");
         console.log(jqXHR);
      });
   })

});