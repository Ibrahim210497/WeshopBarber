$(document).ready(function () {

    $('span[id]').click(function(){
        //text() : récupérer le contenu quand ce n'est pas un champ de formulaire
        //val() : contenu d'un champ de formulaire
        //récupération du contenu d'origine
        var valeur1 = $.trim($(this).text());
        //récupération des attributs name et id de la zone cliquée
        var ident = $(this).attr("id"); //valeur de l'id
        var name = $(this).attr("name"); //champ à modifier
        //alert("ident  = "+ident+" et name = "+name);
        $(this).blur(function(){
            var valeur2 = $.trim($(this).text());
            //alert("valeur 1 : "+valeur1+ " valeur2 : "+valeur2);
            if(valeur1 != valeur2){
                //écriture des paramètres de l'URL
                var parametre = 'champ='+name+'&id='+ident+'&nouveau='+valeur2;
                //alert(parametre);
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: 'text',
                    url: './lib/php/ajax/ajaxUpdateProduit.php',
                    success: function(data){
                        console.log(data);
                    }
                });
            }
        });

    });

    $('#submit_id').remove();
// traitement  ajax zone <input> dans jquery.php

    $('#choix_produit').change(function(){
        var attribut = $(this).attr('name');
        var id =$(this).val()
        // alert("id_produit : "+id);
        var parametre="id_produit="+id;
        $.ajax({
            type: 'GET',
            data: parametre, //ce qui est envoyé à ajaxProduitDetail
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxDetailProduit.php',
            success: function(data) { //data : ce qui est reçu de ajaxProduitDetail
                //console.log(data);
                $('#id_produit').html("<br><b>"+data[0].nom_produit+"</b><br>"+data[0].description);
                $('#image_produit').html('<img src="admin/images/'+data[0].image+'" alt="Illustration">');
            }
        });
    });




    // alert("coucou");
    $('#bordure').css('border', 'solid 1px #00F');

    $('#contenu2').html('<b>contenu inséré par jquery</b>');

    $('h2').click(function() {
        $(this).css({
            'font-size ': '130%' ,
            'color' : '#ff0000'
        })
        $('#para1')
    });

    $('#para1').click(function (){ //si c un id on met #
        $('#para2').fadeOut(3000);
        $('#para2').fadeIn();

    });

    //$('#')

});