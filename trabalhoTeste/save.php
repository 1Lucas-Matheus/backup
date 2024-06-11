echo '
                <section>
                    <div class="col-12 d-flex justify-content-between px-2">
                        ' . $comentario['conteudo'] . '.
                        <button class="btn btn-primary" data-bs-target="#modals" data-bs-toggle="modal">Editar</button>
                    </div>
                    <div class="modal fade" id="modals" aria-hidden="true" aria-labelledby="EditarComentario" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="EditarComentario">Editar Comentário</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <button class="btn btn-primary" id="textoBotao3" data-bs-target="#modalExluir" data-bs-toggle="modal">
                                        <h5 class="modal-title">Excluir</h5>
                                    </button>
                                    <button class="btn btn-primary" id="textoBotao4" data-bs-target="#modalEditar" data-bs-toggle="modal">
                                        <h5 class="modal-title">Editar</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="modal fade" id="modalExluir" aria-hidden="true" aria-labelledby="ExcluirComentario" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ExcluirComentario">Excluir Comentário</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-dismissible fade show alert-danger col-12" role="alert">
                                        <strong> Você tem certeza que quer apagar esse comentário? </strong>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modals">Voltar</button>
                                    <form action="excluirComentario.php" method="get">
                                        <input type="hidden" name="comentarioId" value="' . $comentario['idComentario'] . '">
                                        <button class="btn btn-success" name="excluir">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="modal fade" id="modalEditar" aria-hidden="true" aria-labelledby="divEditarComentarioLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="divEditarComentarioLabel">Editar Comentário</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 needs-validation" action="atualizarComentario.php" novalidate>
                                        <label for="novoComentario" class="form-label">Comentário:</label>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control" id="novoComentario" aria-describedby="inputGroupPrepend3" name="novoComentario" value="' . $comentario['conteudo'] . '" required>
                                            <input type="hidden" name="comentarioId" value="' . $comentario['idComentario'] . '">
                                            <div class="invalid-feedback">
                                                Digite o comentário.
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modals">Voltar</button>
                                            <button class="btn btn-success">Atualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </section>
                ';