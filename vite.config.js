import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vueJsx from '@vitejs/plugin-vue-jsx'

export default defineConfig({
    build: {
        target: 'chrome58',
        sourcemap: true,
        manifest: true,
        minify: false
    },
    plugins: [
        laravel([
            'resources/js/app.js',
            'resources/css/app.css',
            'resources/assets/js/main.js',
            'resources/assets/js/app.js',
            'resources/css/nova.css'
        ]),
        vueJsx(),
        vue({
            template: {
                compilerOptions: {
                  // ssr: true
                },
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
