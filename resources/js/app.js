import './bootstrap';
import '../css/app.css';
import '../css/custom.css';

import '../css/bootstrap.min.css';
import '../css/icons.css';
import '../css/metismenu.min.css';
import '../css/style.css';
import '../css/morris.css';
import '@vuepic/vue-datepicker/dist/main.css'

import '../js/theme/jquery.min.js';
import '../js/theme/bootstrap.bundle.min.js';
import '../js/theme/metismenu.min.js';
// import '../js/theme/waves.min.js';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueDatePicker from '@vuepic/vue-datepicker';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("VueDatePicker", VueDatePicker)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
