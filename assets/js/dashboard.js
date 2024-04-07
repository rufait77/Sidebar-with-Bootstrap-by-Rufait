const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

$(document).ready(function () {
  $('#dateFrom').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
  });
});

// Initialize Datepicker for Date Up to input field
$(document).ready(function () {
  $('#dateTo').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
  });
});