$(function() {
  document.getElementById('ajax-contact-form').addEventListener('submit', function(evt){
    var http = new XMLHttpRequest(), f = this;
    var th = $(this);
    evt.preventDefault();
    http.open("POST", "php/send_cart.php", true);
    http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
        console.log(http);
        alert(http.responseText);
        if (http.responseText.indexOf(f.nameFF.value) == 0) { // очистить поля формы, если в ответе первым словом будет имя отправителя (nameFF)
          th.trigger("reset");
        }
      }
    }
    http.onerror = function() {
      alert('Помилка, спробуйте ще раз!');
    }
    http.send(new FormData(f));
  }, false);
 
});