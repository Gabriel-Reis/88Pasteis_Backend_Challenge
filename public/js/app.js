// +- CART BUTTONS
function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), 
        c.children().first().before('<input type="button" value="-" class="minus" />'), 
        c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}

String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
    b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
    b = parseFloat(a.val()),
    c = parseFloat(a.attr("max")),
    d = parseFloat(a.attr("min")),
    e = a.attr("step");
    b && "" !== b && "NaN" !== b ||
    (b = 0), "" !== c && "NaN" !== c ||
    (c = ""), "" !== d && "NaN" !== d ||
    (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) ||
    (e = 1),
    jQuery(this).is(".plus") ? 
    c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : 
    d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), 
    a.trigger("change");
});


//TEXT MASKS
$(document).ready(function($){
    $('#date').mask('00/00/0000');
    $('#cep').mask('00000-000');
    $('#telefone').mask('(00) 0000-00000');
    $('#cpf').mask('000.000.000-00', {reverse: true});
});

    
//Edit price total
$(".plus").click(function() {
    var $item = $(this).closest("tr").find("#price");
    var $item_total = $(this).closest("table").find("#price_total");
    var $atual = parseFloat($(this).closest("tr").find("#price").text());
    var $qnt = parseFloat($(this).closest("tr").find("#qnt").val());
    var $newPrice = $atual-($atual/$qnt);
    var $id = parseFloat($(this).closest("tr").find("#ID").val());
    $text = ""+((($atual/$qnt)*($qnt+1)).toFixed(2));
    $text_total = ""+((parseFloat($item_total.text())+($atual/$qnt)).toFixed(2));
    ChangeCart(parseInt(1),$id,$item,$text,$text_total,$item_total);
});

$(".minus").click(function() {
    var $item = $(this).closest("tr").find("#price");
    var $item_total = $(this).closest("table").find("#price_total");
    var $atual = parseFloat($(this).closest("tr").find("#price").text());
    var $qnt = parseFloat($(this).closest("tr").find("#qnt").val());
    var $newPrice = $atual-($atual/$qnt);
    var $id = parseFloat($(this).closest("tr").find("#ID").val());
    if($qnt !== 1.00){ //impede chegar 0,00, pois não remove item em 0
        $text = ""+((($atual/$qnt)*($qnt-1)).toFixed(2));
        $text_total = ""+((parseFloat($item_total.text())-($atual/$qnt)).toFixed(2));
        ChangeCart(parseInt(-1),$id,$item,$text,$text_total,$item_total);
    }
});


//add ou remove, quantidade, idItem
function ChangeCart($qnt,$id,$item,$text,$text_total,$item_total){
    //Inserir item
    var $info = {};
    $.ajax({
        type: 'GET',
        url: '/get_session',
        dataType: "json",
    }).done(function(data){
        $info = data;
        $info.forEach(function(item){
            if(item.id == $id)
                item.qnt = parseInt(item.qnt) + parseInt($qnt);
        });
        SendCart($info,$item,$text,$text_total,$item_total);
    });
    return $info;
}

function SendCart($data,$item,$text,$text_total,$item_total){
    var arrayToString = JSON.stringify(Object.assign({}, $data));  // convert array to string
    var stringToJsonObject = JSON.parse(arrayToString);  // convert string to json object

    $.ajax({
        type: 'POST',
        url: '/set_session',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: stringToJsonObject
    }).done(function(){
        $item.text($text);
        $item_total.text($text_total);
    });
}


$(document).on({
    ajaxStart: function(){
        $('table').addClass("loading"); 
    },
    ajaxStop: function(){ 
        $('table').removeClass("loading");
    }    
});


// Price Update on "pedidos page"
function PriceUpdate($price, $id, $cupons){
    if($id == 0)
        document.getElementById("total").value = parseFloat($price).toFixed(2);
    else if( $cupons[$id-1].percentage == 1)
        document.getElementById("total").value = parseFloat($price*(1-($cupons[$id-1].desconto/100))).toFixed(2);
    else
        document.getElementById("total").value = parseFloat($price-$cupons[$id-1].desconto).toFixed(2);
}


total - 3%
total * 0,97