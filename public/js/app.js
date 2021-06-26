
// ***************************************************************************************************************************************//
//                                                                  BOTÕES +/-
// ***************************************************************************************************************************************//
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


// ***************************************************************************************************************************************//
//                                                          PÁGINA EDITAR CARRINHO (INDEX)
// ***************************************************************************************************************************************//
//Edit price total on cart edit
$(".cart_review_plus").click(function() {
    var $item = $(this).closest("tr").find("#price");
    var $item_total = $(this).closest("table").find("#price_total");
    var $atual = parseFloat($(this).closest("tr").find("#price").text());
    var $qnt = parseFloat($(this).closest("tr").find("#qnt").val());
    var $newPrice = $atual-($atual/$qnt);
    var $id = parseFloat($(this).closest("tr").find("#ID").val());
    $text = ""+((($atual/$qnt)*($qnt+1)).toFixed(2));
    $text_total = ""+((parseFloat($item_total.text())+($atual/$qnt)).toFixed(2));
    ChangeCart_Review( $qnt+1,$id,$item,$text,$text_total,$item_total);
});
$(".cart_review_minus").click(function() {
    var $item = $(this).closest("tr").find("#price");
    var $item_total = $(this).closest("table").find("#price_total");
    var $atual = parseFloat($(this).closest("tr").find("#price").text());
    var $qnt = parseFloat($(this).closest("tr").find("#qnt").val());
    var $newPrice = $atual-($atual/$qnt);
    var $id = parseFloat($(this).closest("tr").find("#ID").val());
    if($qnt !== 1.00){ //impede chegar 0,00, pois não remove item em 0
        $text = ""+((($atual/$qnt)*($qnt-1)).toFixed(2));
        $text_total = ""+((parseFloat($item_total.text())-($atual/$qnt)).toFixed(2));
        ChangeCart_Review( $qnt-1,$id,$item,$text,$text_total,$item_total);
    }
});

//add ou remove, quantidade, idItem
function ChangeCart_Review($qnt,$id,$item,$text,$text_total,$item_total){
    //Inserir item
    var $info = {};
    $.ajax({
        type: 'GET',
        url: '/get_session',
        dataType: "json",
    }).done(function(data){

        $info = data;
        $found = -1;
        $key = -1;
        $info.forEach(function(item){
            if(item.id == $id){
                $key++;
                item.qnt = parseInt($qnt);
                $found = 1; //Achou item
            }
        });
        
        //Remove caso item seja zerado
        if($qnt <= 0)
            $info.splice($key,1);
        else if($qnt == 1 || $key == -1) //Adiciona novo item
            $info.push({'id':$id,'qnt':$qnt,'href':$img,'price':$price,'title':$title});

        SendCart_Review($info,$item,$text,$text_total,$item_total);
    });
    return $info;
}

function SendCart_Review($data,$item,$text,$text_total,$item_total){
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

// ***************************************************************************************************************************************//
//                                                           PÁGINA CARDAPIO
// ***************************************************************************************************************************************//

//Edit price total on cart edit
$(".cart_edit_plus").click(function() {
    var $id = parseFloat($(this).closest("div").find("#ID").val());
    var $qnt = parseFloat($(this).closest("div").find("#qnt").val())+1;
    var $img = $(this).closest(".card").find("#img").attr('src'); //foto ok
    var $price = parseFloat($(this).closest(".card").find("#price").text().replace("R$", "")); 
    var $title = $(this).closest(".card").find("#title").text();
    
    ChangeCart_Edit($qnt,$id,$img,$price,$title);
});

$(".cart_edit_minus").click(function() {
    var $qnt = parseFloat($(this).closest("div").find("#qnt").val())-1;
    var $id = parseFloat($(this).closest("div").find("#ID").val());
    var $img = $(this).closest(".card").find("#img").attr('src'); //foto ok
    var $price = parseFloat($(this).closest(".card").find("#price").text().replace("R$", "")); 
    var $title = $(this).closest(".card").find("#title").text();
    ChangeCart_Edit($qnt,$id,$img,$price,$title);    
});

//add ou remove, quantidade, idItem
function ChangeCart_Edit($qnt,$id,$img,$price,$title){
    var $info = {};
    $.ajax({
        type: 'GET',
        url: '/get_session',
        dataType: "json",
    }).done(function(data){
        $info = data;
        $found = -1;    //Pastel encontrado
        $aux = -1;      //Auxiliar para posição do pastel no vetor "cart"
        $key = -1;      //Key a ser editada
        $info.forEach(function(item){
            $aux++;
            if(item.id == $id){
                item.qnt = parseInt($qnt);
                $found = 1; //Achou item
                $key = $aux;
            }
        });
        
        //Remove caso item seja zerado
        console.log($qnt);
        if($qnt <= 0)
            $info.splice($key,1);
        else if($found == -1) //Adiciona novo item
            $info.push({'id':$id,'qnt':$qnt,'href':$img,'price':$price,'title':$title});

        SendCart_Edit($info,$qnt);
    }).fail(function(data){
        // if(data.length == 0)
            // console.log(data);
    });
    return $info;
}

function SendCart_Edit($data,$qnt){
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
        //Atualiza valor do carrinho no header
        document.getElementById("cart_header_qnt").innerHTML = $data.length;
        document.getElementById("cart_dropdown_qnt").innerHTML = $data.length;

        if ($data.length > 0){
            document.getElementById("cart_dropdown_checkout").style.display = "block";
            document.getElementById("cart_dropdown_empty").style.display = "none";
        }
        else{
            document.getElementById("cart_dropdown_checkout").style.display = "none";
            document.getElementById("cart_dropdown_empty").style.display = "block";
        }

        //Atualiza valor do carrinho no dropdown
        $total = 0;
        $data.forEach(function(item){
            $total += (item.price * item.qnt);
        });
        document.getElementById("cart_dropdown_total").innerHTML = "R\$"+$total.toFixed(2);

        // Atualiza os pasteis no dropdown
        $info = "";
        $data.forEach(function(item){
            $info+="<div class=\"row cart-detail\">";
                $info+="<div class=\"col-lg-4 col-sm-4 col-4 cart-detail-img\">";
                    $info+="<img src=\""+item.href+"\">";
                $info+="</div>";
                $info+="<div class=\"col-lg-8 col-sm-8 col-8 cart-detail-product\">";
                    $info+="<p>"+ item.title +"</p>";
                    $info+="<div class='row'>";
                        $info+="<span class=\"col price text-info\"> R$ " + (item.price*item.qnt).toFixed(2) +"</span> ";
                        $info+="<span class=\" col count\"> Qnt.: " + item.qnt +"</span>";
                    $info+="</div>";
                $info+="</div>";
            $info+="</div>";
        });
        document.getElementById("cart_pasteis").innerHTML = $info;
    });
}



// ***************************************************************************************************************************************//
//                                                           EDITAR PEDIDO
// ***************************************************************************************************************************************//

$(".order_edit_plus").click(function() {
    //Recupera quantidade e preco unitario
    var $qnt = parseFloat($(this).closest("tr").find("#qnt").val())+1;
    var $price_unit = parseFloat($(this).closest("tr").find("#unit").text().replace("R$", ""));
    //Atualiza valor da linha
    $(this).closest("tr").find("#price").text("R$ "+($qnt*$price_unit).toFixed(2));
    
    //Atualiza total
    var $total = parseFloat($(this).closest("table").find("#total").text().replace("R$", ""));
    $(this).closest("table").find("#total").text("R$ "+($total+$price_unit).toFixed(2));
});

$(".order_edit_minus").click(function() {
    var $qnt = parseFloat($(this).closest("tr").find("#qnt").val())-1;
    if($qnt >= 0){
        var $price_unit = parseFloat($(this).closest("tr").find("#unit").text().replace("R$", ""));
        $(this).closest("tr").find("#price").text("R$ "+($qnt*$price_unit).toFixed(2));
        var $total = parseFloat($(this).closest("table").find("#total").text().replace("R$", ""));
        $(this).closest("table").find("#total").text("R$ "+($total-$price_unit).toFixed(2));
    }
    else{
        var $price_unit = parseFloat($(this).closest("tr").find("#unit").text().replace("R$", ""));
        $(this).closest("tr").find("#price").text("R$ "+(0).toFixed(2));
    }
});

function InsertRow_pedidoEdit($pasteis){
    var $id = document.getElementById("add_new").selectedIndex-1;
    var $button = "<div class='quantity buttons_added'><input type='button' value='-'' class='minus order_edit_minus'><input type='number' id='qnt' step='1' min='0' max='' name='quantity' value='1' title='Qty' class='input-text qty text' size='4' pattern='' inputmode=''><input type='button' value='+' class='plus order_edit_plus'></div>";
    var myHtmlContent = "<td>"+$pasteis[$id]['titulo']+"</td><td>"+$button+"</td><td>R\$ "+$pasteis[$id]['preco_unit']+"</td><td>R$ "+$pasteis[$id]['preco_unit']+"</td>"
    var table = document.getElementById("DataTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    newRow.innerHTML = myHtmlContent;
}

function InsertRow_pedidoEdit2($route,$pedido){
    var $id = document.getElementById("add_new").value;
    $.ajax({
        url:$route,  
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },  
        data:{
            pedido_id: $pedido,
            pastel_id: $id,
        },                              
        success: function( data ) {
            document.location.reload(true);
        }
    });
}



// ***************************************************************************************************************************************//
//                                                                 GERAL
// ***************************************************************************************************************************************//

//TEXT MASKS
$(document).ready(function($){
    $('#date').mask('00/00/0000');
    $('#cep').mask('00000-000');
    $('#telefone').mask('(00) 0000-00000');
    $('#cpf').mask('000.000.000-00', {reverse: true});
});
$(document).on({
    ajaxStart: function(){
        $('table').addClass("loading"); 
    },
    ajaxStop: function(){ 
        $('table').removeClass("loading");
    }    
});

//Atualiza valor total
function PriceUpdate($price, $id, $cupons){
    if($id == 0)
        document.getElementById("total").value = parseFloat($price).toFixed(2);
    else if( $cupons[$id-1].percentage == 1)
        document.getElementById("total").value = parseFloat($price*(1-($cupons[$id-1].desconto/100))).toFixed(2);
    else
        document.getElementById("total").value = parseFloat($price-$cupons[$id-1].desconto).toFixed(2);
}

//Atualiza status do pedido
function StatusPedidoUpdate($pedido_id, $status_id,$user_id){
    // $rota = {{route('pedidos.editStatus')}};
    // console.log($rota);
    $.ajax({
        url:"/pedidos.editStatus",  
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },  
        data:{
            user_id: $user_id,
            pedido_id : $pedido_id,
            status_id: $status_id
        },                              
        success: function( data ) {
            // console.log(data);
        }
    });
}

// ***************************************************************************************************************************************//
//                                                                 TABLE ORDER
// ***************************************************************************************************************************************//

 // Create an array with the values of all the select options in a column 
$.fn.dataTable.ext.order['dom-select'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('select', td).val();
    } );
}


$(document).ready( function () {
    $('#Pedidos_all').DataTable({
        "columns": [
            null,null,null,null,
            { "orderDataType": "dom-select" },
            null,null,null,null,
            
        ],
        language: {
            url: 'http://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
        }
    });
});

//Generic order
$(document).ready( function () {
    $('#DataTable').DataTable({
        language: {
            url: 'http://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
        }
    });
});