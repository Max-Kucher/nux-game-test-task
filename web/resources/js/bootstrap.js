import axios from 'axios'
import Alpine from 'alpinejs'
import mask from '@alpinejs/mask'

window.axios = axios

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

Alpine.plugin(mask)
window.Alpine = Alpine

Alpine.start()
