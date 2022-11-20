## Sistema de agendamento de consultas para Clinicas<br>
Foi criado quando eu estava estudando via 'Cursos' na Alura, antes desse período todo meu conhecimento foi 'autodidata', então era tudo muito bagunçado.<br>
Com ajuda dos cursos consegui deixar o código um pouco mais legível e acessível para outros entenderem, além de iniciar o aprendizado a POO no PHP.<br>
Nunca foi finalizado, após esse período saí da programação e foquei em minha empresa. Agora em 2022 retornando a programação pretendo atualizar esse sistema e refazê-lo 
em HTML/CSS/React/Node.


## Uma explicação do Sistema

Como foi dito a ideia era aprender a trabalhar com POO, além disso a ideia também era deixar o código o mais particionado possível evitando inserir qualquer código diretamente dentro da página. 

Pegando como exemplo a *index.php*, ela puxa o Cabeçalho e o Rodapé, justamente porque esses itens são fixos e não precisam ser adicionados em todas as páginas manualmente, facilitando a manutenção caso precise de alteração.

Cada class/POO do PHP é separado em seu arquivo, cada uma possui a Class do Objeto em si e a Class para conexão ao Banco de Dados DAO. 

### Ideias do sistema
1. Cadastrar planos aceitos na "Clinica"
2. Cadastrar médicos, com planos atendidos e horários de atendimento
3. Cadastrar Clientes/Pacientes
4. Marcar Consultas
