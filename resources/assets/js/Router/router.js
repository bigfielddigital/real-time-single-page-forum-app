import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/login/Login'
import Logout from '../components/login/Logout'
import Signup from '../components/login/Signup'
import Forum from '../components/Forum/Forum'
import Read from '../components/Forum/read'
import Create from '../components/Forum/create'

const routes = [
    { path: '/login', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/forum', component: Forum, name: 'forum' },
    { path: '/question/:slug', component: Read, name: 'read' },
    { path: '/ask-question', component: Create }
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
})

export default router