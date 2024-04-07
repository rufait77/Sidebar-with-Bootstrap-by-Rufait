const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});


$('.input-group-append').on('click', function(){
  $(this).siblings('.datepicker').focus();
});

$('.datepicker').datepicker({
  autoclose: true,
  todayHighlight: true,
  clearBtn: true,
  format: "dd/mm/yyyy"
});