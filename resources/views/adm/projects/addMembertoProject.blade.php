<div class="col-sm-12">
    {{-- Adicionar membro --}}

    <div class="">
        <label class="control-label col-md-12" for="members">Membros:</label>
        <button type="button" id="addMember" class="btn bg-info col-sm-12" style="margin-left:15px; margin-right:25xp;">Adicionar Membros</button>
    </div>
    <div class="row" id="newMember"></div>

     {{-- Modal para adicionar novos Membros ao projeto --}}
     <div class="modal fade" id="memberModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="memberAdd_form" enctype="multipart/form-data" class="form-horizontal" method="post"  >
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Adicionar Membro</h5>
                    </div>
                    <div class="modal-body">
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label for="name">Coloque o nome do membro</label>
                            <input type="text" name="name" id="nameMember" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="function">Coloque a função</label>
                            <input type="text" name="function" id="functionMember" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="button_action" id="button_action" value="insert"/>
                        <input type="submit" name="submit" id="action" value="Adicionar" class="btn btn-info" />
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

