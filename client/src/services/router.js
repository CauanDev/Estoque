import { createMemoryHistory, createRouter } from 'vue-router'

import LoginView from "../views/LoginView.vue"

const routes = [
  { path: '/', component: LoginView,name:"Login" },
]

const router = createRouter({
  history: createMemoryHistory(),
  routes,
})