$(document).ready(function () {
   let product_title = "";

   $(document).on("click",".buy-btn",function () {
      product_title = $(this).attr("product_title");
      $(".buy-product").text(product_title);
   })
   $(document).on("click",".send-btn",function(){
      if(product_title==null){
      }
   })
});