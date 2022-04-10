<!--div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalLabel">Lançar Item</h4>
        </div>
        <div class="modal-body"> 
            Deseja realmente excluir este item?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info">Sim</button>
            <button type="button" class="btn btn_default" data-dismiss="modal">Não</button>
        </div>
    </div>
</div>
</div-->
<div id="main" class="container-fluid">
    <div id="top" class="row">
        <div class="col-md-12">
            <h3 class="page-header">Registrar notas</h3>
            <form method="post" action="../controller/verificarTurma.php">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="turma">Turma:</label>
                        <select id="turma" class="form-control" name="turma">
                            <option></option>
                            <option>251</option>
                            <option>432</option>
                            <option>351</option>
                            <option>201</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="disciplina">Discipina:</label>
                        <select id="disciplina" class="form-control">
                            <option></option>
                            <option>LTPW</option>
                            <option>BOOTSTRAP</option>
                            <option>DESIGN</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="professor">Professor:</label>
                        <select id="professor" class="form-control">
                            <option></option>
                            <option>Rodolfo</option>
                            <option>Freitas</option>
                            <option>Flavia</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data">Data da disciplina:</label>
                        <input type="date" id="data" class="form-control">
                    </div>

                </div>
        </div>
        <!--/#top-->
        <div id="list" class="row">
            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpedding="0">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nome do aluno</th>
                            <th>Status</th>
                            <th>Ano letivo</th>  
                            <th class="actions"> Ações </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor site amot...</td>
                            <td>Jes</td>
                            <td>01/01/2015</td>
                            <td class="actions">
                                <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                <a class="btn btn-warning btn-sm" href="_include/edite.html">Editar </a>
                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#delete-modal">Lançar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
        <!--/#list-->
        <div id="bottom" class="row">
            <!--div class="col-md-12"-->
                <ul class="pagination">
                    <li class="disabled"><a>&lt; Anterior</a></li>
                    <li class="disabled"><a>1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                </ul>
            <!--/div-->
        </div> <!--#bottom-->
</div>