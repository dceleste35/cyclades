import preset from './vendor/filament/support/tailwind.config.preset'
import aspectRatio from '@tailwindcss/aspect-ratio'
import containerQueries from '@tailwindcss/container-queries'

export default {
    presets: [preset],
    plugins: [aspectRatio, containerQueries],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php'
    ]
}
