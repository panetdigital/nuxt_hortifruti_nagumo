        
        
        async function carregar_produtos(valor) {
            if (valor.length >= 2) {
             //console.log("Pesquisar: " + valor);
             
                const dados = await fetch('https://nagumo.marketingonline.click/public/autocomplete.php?nome=' + valor);

                //const dados = await fetch('https://nagumo.marketingonline.click/public/autocomplete/nome=' + valor);
               

                console.log(dados);
                const resposta = await dados.json();
                //console.log(resposta);

                var html = "<ul class='list-group position-fixed'>";

                if (resposta['erro']) {
                    html += "<li class='list-group-item disabled'>" + resposta['msg'] + "</li>";
                } else {
                    for (i = 0; i < resposta['dados'].length; i++) {
                        html += "<li class='list-group-item list-group-item-action' onclick='get_id_produto(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>" + resposta['dados'][i].nome + "</li>";
                    }

                }
                html += "</ul>";

                document.getElementById('resultado_pesquisa').innerHTML = html; 
            }
        }


             //funcao pra disparar evento ao clicar no lista do autocomplete

        function get_id_produto(id_usuario, nome) {
            //console.log("Id do usuario selecionado: " + id_usuario);
            //console.log("nome do usuario selecionado: " + nome);

            document.getElementById("pesquisa").value = nome;

            document.getElementById("id_usuario").value = id_usuario;
        }

            //funcao pra fechar evento ao clicar no lista do autocomplete

        const fechar = document.getElementById('pesquisa');

        document.addEventListener('click', function (event) {
            const validar_clique = fechar.contains(event.target);
            if (!validar_clique) {
                document.getElementById('resultado_pesquisa').innerHTML = '';
            }
        }); 