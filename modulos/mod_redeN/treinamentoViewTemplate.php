<script src="templates/js/Chart/Chart.min.js"></script>
<script src="templates/js/Chart/legend.js"></script>


<STYLE type="text/css">  
  <!--  

  .legend {
    width: 10em;
    border: 1px solid black;
}

.legend .title {
    display: block;
    margin-bottom: 0.5em;
    line-height: 1.2em;
    padding: 0 0.3em;
}

.legend .color-sample {
    display: block;
    float: left;
    width: 1em;
    height: 1em;
    border: 2px solid; /* Comment out if you don't want to show the fillColor */
    border-radius: 0.5em; /* Comment out if you prefer squarish samples */
    margin-right: 0.5em;
} 

  -->  
  </STYLE>



{grafico}

  <script type="text/javascript">
   
    </script>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Treinamento da Rede.
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form role="form" class="upload" id="upload" method="POST" action="index.php" enctype="multipart/form-data">
                <div class="col-lg-6">
                        
                    <!-- MAX_FILE_SIZE deve preceder o campo input -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                    <input type="hidden" name="modulo" value="redeN">

                     <div class="form-group">
                        <label>Qantidade de Neurónios da camada oculta padrão 2</label>
                        <input class="form-control" placeholder="2" value="2" name="neuronio">
                         <label>Qantidade de épocas para treinamento</label>
                        <input class="form-control" placeholder="1000" value="1000" name="epocas">
                        <label>Taxa de treinamento</label>
                        <input class="form-control" placeholder="0.2" value="0.2" name="treinamento">
                          <label>Taxa de erro</label>
                        <input class="form-control" placeholder="0.004" value="0.004" name="txerro">
                    </div>
                     <div class="form-group">
                        <label></label>
                        <label class="radio-inline">
                            <input type="radio" name="action" id="optionsRadiosInline1" value="treinar" checked>Treinar
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="action" id="optionsRadiosInline2" value="simular">Simular
                        </label>

                    </div>
                    Enviar arquivo: <input id="userfile" name="userfile" type="file" />
                    <input type="submit" value="Treinar rede" />                   
                    
                  
                </div>
                <div class="col-lg-6">
                      <div class="form-group">
                        <label>Algorítimo</label>
                        <select class="form-control" name='funcaoAtivacao'>
                            <option value='sigmoid'>Sigmoid</option>
                            <option value='hiperbolica'>Hiperbólica</option>
                        </select>
                      </div>
                </div>
                    
                </form>
                
               
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                              <div  >
                            <label>Debug</label>
                            <textarea id="debug" class="form-control" rows="5"></textarea>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                            <div id="graficoCanvas">
                                
                            </div>
                            <div id="graficoCanvas2">
                                
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->   


               <!-- jQuery -->
    <script src="templates/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="templates/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="templates/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="templates/js/enviarFormulario.js"></script>
    <script src="templates/js/montarGrafico.js"></script>
    

   

    <!-- Custom Theme JavaScript -->
    <script src="templates/dist/js/sb-admin-2.js"></script>
