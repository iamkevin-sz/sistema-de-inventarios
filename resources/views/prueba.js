$(document).ready(function() {
    $("agregar").click(function() {
        agregar();
    })
});

var cont = 0;
total = 0;
subtotal = [];

$("#guardar").hide();
function agregar() {

    product_id = $("#product_id").val();
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    price = $("#price").val();
    impuesto = $("#tax").val();

    if(product_id !="" && quantity !="" && quantity>0 && price !="") {

        subtotal[cont]=quantity*price;
        total=total+subtotal[cont];
        var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td><td><input type="hidden" id="price[]" name="price[]" value="'+price+'" disable></td> <td><input type="hidden" name="quantity[]" value="'+quantity+'"><input class="form-control" type="number" value="'+quantity+'" disabled></td><td align="right">s/'+subtotal[cont]+'</td></tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $('#detalles').append(fila);
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'ERellene todos los campos!',
              })
        }
}

function limpiar(){
    $("#quantity").value("");
    $("#price").value("");
}

function totales(){
    $("#total").html("BOB" + total.toFixed(2));
    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html("BOB" + total_impuesto.toFixed(2));
    $("#total_pagar_html").html("BOB" + total_pagar.todFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
}

function evaluar(){

    if(total>0){
        $("#guardar").show();
    }else{
        $("#guardar").hide();
    }

}

function eliminar() {

    total = total - subtotal[index];
    total_impuesto = total + impuesto/100;
    total_pagar_html = total + total_impuesto;
    $("#total").html("BOB" + total);
    $("#total_impuesto").html("BOB" + total_impuesto);
    $("#total_pagar_html").html("BOB" + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar()
}
