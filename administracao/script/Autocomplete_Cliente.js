Autocomplete_Cliente = {
    Load: function (controlText, controlValue, controlNext, callback) {
        $(controlText).autocomplete({
            source: function (request, response) {
                $(controlValue).val("");
                $("#carregando").show();
                $.ajax({
                    url: "ajax.php?function=Autocomplete_Cliente",
                    dataType: "jsonp",
                    data: {
                        maxRows: 12,
                        chave: request.term
                    },
                    success: function (data) {
                        $("#carregando").hide();
                        response($.map(data, function (item) {
                            return {
                                label: item.label,
                                value: item.label,
                                value2: item.id
                            }
                        }));
                    }
                });
            },
            minLength: 3,
            select: function (event, ui) {
                $(controlValue).val(ui.item ? ui.item.value2 : this.value);
                $(controlNext).focus(); 
				if (callback && typeof(callback) === "function") {  
					callback();  
				}                    
            },
            open: function () {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    }
}