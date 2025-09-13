import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/css/style.min.css',
                'resources/js/app.js',
                'resources/js/app.min.js'
            ],
            refresh: true,
        }),
    ],
});
