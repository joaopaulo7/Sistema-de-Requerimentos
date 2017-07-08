    <?php
		include_once 'fpdf/fpdf.php';
		$PDF = new FPDF('p', 'pt', 'A4');
		$PDF -> SetTitle("Formulario");
		$PDF -> SetAuthor('Sistema de Requerimentos CEFET-MG Varginha');
		$PDF -> SetCreator('Php'.phpversion());
		$PDF -> SetKeywords('teste','php','pdf');
		$PDF -> SetSubject('Formulario Substuicao');
		$PDF -> AddPage();
		$PDF -> SetFont('arial','',12);
		$PDF -> Ln(20);
		//texto
		$y = 20;
		$PDF -> SetFont('Courier','B',24);
		$PDF -> SetY($y);
		$PDF -> SetX(170);
		$PDF -> Write(20,utf8_decode('Fomrulário de Substituição de Professores'));
		
		$PDF -> SetFont('arial','',12);
		
		$PDF -> SetX(170);
		$PDF -> SetY($y+=100);
		$txt = 'Professor Substituido: '.$this->ConfirmacoesModel->getProf($form->materia);
		$txt = utf8_decode($txt);
		$PDF->Write(40,$txt);
		
		$PDF -> SetX(170);
		$PDF -> SetY($y+=20);
		$txt = 'Professor Substituto: '.$this->ConfirmacoesModel->getPessoa($form->professor_substituto);
		$txt = utf8_decode($txt);
		$PDF->Write(40, $txt);
		
		$PDF -> SetX(170);
		$PDF -> SetY($y+=20);
		$txt = 'Coordenador: '.$this->ConfirmacoesModel->getPessoa($form->coordenador);
		$txt = utf8_decode($txt);
		$PDF->Write(40, $txt);
		
		$PDF -> SetX(170);
		$PDF -> SetY($y+=20);
		$txt = 'Motivo: '.$form->motivo;
		$txt = utf8_decode($txt);
		$PDF->Write(40, $txt);
		
		$PDF -> SetX(170);
		$PDF -> SetY($y+=20);
		$txt = 'Data da substuição: '.$form->data_da_substituicao;
		$txt = utf8_decode($txt);
		$PDF->Write(40,$txt);
		
		$PDF -> SetX(170);
		$PDF -> SetY($y+=20);
		$txt = 'Horario da substuição: '.$form->horario_substituicao;
		$txt = utf8_decode($txt);
		$PDF->Write(40,$txt);
		
		$PDF ->OutPut();