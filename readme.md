## Sistema de agendamento de consultas para Clinicas<br>
Foi um projeto criado quando iniciei meus estudos via Alura, antes desse período todo meu conhecimento foi 'autodidata', então era tudo muito bagunçado.<br>
Com ajuda dos cursos consegui deixar o código um pouco mais legível e acessível para outros entenderem, além de iniciar o aprendizado a POO no PHP.<br>
Nunca foi finalizado, após esse período saí da programação e foquei na minha empresa. Agora em 2022 retornando a programação pretendo atualizar esse sistema e refazê-lo 
em HTML/CSS/React/Node.


## Uma explicação do Sistema

Como foi dito a ideia era aprender a trabalhar com POO, além disso a ideia também era deixar o código o mais particionado possível evitando inserir qualquer código diretamente dentro da página. 

#### HTML
Todo feito em tabelas, design que na época já era ultrapassado hoje ainda mais, futuramente será refeito com novas práticas
#### CSS
A medida do possível 'aceitável', mas assim como o HTML o código pode ser melhorado bastante com novas práticas
#### JS
Também, 'aceitável', mas antigo, funcional na medida do possível
#### PHP
Sem conhecimento suficiente para saber se a linguagem evoluiu, provavelmente sim, já que esse projeto é algo 'inicial'.
#### MySQL
Mesmo de outros, funcional, mas hoje existem opções 'melhores'.

### Atualização
Esse projeto será todo atualizado em outro repositório no futuro.

## Sobre o Código
Pegando como exemplo a *index.php*, ela puxa o Cabeçalho e o Rodapé, justamente porque esses itens são fixos e não precisam ser adicionados em todas as páginas manualmente, facilitando a manutenção caso precise de alteração.

Cada class/POO do PHP é separado em seu arquivo, cada uma possui a Class do Objeto em si e a Class para conexão ao Banco de Dados DAO. 

### Ideias do sistema
1. Cadastrar planos aceitos na "Clinica"
2. Cadastrar médicos, com planos atendidos e horários de atendimento
3. Cadastrar Clientes/Pacientes
4. Marcar Consultas
