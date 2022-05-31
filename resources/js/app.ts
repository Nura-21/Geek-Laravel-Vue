require('./bootstrap');
import { createApp } from "vue";
import router  from "./router"

import CategoryIndex from "./components/CategoryIndex.vue";

const app = createApp({components: {
    CategoryIndex,
    }});

app.use(router);
app.mount('#app');
