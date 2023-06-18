function requiredField(input) {
    if (input.value.length < 1) {
        input.style.borderColor = "#e74c3c";

    } else if (input.type == "email") {
        if (input.value.indexOf("@") != -1 && input.value.indexOf(".") != -1) {
            input.style.borderColor = "#2ecc71";
        } else {
            input.style.borderColor = "#e74c3c";
        }
    } else {
        input.style.borderColor = "#2ecc71";
    }
}


let createAllErrors = function () {
    let form = $(this),
        errorList = $("ul.errorMessages", form);

    let showAllErrorMessages = function () {
        errorList.empty();

        let invalidFields = form.find(":invalid").each(function (index, node) {
            let label = $("label[for=" + node.id + "] "),
                message = node.validationMessage || 'Invalid value.';

            errorList
                .show()
                .append("<li><span>" + label.html() + "</span> " + message + "</li>");
        });
    };

    // Support Safari
    form.on("submit", function (event) {
        if (this.checkValidity && !this.checkValidity()) {
            $(this).find(":invalid").first().focus();
            event.preventDefault();
        }
    });

    $("input[type=submit], button:not([type=button])", form)
        .on("click", showAllErrorMessages);

    $("input", form).on("keypress", function (event) {
        var type = $(this).attr("type");
        if (/date|email|month|number|search|tel|text|time|url|week/.test(type) &&
            event.keyCode == 13) {
            showAllErrorMessages();
        }
    });
};

$("form").each(createAllErrors);