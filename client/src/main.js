import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from "./services/router"
import './style.css'
import App from './App.vue'
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';

const pinia = createPinia()
const app = createApp(App);
app.use(ToastService);
app.use(router)
app.use(pinia)
app.use(PrimeVue, {
    unstyled: true
});
app.mount('#app')
