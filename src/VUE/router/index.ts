import { createRouter, createWebHashHistory } from 'vue-router'

const router = createRouter({
  //history: createWebHashHistory(),
   history: createWebHashHistory(import.meta.env.BASE_URL),

  routes: [
    {
      path: '/',
      name: 'incio',
      component: () => import('@/VUE/views/HomeView.vue'),
    },
    {
      path: '/home',
      name: 'home',
      component: () => import('@/VUE/views/HomeView.vue'),
    },
    {
      path: '/reparaciones',
      name: 'reparaciones',
      component: () => import('@/VUE/components/reparaciones/listadoReparacion.vue'),
    },
    {
      path: '/reparacion/informacion/:id(\\d+)',
      name: 'reparacionesInformacion',
      component: () => import('@/VUE/views/ReparacionesView.vue'),
    },
    {
      path: '/reparaciones/nuevo',
      name: 'reparacionesNuevo',
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
      component: () => import('@/VUE/components/proveedores/listadoProveedores.vue'),
    },
    {
      path: '/proveedor/informacion/:id(\\d+)',
      name: 'proveedorInformacion',
      component: () => import("@/VUE/views/ProveedoresView.vue"),
    },
    {
      path: '/proveedor/nuevo',
      name: 'proveedorNuevo',
      component: () => import('@/VUE/views/ProveedoresView.vue'),
    },
    {
      path: '/articulos',
      name: 'articulos',
      component: () => import('@/VUE/components/articulos/listadoArticulos.vue'),
    },
    {
      path: '/articulo/nuevo',
      name: 'articuloNuevo',
      component: () => import('@/VUE/views/ArticulosView.vue'),
    },
    {
      path: '/articulos/informacion/:id(\\d+)',
      name: 'articulosInformacion',
      component: () => import('@/VUE/views/ArticulosView.vue'),
    },
    {
      path: '/configuracion',
      name: 'configuracion',
      component: () => import('@/VUE/views/configuracion/ConfiguracionView.vue'),
    },
    {
      path: '/configuracion/familias',
      name: 'configuracionFamilias',
      component: () => import('@/VUE/components/familias/listadoFamilias.vue'),
    },
    {
      path: '/configuracion/familia/:id(\\d+)',
      name: 'configuracionFamiliaInfo',
      component: () => import('@/VUE/views/configuracion/ConfiguracionFamiliasView.vue'),
    },
    {
      path: '/configuracion/familias/nuevo',
      name: 'configuracionFamiliasNuevo',
      component: () => import('@/VUE/views/configuracion/ConfiguracionFamiliasView.vue'),
    },
    {
      path: '/configuracion/familias/config/adicional',
      name: 'configuracionSecciones',
      component: () => import('@/VUE/views/configuracion/ConfiguracionSeccionesView.vue'),
    },
    {
      path: '/factura/proveedor/informacion/:id(\\d+)',
      name: 'facturasProveedoresInformacion',
      component: () => import('@/VUE/views/facturas/FacturasProveedorView.vue'),
    },
    {
      path: '/facturas/proveedores',
      name: 'facturasProveedores',
      component: () => import('@/VUE/components/facturas/proveedores/FacturasProveedorListado.vue'),
    },
    {
      path: '/facturas/proveedores/nuevo',
      name: 'facturasProveedoresNuevo',
      component: () => import('@/VUE/views/facturas/FacturasProveedorView.vue'),
    }
    /* AGREGAR MAS FACTURAS DE PROVEEDOR */
  ]
})

export default router