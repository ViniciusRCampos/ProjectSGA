# ProjectSGA

Projeto desenvolvido em PHP 8.0 utilizando o framework Laravel 9.x.
Este projeto é uma aplicação web desenvolvida como parte de um teste técnico.

O projeto é uma simulação de um sistema de vendas onde é possível cadastrar ou atualizar clientes, produtos, lojas e vendedores. Possui também uma aba onde encontra-se um relatório com todas as vendas efetuadas e filtros de data, vendedor, loja e cliente.

## Funcionalidades

1. **Cadastro e Atualização**
   - Permite o cadastro e atualização de:
     - Clientes
     - Produtos
     - Lojas
     - Vendedores

2. **Realizar Venda**
   - Permite que produtos sejam registrados em uma operação e finalize a mesma registrando uma nova venda.

3. **Relatório de Vendas**
   - Possui uma aba de relatório onde encontram-se todas as vendas efetuadas.
   - É possível filtrar os dados do relatório pelos seguintes filtros:
     - Data
     - Loja
     - Vendedor
     - Cliente
   - Pode-se utilizar mais de um filtro ao mesmo tempo.

## Tecnologias Utilizadas

- Laravel 9.x
- PHP 8.0
- MySQL
- Docker
- Node.js/NPM
- Vite (para gerenciamento de assets)

## Requisitos para Instalação
- PHP 8.x ou superior
- Composer
- MySQL
- Node.js e NPM

## Instalação

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/ViniciusRCampos/ProjectSGA.git
   cd ProjectSGA
   ```

2. **Instale as Dependências do Backend:**
   ```bash
   composer install
   ```

3. **Instale as Dependências do Frontend:**
   ```bash
   npm install
   ```

4. **Configure o Arquivo `.env`**:
   - Copie o arquivo de exemplo:
     ```bash
     cp .env.example .env
     ```
   - Configure as variáveis de ambiente, como conexão com o banco de dados.

5. **Gere a chave da aplicação:**

   ```bash
   php artisan key:generate
   ```

6. **Execute as Migrações**:
   ```bash
   php artisan migrate
   ```

7. **Compile os Assets**:
   ```bash
   npm run dev
   ```

8. **Inicie o Servidor Local**:
   ```bash
   php artisan serve
   ```

9. **(Opcional) Execute as Seeders**:
   ```bash
   php artisan db:seed
   ```

Acesse o sistema no navegador em: [http://localhost:8000](http://localhost:8000)

## Uso
Após iniciar o servidor, você pode interagir com a aplicação acessando o endereço fornecido.

### Tela inicial
A tela inicial é dividida em quatro partes:

1. **Primeira Parte - Dados da Venda**:
    - Possui três selects: Cliente, Loja, Vendedor.
    - O ícone **"+"** verde permite o cadastro de um novo elemento do select.
    - Ao selecionar uma opção, é possível editá-la clicando no botão de **lápis**.
    - O select de vendedor só é habilitado após a seleção de uma loja.

2. **Segunda Parte - Produtos**:
    - Possui apenas um select: Produto.
    - Os campos dessa parte são preenchidos automaticamente ao selecionar um produto.
    - É possível alterar a quantidade do produto, mas valores negativos não são aceitos.
    - O total é calculado automaticamente assim que a quantidade for alterada.
    - O botão **Adicionar** envia o produto para a tabela com o resumo da venda e remove o item do select de produtos.

3. **Terceira Parte - Resumo**:
    - Contém a tabela com o resumo da venda e o total da operação no canto inferior direito.
    - Todo registro na tabela pode ser removido clicando no **"X"** vermelho na primeira coluna.
    - Assim que o item for removido da tabela, ele será adicionado novamente no select de produtos.

4. **Quarta Parte - Finalizar**:
    - Quando há itens no resumo, os campos dessa parte são habilitados.
    - É possível adicionar observações sobre a venda.
    - Possui um select com todas as formas de pagamento.
    - O botão **"Finalizar"** só é habilitado quando uma forma de pagamento é selecionada.
    - Clicar no botão **"Finalizar"** registra a venda e recarrega a página em caso de sucesso.

### Tela de Relatórios
A tela de relatórios possui duas partes:

1. **Primeira Parte - Filtros**:
    - Possui quatro filtros que podem ser utilizados separadamente ou combinados para buscas mais elaboradas.
        - Os filtros são: Data, Loja, Vendedor, Cliente.
    - O botão **"Filtrar"** aplica os filtros.

2. **Segunda Parte - Tabela**:
    - A tabela exibe todos os registros existentes.
    - Caso algum filtro seja aplicado, a tabela exibirá apenas os resultados correspondentes.

## Seeders

O projeto conta com alguns seeders para auxiliar na primeira manipulação dos dados. Caso tenha interesse, basta executar o comando mencionado na seção [Instalação](#instala%C3%A7%C3%A3o), item 9.

## Configuração com Docker

Para rodar o projeto utilizando Docker, siga as etapas abaixo:

1. **Certifique-se de que o Docker e o Docker Compose estão instalados na sua máquina.**

2. **Suba os contêineres definidos no `docker-compose.yml`:**

   ```bash
   docker-compose up -d
   ```

3. **Certifique-se de que as variáveis do arquivo `.env` estão configuradas conforme o `docker-compose.yml`.**

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3307
   DB_DATABASE=sga
   DB_USERNAME=sga
   DB_PASSWORD=password
   ```

## Melhorias

1. **FrontEnd**
    - Adicionar tela de login:
        - Criar uma tela para login do usuário.
        - O usuário será vinculado a uma empresa, responsável por lojas.
        - O usuário logado só terá acesso às lojas vinculadas à empresa.

    - Adicionar detalhamento no relatório:
        - Criar um botão para exibir o detalhamento completo da venda.
        - Uma cópia da tabela de resumo da venda.

    - Adicionar dashboards:
        - Exibir faturamento dos últimos dias.
        - Apresentar curva ABC dos produtos mais vendidos.
    
    - Separação dos scripts em arquivos:
        - Melhor organização para facilitar manutenção do código.

2. **BackEnd**
    - Melhorar padronização dos erros:
        - Utilizar melhor o provider e o handler.
    - Implementar testes automatizados para validar funcionalidades do sistema.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests. Por favor, siga as diretrizes de contribuição estabelecidas.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
