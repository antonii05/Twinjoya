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
      component: () => import('@/VUE/components/proveedores/listadoProveedores.vue'),
    },
    {
      path: '/proveedor/nuevo',
      name: 'proveedorNuevo',
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
  ]
})

export default router