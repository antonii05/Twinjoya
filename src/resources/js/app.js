import './bootstrap';
import {createApp} from 'vue'
import app from './layouts/app.vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas,fab,far)

createApp (app)
    .component("FontAwesomeIcon", FontAwesomeIcon)
    .mount("#app")