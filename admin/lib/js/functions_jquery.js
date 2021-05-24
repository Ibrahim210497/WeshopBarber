$(document).ready(function () {



    $(".info_produit").click(function () {
        var id = $(this).data('id');//get the id of the selected button
        var parametre = "id=" + id;
        var retour = $.ajax({
            type: 'GET',
            data: parametre,
            dataType: 'json',
            url: "./admin/lib/php/ajax/ajaxInfoProduit.php",
            success: function (data) {
                console.log(data);
                $('.modal-title').html("<b>" + data[0].nom_produit + "</b>");
                prix = "<br>Seulement " + data[0].prix + " euros pièce !";
                $('.modal-body').html("Produit: " + data[0].description + "</b><br>Plus que " + data[0].stock + " disponibles" + prix);
            },
            fail: function () {
                console.log("fail");
            }
        });
    });
    //traitement de la mise dans le panier à partir de la fenêtre modale info_produit.php
    $('#clic_panier').click(function () {
        //un effet blink sur le panier lorsque cliqué
        $(this).fadeOut(200).fadeIn(200);
        //on relève la quantité sélectionnée dans la liste déroulante
        var cb = $('#quantite option:selected').val();
        //on récupère l'id du produit
        var id = window.id;
        //envoi la qte et l'id en param (ajaxSetPanier)
        var parametre= 'id_produit=' +id + '&quantite=' +cb ;
       alert(parametre);
       $.ajax({
           type: 'GET',
           data: parametre,
           dataType: 'text',
           url:'./admin/lib/php/ajax/ajaxAchatProduit.php',
           success: function (data){
               console.log(data);
           }
       });
        //ajax : on place dans un panier (au moins temporaire)
        //...

    });




    $('#editer_ajouter').text('Mettre à jour ou Nouveau ');

    //blur : perte de focus
    $('#matricule').blur(function(){
        var mat = $(this).val();
        if(mat!= ''){
            var parametre="mat="+mat;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/ajaxRechercheClient.php',
                success: function(data){
                    console.log(data);
                    $('#nom').val(data[0].nom);
                    if($('#nom').val()!='') {
                        $('#editer_ajouter').text('Mettre à jour');
                        $('#action').attr('value','editer');
                        $('#id_clt').attr('value',data[0].id_clt);
                    } else {
                        $('#editer_ajouter').text('inserer');
                        $('#action').attr('value','inserer');
                    }
                    $('#prenom').val(data[0].prenom);
                    $('#rue').val(data[0].rue);
                    $('#cp').val(data[0].cp);
                    $('#localite').val(data[0].localite);
                    $('#telephone').val(data[0].telephone);
                    $('#email').val(data[0].email);
                    $('#pass_clt').val(data[0].pass_clt);
                }
            });
            $('#matricule').click(function(){
                $('#matricule').val('');
                $('#nom').val('');
            })
        }
    });



        //blur : perte de focus
        $('#reference').blur(function(){
            var ref = $(this).val();
            if(ref != ''){
                var parametre="ref="+ref;
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: 'json',
                    url: './lib/php/ajax/ajaxRechercheProduit.php',
                    success: function(data){
                        console.log(data);
                        $('#denomination').val(data[0].nom_produit);
                        if($('#denomination').val()!='') {
                            $('#editer_ajouter').text('Mettre à jour');
                            $('#action').attr('value','editer');
                            $('#id_produit').attr('value',data[0].id_produit);
                        } else {
                            $('#editer_ajouter').text('inserer');
                            $('#action').attr('value','inserer');
                        }
                        $('#description').val(data[0].description);
                        $('#prix').val(data[0].prix);
                        $('#stock').val(data[0].stock);
                        $('#id_cat').val(data[0].id_cat);
                        $('#image').val(data[0].image);
                    }
                });
                $('#reference').click(function(){
                    $('#reference').val('');
                    $('#denomination').val('');
                })
            }
        });



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
    $('#choix_produit').change(function(){
        //récupérer la valeur de l'attribut name (pour le php)
        var attribut = $(this).attr('name');
        //valeur de cet attribut
        var id = $(this).val();
        var parametre = "id_produit="+id;
        $.ajax({
            type: 'GET',
            data: parametre, //ce qui est envoyé à ajaxProduitDetail
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxDetailProduit.php',
            success: function(data) { //data : ce qui est reçu de ajaxProduitDetail
                console.log(data);
                $('#id_produit').html("<br><b>"+data[0].nom_produit+"</b><br>"+data[0].description);
                $('#image_produit').html('<img src="./admin/images/'+data[0].image+'" alt="Illustration">');
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