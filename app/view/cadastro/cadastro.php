<?php
#Nome do arquivo: cadastro/cadastro.php
#Objetivo: interface para logar no sistema

require_once(__DIR__ . "/../include/header.php");
?>

<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-6">
            <div class="">
                <h4>Informe os dados para efutuar o cadastro:</h4>
                <br>

                <!-- Formulário de cadastro -->
                <form id="frmLogin" action="./CadastroController.php?action=save" method="POST" >
                    <div class="mb-3">
                        <label class="form-label" for="txtEmail">Email:</label>
                        <input type="text" class="form-control" name="email" id="txtEmail"
                            maxlength="200" placeholder="Informe o email"
                            value="<?php echo isset($dados['usuario']) ? $dados['usuario']->getEmail() : '' ?>" />        
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtSenha">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="txtNome"
                            maxlength="15" placeholder="Informe seu nome"
                            value="<?php echo isset($dados['nome']) ? $dados['nome'] : '' ?>" />        
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtData_Nasc">Data de nascimento:</label>
                        <input type="date" class="form-control" name="data_nasc" id="txtData_Nasc"
                            maxlength="15" placeholder="Informe sua data de nascimento"
                            value="<?php echo isset($dados['data_nasc']) ? $dados['data_nasc'] : '' ?>" />        
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtTelefone">Telefone:</label>
                        <input type="number" class="form-control" name="telefone" id="txttelefone"
                            maxlength="15" placeholder="Informe seu número de telefone"
                            value="<?php echo isset($dados['telefone']) ? $dados['telefone'] : '' ?>" />        
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtSenha">Senha:</label>
                        <input type="password" class="form-control" name="senha" id="txtSenha"
                            maxlength="15" placeholder="Informe a senha"
                            value="<?php echo isset($dados['senha']) ? $dados['senha'] : '' ?>" />        
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
                </form>
            </div>
        </div>

        <div class="col-6">
            <?php include_once(__DIR__ . "/../include/msg.php") ?>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
