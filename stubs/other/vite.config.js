import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import ladminViteInputs from '@hexters/ladmin-vite-input'

export default defineConfig({
    plugins: [
        laravel({
            input: ladminViteInputs([
                'resources/css/app.css',
                'resources/js/app.js'
            ]),
            refresh: true,
        }),
    ],
});
