<!-- TODO Faltaria las vista reactiva para movil -->
<script setup lang="ts">
import { RouterLink } from "vue-router";
/* 
document.addEventListener("DOMContentLoaded", function (event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId);

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener("click", () => {
                // show navbar
                nav.classList.toggle("show");
                // change icon
                toggle.classList.toggle("bx-x");
                // add padding to body
                bodypd.classList.toggle("body-pd");
                // add padding to header
                headerpd.classList.toggle("body-pd");
            });
        }
    };

    showNavbar("header-toggle", "nav-bar", "body-pd", "header");

    const linkColor = document.querySelectorAll(".nav_link");

    function colorLink() {
        if (linkColor) {
            linkColor.forEach((l) => l.classList.remove("active"));
            this.classList.add("active");
        }
    }
    linkColor.forEach((l) => l.addEventListener("click", colorLink));

    // Your code to run since DOM is loaded and ready
}); */
</script>

<template>
    <!-- TODO No se si meterlo o no ( es necesario creo para q mas tarde sea reactivo) -->
    <!-- <header class="header" id="header">
        <div class="header_toggle">
            <font-awesome-icon icon="bars" /> 
        </div>
        <div class="header_img">
            <font-awesome-icon icon="gear" id="gear" class="fa-xl" />
        </div>
    </header> -->
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <div class="nav_list">
                    <router-link to="/home">
                        <a href="#" class="nav_link">
                            <font-awesome-icon icon="house" />
                            <span class="nav_name">Home</span>
                        </a>
                    </router-link>

                    <router-link to="/clientes">
                        <a href="#" class="nav_link">
                            <font-awesome-icon icon="user" />
                            <span class="nav_name">Clientes</span>
                        </a>
                    </router-link>

                    <router-link to="/reparaciones">
                        <a href="#" class="nav_link">
                            <font-awesome-icon icon="screwdriver-wrench" />
                            <span class="nav_name">Reparaciones</span>
                        </a>
                    </router-link>

                    <router-link to="/proveedores">
                        <a href="#" class="nav_logo nav_link">
                            <font-awesome-icon icon="handshake" />
                            <span class="nav_name"> Proveedores </span>
                        </a>
                    </router-link>

                    <router-link to="/articulos">
                        <a href="#" class="nav_logo nav_link">
                            <font-awesome-icon icon="barcode" />
                            <span class="nav_name">Articulos</span>
                        </a>
                    </router-link>
                    <router-link to="/configuracion">
                        <a href="#" class="nav_logo nav_link">
                            <font-awesome-icon icon="gear" />
                            <span class="nav_name">Configuracion</span>
                        </a>
                    </router-link>
                    <!-- ! Agregar Compras -->

                    <!-- <a href="#" class="nav_link">
                        <i class="bx bx-bookmark nav_icon"></i>
                        <span class="nav_name">Bookmark</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class="bx bx-folder nav_icon"></i>
                        <span class="nav_name">Files</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                        <span class="nav_name">Stats</span>
                    </a> -->
                </div>
            </div>
            <a href="#" class="nav_link">
                <font-awesome-icon icon="right-from-bracket" class="fa-rotate-180" />
                <span class="nav_name">Cerrar Sessión</span>
            </a>
        </nav>
    </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

:root {
    --header-height: 3rem;
    --nav-width: 68px;
    --first-color: #4723d9;
    --first-color-light: #afa5d9;
    --white-color: #f7f6fb;
    --z-fixed: 100;
}

*,
::before,
::after {
    box-sizing: border-box;
}

a {
    text-decoration: none;
}

.header {
    width: 100%;
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: rgb(10, 0, 189);
    background: linear-gradient(90deg,
            rgba(10, 0, 189, 1) 0%,
            rgba(0, 212, 255, 1) 100%);
    padding: 0 1rem;
    z-index: var(--z-fixed);
    transition: 0.5s;
}

.header_toggle {
    color: var(--first-color);
    font-size: 1.5rem;
    cursor: pointer;
}

.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden;
}

#gear {
    color: grey;
    margin-top: 6px;
}

.header_img img {
    width: 40px;
}

.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background: rgb(10, 0, 189);
    background: linear-gradient(180deg,
            rgba(10, 0, 189, 1) 0%,
            rgba(0, 212, 255, 1) 100%);
    padding: 0.5rem 1rem 0 0;
    transition: 0.5s;
    z-index: var(--z-fixed);
}

.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
}

.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: 0.5rem 0 0.5rem 1.5rem;
}

.nav_logo {
    margin-bottom: 2rem;
}

.nav_logo-icon {
    font-size: 1.25rem;
    color: var(--white-color);
}

.nav_logo-name {
    color: var(--white-color);
    font-weight: 700;
}

.nav_link {
    position: relative;
    color: var(--first-color-light);
    margin-bottom: 1rem;
    transition: 0.3s;
}

.nav_link:hover {
    color: var(--white-color);
}

.nav_icon {
    font-size: 1.25rem;
}

.show {
    left: 0;
}

.body-pd {
    padding-left: calc(var(--nav-width) + 1rem);
}

.active {
    color: var(--white-color);
}

.active::before {
    content: "";
    position: absolute;
    left: 0;
    width: 2px;
    height: 32px;
    background-color: var(--white-color);
}

.height-100 {
    height: 100vh;
}

@media screen and (min-width: 768px) {
    body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem);
    }

    .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
    }

    .header_img {
        width: 40px;
        height: 40px;
    }

    .header_img i {
        width: 45px;
    }

    .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0;
    }

    .show {
        width: calc(var(--nav-width) + 156px);
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 188px);
    }
}
</style>
