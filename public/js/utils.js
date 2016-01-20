
var SignUp = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) == '') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").show();

            return false;
        };

        return true;
    },
    validate: function () {
        if (SignUp.check("name") == false) {
            return false;
        }
        if (SignUp.check("description") == false) {
            return false;
        }
      
   
        $("#modulesForm")[0].submit();
    }
}

$(document).ready(function () {
    $("#modulesForm .alert").hide();

});
