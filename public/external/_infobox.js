function DibujaCajaInfo(category, infoboxContent, json, i){

    if(json[i].color)          { var color = json[i].color }
        else                        { color = '' }
    if( json[i].precio )        { var price = '<div class="price">' + json[i].precio +  '</div>' }
        else                        { price = '' }
    if(json[i].id)             { var id = json[i].id }
        else                        { id = '' }
    if(json[i].url)            { var url = json[i].url }
        else                        { url = '' }
    if(json[i].type)           { var type = json[i].type }
        else                        { type = '' }
    if(json[i].nombre)          { var title = json[i].nombre }
        else                        { title = '' }
    if(json[i].direccion)       { var location = json[i].direccion }
        else                        { location = '' }
    if(json[i].galeria[0])     { var gallery = json[i].galeria[0]}
        else                        { path = '../img/default-item.jpg' }

    var ibContenedor = '';
    ibContenedor =
    '<div class="infobox ' + color + '">' +
        '<div class="inner">' +
            '<div class="image">' +
                '<div class="item-specific">' + drawItemSpecific(category, json, i) + '</div>' +
                '<div class="overlay">' +
                    '<div class="wrapper">' +
                        '<a href="#" class="quick-view" data-toggle="modal" data-target="#modal" id="' + id + '">Quick View</a>' +
                        '<hr>' +
                        '<a href="' + url +  '" class="detail">Go to Detail</a>' +
                    '</div>' +
                '</div>' +
                '<a href="' + url +  '" class="description">' +
                    '<div class="meta">' +
                        price +
                        '<h2>' + title +  '</h2>' +
                        '<figure>' + location +  '</figure>' +
                        '<i class="fa fa-angle-right"></i>' +
                    '</div>' +
                '</a>' +
                '<img src="'+ gallery + '">' +
            '</div>' +
        '</div>' +
    '</div>';
    return ibContenedor;
}
