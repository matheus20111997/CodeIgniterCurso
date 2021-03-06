

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Gerenciar ' . $subtitulo; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Adicionar novo ' . $subtitulo; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/Usuarios/inserirusr'); /* aponta pro metodo */
                            ?>
                            <label id="nomeusr">Nome do usuario:</label>
                            <input type="text" id="nomeusr" name="nomeusr" class="form-control"
                                   placeholder="Digite o nome do usuário" value="<?php echo set_value('nomeusr'); ?>">
                            <br>

                            <label id="emailusr">Email do usuario:</label>
                            <input type="text" id="emailusr" name="emailusr" class="form-control"
                                   placeholder="Digite o email do usuário" value="<?php echo set_value('emailusr'); ?>">
                            <br>
                            <label id="historicousr">Histórico:</label>
                            <textarea id="historicousr" name="historicousr" class="form-control"
                                      placeholder="Digite o histórico do usuário" ><?php echo set_value('historicousr'); ?></textarea>
                            <br>
                            <label id="loginusr">Login do usuario:</label>
                            <input type="text" id="loginusr" name="loginusr" class="form-control"
                                   value="<?php echo set_value('loginusr'); ?>" placeholder="Digite o login do usuário">
                            <br>
                            <label id="senhausr">Senha do usuario:</label>
                            <input type="password" id="senhausr" name="senhausr" class="form-control">
                            <br>
                            <label id="senhausr2">Confirmar senha:</label>
                            <input type="password" id="senhausr2" name="senhausr2" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                            <?php
                            echo form_close();
                            ?>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Editar ' . $subtitulo . ' existente'; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <style>
                                img{
                                    width: 60px;
                                }
                            </style>

                            <?php
                            $this->table->set_heading("Foto", "Nome", "Editar", "Excluir");
                            $template = array(
                                'table_open' => '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-tabela">'
                            );
                            $this->table->set_template($template);

                            if (isset($usuarios)) {
                                foreach ($usuarios as $user) {

                                    $atributoshtml = array(
                                        'onclick' => "return confirm('Deseja realmente excluir o usuário?')",
                                        'class' => 'btn btn-danger btn-block'
                                    );
                                    if ($user->img == 1) {
                                        $fotouser = img("assets/frontend/img/usuario/" . md5($user->id) . ".jpg");
                                    } else {
                                        $fotouser = img("assets/frontend/img/semfoto.png");
                                    }
                                    $nomeuser = $user->nome;

                                    $alteraruser = anchor(base_url('admin/Usuarios/alterar/' . md5($user->id)), '<i class="fas fa-edit"></i> Alterar', array(
                                        'class' => 'btn btn-primary btn-block'
                                    ));
                                    $excluiruser = anchor(base_url('admin/Usuarios/excluir/' . md5($user->id)), '<i class="fas fa-trash-alt fa-"></i> Excluir', $atributoshtml);

                                    $this->table->add_row($fotouser, $nomeuser, $alteraruser, $excluiruser);
                                }
                            }echo $this->table->generate(); //atentar para nao deixar o generate dentro do foreach
                            ?>

                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
