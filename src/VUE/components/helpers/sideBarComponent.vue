<template>
    <!-- Offcanvas Trigger for small devices -->
    <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <font-awesome-icon icon="bars" />
    </button>

    <!-- Offcanvas Component -->
    <div class="row">
        <div class="sidebar col-lg-1 py-1 l-navbar">
            <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">TwinJoya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center align-items-center">
                        <li>
                            <router-link to="/home" class="nav_link">
                                <font-awesome-icon icon="house" />
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/clientes" class="nav_link">
                                <font-awesome-icon icon="user" />
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/reparaciones" class="nav_link">
                                <font-awesome-icon icon="screwdriver-wrench" />
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/proveedores" class="nav_link">
                                <font-awesome-icon icon="handshake" />
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/articulos" class="nav_link">
                                <font-awesome-icon icon="barcode" />
                            </router-link>
                        </li>
                        <!-- Primer desplegable -->
                        <li class="mt-2">
                            <button class="btn btn-toggle fw-bold text-capitalize collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dashboard-collapse1" aria-expanded="false">
                                Settings <font-awesome-icon icon="chevron-right" class="ms-2" />
                            </button>
                            <div class="collapse" id="dashboard-collapse1">
                        <li class="mt-2">
                            <a class="text-decoration-none text-black"
                                @click="$router.push('/configuracion/familias')"><font-awesome-icon
                                    icon="people-roof" />
                                Familias</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-decoration-none text-black"
                                @click="$router.push('/configuracion/familias/config/adicional')">
                                <font-awesome-icon icon="users-gear" /> Configuración Adicional
                                Familias</a>
                        </li>
                </div>
                </li>

                <!-- Segundo Desplegable -->
                <li class="mt-2">
                    <button class="btn btn-toggle fw-bold text-capitalize collapsed" data-bs-toggle="collapse"
                        data-bs-target="#dashboard-collapse2" aria-expanded="false">
                        Facturas<font-awesome-icon icon="chevron-right" class="ms-2" />
                    </button>
                    <div class="collapse" id="dashboard-collapse2">
                <li @click="$router.push('/facturas/proveedores')" class="mt-2">
                    <a class="text-decoration-none text-black">Facturas de
                        Proveedores <font-awesome-icon icon="scroll" /></a>
                </li>
            </div>
            </li>

            </ul>
        </div>
    </div>
    </div>

    <main class="col-lg-11 col-md-9 col-12">
        <slot></slot>
    </main>
    </div>
</template>

<style scoped>
main {
    background-position: right bottom;
    background-size: cover;
    background-repeat: no-repeat;
    min-height: 100vh;
}

.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 0.5rem;
    /* Reduced gap */
    padding: 0.5rem 0.5rem;
    color: black;
    text-decoration: none;
}

.l-navbar {
    background: linear-gradient(180deg, rgba(0, 224, 255, 1) 0%, rgba(102, 238, 255, 1) 100%);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    padding: 0.5rem 0.5rem 0;
}

.nav_link {
    position: relative;
    margin-bottom: 1rem;
    transition: 0.3s;
}

.nav_link:hover {
    color: lightgray;
}

@media (max-width: 992px) {
    .offcanvas-lg {
        width: 100%;
        background: linear-gradient(180deg, rgba(0, 224, 255, 1) 0%, rgba(102, 238, 255, 1) 100%);

    }
}

@media (max-width: 576px) {
    .nav_link {
        background: linear-gradient(180deg, rgba(0, 224, 255, 1) 0%, rgba(102, 238, 255, 1) 100%);
        padding: 0.5rem 0.5rem;
    }
}
</style>