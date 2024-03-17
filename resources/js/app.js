import "./bootstrap";
import { createApp, provide, h } from 'vue'
import router from "./router";
import App from './App.vue'
import { DefaultApolloClient } from '@vue/apollo-composable'
import apolloClient from './utils/apolloClient'

const app = createApp({
  setup () {
    provide(DefaultApolloClient, apolloClient)
  },
  render: () => h(App),
})

app.use(router).mount('#app')