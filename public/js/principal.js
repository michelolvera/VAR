var total;
$(document).ready(function () {
    $("#cantidad_articulos").text(Cookies.getJSON('car') == undefined ? '0' : Cookies.getJSON('car').length);
    $.ajax({
        method: "get",
        url: "/categorie",
        dataType: "json"
    })
        .done(function (jsonObject) {
            jsonObject.forEach(row => {
                $('#categories').append('<li><a href="/product/bycategorie/' + row['slug'] + '"><i class="material-icons" style="color: ' + row['css_color'] + ';">' + row['icon'] + '</i>' + row['name'] + '</a></li>');
            });
        })
        .fail(function () {
            console.log('No se ha podido obtener la lista de categorias.');
        });
    $('.sidenav').sidenav();
    $('#btn_sidenav').click(function (event) {
        event.preventDefault();
        let elem = document.getElementById("menu-side");
        let instance = M.Sidenav.getInstance(elem);
        instance.open();
    })
    $('#btn_shopping').click(function (event) {
        event.preventDefault();
        abrirCarrito();
    })

    $('.modal').modal();
});

function datosProducto(slug) {
    return JSON.parse($.ajax({
        type: "GET",
        url: "/product/" + slug,
        async: false
    }).responseText);
}

function abrirCarrito() {
    let elem = document.getElementById("modal_shopping");
    let instance = M.Modal.getInstance(elem);
    let car = Cookies.getJSON('car');
    total = 0;
    if (car == undefined || car.length == 0) {
        instance.close();
        M.toast({ html: 'No existe ningún producto en el carrito.' });
    } else {
        let htmlString = "<ul class='collection'>";
        for (let i = 0; i < car.length; i++) {
            let productData = datosProducto(car[i].slug);
            if (productData.name == undefined || productData.quantity == 0) {
                M.toast({ html: 'Un producto se ha agotado y eliminado del carrito.' });
                eliminarProductoCarrito(car[i].slug);
                continue;
            } else if (car[i].cantidad > productData.quantity) {
                car[i].cantidad = productData.quantity;
                Cookies.set('car', car);
            }
            let price;
            htmlString += "<li class='collection-item avatar'>";
            htmlString += "<div class='row'>";
            htmlString += "<div class='col s6 m8'>";
            htmlString += "<img src='/img/crop" + productData.img + "' class='circle'>";
            htmlString += '<span class="title">' + productData.name + '</span>';
            htmlString += '<p>' + productData.description + '</p>';
            htmlString += "</div>";
            htmlString += "<div class='col s6 m4'>";
            htmlString += '<p>Precio: ';
            price = productData.price;
            if (productData.discount_percent > 0) {
                htmlString += '<span style="text-decoration:line-through;">$' + productData.price + '</span>';
                htmlString += ' Descuento: $' + (productData.price * (1 - productData.discount_percent / 100)).toFixed(2) + '</p>';
                price = productData.price * (1 - productData.discount_percent / 100);
            } else
                htmlString += productData.price + '</p>';
            htmlString += "<div class='input-field'><input id='input_" + car[i].slug + "' type='number' min='1' max'" + productData.quantity + "' value='" + car[i].cantidad + "' onchange='cambiarCantidadProducto(" + '"' + car[i].slug + '"' + ", this.value);'>";
            htmlString += "<label for='input_" + car[i].slug + "'>Cantidad</label></div>";
            htmlString += "<p>Total: $<span id='total_" + car[i].slug + "'>" + (car[i].cantidad * price).toFixed(2) + "</p>";
            price *= car[i].cantidad;
            htmlString += '<button class="btn waves-effect waves-light red right" onclick="eliminarProductoCarrito(' + "'" + car[i].slug + "'" + ')">Eliminar<i class="material-icons right">delete</i></button>';
            htmlString += "</div>";
            htmlString += "</div>";
            htmlString += "</li>";
            total += price;
        }
        htmlString += "</ul>";
        htmlString += "<div style='text-align: right;'><p>Subtotal: $<span id='total_string'>" + total.toFixed(2) + "</span><br>";
        htmlString += "Costo de envio: $" + 100 + "</p>";
        htmlString += "</div>";
        $("#productlist").html(htmlString);
        try {
            generarPaypal();
        } catch (error) {

        }
        M.updateTextFields();
        instance.open();
    }
}

function cambiarCantidadProducto(slug, cantidad) {
    let producto = datosProducto(slug);
    if (cantidad < 1) {
        M.toast({ html: 'La cantidad no puede ser menor a 1.' });
        $("#input_" + slug).val(1);
        cambiarCantidadProducto(slug, 1);
    } else if (cantidad % 1 != 0) {
        M.toast({ html: 'No se permiten decimales.' });
        $("#input_" + slug).val(Math.round(cantidad));
        cambiarCantidadProducto(slug, Math.round(cantidad));
    } else if (cantidad > producto.quantity) {
        M.toast({ html: 'La cantidad no puede mayor a la existencia.' });
        $("#input_" + slug).val(producto.quantity);
        cambiarCantidadProducto(slug, Math.round(producto.quantity));
    } else {
        let car = Cookies.getJSON('car');
        let i;
        for (i = 0; i < car.length; i++) {
            if (car[i].slug == slug) {
                car[i].cantidad = cantidad;
                break;
            }
        }
        Cookies.set('car', car);
        let costo_anterior = parseFloat($("#total_" + slug).text());
        price = producto.price * (1 - producto.discount_percent / 100);
        $("#total_" + slug).text((cantidad * price).toFixed(2));
        total+=(cantidad * price - costo_anterior);
        $("#total_string").text(total.toFixed(2));
        $("#cantidad_articulos").text(Cookies.getJSON('car').length);
        try {
            generarPaypal();
        } catch (error) {

        }
    }
}

function eliminarProductoCarrito(slug) {
    let car = Cookies.getJSON('car');
    let caraux = new Array();
    for (let i = 0; i < car.length; i++) {
        if (car[i].slug != slug) {
            caraux.push(car[i]);
        }
    }
    Cookies.set('car', caraux);
    $("#cantidad_articulos").text(Cookies.getJSON('car').length);
    abrirCarrito();
}
