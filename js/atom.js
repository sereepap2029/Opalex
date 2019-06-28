function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
function numberCleanCommas(number) {
    var parts = number.toString().split(".");
    var parts2 = parts[0].toString().split(",");
    j1=parts2.join("");
    if (parts[1]!== undefined) {
    	j1=j1+"."+parts[1];
    }
    return j1;
}
$(document).ready(function() {
  $("input.digit-number").each(function() {
    var num = $(this).val();
    var commaNum = numberWithCommas(num);
    $(this).val(commaNum);
  });
  $("select").chosen({width: "60%"});
});
$(document).on("focus", "input.digit-number", function() {
      var c_perm=$( this );
      var valu=c_perm.val();
      var digit=numberCleanCommas(valu);
      c_perm.val(digit);
        
    });
$(document).on("focusout", "input.digit-number", function() {
      var c_perm=$( this );
      var valu=c_perm.val();
      var digit=numberWithCommas(valu);
      c_perm.val(digit);
        
    });