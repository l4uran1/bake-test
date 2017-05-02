$(document).ready(function() {
  
});

function ajaxSearchByUser() {
    var user = $("#user").val();
    $.ajax({
        url: '/searchByUser',
        type: 'GET',
        dataType: 'JSON',
        data: 'user='+user,
        beforeSend: function(data) {
            console.log(data, "databs");
        },
        error: function(data) {
            console.log(data, "datae");
        },
        success:function(data) {
            //$("#template1").html();
            for(var i = 0; i < data.length; i++) {
                if(data[i] !== undefined) {
                    $("#template1").append($("#twitterTmpl").tmpl({
                        twitterID: data[i].id,
                        message: data[i].text
                    }));
                }
            }
        }
    });
}

function ajaxSearchByCriteria() {
    var user = $("#criteria").val();
    $.ajax({
        url: '/searchByCriteria',
        type: 'GET',
        dataType: 'JSON',
        data: 'criteria='+user,
        beforeSend: function(data) {
            console.log(data, "databs");
        },
        error: function(data) {
            console.log(data, "datae");
        },
        success:function(data) {
            for(var i = 0; i < data.length; i++) {
                if(data[i] !== undefined) {
                    $("#template1").append($("#twitterTmpl").tmpl({
                        twitterID: data[i].id,
                        message: data[i].text
                    }));
                }
            }
        }
    });
}