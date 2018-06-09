$(document).ready(function(){
    listarAtleta();

    function limparCampos(){
        $('#codigo').val('');
        $('#nome').val('');
        $('#idade').val('');
        $('#numero').val('');
        $('#posicao').val('');        
    }

    function listarAtleta(){
        $.ajax({
            url: 'jQueryPostRecebe.php',
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: {operacao: 'p'},
            success: function(data, textStatus, jqXhr) {
                $("#listaAtleta").html("");

                //console.log(data);

                if (data){
                var retorno = data.split("-");
                    if (retorno.length > 0) {
                        var tabela = '<table class="table table-striped">';
                        tabela += "<tr><td>#</td>";                                        
                        tabela += "<td>Nome</td>";                    
                        tabela += "<td>Idade</td>";                                        
                        tabela += "<td>Nr. Camiseta</td>";                                        
                        tabela += "<td>Posição</td>";
                        tabela += "<td>Opcoes</td></tr>";                                

                        for (var i =0; i < retorno.length; i++) {
                            retornoLinha = retorno[i].split('%%&&');   
                            //retornoValor = retornoLinha[1].split('$$#@');             
                            tabela += "<tr>";
                            tabela += "<td>" + retornoLinha[0] + "</td>";
                            tabela += "<td>" + retornoLinha[1] + "</td>";                        
                            tabela += "<td>" + retornoLinha[2] + "</td>";
                            tabela += "<td>" + retornoLinha[3] + "</td>";                            
                            tabela += "<td>" + retornoLinha[4] + "</td>";                            
                            tabela += "<td>" +
                                        "<a data-op='0' data-id='" + retornoLinha[0] + "' href='#' class='btn btn-info btn-sm'>" +
                                            "<span class='glyphicon glyphicon-edit'></span> Editar " +
                                        "</a>  " +

                                        "<a data-op='1' data-id='" + retornoLinha[0] + "' href='#' class='btn btn-danger btn-sm'>" +
                                            "<span class='glyphicon glyphicon-trash'></span> Excluir " +
                                        "</a>  " +
                                        "</td>";
                            tabela += "</tr>";
                        }

                        tabela += '</table>';

                        $('#listaAtleta').append(tabela);
                    }
                }
            }
        })
    };

    $("#listaAtleta").click(function(e){
    
        var id = e.target.dataset.id; //Esta usando pelo assim, porque ele se perde nas refernecia quando cria o automatico a tabela

        if (e.target.dataset.op == 0) { //Editar;
            $.ajax({
                url: 'jQueryPostRecebe.php',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {operacao: 'p', dados: id},
                success: function(data, textStatus, jqXhr) {
                    var retorno = data.split('%%&&');

                    $('#codigo').val(retorno[0]);
                    $('#nome').val(retorno[1]);
                    $('#idade').val(retorno[2]);
                    $('#numero').val(retorno[3]);                    
                    $('#posicao').val(retorno[4]);                    

                }, 
                error: function(data, textStatus, jQxhr) {
                    console.log(textStatus);
                }
            });

        } else if (e.target.dataset.op == 1) {//Excluir;
            $.ajax({
            url: 'jQueryPostRecebe.php',
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: {operacao: 'd', dados: id},
            success: function(data, textStatus, jQxhr) {
                console.log(data);
                listarAtleta();

                retorno = data.split('-');

                if (retorno[0] == 0){
                    alerta = '<div class="alert alert-success" role="alert">'+retorno[1]+'</div>';
                } else{
                    alerta = '<div class="alert alert-danger" role="alert">'+retorno[1]+'</div>';
                }  
                
                $("#alertMsg").html(alerta);
            },
            error: function (jqXhr, textStatus, errorThrow) {
                console.log(textStatus);
            }
            });    
        }
    });

    $("#formulario").submit(function (e){
        var serialize = $(this).serializeArray();
        $.ajax({
            url: 'jQueryPostRecebe.php',
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: {operacao: 'c', data:serialize},
            success: function(data, textStatus, jQxhr) {
                console.log(data);

                retorno = data.split('-');

                if (retorno[0] == 0){
                    alerta = '<div class="alert alert-success" role="alert">'+retorno[1]+'</div>';
                } else{
                    alerta = '<div class="alert alert-danger" role="alert">'+retorno[1]+'</div>';
                } 
                
                $("#alertMsg").html(alerta);

                listarAtleta();
                limparCampos();
            },
            error: function (jqXhr, textStatus, errorThrow) {
                console.log(textStatus);
            }
        });
        e.preventDefault();
    })
})