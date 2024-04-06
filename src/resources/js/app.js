import {createApp} from 'vue'
import App from './layouts/app.vue'
import router from '../../VUE/router'


/* FontAwesomeIcons */
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* Axios */
import axios from 'axios'
import VueAxios from 'vue-axios'

// Importa los estilos de Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css'

// Importa los scripts de Bootstrap
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

// Librerias para meter los Iconos e FontAwasome
library.add(fas,fab,far)

const app = createApp(App)

app.use(router)

app.component("FontAwesomeIcon", FontAwesomeIcon)

// Configura la URL base para Axios
axios.defaults.baseURL = 'http://localhost/api/v1';

//axios
app.use(VueAxios, axios)
app.provide('axios', app.config.globalProperties.axios)  // provide 'axios'


app.mount("#app")