<?php
class block_simplehtml extends block_base {
    public function init() {
        $this->title = get_string('simplehtml', 'block_simplehtml');
    }
function get_content() {
        global $CFG, $OUTPUT, $USER, $DB;
        $userId = $USER->id;
        $cv = 100; // Creative Visionary
	$curiosity = 100;
	$imagination = 100;
	$vision = 100;
        $dc = 100; // Deep Collaborator
	$teamwork = 100;
	$communication = 100;
	$generosity = 100;
        $ec = 100; // Activist Empathic
        $empathy = 100;
	$leadership = 100;
	$courage = 100;
	$st = 100; // Systemic Thinker
	$analysis = 100;
	$systemThin = 100;
	$experiment = 100;
	$surveyCV = 0; $surveyDC = 0; $surveyEC = 0; $surveyST = 0;
        $consulta = $DB->get_records('competency_usercomp', array('userid' => $userId), '', '*', 0, 0);
	$survey = $DB->get_field_sql("SELECT MAX(id) FROM {questionnaire_response} WHERE questionnaireid = 10 AND userid = ". $userId);
	if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }
        $this->content = new stdClass();
	if(count($survey)){
		$records = array_merge($DB->get_records('questionnaire_response_rank', array('response_id' => $survey), '', '*', 0, 0),$DB->get_records('questionnaire_resp_single', array('response_id' => $survey), '', '*', 0, 0));
		//var_dump($records);
		foreach($records as $valor){
			switch($valor->choice_id){
				// CV
				case 85:
					$surveyCV += $valor->rankvalue;
				break;
				case 89:
					$surveyCV += $valor->rankvalue;
				break;
				case 209:
					$surveyCV += 1;
				break;
				case 213:
					$surveyCV += 1;
				break;
				case 216:
					$surveyCV += 1;
				break;
				// DC
				case 83:
					$surveyDC += $valor->rankvalue;
				break;
				case 87:
					$surveyDC += $valor->rankvalue;
				break;
				case 211:
					$surveyDC += 1;
				break;
				case 215:
					$surveyDC += 1;
				break;
				case 219:
					$surveyDC += 1;
				break;
				// EC
				case 84:
					$surveyEC += $valor->rankvalue;
				break;
				case 88:
					$surveyEC += $valor->rankvalue;
				break;
				case 210:
					$surveyEC += 1;
				break;
				case 218:
					$surveyEC += 1;
				break;
				case 220:
					$surveyEC += 1;
				break;
				// ST
				case 86:
					$surveyST += $valor->rankvalue;
				break;
				case 90:
					$surveyST += $valor->rankvalue;
				break;
				case 212:
					$surveyST += 1;
				break;
				case 214:
					$surveyST += 1;
				break;
				case 217:
					$surveyST += 1;
				break;
			}
		}
		$this->content->text = "<h3>¿Qué tipo de agente eres?</h3>";
		$this->content->text .= "<canvas id='chartSurvey' style='display: block; width: 312px; height: 156px;' width='312' height='156' class='chartjs-render-monitor'></canvas>".
					 "<script src='https://cdn.jsdelivr.net/npm/chart.js@2.8.0'></script>
					  <script>
						  Chart.defaults.global.defaultFontColor = '#19222e';
						  Chart.defaults.global.defaultFontSize = 14;
						  var ctx = document.getElementById('chartSurvey').getContext('2d');
						  var myRadarChart = new Chart(ctx, {
						    type: 'radar',
						    data: {
							    labels: ['Solucionador de Problemas', 'Activista Empático', 'Colaborador Profundo', 'Creativo Visionario'],
							    datasets: [{
								label: 'Resultados',
							        data: [".$surveyST.", ".$surveyEC.", ".$surveyDC.", ".$surveyCV."],
								backgroundColor: '#19222e',
								borderColor: '#ea880e'
							    }]
							},
						    options: {
							    legend: {
								    display: false
                                                                },
							    scale: {
								pointLabels: {
									fontColor: '#c4c4c4',
						                        fontSize: 13,
					                    },
								gridLines: {
								        color: ['#c4c4c4', '#c4c4c4', '#c4c4c4', '#c4c4c4']
								      },
							        angleLines: {
							            display: false
							        },
							        ticks: {
							            suggestedMin: 5,
							            suggestedMax: 10
							        }
							    }
							}
						});
					  </script>";
		$this->content->text .= "<!--<div class='row' style='font-size: 20px'><div class='col-3'>CV: ".$surveyCV."</div><div class='col-3'>CP: ".$surveyDC."</div><div class='col-3'>AE: ".$surveyEC."</div><div class='col-3'>SP: ".$surveyST."</div></div>--><hr style='background-color: #ea880e; height: 2px'>";
	}
        if(count($consulta)){
         //$this->content->text = '<h3>Hay Registros: '.count($consulta).'</h3>';
                foreach($consulta as $valor){
                        switch($valor->competencyid){
                        // Creative Visionary
			// Curiosity
                        case 107:
                                $cv -= $valor->grade;
				$curiosity -= $valor->grade;
                        break;
                        case 108:
                                $cv -= $valor->grade;
				$curiosity -= $valor->grade;
                        break;
                        case 198:
                                $cv -= $valor->grade;
				$curiosity -= $valor->grade;
                        break;
			case 247:
                                $cv -= $valor->grade;
                                $curiosity -= $valor->grade;
                        break;
			case 259:
                                $cv -= $valor->grade;
                                $curiosity -= $valor->grade;
                        break;
			case 267:
                                $cv -= $valor->grade;
                                $curiosity -= $valor->grade;
                        break;
			case 268:
                                $cv -= $valor->grade;
                                $curiosity -= $valor->grade;
                        break;
			case 284:
                                $cv -= $valor->grade;
                                $curiosity -= $valor->grade;
                        break;
			case 308:
                                $cv -= $valor->grade;
                                $curiosity -= $valor->grade;
                        break;
			case 316:
                                $cv -= $valor->grade;
                                $curiosity -= $valor->grade;
                        break;
			// Imagination
			case 188:
				$cv -= $valor->grade;
				$imagination -= $valor->grade;
			break;
                        case 190:
                                $cv -= $valor->grade;
                                $imagination -= $valor->grade;
                        break;
			case 242:
                                $cv -= $valor->grade;
                                $imagination -= $valor->grade;
                        break;
			case 249:
                                $cv -= $valor->grade;
                                $imagination -= $valor->grade;
                        break;
			case 262:
                                $cv -= $valor->grade;
                                $imagination -= $valor->grade;
                        break;
			case 270:
                                $cv -= $valor->grade;
                                $imagination -= $valor->grade;
                        break;
			case 277:
                                $cv -= $valor->grade;
                                $imagination -= $valor->grade;
                        break;
			case 294:
                                $cv -= $valor->grade;
                                $imagination -= $valor->grade;
                        break;
			case 305:
                                $cv -= $valor->grade;
                                $imagination -= $valor->grade;
                        break;
			// Vision
			case 194:
                                $cv -= $valor->grade;
                               	$vision -= $valor->grade;
                        break;
			case 191:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			case 203:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			case 231:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			case 266:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			case 289:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			case 290:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			case 295:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			case 314:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			case 318:
                                $cv -= $valor->grade;
                                $vision -= $valor->grade;
                        break;
			// Deep Colaboration
			// Teamwork
			case 181:
				$dc -= $valor->grade;
				$teamwork -= $valor->grade;
			break;
			case 324:
				$dc -= $valor->grade;
				$teamwork -= $valor->grade;
			break;
			case 254:
                                $dc -= $valor->grade;
                                $teamwork -= $valor->grade;
                        break;
			case 283:
                                $dc -= $valor->grade;
                                $teamwork -= $valor->grade;
                        break;
			case 293:
                                $dc -= $valor->grade;
                                $teamwork -= $valor->grade;
                        break;
			case 303:
                                $dc -= $valor->grade;
                                $teamwork -= $valor->grade;
                        break;
			case 309:
                                $dc -= $valor->grade;
                                $teamwork -= $valor->grade;
                        break;
			case 310:
                                $dc -= $valor->grade;
                                $teamwork -= $valor->grade;
                        break;
			case 317:
                                $dc -= $valor->grade;
                                $teamwork -= $valor->grade;
                        break;
			// Communication
			case 183:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 323:
				$dc -= $valor->grade;
				$communication -= $valor->grade;
			break;
			case 205:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 229:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 238:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 258:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 271:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 273:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 285:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 288:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 300:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			case 320:
                                $dc -= $valor->grade;
                                $communication -= $valor->grade;
                        break;
			// Generosity
			case 189:
                                $dc -= $valor->grade;
                                $generosity -= $valor->grade;
                        break;
			case 196:
                                $dc -= $valor->grade;
                                $generosity -= $valor->grade;
                        break;
			case 206:
                                $dc -= $valor->grade;
                                $generosity -= $valor->grade;
                        break;
			case 244:
                                $dc -= $valor->grade;
                                $generosity -= $valor->grade;
                        break;
			case 248:
                                $dc -= $valor->grade;
                                $generosity -= $valor->grade;
                        break;
			case 262:
                                $dc -= $valor->grade;
                                $generosity -= $valor->grade;
                        break;
			case 306:
                                $dc -= $valor->grade;
                                $generosity -= $valor->grade;
                        break;
			//Activist Empathic
			//Empathy
			case 193:
				$ec -= $valor->grade;
				$empathy -= $valor->grade;
			break;
			case 182:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 184:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 252:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 269:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 281:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 282:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 299:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 307:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 314:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			case 319:
                                $ec -= $valor->grade;
                                $empathy -= $valor->grade;
                        break;
			//Leadership
			case 201:
                                $ec -= $valor->grade;
                                $leadership -= $valor->grade;
                        break;
			case 322:
				$ec -= $valor->grade;
				$leadership -= $valor->grade;
			break;
			case 200:
                                $ec -= $valor->grade;
                                $leadership -= $valor->grade;
                        break;
			case 240:
                                $ec -= $valor->grade;
                                $leadership -= $valor->grade;
                        break;
			case 257:
                                $ec -= $valor->grade;
                                $leadership -= $valor->grade;
                        break;
			case 276:
                                $ec -= $valor->grade;
                                $leadership -= $valor->grade;
                        break;
			case 286:
                                $ec -= $valor->grade;
                                $leadership -= $valor->grade;
                        break;
			case 292:
                                $ec -= $valor->grade;
                                $leadership -= $valor->grade;
                        break;
			case 304:
                                $ec -= $valor->grade;
                                $leadership -= $valor->grade;
                        break;
			// Courage
			case 195:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			case 202:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			case 235:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			case 245:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			case 272:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			case 280:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			case 291:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			case 302:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			case 321:
                                $ec -= $valor->grade;
                                $courage -= $valor->grade;
                        break;
			// Problem Solver
			// Analysis
			case 180:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			case 186:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			case 237:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			case 260:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			case 261:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			case 275:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			case 278:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			case 297:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			case 313:
                                $st -= $valor->grade;
                                $analysis -= $valor->grade;
                        break;
			// System Thinkin
			case 185:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			case 204:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			case 233:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			case 250:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			case 264:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			case 265:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			case 274:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			case 298:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			case 312:
                                $st -= $valor->grade;
                                $systemThin -= $valor->grade;
                        break;
			// Experimentation
			case 197:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;
			case 192:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;
			case 199:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;
			case 256:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;
			case 263:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;
			case 279:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;
			case 296:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;
			case 301:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;
			case 311:
                                $st -= $valor->grade;
                                $experiment -= $valor->grade;
                        break;

                        }
                }
        }

        $this->content->text .= "<div class='container'>
    <div class='row'>
        <div class='col-5' data-toggle='collapse' href='#collapseCV' style='cursor: pointer;'>
            <img src='https://devcamilo.github.io/assets/Creativo_visionario.png' role='presentation'>
	    <p style='text-align: center; margin-top: 10px;'>Skills(".(100 - $cv).")</p>
        </div>
        <div class='col-7' data-toggle='collapse' href='#collapseCV' style='cursor: pointer'>
            <p style='font-size: 25px'>Creador</p>
            <p style='font-size: 25px'>Visionario</p>
	    <p style='text-align: right; margin-top: -20px;'>".round((((100 - $cv) * 100) / 156),1)."%</p>
            <hr style='border: 3px solid #294374;'>
            <hr style='border: 2px solid #87eafd;
                                                                                        margin-left: 0%;
                                                                                        margin-right: ".(100 - round((((100 - $cv) * 100) / 156),1))."%;
                        margin-top: -20px'>
	</div>
    </div>
    <div  class=' row collapse' id='collapseCV' style='background-color: #19222E'>
        <div class='col-3'> <!--Curiosidad-->
	   <p style='text-align: center; margin-top: 10px;'>Skills(".(100 - $curiosity).")</p>
	</div>
	<div class='col-3'>
	   <img src='https://devcamilo.github.io/assets/Poder_Curiosidad.png' role='presentation'>
	</div>
	<div class='col-6 align-items-center'>
	  <p style='font-size: 15px'>Curiosidad</p>
	  <p style='font-size: 12px; text-align: right; margin-top: -20px;'>".round((((100 - $curiosity) * 100) / 58),1)."%</p>
	  <hr style='border: 3px solid #294374;'>
	  <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $curiosity) * 100) / 58),1))."%; margin-top: -20px'>
	</div>
	<div class='col-3'> <!--Imaginacion-->
	<p style='text-align: center; margin-top: 10px'>Skills(".(100 - $imagination).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Imaginacion.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Imaginación</p>
	  <p style='font-size: 12px; text-align: right; margin-top: -20px;'>".round((((100 - $imagination) * 100) / 46),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $imagination) * 100) / 46),1))."%; margin-top: -20px'>
        </div>
 	<div class='col-3'> <!--Vision-->
	<p style='text-align: center; margin-top: 10px;'>Skills(".(100 - $vision).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Vision.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Visión</p>
	  <p style='font-size: 12px; text-align: right; margin-top: -20px;'>".round((((100 - $vision) * 100) / 52),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $vision) * 100) / 52),1))."%; margin-top: -20px'>
        </div>
    </div>
    <div class='row'>
        <div class='col-5' data-toggle='collapse' href='#collapseDC' style='cursor: pointer'>
            <img src='https://devcamilo.github.io/assets/Colaborador_profundo.png' role='presentation'>
            <p style='text-align: center; margin-top: 10px;'>Skills(".(100 - $dc).")</p>
        </div>
        <div class='col-7' data-toggle='collapse' href='#collapseDC' style='cursor: pointer'>
            <p style='font-size: 25px'>Colaborador</p>
            <p style='font-size: 25px'>Profundo</p>
            <p style='text-align: right; margin-top: -20px;'>".round((((100 - $dc) * 100) / 144),1)."%</p>
	    <hr style='border: 3px solid #294374;'>
            <hr style='border: 2px solid #87eafd;
                                                                                        margin-left: 0%;
                                                                                        margin-right: ".(100 - round((((100 - $dc) * 100) / 144),1))."%;
                        margin-top: -20px'>
        </div>
        </div>
	<div  class=' row collapse' id='collapseDC' style='background-color: #19222E'>
        <div class='col-3'> <!--Trabajo en Equipo-->
	   <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $teamwork).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Trabajo_Equipo.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Trabajo en Equipo</p>
	  <p style='font-size: 12px; text-align: right; margin-top: -10px;'>".round((((100 - $teamwork) * 100) / 46),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $teamwork) * 100) / 46),1))."%; margin-top: -20px'>
        </div>
        <div class='col-3'> <!--Comunicacion-->
	   <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $communication).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Comunicacion.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Comunicación</p>
	  <p style='font-size: 12px; text-align: right; margin-top: -20px;'>".round((((100 - $communication) * 100) / 56),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $communication) * 100) / 56),1))."%; margin-top: -20px'>
        </div>
        <div class='col-3'> <!--Generosidad-->
	  <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $generosity).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Generosidad.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Generosidad</p>
	  <p style='font-size: 12px; text-align: right; margin-top: -20px;'>".round((((100 - $generosity) * 100) / 42),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $generosity) * 100) / 42),1))."%; margin-top: -20px'>
        </div>
    </div>

        <div class='row'>
            <div class='col-5' data-toggle='collapse' href='#collapseEC' style='cursor: pointer'>
                <img src='https://devcamilo.github.io/assets/Activista_emp%C3%A1tico.png' role='presentation'>
	   	<p style='text-align: center; margin-top: 10px;'>Skills(".(100 - $ec).")</p>
            </div>
            <div class='col-7' data-toggle='collapse' href='#collapseEC' style='cursor: pointer'>
                <p style='font-size: 25px'>Activista</p>
                <p style='font-size: 25px'>Empático</p>
                <p style='text-align: right; margin-top: -20px;'>".round((((100 - $ec) * 100) / 141),1)."%</p>
		<hr style='border: 3px solid #294374;'>
                <hr style='border: 2px solid #87eafd;
                                                                                            margin-left: 0%;
                                                                                            margin-right: ".(100 - round((((100 - $ec) * 100) / 141),1))."%;
                            margin-top: -20px'>
            </div>
        </div>
   <div  class=' row collapse' id='collapseEC' style='background-color: #19222E'>
        <div class='col-3'> <!--Empatia-->
	  <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $empathy).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Empatia.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Empatía</p>
	  <p style='text-align: right; margin-top: -20px;'>".round((((100 - $empathy) * 100) / 60),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $empathy) * 100) / 60),1))."%; margin-top: -20px'>
        </div>
        <div class='col-3'> <!--Liderazgo-->
	  <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $leadership).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Liderazgo.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Liderazgo</p>
	  <p style='text-align: right; margin-top: -20px;'>".round((((100 - $leadership) * 100) / 50),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $leadership) * 100) / 50),1))."%; margin-top: -20px'>
        </div>
        <div class='col-3'> <!--Coraje-->
	  <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $courage).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Coraje.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Coraje</p>
	  <p style='text-align: right; margin-top: -20px;'>".round((((100 - $courage) * 100) / 41),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $courage) * 100) / 41),1))."%; margin-top: -20px'>
        </div>
    </div>

        <div class='row'>
            <div class='col-5' data-toggle='collapse' href='#collapseST' style='cursor: pointer'>
                <img src='https://devcamilo.github.io/assets/Pensador_sist%C3%A9mico.png' role='presentation'>
            	<p style='text-align: center; margin-top: 10px;'>Skills(".(100 - $st).")</p>
	    </div>
            <div class='col-7' data-toggle='collapse' href='#collapseST' style='cursor: pointer'>
                <p style='font-size: 25px'>Solucionador</p>
                <p style='font-size: 25px'>Problemas</p>
		<p style='text-align: right; margin-top: -20px;'>".round((((100 - $st) * 100) / 149),1)."%</p>
                <hr style='border: 3px solid #294374;'>
                <hr style='border: 2px solid #87eafd;
                                                                                            margin-left: 0%;
                                                                                            margin-right: ".(100 - round((((100 - $st) * 100) / 149),1))."%;
                            margin-top: -20px'>
            </div>
        </div>
   <div  class=' row collapse' id='collapseST' style='background-color: #19222E'>
        <div class='col-3'> <!--Analisis-->
	  <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $analysis).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_Analisis.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Análisis</p>
	  <p style='text-align: right; margin-top: -20px;'>".round((((100 - $analysis) * 100) / 44),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $analysis) * 100) / 44),1))."%; margin-top: -20px'>
        </div>
        <div class='col-3'> <!--Pensamiento-->
	  <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $systemThin).")</p>
        </div>
        <div class='col-3'>
           <img src='https://devcamilo.github.io/assets/Poder_Pensamiento_Sistematico.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Pensamiento sistémico</p>
	  <p style='text-align: right; margin-top: -20px;'>".round((((100 - $systemThin) * 100) / 47),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $systemThin) * 100) / 47),1))."%; margin-top: -20px'>
        </div>
        <div class='col-3'> <!--Experimentacion-->
	  <p style='text-align: center; margin-top: 10px'>Skills(".(100 - $experiment).")</p>
        </div>
        <div class='col-3'>
          <img src='https://devcamilo.github.io/assets/Poder_experimentacion.png' role='presentation'>
        </div>
        <div class='col-6 align-items-center'>
          <p style='font-size: 15px'>Experimentación</p>
	  <p style='text-align: right; margin-top: -10px;'>".round((((100 - $experiment) * 100) / 58),1)."%</p>
          <hr style='border: 3px solid #294374;'>
          <hr style='border: 2px solid #87eafd; margin-left: 0%; margin-right: ".(100 - round((((100 - $experiment) * 100) / 58),1))."%; margin-top: -20px'>
        </div>
    </div>

    </div>";
    $this->content->items = array();
    $this->content->icons = array();
    return $this->content;
}

    public function applicable_formats() {
    return array('all' => false,
                 'site' => true,
                 'site-index' => true,
                 'course-view' => true,
                 'course-view-social' => false,
                 'mod' => true,
                 'mod-quiz' => false);
}

public function instance_allow_multiple() {
      return true;
}

function has_config () {return true;}
}
