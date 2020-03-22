$(document).ready(function(){
    $.get("sys/backendinfo.php", function(data){
        var i
        for (i = 1; i <= data; i++){
            $("#addtocart_" + i).click(function(){
                var idlastevent = event.target.id
                var idlasteventsplit = idlastevent.split("_")
                var id = idlasteventsplit[1]
                var amount = $("#amount_" + id).val()
                $.ajax({
                    type : "POST",
                    url : "sys/item.php",
                    data : {
                        "add_product" : "eiei",
                        "productid" : id,
                        "amount" : amount
                    },
                    success: function(data){
                        if(data == "success"){
                            $("#shopping_cart").load(location.href+" #shopping_cart>*","")
                        } else {
                            alert('sth. went wrong')
                        }
                    }
                })
            })
        }
    })
})