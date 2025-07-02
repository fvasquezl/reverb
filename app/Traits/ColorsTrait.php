<?php

namespace App\Traits;

trait ColorsTrait
{
    /**
     * Get the color map for badges
     */
    public static function getColorMap(): array
    {
        // Using OKLCH colors for better perceptual uniformity
        // Format: oklch(lightness% chroma hue)
        return [
            'red' => [
                'bg' => 'oklch(94.5% 0.024 22.216)',     // red-50
                'text' => 'oklch(53.18% 0.1902 27.331)',  // red-600
                'ring' => 'oklch(53.18% 0.1902 27.331 / 0.2)'
            ],
            'orange' => [
                'bg' => 'oklch(96.5% 0.019 45)',         // orange-50
                'text' => 'oklch(55.42% 0.177 41.116)',   // orange-600
                'ring' => 'oklch(55.42% 0.177 41.116 / 0.2)'
            ],
            'amber' => [
                'bg' => 'oklch(97.23% 0.024 70)',        // amber-50
                'text' => 'oklch(62.56% 0.169 64.825)',   // amber-600
                'ring' => 'oklch(62.56% 0.169 64.825 / 0.2)'
            ],
            'yellow' => [
                'bg' => 'oklch(97.84% 0.024 96)',        // yellow-50
                'text' => 'oklch(72.33% 0.191 95.471)',   // yellow-600
                'ring' => 'oklch(72.33% 0.191 95.471 / 0.2)'
            ],
            'lime' => [
                'bg' => 'oklch(96.51% 0.024 130)',       // lime-50
                'text' => 'oklch(65.14% 0.196 127.849)',  // lime-600
                'ring' => 'oklch(65.14% 0.196 127.849 / 0.2)'
            ],
            'green' => [
                'bg' => 'oklch(95.24% 0.025 146.5)',     // green-50
                'text' => 'oklch(60.09% 0.178 149.769)',  // green-600
                'ring' => 'oklch(60.09% 0.178 149.769 / 0.2)'
            ],
            'emerald' => [
                'bg' => 'oklch(94.71% 0.021 165)',       // emerald-50
                'text' => 'oklch(56.89% 0.145 168.246)',  // emerald-600
                'ring' => 'oklch(56.89% 0.145 168.246 / 0.2)'
            ],
            'teal' => [
                'bg' => 'oklch(95.45% 0.017 180)',       // teal-50
                'text' => 'oklch(56.21% 0.124 182.695)',  // teal-600
                'ring' => 'oklch(56.21% 0.124 182.695 / 0.2)'
            ],
            'cyan' => [
                'bg' => 'oklch(95.42% 0.019 200)',       // cyan-50
                'text' => 'oklch(55.93% 0.155 199.579)',  // cyan-600
                'ring' => 'oklch(55.93% 0.155 199.579 / 0.2)'
            ],
            'sky' => [
                'bg' => 'oklch(96.35% 0.016 214)',       // sky-50
                'text' => 'oklch(57.94% 0.184 217.902)',  // sky-600
                'ring' => 'oklch(57.94% 0.184 217.902 / 0.2)'
            ],
            'blue' => [
                'bg' => 'oklch(96.35% 0.016 238)',       // blue-50
                'text' => 'oklch(53.18% 0.19 252.418)',   // blue-600
                'ring' => 'oklch(53.18% 0.19 252.418 / 0.2)'
            ],
            'indigo' => [
                'bg' => 'oklch(95.7% 0.017 254)',        // indigo-50
                'text' => 'oklch(50.39% 0.174 263.827)',  // indigo-600
                'ring' => 'oklch(50.39% 0.174 263.827 / 0.2)'
            ],
            'violet' => [
                'bg' => 'oklch(95.4% 0.019 279)',        // violet-50
                'text' => 'oklch(54.78% 0.197 280.713)',  // violet-600
                'ring' => 'oklch(54.78% 0.197 280.713 / 0.2)'
            ],
            'purple' => [
                'bg' => 'oklch(95.8% 0.018 295)',        // purple-50
                'text' => 'oklch(57.09% 0.221 291.33)',   // purple-600
                'ring' => 'oklch(57.09% 0.221 291.33 / 0.2)'
            ],
            'fuchsia' => [
                'bg' => 'oklch(95.5% 0.019 320)',        // fuchsia-50
                'text' => 'oklch(60.18% 0.238 322.66)',   // fuchsia-600
                'ring' => 'oklch(60.18% 0.238 322.66 / 0.2)'
            ],
            'pink' => [
                'bg' => 'oklch(95.2% 0.019 343)',        // pink-50
                'text' => 'oklch(60.94% 0.203 349.761)',  // pink-600
                'ring' => 'oklch(60.94% 0.203 349.761 / 0.2)'
            ],
            'rose' => [
                'bg' => 'oklch(95.07% 0.019 12)',        // rose-50
                'text' => 'oklch(55.04% 0.183 15.149)',   // rose-600
                'ring' => 'oklch(55.04% 0.183 15.149 / 0.2)'
            ],
            'gray' => [
                'bg' => 'oklch(96.97% 0.001 106.424)',   // gray-50
                'text' => 'oklch(49.3% 0.015 265.755)',   // gray-600
                'ring' => 'oklch(49.3% 0.015 265.755 / 0.2)'
            ],
        ];


    }

    /**
     * Get color options for select field
     */
    public static function getColorOptions(): array
    {
        return [
            'red' => 'Red',
            'orange' => 'Orange',
            'amber' => 'Amber',
            'yellow' => 'Yellow',
            'lime' => 'Lime',
            'green' => 'Green',
            'emerald' => 'Emerald',
            'teal' => 'Teal',
            'cyan' => 'Cyan',
            'sky' => 'Sky',
            'blue' => 'Blue',
            'indigo' => 'Indigo',
            'violet' => 'Violet',
            'purple' => 'Purple',
            'fuchsia' => 'Fuchsia',
            'pink' => 'Pink',
            'rose' => 'Rose',
            'gray' => 'Gray',
        ];
    }

    /**
     * Get the color styles for this role
     */
    public function getColorStyles(): array
    {
        $colorMap = self::getColorMap();
        return $colorMap[$this->color] ?? $colorMap['gray'];
    }
}
