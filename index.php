<?php
    require_once("autoload.php")
    //gera o token de controle para remover o cliente
    $_SESSION['TOKEN']= Util::GeraToken();
    
    $query= "SELECT idadmin 
             FROM admin";
    $db= new DB();
    $db->Sql($query);
?>
                        <div class="simplebox grid740">
                        
                        	<div class="titleh">
                        	  <h3>Lista de Administradores</h3>
                            <div class="shortcuts-icons">
                                <a class="shortcut tips" href="principal.php?t=novousuario" title="Adicionar novo usuario"><img src="img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>
                            </div>
                            </div>

                            <!-- Start Data Tables Initialisation code -->
							<script type="text/javascript" charset="utf-8">
								$(document).ready(function() {
									oTable = $('#example').dataTable({
									"bJQueryUI": true,
									"sPaginationType": "full_numbers"
									});
								} );
							</script>
                            <!-- End Data Tables Initialisation code -->


							<table cellpadding="0" cellspacing="0" border="0" class="display data-table" id="example">
                            
								<thead>
									<tr>
                                    	<th>Código</th>
                                        <th>Nome</th>
                                        <th>Nivel</th>
                                        <td></td>
                                    </tr>
                               	</thead>
                                
                                <tbody>
									<?php
										while($dado= $db->Fetch()){
                                            $usuario= new Usuario();
                                            $usuario->Carrega($dado->idadmin);

                                            $nivel= new Nivel();
                                            $nivel->Carrega($usuario->getIdniv());
										echo "
                                    	<tr class='lista {$usuario->getIdadmin()} gradeA'>
                                			<td>{$usuario->getIdadmin()}</td>
                                			<td>
                                				<a href=\"principal.php?t=editausuario&id={$usuario->getIdadmin()}\">
                                					{$usuario->getNome()}
                                				</a>
                                			</td>
                                            <td>{$nivel->getNivel()}</td>
                                   			<td class=\"delete\">
                                				<a href='#' class='funr' id='{$usuario->getIdadmin()}' title='{$usuario->getNome()}'>
                                					Deletar
                                				</a>
                                			</td>
                                		</tr>";
										}
									?>
                                   
								</tbody>
							</table>
                        </div>
<script>
$(document).ready(function(){
    $('.funr').live("click", function(e){
        e.preventDefault();
        var idr = $(this).attr('id');
        var token = "<?php echo $_SESSION['TOKEN']; ?>";
        var name = $(this).attr('title');
        var r=confirm("Deseja remover "+name+" ?");
        if (r==true)
            {
        $.ajax({
        url: 'principal.php?t=removeusuario&Usuario='+idr+'&Token='+token,
        success: function() {
        $('.removido').fadeIn(500);
        $('tr.'+idr).fadeOut(500);
        }
        });
            }
        return false;
    });
});
</script>