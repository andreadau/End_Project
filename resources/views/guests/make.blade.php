<script>

  function setCookie(name,value,days) {
   var expires = "";
   if (days) {
       var date = new Date();
       date.setTime(date.getTime() + (days*24*60*60*1000));
       expires = "; expires=" + date.toUTCString();
   }
   document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  }
    var cart = localStorage.getItem("cart");
    var totalPrice = localStorage.getItem("totalPrice");
    setCookie('cart', cart, 7);
    setCookie('totalPrice', totalPrice, 7);

</script>