<?php
    namespace Controller;

    use Router\Router;
    use Model\Cita;
    use Model\Paciente;
    use Model\Medico;
    use Model\Horario;

    class PacienteController {
        
        public static function index( Router $router) {
            session_start();
            $sesion = $_SESSION['id'];

            $paciente=Paciente::findLogin($sesion);
            $horarios = Horario::allDisponibles();

            $citas=Cita::findCitaEspera($paciente->id);

            foreach ($citas as $row) {
    
                $medico = Medico::find($row->ID_Medico);
                $row->NombreMedico = $medico->Nombre . " " . $medico->Ape_Paterno;
    
                $horario = Horario::find($row->ID_Horario);
                $row->Fecha_Cita = $horario->Fecha;
                $row->Hora_Cita = $horario->Hora;
            }

            $router->renderPaciente('pacientes/index', [
                'paciente' => $paciente,
                'citas' => $citas,
                'horarios' => $horarios,
            ]);
        }

        public static function citaspasadas( Router $router) {
            session_start();
            $sesion = $_SESSION['id'];

            $router->renderPaciente('pacientes/citasPasadas', [
                'sesion' => $sesion
            ]);
        }

        public static function agregarcita( Router $router) {

            $router->renderPaciente('pacientes/agregarCita', [
                
            ]);
        }

    }