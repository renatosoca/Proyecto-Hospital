<?php
    require_once __DIR__. '/../includes/app.php';

    use Router\Router;
    use Controller\PageController;
    use Controller\LoginController;
    use Controller\PacienteController;
    use Controller\DoctorController;
    use Controller\AdminController;
    use Controllers\CitaController;

    $router = new Router();

    //Paginas Estaticas
    $router->get('/', [PageController::class, 'index']);
    $router->get('/nosotros', [PageController::class, 'nosotros']);
    $router->get('/servicios', [PageController::class, 'servicios']);
    $router->get('/medicos', [PageController::class, 'medicos']);
    $router->get('/contacto', [PageController::class, 'contacto']);
    $router->post('/contacto', [PageController::class, 'contacto']);

    //Paginas Admin, parte resumen
    $router->get('/admin/index', [AdminController::class, 'index']);
    //Paginas de ADMIN, parte pacientes
    $router->get('/admin/pacientes', [AdminController::class, 'pacientes']);
    $router->post('/pacientes/registrar', [AdminController::class, 'pacientesRegistrar']);
    $router->post('/pacientes/eliminar', [AdminController::class, 'pacientesEliminar']);
    $router->post('/pacientes/actualizar', [AdminController::class, 'pacientesActualizar']);
    //Paginas de ADMIN, parte medicos
    $router->get('/admin/medicos', [AdminController::class, 'medicos']);
    $router->post('/medicos/agregar', [AdminController::class, 'medicoAgregar']);
    $router->post('/medicos/actualizar', [AdminController::class, 'medicoActualizar']);
    $router->post('/medicos/eliminar', [AdminController::class, 'medicoEliminar']);
    //Paginas de ADMIN, parte citas
    $router->get('/admin/citas', [AdminController::class, 'citas']);
    $router->post('/citas/registrar', [AdminController::class, 'registrarcita']);
    $router->post('/citas/reprogramar', [AdminController::class, 'reprogramarcita']);
    $router->post('/citas/eliminar', [AdminController::class, 'eliminarcita']);
    //Paginas de ADMIN, parte especialidades
    $router->get('/admin/especialidades', [AdminController::class, 'especialidades']);
    $router->post('/especialidades/eliminar', [AdminController::class, 'especialidadEliminar']);


    //Paginas Paciente
    $router->get('/paciente', [PacienteController::class, 'index']);
    $router->get('/paciente/citaspasadas', [PacienteController::class, 'citaspasadas']);
    $router->get('/paciente/agregarcita', [PacienteController::class, 'agregarcita']);
    $router->post('/paciente/reprogramar', [PacienteController::class, 'reprogramarcita']);
    $router->post('/paciente/eliminarcita', [PacienteController::class, 'eliminarcita']);
    $router->post('/paciente/registrarcita', [PacienteController::class, 'registrarcita']);
    $router->post('/paciente/detallemedico', [PacienteController::class, 'detallemedico']);


    //Paginas Doctores
    $router->get('/doctor', [DoctorController::class, 'index']);
    

    //Login
    $router->get('/login', [LoginController::class, 'login']);
    $router->post('/login', [LoginController::class, 'login']);
    $router->get('/registro', [LoginController::class, 'registro']);
    $router->post('/registro', [LoginController::class, 'registro']);
    $router->get('/logout', [LoginController::class, 'logout']);

    //AREA PRIVADA
    $router->get('/cita',[CitaController::class, 'index']);

    $router->comprobarRutas();