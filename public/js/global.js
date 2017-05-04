$(document).ready(function() {
  
});

function ajaxSearchByUser() {
    var user = $("#user").val();
    $.ajax({
        url: '/searchByUser',
        type: 'GET',
        dataType: 'JSON',
        data: 'user='+user,
        beforeSend: function() {
            $("#criteria").val('');
            $("#template1").html("Please wait...");
        },
        error: function(data) {
            console.log(data, "error");
        },
        success:function(data) {
            $("#template1").empty();
            if(data.length === 0) {
                $("#template1").html('No results found with the user '+user);
            }
            for(var i = 0; i < data.length; i++) {
                if(data[i] !== undefined) {
                    $("#template1").append($("#twitterTmpl").tmpl({
                        twitterID: data[i].id,
                        message: data[i].text,
                        name: data[i].user.name,
                        screenName: data[i].user.screen_name
                    }));
                }
            }
        }
    });
}

function ajaxSearchByCriteria() {
    var c = $("#criteria").val();
    $.ajax({
        url: '/searchByCriteria',
        type: 'GET',
        dataType: 'JSON',
        data: 'criteria='+c,
        beforeSend: function(data) {
            $("#user").val('');
            $("#template1").html("Please wait...");
        },
        error: function(data) {
            console.log(data, "error");
        },
        success:function(data) {
            $("#template1").empty();
            if(data.length === 0) {
                $("#template1").html('No results found with the criteria '+user);
            }
            for(var i = 0; i < data.length; i++) {
                if(data[i] !== undefined) {
                    $("#template1").append($("#twitterTmpl").tmpl({
                        twitterID: data[i].id,
                        message: data[i].text,
                        name: data[i].user.name,
                        screenName: data[i].user.screen_name
                    }));
                }
            }
        }
    });
}