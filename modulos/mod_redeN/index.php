<?php

class redeNController
{

	
	private $options;
	private $msg;

	function redeNController($options)
	{
		$this->options = $options;
                //var_dump($options);

	}

	function action()
	{

            



            if ( array_key_exists('action',$this->options) )
            {
                if ( strcasecmp($this->options['action'], "treinar") == 0 )
                {
                    require_once(dirname(__FILE__).DS.'fileModel.php');
                    
                    $classe = 'fileModel';
                    $file  = new $classe($this->options);
                    
                    $retorno = $file->uploadFile();
                    $file->openFile();

                    if ($retorno == 1)
                    {

                        $this->msg = '
                                <div class="alert alert-info">
                                Treinando a rede. Aguarde...
                                </div> ';
//                        $view->setTags('msg', $this->msg);

                        require_once(dirname(__FILE__).DS.'treinamentoModel.php');


                        $treinar = new treinamentoModel($this->options);

                        $treinar->setCvs($file->getCvs());
                        //$treinar->rodarTreinamento(); 
                        $treinar->rodarTreinamentoNovo();

                        
                        $file->arrayFileSave($treinar->getBiasCamadaOculta(),'biasCamadaOculta.txt');
                        $file->arrayFileSave($treinar->getBiasCamadaFinal(),'biasCamadaSaida.txt');
                        $file->arrayFileSave($treinar->getPesosCamadaOculta(),'pesoCamadaOculta.txt');
                        $file->arrayFileSave($treinar->getPesosCamadaFinal(),'pesoCamadaSaida.txt');
                        $file->arrayFileSave($treinar->getArrayMaxMin(),'maxMin.txt');
                        
                        $this->msg = ' <div class="alert alert-info">  Finalizado';
                        $this->msg .= ' QtdNeuronio:'.$treinar->getNCESC().', Epocas: '.$treinar->getEpocas().', Eta: .'.$treinar->getEta().', Erros:  '.$treinar->getErrodes();
                        $this->msg .= '<br/>'.$treinar->getMsg();
                        $this->msg .='</br>'.$treinar->getTimeMsg();
                        $this->msg .= ' </div> ';
                        
                  
                        echo $treinar->processarGraficoJSON();
                        //   echo $treinar->getMsg();
                        
                        
                      
           
                        
                          
                    }
                    else
                    {


                    }
                   
                }
                
                 if ( strcasecmp($this->options['action'], "simular") == 0 )
                 {
                    require_once(dirname(__FILE__).DS.'fileModel.php');
                    
                    $classe = 'fileModel';
                    $file  = new $classe($this->options);
                    $retorno = $file->uploadFile();
                    $file->openFile();
                    
                    if ($retorno == 1)
                    {
                        require_once(dirname(__FILE__).DS.'treinamentoModel.php');
                        $treinar = new treinamentoModel($this->options);
                        $treinar->setCvs($file->getCvs());

                        $treinar->setBiasCamadaOculta($file->arrayFileGet('biasCamadaOculta.txt'));
                        $treinar->setBiasCamadaFinal($file->arrayFileGet('biasCamadaSaida.txt'));
                        $treinar->setPesosCamadaOculta($file->arrayFileGet('pesoCamadaOculta.txt'));
                        $treinar->setPesosCamadaFinal($file->arrayFileGet('pesoCamadaSaida.txt'));
                        $treinar->setArrayMaxMin($file->arrayFileGet('maxMin.txt'));
                        
                       
                        
                        $treinar->rodarSimulacao(); 
                        
                        //echo json_encode($treinar->processarGraficoJSON());
                         echo $treinar->processarGraficoJSON();


                        
           
                    }
                    
                 }


            }


	}


	function run()
	{
	
            if ( array_key_exists('action',$this->options) )
            {
               $this->action();
            }
            
            if ( array_key_exists('view',$this->options) )
            {
                require_once(dirname(__FILE__).DS.$this->options['view'].'View.php');
                $classe = $this->options['view'].'View';
                $view = new $classe();
                $view->loadViewTemplate(null,'conteudo'); 
                $view->display();
            }
                

	}



}

?>


