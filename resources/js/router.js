import Router from 'vue-router'
import ExampleComponent from './components/ExampleComponent.vue'
import ResultComponent from './components/ResultComponent.vue'

export default new Router({
  mode: 'history',
  routes: [
    {
        path: '/',
        name: 'home',
        component: ExampleComponent
    },
    {
        path: '/result',
        name: 'result',
        component: ResultComponent
    },
  ]
});