const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});



$(document).ready(function(){
  // Get current year
  var currentYear = new Date().getFullYear();
  // Set year range, you can adjust this range as needed
  var startYear = currentYear; 
  var endYear = currentYear + 5; 
  // Generate years dropdown
  var yearsOptions = '';
  for(var year = startYear; year <= endYear; year++) {
    yearsOptions += '<option value="' + year + '">' + year + '</option>';
  }
  // Append years dropdown to select element
  $('#year').html(yearsOptions);
});
