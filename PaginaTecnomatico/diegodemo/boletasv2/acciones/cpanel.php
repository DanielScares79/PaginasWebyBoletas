<?php
if(!defined('ENABLE_TM')) exit('ACCESO PROHIBIDO.');
?>
<div class="px-4 py-5 text-center" id="featured-3">
    <h2 class="pb-2 border-bottom">Bienvenido esclavo, digo empleado!</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
          <i class="fa fa-ticket-alt"></i>
        </div>
        <h2>Boletas</h2>
        <p>Sus clientes merecen tenerlo.</p>
        <a href="<?php echo TM_URL; ?>/?action=verBoletas" class="icon-link">
          Ver listado
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
          <i class="fa fa-users"></i>
        </div>
        <h2>Usuarios</h2>
        <p>Brindar acceso a otros trabajadores de esta gran empresa.</p>
        <a href="<?php echo TM_URL; ?>/?action=verUsuarios" class="icon-link">
          Ver listado
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
          <i class="fa fa-sign-out-alt"></i>
        </div>
        <h2>Cerrar sesi&oacute;n</h2>
        <p>Te aburriste? Cierra tu sesi&oacute;n.</p>
        <a href="<?php echo TM_URL; ?>/?action=logout" class="icon-link">
          Cerrar sesi&oacute;n
        </a>
      </div>
    </div>
  </div>