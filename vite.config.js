import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // path.resolve(__dirname, 'resources/css/**/*.css'), // Tất cả các file CSS trong thư mục resources/css
                // path.resolve(__dirname, 'resources/js/**/*.js'),   // Tất cả các file JS trong thư mục resources/js
                // path.resolve(__dirname, 'resources/fonts/flaticon/font/**/*.js'),   // Tất cả các file JS trong thư mục resources/js
            ],
            refresh: true,
        }),
    ],
});
