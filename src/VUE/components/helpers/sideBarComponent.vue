<template>
    <div class="row">
        <div class="col-sm-auto bg-light sticky-top l-navbar">
            <ul
                class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center d-flex">
                <li>
                    <router-link to="/home">
                        <a href="#" class="nav_link">
                            <font-awesome-icon icon="house" />
                        </a>
                    </router-link>
                </li>

                <li>
                    <router-link to="/clientes">
                        <a href="#" class="nav_link">
                            <font-awesome-icon icon="user" />
                        </a>
                    </router-link>
                </li>

                <li>
                    <router-link to="/reparaciones">
                        <a href="#" class="nav_link nav_logo">
                            <font-awesome-icon icon="screwdriver-wrench" />
                        </a>
                    </router-link>
                </li>

                <li>
                    <router-link to="/proveedores">
                        <a href="#" class="nav_logo nav_link">
                            <font-awesome-icon icon="handshake" />
                        </a>
                    </router-link>
                </li>

                <li>
                    <router-link to="/articulos">
                        <a href="#" class="nav_logo nav_link">
                            <font-awesome-icon icon="barcode" />
                        </a>
                    </router-link>
                </li>

                <!-- Primer desplegable -->
                <div class="dropdown dropend">
                    <a href="#"
                        class="d-flex align-items-center justify-content-center p-3 dropdown-toggle nav_logo nav_link"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <font-awesome-icon icon="gear" />
                    </a>
                    <ul class="dropdown-menu text-small shadow dropdown-menu-dark" aria-labelledby="dropdownUser3">
                        <li @click="$router.push('/configuracion/familias')"><a class="dropdown-item"><font-awesome-icon
                                    icon="people-roof" /> Familias</a>
                        </li>
                        <li>
                            <a class="dropdown-item" @click="$router.push('/configuracion/familias/config/adicional')">
                                <font-awesome-icon icon="users-gear" /> Configuración Adicional Familias</a>
                        </li>
                        <li><a class="dropdown-item" href="#">code..</a></li>
                    </ul>
                </div>

                <!-- Segundo Desplegable -->
                <div class="dropdown dropend">
                    <a href="#"
                        class="d-flex align-items-center justify-content-center p-3 dropdown-toggle nav_logo nav_link"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <font-awesome-icon icon="scroll" />
                    </a>
                    <ul class="dropdown-menu text-small shadow dropdown-menu-dark" aria-labelledby="dropdownUser3">
                        <li @click="$router.push('/facturas/proveedores')">  <a class="dropdown-item"><font-awesome-icon icon="handshake" /> Facturas de Proveedores</a>
                        </li>
                        <li><a class="dropdown-item" href="#">MAS FACTURAS</a></li>
                    </ul>
                </div>

            </ul>

        </div>
        <div class="col-sm p-3 min-vh-100">
            <slot></slot>
        </div>
    </div>
</template>

<script setup lang="ts">
</script>

<style>
.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: 0.5rem 0 0.5rem 1.5rem;
    color: whitesmoke;

}

.l-navbar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 250px;
    /* Ancho de la barra lateral en dispositivos grandes */
    background: rgb(0, 224, 255);
    background: linear-gradient(180deg, rgba(0, 224, 255, 1) 0%, rgba(102, 238, 255, 1) 100%);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    padding: 0.5rem 1rem 0;
    transition: width 0.5s;
    /* Animación del ancho */
}

.nav_link {
    position: relative;
    margin-bottom: 1rem;
    transition: 0.3s;
}

@media (max-width: 992px) {
    .l-navbar {
        width: 100%;
        /* Ancho de la barra lateral en dispositivos más pequeños */
        left: -100%;
        /* Oculta la barra lateral en dispositivos más pequeños */
    }
}
</style>