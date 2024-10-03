import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'

import livewire from '@defstudio/vite-livewire-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            // refresh: [
            //     ...refreshPaths,
            //     'app/Filament/**',
            //     'app/Forms/Components/**',
            //     'app/Livewire/**',
            //     'app/Infolists/Components/**',
            //     'app/Providers/Filament/**',
            //     'app/Tables/Columns/**',
            // ],
            refresh: [...refreshPaths, 'app/Livewire/**']
        }),

        livewire({
            refresh: ['resources/css/app.css']
        })
    ]
})
