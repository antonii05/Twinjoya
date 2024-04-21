import { createRouter, createWebHashHistory } from 'vue-router'

const router = createRouter({
  history: createWebHashHistory(),
  // TODO Mirar esto del historial
  //  history: createWebHashHistory(import.meta.env.BASE_URL),

  routes: [
    {
      path: '/home',
      name: 'home',
      component: () => import('@/VUE/views/HomeView.vue'),
    },
    /* {
      path: '/calendario',
      name: 'calendario',
      component: () => import('@/VUE/views/CalendarioView.vue'),
    }, */
    {
      path: '/reparaciones',
      name: 'reparaciones',
      component: () => import('@/VUE/views/ReparacionesView.vue'),
    },
    {
      path: '/clientes',
      name: 'clientes',
      component: () => import('@/VUE/components/clientes/listadoClientes.vue'),
    },
    {
      path: '/cliente/nuevo',
      name: 'clienteNuevo',
      component: () => import('@/VUE/views/ClientesView.vue'),
    },
    {
      path: '/cliente/detalle/:id(\\d+)',
      name: 'clienteDetalle',
      component: () => import('@/VUE/views/ClientesView.vue'),
    },
    {
      path: '/proveedores',
      name: 'proveedores',
      component: () => import('@/VUE/views/ProveedoresView.vue'),
    },
    {
      path: '/articulos',
      name: 'articulos',
      component: () => import('@/VUE/views/ArticulosView.vue'),
    }, 
    {
      path: '/configuracion',
      name: 'configuracion',
      component: () => import('@/VUE/views/configuracion/ConfiguracionView.vue'),
    }
    /* 
    {
      path: '/configuracion',
      name: 'configuracion',
      component: () => import('../views/ConfiguracionView.vue'),
    },
    {
      path: '/configuracion/usuarios',
      name: 'usuarios',
      component: () => import('../views/UsuariosView.vue')
    },
    {
      path: '/configuracion/usuarios/:id(\\d+)',
      name: 'usuariosDetalle',
      component: () => import('../components/usuarios/UsuariosItemComponent.vue')
    },
    {
      path: '/configuracion/roles',
      name: 'roles',
      component: () => import('../views/RolView.vue')
    },
    {
      path: '/configuracion/roles/:id(\\d+)',
      name: 'rolDetalle',
      component: () => import('../views/RolView.vue')
    },
    {
      path: '/configuracion/alertas',
      name: 'alertas',
      component: () => import('../views/AlertasView.vue')
    },
    {
      path: '/configuracion/alertas/:id(\\d+)',
      name: 'alertasDetalle',
      component: () => import('../views/AlertasView.vue')
    },
    {
      path: '/configuracion/alcances',
      name: 'alcances',
      component: () => import('../views/AlcancesView.vue')
    },
    {
      path: '/configuracion/alcance/detalle',
      name: 'alcancesDetalle',
      component: () => import('../components/alcances/AlcancesItemComponent.vue')
    },
    {
      path: '/configuracion/cuestionarios',
      name: 'cuestionarios',
      component: () => import('../views/CuestionariosView.vue')
    },
    {
      path: '/configuracion/cuestionarios/:id(\\d+)',
      name: 'cuestionariosDetalle',
      component: () => import('../views/CuestionariosView.vue')
    },
    {
      path: '/configuracion/requisitos',
      name: 'requisitos',
      component: () => import('../views/RequisitosView.vue')
    },
    {
      path: '/configuracion/requisitos/:id(\\d+)',
      name: 'requisitosDetalle',
      component: () => import('../components/requisitos/RequisitosItemComponent.vue')
    },
    {
      path: '/configuracion/requisitos/nuevo',
      name: 'requisitosNuevo',
      component: () => import('../components/requisitos/RequisitosItemComponent.vue')
    },
    {
      path: '/configuracion/cualificaciones',
      name: 'cualificaciones',
      component: () => import('../views/CualificacionesView.vue')
    },
    {
      path: '/configuracion/cualificaciones/:id(\\d+)',
      name: 'cualificacionesDetalle',
      component: () => import('../components/cualificaciones/CualificacionesItemComponent.vue')
    },
    {
      path: '/configuracion/cualificaciones/nuevo',
      name: 'cualificacionesNuevo',
      component: () => import('../components/cualificaciones/CualificacionesItemComponent.vue')
    },
    {
      path: '/configuracion/servicios',
      name: 'servicios',
      component: () => import('../views/ServiciosView.vue')
    },
    {
      path: '/configuracion/servicios/:id(\\d+)',
      name: 'serviciosDetalle',
      component: () => import('../components/servicios/ServiciosItemComponent.vue')
    },
    {
      path: '/configuracion/servicio/nuevo',
      name: 'serviciosNuevo',
      component: () => import('../components/servicios/ServiciosItemComponent.vue')
    },
    {
      path: '/configuracion/actividades',
      name: 'actividades',
      component: () => import('../views/ActividadesView.vue')
    },
    {
      path: '/configuracion/actividades/:id(\\d+)',
      name: 'actividadesDetalle',
      component: () => import('../components/actividades/ActividadesItemComponent.vue')
    },
    {
      path: '/configuracion/actividad/nuevo',
      name: 'actividadesNuevo',
      component: () => import('../components/actividades/ActividadesItemComponent.vue')
    },
    {
      path: '/configuracion/cargos',
      name: 'cargos',
      component: () => import('../views/CargosView.vue')
    },
    {
      path: '/configuracion/cargos/:id(\\d+)',
      name: 'cargosDetalle',
      component: () => import('../components/cargos/CargosItemComponent.vue')
    },
    {
      path: '/configuracion/cargos/nuevo',
      name: 'cargosNuevo',
      component: () => import('../components/cargos/CargosItemComponent.vue')
    },
    {
      path: '/configuracion/tipos-auditorias',
      name: 'tipos auditorias',
      component: () => import('../views/TiposAuditoriasView.vue')
    },
    {
      path: '/configuracion/tipos-auditorias/:id(\\d+)',
      name: 'tiposAuditoriasDetalle',
      component: () => import('../components/tiposAuditorias/TiposAuditoriasItemComponent.vue')
    },
    {
      path: '/configuracion/tipos-auditorias/nuevo',
      name: 'tiposAuditoriasNuevo',
      component: () => import('../components/tiposAuditorias/TiposAuditoriasItemComponent.vue')
    },
    {
      path: '/configuracion/visitas-mantenimiento',
      name: 'visita mantenimiento',
      component: () => import('../views/VisitasMantenimientoView.vue')
    },
    {
      path: '/configuracion/visitas-mantenimiento/:id(\\d+)',
      name: 'visitasMantenimientoDetalle',
      component: () => import('../components/visitasMantenimiento/VisitasMantenimientoItemComponent.vue')
    },
    {
      path: '/configuracion/visitas-mantenimiento/nuevo',
      name: 'visitasMantenimientoNuevo',
      component: () => import('../components/visitasMantenimiento/VisitasMantenimientoItemComponent.vue')
    },
    {
      path: '/configuracion/no-conformidades',
      name: 'noConformidades',
      component: () => import('../views/NoConformidadesView.vue')
    },
    {
      path: '/configuracion/no-conformidades/:id(\\d+)',
      name: 'noConformidadesDetalle',
      component: () => import('../components/noConformidades/NoConformidadesItemComponent.vue')
    },
    {
      path: '/configuracion/no-conformidades/nuevo',
      name: 'NoConformidadesNuevo',
      component: () => import('../components/noConformidades/NoConformidadesItemComponent.vue')
    },
    {
      path: '/clientes',
      name: 'clientes',
      component: () => import('../components/clientes/ClientesListComponent.vue')
    },
    {
      path: '/clientes/:id(\\d+)',
      name: 'clientesDetalle',
      component: () => import('../components/clientes/ClientesItemComponent.vue')
    },
    {
      path: '/cliente/nuevo',
      name: 'clienteNuevo',
      component: () => import('../components/clientes/ClienteNuevoComponent.vue')
    },
    {
      path: '/clientes/acceso/:id(\\d+)',
      name: 'detalleAcceso',
      component: () => import('../components/clientes/ClientesItemComponent.vue')
    },
    {
      path: '/clientes/acceso/nuevo',
      name: 'clienteAcceso',
      component: () => import('../components/clientes/ClientesAccesoComponent.vue')
    },
    {
      path: '/configuracion/productos',
      name: 'productos',
      component: () => import('../views/ProductosView.vue')
    },
    {
      path: '/configuracion/producto/:id(\\d+)',
      name: 'productoDetalle',
      component: () => import('../components/productos/ProductosItemComponent.vue')
    },
    {
      path: '/configuracion/producto/nuevo',
      name: 'productoNuevo',
      component: () => import('../components/productos/ProductosItemComponent.vue')
    },
    {
      path: '/configuracion/empresa',
      name: 'nuevoProducto',
      component: () => import('../components/empresa/EmpresaItemComponent.vue')
    },
    {
      path: '/contactos/:id(\\d+)',
      name: 'contactoDetalle',
      component: () => import('../components/clientes/ClienteContactoComponent.vue')
    },
    {
      path: '/contactos/nuevo/:id_cliente(\\d+)',
      name: 'contactoNuevo',
      component: () => import('../components/clientes/ClienteContactoComponent.vue')
    },
    {
      path: '/centro-trabajo/nuevo/:id_cliente(\\d+)',
      name: 'centroTrabajoNuevo',
      component: () => import('../components/clientes/ClientesCentroTrabajoComponent.vue')
    },
    {
      path: '/centro-trabajo/:id(\\d+)',
      name: 'centroTrabajoDetalle',
      component: () => import('../components/clientes/ClientesCentroTrabajoComponent.vue')
    }, */
  ]
})

export default router